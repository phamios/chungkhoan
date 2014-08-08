<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function add_notification($notification_title, $notification_content, $notification_link, $active) {
        $this->load->database();
        $data = array(
            'nof_title'   => $notification_title,
            'nof_content' => $notification_content,
            'nof_link'    => $notification_link,
            'nof_created' => date("Y-m-d h:s:m"),
            'nof_active'  => $active,
        );
        $this->db->insert('tbl_notification', $data);
    }

    function update_notification($id, $notification_title, $notification_content, $notification_link, $active) {
        $this->load->database();
        $data = array(
            'nof_title'   => $notification_title,
            'nof_content' => $notification_content,
            'nof_link'    => $notification_link,
            'nof_created' => date("Y-m-d h:s:m"),
            'nof_active'  => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_notification', $data);
    }

    function show_all_notification() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_notification');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function del_notification($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_notification');
    }

    function get_notification_by_id($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_notification');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        return $query->result();
    }

}
