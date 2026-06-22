<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html>
<head>

<title>Resultado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Treino Sugerido</h3>

</div>

<div class="card-body">

<ul class="list-group">

<?php foreach($suggestions as $item): ?>

<li class="list-group-item">

<?= $item ?>

</li>

<?php endforeach; ?>

</ul>

</div>

</div>

</div>

</body>
</html>
<?php require_once '../app/views/layouts/footer.php'; ?>