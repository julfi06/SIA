<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelAkun3;
use TCPDF;

use App\Controllers\BaseController;

class Posting extends BaseController
{
    function __construct()
    {
        $db = \Config\Database::connect();
        $objTransaksi = new ModelTransaksi();
        $objNilai = new ModelNilai();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
    }

    public function index()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';
        $kode_akun3 = $this->request->getVar('kode_akun3') ? $this->request->getVar('kode_akun3') : '';

        $objTransaksi = new ModelTransaksi();
        $objAkun3 = new ModelAkun3();
        $rowdata = $objTransaksi->get_jurnalumum($tglawal, $tglakhir, $kode_akun3);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['kode_akun3'] = $kode_akun3;
        $data['dtakun3'] = $objAkun3->ambilrelasi();
        return view('posting/index', $data);
    }

    public function postingpdf()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';
        $kode_akun3 = $this->request->getVar('kode_akun3') ? $this->request->getVar('kode_akun3') : '';

        $objTransaksi = new ModelTransaksi();
        $objAkun3 = new ModelAkun3();
        $rowdata = $objTransaksi->get_jurnalumum($tglawal, $tglakhir, $kode_akun3);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['kode_akun3'] = $kode_akun3;
        $data['dtakun3'] = $objAkun3->ambilrelasi();

        $html = view('posting/postingpdf', $data);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        //menghilangkan footer dan header
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(30, 4, 3);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('posting.pdf', 'I');
    }
}
