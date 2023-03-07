<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelAkun3;
use TCPDF;

use App\Controllers\BaseController;

class JurnalUmum extends BaseController
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
        $rowdata = $objTransaksi->get_jurnalumum($tglawal, $tglakhir);
        $i = 0;
        $temp1 = '';
        $temp2 = '';

        foreach ($rowdata as $row){
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' : $row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $rowdata[$i]->tanggal = $tgl;
            $i++;
        }

        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        return view('jurnalumum/index', $data);
    }

    public function cetakjupdf()
    {
        $tglawal = $this->request->getVar('tglawal') ? $this->request->getVar('tglawal') : '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir') : '';

        $objTransaksi = new ModelTransaksi();
        $rowdata = $objTransaksi->get_jurnalumum($tglawal, $tglakhir);
        $i = 0;
        $temp1 = '';
        $temp2 = '';

        foreach ($rowdata as $row){
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' : $row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $rowdata[$i]->tanggal = $tgl;
            $i++;
        }

        $data = [
            'dttransaksi' => $rowdata,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
        ];

        $html = view('jurnalumum/cetakjupdf', $data);
        //tambah dokumen pdf
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        //menghilangkan footer dan header
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set margins
        $pdf->SetMargins(30, 4, 3);
        //ubah font
        $pdf->SetFont('helvetica', '', 8);
        //tambah halaman
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('Jurnal Umum.pdf', 'I');
    }
}
