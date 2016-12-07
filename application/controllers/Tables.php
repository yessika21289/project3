<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Tables extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function index()
    {
        $this->template->title('Tables');
        $this->template->build('tables');
    }

    public function dynamic()
    {
        $this->template->title('Table Dynamic');
        $this->template->build('tables_dynamic');
    }
}