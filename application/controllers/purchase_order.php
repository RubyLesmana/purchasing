<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_order extends CI_Controller
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
        $this->template->load('templates/dashboard', 'purchase_order/data_po', $data);
    }

    public function dataRo()
    {
        $data['title'] = "Data Request Order";
        $data['ro'] = $this->admin->getRo();
        $this->template->load('templates/dashboard', 'purchase_order/data', $data);
    }

    public function histori()
    {
        $data['title'] = "Histori Purchase Order";
        $data['po'] = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'purchase_order/histori', $data);
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

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title']      = "Create Purchase Order";
            $data['divisi']     = $this->admin->get('divisi');
            $data['barang']     = $this->admin->get('barang');
            $data['supplier']   = $this->admin->get('supplier');
            $data['request']    = $this->admin->get('request_order');
            $data['requistion'] = $this->admin->get('tb_requistion');
            $data['po']         = $this->admin->getPo();


            // Mengenerate ID Barang
            $kode_terakhir  = $this->admin->getMax('purchase_order', 'id_po');
            $kode_tambah    = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_po'] = 'PO' . $number;

            $this->template->load('templates/dashboard', 'purchase_order/add', $data);
        } else {
            $input  = $this->input->post(null, true);
            $insert = $this->admin->insert('purchase_order', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('purchase_order');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('purchase_order/add');
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
            $data['supplier'] = $this->admin->get('supplier');
            $data['po']     = $this->admin->get('purchase_order', ['id_po' => $id]);
            $this->template->load('templates/dashboard', 'purchase_order/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('purchase_order', 'id_po', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('purchase_order');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('purchase_order/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('purchase_order', 'id_po', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('purchase_order');
    }

    public function detail($getId)
    {
        $id = encode_php_tags($getId);
        $data['title']      = "Cetak Purchase Order";
        $data['divisi']     = $this->admin->get('divisi');
        $data['barang']     = $this->admin->get('barang');
        $data['supplier']   = $this->admin->get('supplier');
        $data['request']    = $this->admin->get('request_order');
        $data['requistion'] = $this->admin->get('tb_requistion');
        $data['po']         = $this->admin->get('purchase_order', ['id_po' => $id]);
        $this->template->load('templates/dashboard', 'purchase_order/detail', $data);
    }

    public function report_po()
    {
        $data['title']  = "Report Request Order";
        $data['po']     = $this->admin->getPo();
        $this->template->load('templates/dashboard', 'purchase_order/report', $data);
    }

    public function cetak_po($getId)
    {
        $id = encode_php_tags($getId);
        $data['divisi'] = $this->admin->get('divisi');
        $data['barang'] = $this->admin->get('barang');
        $data['po']     = $this->admin->get('purchase_order', ['id_po' => $id]);

        $sql = $this->db->query("SELECT b.`id_po`,b.`ro_id`,b.`divisi_id`,b.`barang_id`,b.`quantity`, b.`keterangan`,b.`requistion_id`,b.`supplier_id`,b.`harga`,b.`total`, b.`tanggal`,b.`status`,
                c.nama_divisi, d.nama_barang, f.nama_supplier, f.alamat, f.no_telp
                FROM `purchase_order` b
                INNER JOIN divisi c ON b.`divisi_id`=c.id_divisi
                INNER JOIN barang d ON b.`barang_id`=d.id_barang  
                INNER JOIN supplier f ON b.`supplier_id`=f.id_supplier WHERE id_po ='$id'");
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
		
		<h1 style="text-align:center">PURCHASE ORDER</h1>
        <h2 style="text-align:center">No : ' . $no->id_po . ' / ' . $no->nama_divisi . '  </h2>
        <h3 style="text-align:center">Tanggal : ' . $no->tanggal . '  </h3>
		
		</div>
        <table width="100%">
            <tr width="50%">
                <td>
                To      : ' . $no->nama_supplier . '<br>
                Alamat  : ' . $no->alamat . '<br>
                Telepon : ' . $no->no_telp . '<br>

                </td>
                <td width="50%">
                FROM    : PT. Wahana Duta Jaya Rucika <br>
                Alamat  : Jl. Imam Bonjol KM.26 <br>
                          Jalan Raya Bekasi - Cikarang <br>
                          Cikarang Barat <br>
                Telepon : 021-9999999 <br>
                </td>
            </tr>
        </table>
		<table class="table1" width="100%">
		<tr>
            <th>ID RO</th>
            <th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Quantity</th>
            <th>Harga</th>
            <th>Total</th>
			<th>Keterangan</th>
		</tr> 
		';

        foreach ($sql->result() as $view) {
            $data .= '<tr>
			<td style="text-align:center">' . $view->ro_id . '</td>
            <td style="text-align:center">' . $view->barang_id . '</td>
            <td style="text-align:center">' . $view->nama_barang . '</td>
			<td style="text-align:center">' . $view->quantity . '</td>
            <td style="text-align:center">' . number_format($view->harga)  . '</td>
            <td style="text-align:center">' . number_format($view->total) . '</td>
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
