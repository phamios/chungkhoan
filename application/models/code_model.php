<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Code_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function get_hnx(){
    	$this->load->database();
    	$this->db->order_by("id");
    	$query=$this->db->get('tbl_code_ck_hnx');
    	if ($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	return $query->result();
    }
    
    public function get_hose(){
    	$this->load->database();
    	$this->db->order_by("id");
    	$query=$this->db->get('tbl_code_ck_hose');
    	if ($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	return $query->result();
    }

    public function truncate_db() {
        
    }

    public function add_code_hnx($object) {
        $data = array(
            'name' => $object[0],
            'col1' => $object[1],
            'col2' => $object[2],
            'col3' => $object[3],
            'col4' => $object[4],
            'col5' => $object[5],
            'col6' => $object[6],
            'col7' => $object[7],
            'col8' => $object[8],
            'col9' => $object[9],
            'col10' => $object[10],
            'col11' => $object[11],
            'col12' => $object[12],
            'col13' => $object[13],
            'col14' => $object[14],
            'col15' => $object[15],
            'col16' => $object[16],
            'col17' => $object[17],
            'col18' => $object[18],
            'col19' => $object[19],
            'col20' => $object[20],
            'col21' => $object[21],
            'col22' => $object[22],
            'col23' => $object[23],
            'col24' => $object[24],
            'col25' => $object[25],
            'col26' => $object[26],
            'col27' => $object[27],
            'col28' => $object[28],
            'col29' => $object[29],
            'col30' => $object[30],
            'col31' => $object[31],
            'col32' => $object[32],
            'col33' => $object[33],
            'col34' => $object[34],
            'col35' => $object[35],
            'col36' => $object[36],
            'col37' => $object[37],
            'col38' => $object[38],
            'col39' => $object[39],
            'col40' => $object[40],
            'col41' => $object[41],
        );
        $this->db->insert('tbl_code_ck_hnx', $data);
    }

    public function add_code_hose($object) {
    	//$this->check_code_exit($object[0]);
        $data = array(
            'name' => $object[0],
            'col1' => $object[1],
            'col2' => $object[2],
            'col3' => $object[3],
            'col4' => $object[4],
            'col5' => $object[5],
            'col6' => $object[6],
            'col7' => $object[7],
            'col8' => $object[8],
            'col9' => $object[9],
            'col10' => $object[10],
            'col11' => $object[11],
            'col12' => $object[12],
            'col13' => $object[13],
            'col14' => $object[14],
            'col15' => $object[15],
            'col16' => $object[16],
            'col17' => $object[17],
            'col18' => $object[18],
            'col19' => $object[19],
            'col20' => $object[20],
            'col21' => $object[21],
            'col22' => $object[22],
            'col23' => $object[23],
            'col24' => $object[24],
            'col25' => $object[25],
            'col26' => $object[26],
            'col27' => $object[27],
            'col28' => $object[28],
            'col29' => $object[29],
            'col30' => $object[30],
            'col31' => $object[31],
            'col32' => $object[32],
            'col33' => $object[33],
            'col34' => $object[34],
            'col35' => $object[35],
            'col36' => $object[36],
            'col37' => $object[37],
            'col38' => $object[38],
            'col39' => $object[39],
            'col40' => $object[40],
            'col41' => $object[41],
        );
        
        $this->db->insert('tbl_code_ck_hose', $data);
    }

    public function check_code_exit($object_name) {
        $this->db->where(array(
            'name' => $object_name, 
        ));
        $query = $this->db->get('data');
        if ($query->num_rows() > 0) {
           return false;
        } else {
           return true;
        }
    }

}
