<?php
class Sales_model extends CI_Model
{
	function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function get_data() {
    	$query = $this->db->get('sales');
        return $query->result_array();
    }
}