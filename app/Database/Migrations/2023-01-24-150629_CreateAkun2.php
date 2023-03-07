<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkun2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun2'      => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_akun2'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 6,
            ],
            'nama_akun2'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 40,
            ],
            'kode_akun1'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 6,
            ],
        ]);
        $this->forge->addKey('id_akun2', true);
        $this->forge->addForeignKey('kode_akun1', 'akun1', 'id_akun1');
        $this->forge->createTable('akun2');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun2', 'akun2_kode_akun1_foreign');
        $this->forge->dropTable('akun2');
    }
}
