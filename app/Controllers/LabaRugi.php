<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelAkun3;
use TCPDF;

use App\Controllers\BaseController;

class LabaRugi extends BaseController
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

        $objTransaksi = new ModelTransaksi();
        $rowdata = $objTransaksi->get_labarugi($tglawal, $tglakhir);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        return view('labarugi/index', $data);
    }

    public function labarugipdf()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $objTransaksi = new ModelTransaksi();
        $rowdata = $objTransaksi->get_labarugi($tglawal, $tglakhir);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;

        $html = view('labarugi/labarugipdf', $data);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(30, 4, 3);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('labarugi.pdf', 'I');
    }
}
