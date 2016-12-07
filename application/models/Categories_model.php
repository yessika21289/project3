<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 23/11/2016
 * Time: 00.31
 */

class Categories_model extends CI_Model
{
    function get_categories($column = NULL, $param = NULL) {
        if($column) {
            $this->db->select($column);
        }
        if($param) {
            foreach($param as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        $query = $this->db->get('categories');
        return $query->result();
    }
}