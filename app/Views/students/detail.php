<?= $this->extend('layout') ?>

<?= $this->section('title') ?>The detail of <?= $student['name'] ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Student Detail</h1>

<!-- student detail -->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $student['name'] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">grade: <?= $student['grade'] ?></h6>
        <p class="card-text">Student ID: <?= $student['id'] ?></p>
        <a href="/students" class="card-link">Back</a>
        <a href="/students/edit/<?= $student['id'] ?>" class="card-link">Edit</a>
        <a href="/students/delete/<?= $student['id'] ?>" class="card-link" onclick="return confirm('Are you sure?')">Delete</a>
    </div>
</div>
<?= $this->endSection() ?>