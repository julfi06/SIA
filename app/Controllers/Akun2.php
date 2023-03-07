<?php

namespace App\Controllers;

use App\Models\ModelAkun2;

use CodeIgniter\RESTful\ResourceController;

class Akun2 extends ResourceController
{
    //inisialisasi object data
    function __construct()
    {
        $objAkun2 = new ModelAkun2();
        $db = \Config\Database::connect();
    }
    
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        
        

        // $query = $db->query("SELECT * FROM akun2");
        
        $objAkun2 = new ModelAkun2();
        $data['dtakun2'] = $objAkun2->ambilrelasi();
        return view('akun2/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('akun1');
        $query = $builder->get();
        $data['dtakun1'] = $query->getResult();
        return view('akun2/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $data = [
            'kode_akun2' => $this->request->getVar('kode_akun2'),
            'nama_akun2' => $this->request->getVar('nama_akun2'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
        ];
        $db->table('akun2')->insert($data);
        return redirect()->to(site_url('akun2'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('akun1');
        $query = $builder->get();

        $objAkun2 = new ModelAkun2();
        $akun2 = $objAkun2->find($id);
        if(is_object($akun2)){
            $data['dtakun2'] = $akun2;
            $data['dtakun1'] = $query->getResult();
            return view('akun2/edit', $data);
        }else{
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
        $db = \Config\Database::connect();
        $data = [
            'kode_akun2' => $this->request->getVar('kode_akun2'),
            'nama_akun2' => $this->request->getVar('nama_akun2'),
            'kode_akun1' => $this->request->getVar('kode_akun1'),
        ];
        $db->table('akun2')->where(['id_akun2' => $id])->update($data);
        return redirect()->to(site_url('akun2'))->with('success', 'Data berhasil di Update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $db->table('akun2')->where(['id_akun2' => $id])->delete();
        return redirect()->to(site_url('akun2'))->with('success', 'Data berhasil di hapus');
    }
}
