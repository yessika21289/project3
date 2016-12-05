<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Sales extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Sales_model');
    }

    public function getData() {
    	$warehouse = $this->Stocks_model->get_data();
    	return $warehouse;
    }
}