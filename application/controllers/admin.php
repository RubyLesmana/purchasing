<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function ro()
    {
        $data['title']  = "Data Request Order";
        $data['ro']     = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'admin/data_ro', $data);
    }

    public function po()
    {
        $data['title'] = "Data Purchase Order";
        $data['po'] = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'admin/data_po', $data);
    }
}
