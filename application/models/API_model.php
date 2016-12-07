<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 01/12/2016
 * Time: 23.01
 */

class API_model extends CI_Model
{
    function get_data($table, $param = NULL, $order_by = NULL, $column = NULL) {
        if($column) {
            $this->db->select($column);
        }
        if($param) {
            foreach($param as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if($order_by) {
            foreach($order_by as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }
        $query = $this->db->get($table);
        return $query->result();
    }

}