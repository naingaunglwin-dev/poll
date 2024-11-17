<?php

namespace App\Database\Migrations;

use App\Config\Table;
use CodeIgniter\Database\Migration;

class CreateVoteTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'token' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'expired_at' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable(Table::VOTE, false, ['ENGINE' => Table::ENGINE]);
    }

    public function down()
    {
        $this->forge->dropTable(Table::VOTE, true);
    }
}
