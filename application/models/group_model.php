<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Group_model extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct ();
		$this->load->database ();
	}

	function _listgroup($num, $offset) {
		$this->load->database ();
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ( 'tbl_group', $num, $offset );
		if ($query->num_rows () > 0) {
			return $query->result ();
		}
		return $query->result ();
	}
	
    function add_group($group_name,$group_type,$group_desc,$group_min_balance,$group_active,$group_expired) {
        $this->load->database();
        $data = array(
            'group_name'        => $group_name,
            'group_type'        => $group_type,
            'group_desc'        => $group_desc,
            'group_min_balance' => $group_min_balance,
            'group_active'      => $group_active,
            'group_expired'     => $group_expired,
            'group_created'     => date("Y-m-d h:s:m"),
        );
        $this->db->insert('tbl_group', $data);
    }

    function update_group($id,$group_name,$group_type,$group_desc,$group_min_balance,$group_active,$group_expired) {
        $this->load->database();
        $data = array(
            'group_name'        => $group_name,
            'group_type'        => $group_type,
            'group_desc'        => $group_desc,
            'group_min_balance' => $group_min_balance,
            'group_active'      => $group_active,
            'group_expired'     => $group_expired,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_group', $data);
    }

    function del_group($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_group');
    }

    function get_group_by_id($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_group');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        return $query->result();
    }

    function total_group() {
        $this->load->database ();
        return $this->db->count_all('tbl_group');
    }

}
