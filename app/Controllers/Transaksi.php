<?php

namespace App\Controllers;

use App\Models\ModelAkun3;
use App\Models\ModelTransaksi;
use App\Models\ModelNilai;
use App\Models\ModelStatus;
use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{
    function __construct()
    {
        $db = \Config\Database::connect();
        $objTransaksi = new ModelTransaksi();
        $objNilai = new ModelNilai();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $objTransaksi = new ModelTransaksi();
        $data['dttransaksi'] = $objTransaksi->findAll();
        return view('transaksi/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $objTransaksi = new ModelTransaksi();
        $objNilai = new ModelNilai();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
        $transaksi = $objTransaksi->find($id);
        $akun3 = $objAkun3->findAll();
        $status = $objStatus->findAll();
        $nilai = $objNilai->ambilrelasiid($id);
        $data['dtnilai'] = $nilai;

        if (is_object($transaksi)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dttransaksi'] = $transaksi;

            return view('transaksi/show', $data);
        } else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('transaksi/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $objTransaksi = new ModelTransaksi();
        $data1 = [
            // 'kwitansi' => $this->request->getVar('kwitansi'),
            'kwitansi' => $objTransaksi->noKwitansi(),
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];

        $db = \Config\Database::connect();
        $db->table('tbl_transaksi')->insert($data1);

        $objTransaksi = new ModelTransaksi();
        $id_transaksi = $objTransaksi->InsertID();
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        for ($i = 0; $i < count($kode_akun3); $i++) {
            $data2[] = [
                'id_transaksi' => $id_transaksi,
                'kode_akun3' => $kode_akun3[$i],
                'debit' => $debit[$i],
                'kredit' => $kredit[$i],
                'id_status' => $id_status[$i],
            ];
        }
        
        $objNilai = new ModelNilai();
        $objNilai->InsertBatch($data2);
        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $objTransaksi = new ModelTransaksi();
        $objNilai = new ModelNilai();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
        $transaksi = $objTransaksi->find($id);
        $akun3 = $objAkun3->findAll();
        $status = $objStatus->findAll();
        $nilai = $objNilai->findAll();
        $data['dtnilai'] = $nilai;

        if (is_object($transaksi)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dttransaksi'] = $transaksi;

            return view('transaksi/edit', $data);
        } else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data1 = [
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];
        $db = \Config\Database::connect();
        $db->table('tbl_transaksi')->where(['id_transaksi' => $id])->update($data1);

        $ids = $this->request->getVar('id_nilai');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        foreach ($ids as $key => $value){
            $result[] = [
                'id_nilai' => $ids[$key],
                'kode_akun3' => $kode_akun3[$key],
                'debit' => $debit[$key],
                'kredit' => $kredit[$key],
                'id_status' => $id_status[$key],
            ];
        }
        $objNilai = new ModelNilai();
        $objNilai->UpdateBatch($result, 'id_nilai');
        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil di Update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $objTransaksi = new ModelTransaksi();
        $objTransaksi->where(['id_transaksi' => $id])->delete();
        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil di hapus');
    }

    public function akun3()
    {
        $akun3 = model(ModelAkun3::class);
        $result = $akun3->findAll();
        return $this->response->setJSON($result);
    }
    public function status()
    {
        $status = model(ModelStatus::class);
        $result = $status->findAll();
        return $this->response->setJSON($result);
    }
}
