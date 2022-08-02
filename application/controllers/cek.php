<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        is_purchasing();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Request Order";
        $data['ro'] = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'ro/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('divisi_id', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|numeric|greater_than[0]');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Create Request Order";
            $data['jenis']  = $this->admin->get('jenis');
            $data['divisi'] = $this->admin->get('divisi');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang');

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('ro', 'id_ro');
            $kode_tambah    = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_ro'] = 'RO' . $number;

            $this->template->load('templates/dashboard', 'ro/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('ro', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('request_order');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('request_order/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Edit Request Order";
            $data['divisi'] = $this->admin->get('divisi');
            $data['jenis']  = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang');
            $data['ro']     = $this->admin->get('ro', ['id_ro' => $id]);
            $this->template->load('templates/dashboard', 'ro/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('ro', 'id_ro', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('request_order');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('request_order/edit/' . $id);
            }
        }
    }

    public function konfir($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title']  = "Edit Request Order";
            $data['divisi'] = $this->admin->get('divisi');
            $data['jenis']  = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang');
            $data['ro']     = $this->admin->get('ro', ['id_ro' => $id]);
            $this->template->load('templates/dashboard', 'ro/konfir', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('ro', 'id_ro', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('request_order');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('request_order/edit/' . $id);
            }
        }
    }
}
