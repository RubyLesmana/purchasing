<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
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
        $data['title'] = "Purchase Order";
        $data['po'] = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'manager/data', $data);
    }

    public function data_ro()
    {
        $data['title'] = "Purchase Order";
        $data['ro'] = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'manager/data_ro', $data);
    }

    public function data_po()
    {
        $data['title'] = "Purchase Order";
        $data['po'] = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'manager/data_po', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_po', 'ID RO', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('ro_id', 'ID RO', 'required|trim');
        $this->form_validation->set_rules('requistion_id', 'ID Requistion', 'required|trim');
        $this->form_validation->set_rules('total', 'Total', 'required|trim|numeric|greater_than[0]');

        //$this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function approve($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Approve Purchase Order";
            $data['divisi'] = $this->admin->get('divisi');
            $data['jenis']  = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang');
            $data['supplier'] = $this->admin->get('supplier');
            $data['po']     = $this->admin->get('purchase_order', ['id_po' => $id]);
            $this->template->load('templates/dashboard', 'manager/approve', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('purchase_order', 'id_po', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('manager');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('manager/approve/' . $id);
            }
        }
    }
}
