<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Site_model extends CI_Model {
	function __construct() { 
		
		parent::__construct ();
		$this->load->database ();
	}
	 

	function get_site_info(){
		$this->db->where('id',1);
		$query = $this->db->get('tbl_site');
		if($query->num_rows() > 0 ){
			return $query->result();

		}else{
			return null;
		}
	}

 

	function _list_siteconfig() {
		$this->load->database (); 
		$query = $this->db->get ( 'tbl_site');
		if ($query->num_rows () > 0) {
			return $query->result ();
		}
		return $query->result ();
	}
	
	   
	function update_site($object){
		
		$data = array(
				'site_name'=>$object['sitename'],
				'site_des'=>$object['sitedes'],
				'site_footer'=>$object['sitefooter'],
		);
		$this->db->where('id', 1);
		$this->db->update('tbl_site', $data);
	}
	
	 
}