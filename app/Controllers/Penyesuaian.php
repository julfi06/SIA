<?php

namespace App\Controllers;

use App\Models\ModelPenyesuaian;
use App\Models\ModelNilaiPenyesuaian;
use App\Models\ModelAkun3;
use App\Models\ModelStatus;

use CodeIgniter\RESTful\ResourceController;

class Penyesuaian extends ResourceController
{
    function __construct()
    {
        $db = \Config\Database::connect();
        $objPenyesuaian = new ModelPenyesuaian();
        $objNilaiPenyesuaian = new ModelNilaiPenyesuaian();
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
        $objPenyesuaian = new ModelPenyesuaian();
        $data['dtpenyesuaian'] = $objPenyesuaian->findAll();
        return view('penyesuaian/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $objPenyesuaian = new ModelPenyesuaian();
        $objNilaiPenyesuaian = new ModelNilaiPenyesuaian();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
        $penyesuaian = $objPenyesuaian->find($id);
        $akun3 = $objAkun3->findAll();
        $status = $objStatus->findAll();
        $nilai = $objNilaiPenyesuaian->ambilrelasiid($id);
        $data['dtnilaipenyesuaian'] = $nilai;

        if (is_object($penyesuaian)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dtpenyesuaian'] = $penyesuaian;

            return view('penyesuaian/show', $data);
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
        return view('penyesuaian/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $objPenyesuaian = new ModelPenyesuaian();
        $data1 = [
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'nilai' => $this->request->getVar('nilai'),
            'waktu' => $this->request->getVar('waktu'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];

        $db = \Config\Database::connect();
        $db->table('tbl_penyesuaian')->insert($data1);

        $objPenyesuaian = new ModelPenyesuaian();
        $id_penyesuaian = $objPenyesuaian->InsertID();
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        for ($i = 0; $i < count($kode_akun3); $i++) {
            $data2[] = [
                'id_penyesuaian' => $id_penyesuaian,
                'kode_akun3' => $kode_akun3[$i],
                'debit' => $debit[$i],
                'kredit' => $kredit[$i],
                'id_status' => $id_status[$i],
            ];
        }
        
        $objNilaiPenyesuaian = new ModelNilaiPenyesuaian();
        $objNilaiPenyesuaian->InsertBatch($data2);
        return redirect()->to(site_url('penyesuaian'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $objPenyesuaian = new ModelPenyesuaian();
        $objNilaiPenyesuaian = new ModelNilaiPenyesuaian();
        $objAkun3 = new ModelAkun3();
        $objStatus = new ModelStatus();
        $penyesuaian = $objPenyesuaian->find($id);
        $akun3 = $objAkun3->findAll();
        $status = $objStatus->findAll();
        $nilai = $objNilaiPenyesuaian->findAll();
        $data['dtnilaipenyesuaian'] = $nilai;

        if (is_object($penyesuaian)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dtpenyesuaian'] = $penyesuaian;

            return view('penyesuaian/edit', $data);
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
            'nilai' => $this->request->getVar('nilai'),
            'waktu' => $this->request->getVar('waktu'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];
        $db = \Config\Database::connect();
        $db->table('tbl_penyesuaian')->where(['id_penyesuaian' => $id])->update($data1);

        $ids = $this->request->getVar('id');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        foreach ($ids as $key => $value){
            $result[] = [
                'id' => $ids[$key],
                'kode_akun3' => $kode_akun3[$key],
                'debit' => $debit[$key],
                'kredit' => $kredit[$key],
                'id_status' => $id_status[$key],
            ];
        }
        $objNilaiPenyesuaian = new ModelNilaiPenyesuaian();
        $objNilaiPenyesuaian->UpdateBatch($result, 'id');
        return redirect()->to(site_url('penyesuaian'))->with('success', 'Data berhasil di Update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $objPenyesuaian = new ModelPenyesuaian();
        $objPenyesuaian->where(['id_penyesuaian' => $id])->delete();
        return redirect()->to(site_url('penyesuaian'))->with('success', 'Data berhasil di hapus');
    }
}
