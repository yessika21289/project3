<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 23/11/2016
 * Time: 00.31
 */

class Categories_model extends CI_Model
{
    function add_category($name = NULL) {
        if(!$name) {
            return false;
        }

        $data = array(
            'name'          => $name,
            'created_at'    => time(),
            'created_by'    => 'superadmin',
            'updated_at'    => time(),
            'updated_by'    => 'superadmin'
        );
        $this->db->insert('categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
}