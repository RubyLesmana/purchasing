<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_order extends CI_Controller
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
        $data['title']  = "Request Order";
        $data['ro']     = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'request_order/data', $data);
    }

    public function histori()
    {
        $data['title']  = "Request Order";
        $data['ro']     = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'request_order/histori', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('divisi_id', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|numeric|greater_than[0]');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']  = "Create Request Order";
            $data['ro']     = $this->admin->getRo();
            $data['divisi'] = $this->admin->get('divisi');
            $data['barang'] = $this->admin->get('barang');

            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('request_order', 'id_ro');
            $kode_tambah    = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number         = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_ro']  = 'RO' . $number;

            $this->template->load('templates/dashboard', 'request_order/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('request_order', $input);

            if ($insert) {
                set_pesan('Request Order Berhasil dibuat');
                redirect('request_order');
            } else {
                set_pesan('Gagal membuat Request Order');
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
            $data['barang'] = $this->admin->get('barang');
            $data['ro']     = $this->admin->get('request_order', ['id_ro' => $id]);
            $this->template->load('templates/dashboard', 'request_order/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('request_order', 'id_ro', $id, $input);

            if ($update) {
                set_pesan('Request Order berhasil di Perbaharui');
                redirect('request_order');
            } else {
                set_pesan('Request Order gagal di perbaharui');
                redirect('request_order/edit/' . $id);
            }
        }
    }

    public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $data['title']  = "Detail Request Order";
        $data['divisi'] = $this->admin->get('divisi');
        $data['barang'] = $this->admin->get('barang');
        $data['ro']     = $this->admin->get('request_order', ['id_ro' => $id]);
        $this->template->load('templates/dashboard', 'request_order/detail', $data);
    }


    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('request_order', 'id_ro', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('request_order');
    }

    public function report_ro()
    {
        $data['title']  = "Report Request Order";
        $data['ro']     = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'request_order/report', $data);
    }

    public function cetak_ro($getId)
    {
        $id = encode_php_tags($getId);
        $data['divisi'] = $this->admin->get('divisi');
        $data['barang'] = $this->admin->get('barang');
        $data['ro']     = $this->admin->get('request_order', ['id_ro' => $id]);
        $sql = $this->db->query("SELECT a.`id_ro`, a.`tanggal`,a.`divisi_id`,a.`barang_id`,a.`keterangan`,a.`quantity`,a.`status`, b.nama_divisi, c.nama_barang 
        FROM `request_order` a 
        INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
        INNER JOIN barang c ON a.`barang_id`=c.id_barang WHERE id_ro ='$id' ");
        $no = $sql->row();
        $data = '
        <style type="text/css">
		
		.table1 {
			font-family: sans-serif;
			color: black;
			border-collapse: collapse;
			margin-top:20px;
		}

		.table1, th,td {
			border: 1px solid #999;
			padding: 8px 20px;

		}
		.label{
			border-style: solid;
			line-height: 20px;

		}

		div.ttd{
			float:right;
			
		}
		

		</style>

		
		<div>
		
		<h1 style="text-align:center">REQUEST ORDER</h1>
        <h2 style="text-align:center">No : ' . $no->id_ro . ' / ' . $no->nama_divisi . '  </h2>
        <h3 style="text-align:center">Tanggal : ' . $no->tanggal . '  </h3>
		
		</div>
		<table class="table1" width="100%">
		<tr>
            <th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Quantity</th>
			<th>Keterangan</th>
		</tr> 
		';

        // $sql = $this->db->query("SELECT a.`id_ro`, a.`tanggal`,a.`divisi_id`,a.`barang_id`,a.`keterangan`,a.`quantity`,a.`status`, b.nama_divisi, c.nama_barang 
        // FROM `request_order` a 
        // INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
        // INNER JOIN barang c ON a.`barang_id`=c.id_barang WHERE id_ro ='$id' ");
        foreach ($sql->result() as $view) {
            $data .= '<tr>
			<td style="text-align:center">' . $view->barang_id . '</td>
            <td style="text-align:center">' . $view->nama_barang . '</td>
			<td style="text-align:center">' . $view->quantity . '</td>
			<td style="text-align:center">' . $view->keterangan . '</td>
			</tr>';
        }
        $data .= '</table>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');
        // $data = $this->load->view('request_order/hasil_cetak', [], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}
