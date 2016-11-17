<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nguks
 * Date: 17/11/2016
 * Time: 14.03
 */
class Form extends CI_Controller {
    /**
     * Index Page for this controller.
     */

    public function index()
    {
        $this->template->title('Form');
        $this->template->build('form');
    }

    public function advanced()
    {
        $this->template->title('Form Advanced');
        $this->template->build('form_advanced');
    }

    public function validation()
    {
        $this->template->title('Form Validation');
        $this->template->build('form_validation');
    }

    public function wizards()
    {
        $this->template->title('Form Wizard');
        $this->template->build('form_wizards');
    }

    public function upload()
    {
        $this->template->title('Form Upload');
        $this->template->build('form_upload');
    }

    public function buttons()
    {
        $this->template->title('Form Buttons');
        $this->template->build('form_buttons');
    }
}