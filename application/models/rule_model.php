<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rule_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function update_rule($id, $rate, $start_time, $end_time, $draw_mode) {
        $this->load->database();
        $data = array(
            'rate'       => $rate,
            'start_time' => $start_time,
            'end_time'   => $end_time,
            'draw_mode'  => $draw_mode,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_board_settings', $data);
    }

    function get_all_rule() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_board_settings');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

}
