<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Students<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Students</h1>

<!-- flash message -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif ?>

<!-- students table using bootstrap5 hoverable and has edit and delete button in the actions column -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Student Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        <?php foreach ($students as $student) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $student['name'] ?></td>
                <td><?= $student['grade'] ?></td>
                <td>
                    <a href="/students/detail/<?= $student['id'] ?>" class="btn btn-primary">Detail</a>
                    <a href="/students/edit/<?= $student['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/students/delete/<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- add student button -->
<a href="/students/create" class="btn btn-success">Add Student</a>
<?= $this->endSection() ?>