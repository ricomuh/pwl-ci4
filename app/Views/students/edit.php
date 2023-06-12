<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Edit Student<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Edit Student</h1>

<!-- errors message -->
<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Whoops!</h4>
        <hr>
        <p class="mb-0">There is something wrong:</p>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<!-- form to edit student -->
<form action="/students/update/<?= $student['id'] ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= (old('name')) ? old('name') : $student['name'] ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('name') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="grade" class="form-label">Grade</label>
        <input type="text" class="form-control <?= ($validation->hasError('grade')) ? 'is-invalid' : '' ?>" id="grade" name="grade" value="<?= (old('grade')) ? old('grade') : $student['grade'] ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('grade') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit Student</button>
</form>
<?= $this->endSection() ?>