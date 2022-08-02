<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requistion extends CI_Controller
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
        $data['title'] = "Requistion";
        $data['req'] = $this->admin->getRequistion();
        $this->template->load('templates/dashboard', 'requistion/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Create Requistion";
            $data['supplier'] = $this->admin->get('supplier');
            $data['barang'] = $this->admin->get('barang');

            $this->template->load('templates/dashboard', 'requistion/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('tb_requistion', $input);

            if ($insert) {
                set_pesan('Requistion Berhasil dibuat');
                redirect('requistion');
            } else {
                set_pesan('Gagal membuat Requistion');
                redirect('requistion/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']      = "Edit Request Order";
            $data['supplier']   = $this->admin->get('supplier');
            $data['barang']     = $this->admin->get('barang');
            $data['req']        = $this->admin->get('tb_requistion', ['id_requistion' => $id]);
            $this->template->load('templates/dashboard', 'requistion/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('tb_requistion', 'id_requistion', $id, $input);

            if ($update) {
                set_pesan('Request Order berhasil di Perbaharui');
                redirect('requistion');
            } else {
                set_pesan('Request Order gagal di perbaharui');
                redirect('requistion/edit/' . $id);
            }
        }
    }
}
