<?php

namespace App\Controllers;

class Akun1 extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('akun1');
        $query = $builder->get();

        $query = $db->query("SELECT * FROM akun1");
        $data['dtakun1'] = $query->getResult();
        return view('akun1/index', $data);
        // dd($query->getResult());
        // dd($query);
        
    }

    public function new()
    {
        return view('akun1/new');
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $data = [
            'kode_akun1' => $this->request->getVar('kode_akun1'),
            'nama_akun1' => $this->request->getVar('nama_akun1'),
        ];
        $db->table('akun1')->insert($data);
        return redirect()->to(site_url('akun1'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id = null)
    {
        $db = \Config\Database::connect();
        if($id != null){
            $query = $db->table('akun1')->getWhere(['id_akun1' => $id]);
            if($query->resultID->num_rows > 0){
                $data['dtakun1'] = $query->getRow();
                return view('akun1/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $db = \Config\Database::connect();
        $data = [
            'kode_akun1' => $this->request->getVar('kode_akun1'),
            'nama_akun1' => $this->request->getVar('nama_akun1'),
        ];
        $db->table('akun1')->where(['id_akun1' => $id])->update($data);
        return redirect()->to(site_url('akun1'))->with('success', 'Data berhasil di Update');
    }

    public function destroy($id)
    {
        $db = \Config\Database::connect();
        $db->table('akun1')->where(['id_akun1' => $id])->delete();
        return redirect()->to(site_url('akun1'))->with('success', 'Data berhasil di hapus');
    }
}
