<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );
class Home extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'session' );
		$this->load->helper ( 'url' );
		$this->load->library ( 'upload' );
		$this->load->library ( 'pagination' );
		$this->load->library ( 'parser' );
		$this->load->helper ( 'cookie' );
		$this->load->helper ( "text" );
		$this->load->helper ( array (
				'form',
				'url' 
		) );
		@session_start ();
	}
	public function index() {
		$this->load->model ( 'cate_model' );
		$site_info = $this->site_info ();
		$data ['_menus'] = $this->cate_model->list_menu ();
		$data ['sitename'] = $site_info ['title'];
		$data ['description'] = $site_info ['description'];
		$data ['footer'] = $site_info ['footer'];
		
		$this->load->view ( 'home/index', $data );
	}
	public function register($error = null) {
		$site_info = $this->site_info ();
		$data ['menus'] = $site_info ['menu'];
		$data ['sitename'] = $site_info ['title'];
		$data ['description'] = $site_info ['description'];
		$data ['footer'] = $site_info ['footer'];
		// -----------------------------------------
		
		if ($this->session->userdata ( 'userid' ) != null) {
			redirect ( 'home/profile' );
		} else {
			if (isset ( $_REQUEST ['reg_submit'] )) {
				/**
				 * Validate captcha
				 */
				$capcha = $this->input->post ( 'captcha', true );
				if (! empty ( $capcha )) {
					if (empty ( $_SESSION ['captcha'] ) || trim ( strtolower ( $capcha ) ) != $_SESSION ['captcha']) {
						$captcha_message = "Invalid captcha";
						$style = "background-color: #FF606C";
					} else {
						$name = $this->input->post ( 'username', true );
						$phone = $this->input->post ( 'phone', true );
						$pass = $this->input->post ( 'password', true );
						$pass2 = $this->input->post ( 'confirm_password', true );
						$fullname = $this->input->post ( 'full_name', true );
						$sex = $this->input->post ( 'gender', true );
						
						$day_of_birth = $this->input->post ( 'day_of_birth', true );
						$month_of_birth = $this->input->post ( 'month_of_birth', true );
						$year_of_birth = $this->input->post ( 'year_of_birth', true );
						$birth = $day_of_birth . "-" . $month_of_birth . "-" . $year_of_birth;
						
						$country = $this->input->post ( 'state_id', true );
						// linh vuc chuyen mon:
						$job = $this->input->post ( 'occupation_id', true );
						
						$address = $this->input->post ( 'mem_address', true );
						$email = $this->input->post ( 'email', true );
						
						if ($pass != $pass2) {
							redirect ( 'home/register/pass' );
						} else {
							$this->load->model ( 'member_model' );
							$result = $this->member_model->_adduser ( $name, $pass, $phone, $fullname, $address, $email, $country, $birth, $sex, $job );
							
							if ($result == 1) {
								redirect ( 'home/login/' );
							} else {
								redirect ( 'home/register/exit' );
							}
						}
					}
					
					$request_captcha = htmlspecialchars ( $_REQUEST ['captcha'] );
					unset ( $_SESSION ['captcha'] );
				}
			}
			if ($error == "pass") {
				$data ['error'] = "Mật khẩu chưa trùng khớp";
			} elseif ($error == "exit") {
				$data ['error'] = "<font color='red'><b>Tài khoản đã tồn tại</b></font>, Vui lòng kiểm tra lại tên tài khoản";
			} else {
				$data ['error'] = "";
			}
		}
		$this->load->view ( 'home/index', $data );
	}
	public function login($error = null) {
		$site_info = $this->site_info ();
		$data ['menus'] = $site_info ['menu'];
		$data ['sitename'] = $site_info ['title'];
		$data ['description'] = $site_info ['description'];
		$data ['footer'] = $site_info ['footer'];
		// -----------------------------------------
		if (isset ( $_REQUEST ['login_submit'] )) {
			$this->load->model ( 'member_model' );
			$auth = $this->member_model->check_login_customer ( $this->input->post ( 'username', true ), $this->input->post ( 'password' ) );
			if ($auth > 0) {
				$newdata = array (
						'user_id' => $auth,
						'user_name' => $this->input->post ( 'username', true ) 
				);
				$this->session->set_userdata ( $newdata );
				redirect ( 'home/index' );
			} else {
				redirect ( 'home/index' );
			}
		}
		// $this->load->view ( 'front/index',$data);
	}
	public function dashboard() {
		$this->load->view ( 'front/index' );
	}
	public function logout() {
		$this->session->unset_userdata ( 'user_id' );
		$this->session->unset_userdata ( 'user_name' );
		redirect ( 'home' );
	}
	public function profile() {
		if ($this->session->userdata ( 'user_id' ) == null) {
			redirect ( 'home/index' );
		} else {
			$this->load->model ( 'cate_model' );
			$site_info = $this->site_info ();
			$data ['_menus'] = $this->cate_model->list_menu ();
			$data ['sitename'] = $site_info ['title'];
			$data ['description'] = $site_info ['description'];
			$data ['footer'] = $site_info ['footer'];
			// ---------------------------------------------
			$member = $this->member_info ( $this->session->userdata ( 'user_id' ) );
			$data ['mem_name'] = $member ['mem_name'];
			$data ['mem_create'] = $member ['mem_create'];
			$data ['mem_balance'] = $member ['mem_balance'];
			$data ['mem_name'] = $member ['mem_balance'];
			$data ['mem_email'] = $member ['mem_email'];
			$data ['mem_sex'] = $member ['mem_sex'];
			$data ['mem_birth'] = $member ['mem_birth'];
			$data ['mem_country'] = $member ['mem_country'];
			$data ['mem_phone'] = $member ['mem_phone'];
			$data ['mem_job'] = $member ['mem_job'];
			$data ['mem_add'] = $member ['mem_add'];
			
			$this->load->view ( 'front/index', $data );
		}
	}
	public function update_profile($error = null) {
		if ($this->session->userdata ( 'user_id' ) == null) {
			redirect ( 'home/index' );
		} else {
			$site_info = $this->site_info ();
			$data ['menus'] = $site_info ['menu'];
			$data ['sitename'] = $site_info ['title'];
			$data ['description'] = $site_info ['description'];
			$data ['footer'] = $site_info ['footer'];
			// -----------------------------------------
			
			if ($this->session->userdata ( 'userid' ) != null) {
				redirect ( 'home/index' );
			} else {
				if (isset ( $_REQUEST ['reg_submit'] )) {
					/**
					 * Validate captcha
					 */
					$capcha = $this->input->post ( 'captcha', true );
					if (! empty ( $capcha )) {
						if (empty ( $_SESSION ['captcha'] ) || trim ( strtolower ( $capcha ) ) != $_SESSION ['captcha']) {
							$captcha_message = "Invalid captcha";
							$style = "background-color: #FF606C";
						} else {
							$name = $this->input->post ( 'username', true );
							$phone = $this->input->post ( 'phone', true );
							$pass = $this->input->post ( 'password', true );
							$pass2 = $this->input->post ( 'confirm_password', true );
							$fullname = $this->input->post ( 'full_name', true );
							$sex = $this->input->post ( 'gender', true );
							
							$day_of_birth = $this->input->post ( 'day_of_birth', true );
							$month_of_birth = $this->input->post ( 'month_of_birth', true );
							$year_of_birth = $this->input->post ( 'year_of_birth', true );
							$birth = $day_of_birth . "-" . $month_of_birth . "-" . $year_of_birth;
							
							$country = $this->input->post ( 'state_id', true );
							// linh vuc chuyen mon:
							$job = $this->input->post ( 'occupation_id', true );
							
							$address = $this->input->post ( 'mem_address', true );
							$email = $this->input->post ( 'email', true );
							
							if ($pass != $pass2) {
								redirect ( 'home/register/pass' );
							} else {
								$this->load->model ( 'member_model' );
								$result = $this->member_model->_adduser ( $name, $pass, $phone, $fullname, $address, $email, $country, $birth, $sex, $job );
								
								if ($result == 1) {
									redirect ( 'home/login/' );
								} else {
									redirect ( 'home/register/exit' );
								}
							}
						}
						
						$request_captcha = htmlspecialchars ( $_REQUEST ['captcha'] );
						unset ( $_SESSION ['captcha'] );
					}
				}
				if ($error == "pass") {
					$data ['error'] = "Mật khẩu chưa trùng khớp";
				} elseif ($error == "exit") {
					$data ['error'] = "<font color='red'><b>Tài khoản đã tồn tại</b></font>, Vui lòng kiểm tra lại tên tài khoản";
				} else {
					$data ['error'] = "";
				}
			}
			
			$this->load->model ( 'member_model' );
			$data ['member_info'] = $this->member_model->show_details_user ( $this->session->userdata ( 'user_id' ) );
			
			$this->load->view ( 'front/index', $data );
		}
	}
	
	public function order(){
		if ($this->session->userdata ( 'user_id' ) == null) {
			redirect ( 'home/index' );
		} else {
			$site_info = $this->site_info ();
			$data ['menus'] = $site_info ['menu'];
			$data ['sitename'] = $site_info ['title'];
			$data ['description'] = $site_info ['description'];
			$data ['footer'] = $site_info ['footer'];
			// -----------------------------------------
			$member = $this->member_info ( $this->session->userdata ( 'user_id' ) );
			$data ['mem_name'] = $member ['mem_name'];
			$data ['mem_create'] = $member ['mem_create'];
			$data ['mem_balance'] = $member ['mem_balance'];
			$data ['mem_name'] = $member ['mem_balance'];
			$data ['mem_email'] = $member ['mem_email'];
			$data ['mem_sex'] = $member ['mem_sex'];
			$data ['mem_birth'] = $member ['mem_birth'];
			$data ['mem_country'] = $member ['mem_country'];
			$data ['mem_phone'] = $member ['mem_phone'];
			$data ['mem_job'] = $member ['mem_job'];
			$data ['mem_add'] = $member ['mem_add'];
			
			
			$this->load->view ( 'front/index', $data );
		}
	} 
	
	
	public function member_info($user_id) {
		$this->load->model ( 'member_model' );
		$info = $this->member_model->show_details_user ( $user_id );
		$object = array ();
		foreach ( $info as $row ) {
			$object ['mem_name'] = $row->member_name;
			$object ['mem_create'] = $row->member_created;
			$object ['mem_balance'] = $row->member_balance;
			$object ['mem_fullname'] = $row->member_fullname;
			$object ['mem_email'] = $row->member_email;
			$object ['mem_sex'] = $row->member_sex;
			$object ['mem_birth'] = $row->member_birthday;
			$object ['mem_phone'] = $row->member_phone;
			$object ['mem_country'] = $row->member_country;
			$object ['mem_job'] = $row->member_job;
			$object ['mem_add'] = $row->member_address;
		}
		return $object;
	}
	public function site_info() {
		$this->load->model ( 'site_model' );
		$site = $this->site_model->_list_siteconfig ();
		$return = array ();
		foreach ( $site as $row ) {
			$return ['title'] = $row->site_name;
			$return ['description'] = $row->site_des;
			$return ['footer'] = $row->site_footer;
		}
		
		$this->load->model ( 'cate_model' );
		$return ['menu'] = $this->cate_model->list_menu ();
		return $return;
	}
}
