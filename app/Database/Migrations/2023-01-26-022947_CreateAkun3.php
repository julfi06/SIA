<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkun3 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun3'      => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_akun3'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 6,
            ],
            'nama_akun3'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],
            'kode_akun2'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 6,
            ],
            'kode_akun1'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 6,
            ],
        ]);
        $this->forge->addKey('id_akun3', true);
        $this->forge->addForeignKey('kode_akun1', 'akun1', 'id_akun1');
        $this->forge->createTable('akun3');
    }

    public function down()
    {
        $this->forge->dropForeignKey('akun3', 'akun3_kode_akun1_foreign');
        $this->forge->dropTable('akun3');
    }
}
