<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Stocks extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function index()
    {
        $this->template->title('Stok Barang');
        $this->template->build('stock_list');
    }
}