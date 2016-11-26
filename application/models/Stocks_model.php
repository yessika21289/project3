<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 23/11/2016
 * Time: 00.31
 */

class Stocks_model extends CI_Model
{
    function get_data() {
        $this->db->select('categories.*, categories.name as category, products.*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
}