<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSchedule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'subject_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'teacher_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'day' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('subject_id', 'subjects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('teacher_id', 'teachers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('schedules');
    }

    public function down()
    {
        $this->forge->dropTable('schedules');
    }
}
