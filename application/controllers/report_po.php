<?php

class Report_po extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        include_once APPPATH . '../vendor/autoload.php'; //library Mpdf
    }

    public function index()
    {
        $html = '<h3>Bismmillah</h3>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
