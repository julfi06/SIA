<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use App\Models\ModelAkun3;
use TCPDF;

use App\Controllers\BaseController;

class Neraca extends BaseController
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
        $rowdata = $objTransaksi->get_neraca($tglawal, $tglakhir);
        $data['dttransaksi'] = $rowdata;
        $data['tglawal'] = $tglawal;
        $data['tglakhir'] = $tglakhir;
        return view('neraca/index', $data);
    }
}
