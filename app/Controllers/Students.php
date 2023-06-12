<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Students extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new \App\Models\StudentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Students',
            'students' => $this->studentModel->getStudent()
        ];

        return view('students/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Student Detail',
            'student' => $this->studentModel->getStudent($id)
        ];

        return view('students/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Student',
            'validation' => \Config\Services::validation(),
            'student' => $this->studentModel->getStudent($id)
        ];

        return view('students/edit', $data);
    }

    public function update($id)
    {
        // validation
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[students.name,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} student must be filled.',
                    'is_unique' => '{field} student already exists.'
                ]
            ],
            'grade' => [
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => '{field} student must be filled.',
                    'numeric' => '{field} student must be filled with numbers.',
                    'max_length' => '{field} student must be filled with 2 numbers maximum.'
                ]
            ]
        ])) {
            return redirect()->to('/students/edit/' . $this->request->getVar('id'))->withInput();
        }

        $this->studentModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'grade' => $this->request->getVar('grade')
        ]);

        session()->setFlashdata('message', 'Student has been updated.');

        return redirect()->to('/students');
    }

    public function create()
    {
        $data = [
            'title' => 'Add Student',
            'validation' => \Config\Services::validation()
        ];

        return view('students/create', $data);
    }

    public function save()
    {
        // validation
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[students.name]',
                'errors' => [
                    'required' => '{field} student must be filled.',
                    'is_unique' => '{field} student already exists.'
                ]
            ],
            'grade' => [
                'rules' => 'required|numeric|max_length[2]',
                'errors' => [
                    'required' => '{field} student must be filled.',
                    'numeric' => '{field} student must be filled with numbers.',
                    'max_length' => '{field} student must be filled with 2 numbers maximum.'
                ]
            ]
        ])) {
            // return redirect()->to('/students/create')->withInput()->with('validation', $this->validator);
            // redirect to the previous page with the input data and validation errors
            return redirect()->to('/students/create')->withInput();
        }

        $this->studentModel->save([
            'name' => $this->request->getVar('name'),
            'grade' => $this->request->getVar('grade')
        ]);

        session()->setFlashdata('message', 'New student has been added.');

        return redirect()->to('/students');
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
        session()->setFlashdata('message', 'Student has been deleted.');
        return redirect()->to('/students');
    }
}
