<?php
/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 01/12/2016
 * Time: 22.46
 */

class Warehouses_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }
}