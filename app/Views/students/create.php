<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Create Student<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Add Student</h1>

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

<!-- form to add student -->
<form action="/students/save" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('name') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="grade" class="form-label">Grade</label>
        <input type="text" class="form-control <?= ($validation->hasError('grade')) ? 'is-invalid' : '' ?>" id="grade" name="grade" value="<?= old('grade') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('grade') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Student</button>
</form>
<?= $this->endSection() ?>