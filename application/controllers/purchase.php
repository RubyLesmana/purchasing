<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = "Purchase Order";
        $data['po']     = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'request_order/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_po', 'ID PO', 'required');
        $this->form_validation->set_rules('ro_id', 'ID RO', 'required');
        $this->form_validation->set_rules('requistion_id', 'ID Requistion', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Create Purchase Order";
            $data['po']     = $this->admin->getPo();
            $data['req'] = $this->admin->get('request_order');
            $data['requistion'] = $this->admin->get('tb_requistion');

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('purchase_order', 'id_po');
            $kode_tambah    = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_po']  = 'PO' . $number;

            $this->template->load('templates/dashboard', 'purchase_order/add_po', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('purchase_order', $input);

            if ($insert) {
                set_pesan('Request Order Berhasil dibuat');
                redirect('purchase');
            } else {
                set_pesan('Gagal membuat Request Order');
                redirect('purchase/add');
            }
        }
    }
}
