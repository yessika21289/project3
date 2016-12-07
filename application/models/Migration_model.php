<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 22/11/2016
 * Time: 23.49
 */

class Migration_model extends CI_Model
{
    function old_stok() {
        $this->db->select('NAMA_GROUP, NAMA, TIPE, VOL, G00001');
        $query = $this->db->get('stok');
        return $query->result();
    }

    function insert_products($data) {
        $failed = array();
        foreach($data as $val) {
            $insert = $this->db->insert('products', $val);
            if(!$insert) {
                $failed[] = $val['name'];
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }

    function old_selling() {
        $query = $this->db->get('hretail');
        return $query->result();
    }

    function old_selling_detail($idtr) {
        $query = $this->db->get_where('dretail', array('IDTR'=>$idtr));
        return $query->result();
    }

    function insert_selling($data) {
        $failed = array();
        foreach($data as $val) {
        $this->session->set_flashdata('message', implode(', ',$val));
            $insert = $this->db->insert('selling', $val);
            if(!$insert) {
                $failed[] = $val['id'].'-'.$val['no_faktur'];
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }

    function insert_selling_products($data) {
        $failed = array();
        foreach($data as $val) {
            foreach($val as $val2) {
                $insert = $this->db->insert('selling_products', $val2);
                if(!$insert) {
                    $failed[] = $val['selling_id'].'-'.$val['product_id'];
                }
            }
        }

        return array(
            'status' => true,
            'failed_list' => implode(', ', $failed)
        );

    }
}