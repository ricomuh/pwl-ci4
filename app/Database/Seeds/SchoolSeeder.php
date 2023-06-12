<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        $teachers = [
            [
                'name' => 'John Doe',
                'address' => '123 Main St',
            ],
            [
                'name' => 'Jane Doe',
                'address' => '123 Main St',
            ],
        ];

        $this->db->table('teachers')->insertBatch($teachers);

        $students = [
            [
                'name' => 'John Doe',
                'grade' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'grade' => 2,
            ],
        ];

        $this->db->table('students')->insertBatch($students);

        $subjects = [
            [
                'name' => 'Math',
                'teacher_id' => 1,
            ],
            [
                'name' => 'Science',
                'teacher_id' => 2,
            ],
        ];

        $this->db->table('subjects')->insertBatch($subjects);

        $schedules = [
            [
                'subject_id' => 1,
                'teacher_id' => 1,
                'student_id' => 1,
                'day' => 1,
            ],
            [
                'subject_id' => 2,
                'teacher_id' => 2,
                'student_id' => 2,
                'day' => 2,
            ],
        ];

        $this->db->table('schedules')->insertBatch($schedules);
    }
}
