<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html>
<head>

<title>Gerador de Treino</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white">

<h3>🤖 Gerador Automático de Treino</h3>

</div>

<div class="card-body">

<form method="POST"
action="?controller=recommendation&action=generate">

<div class="mb-3">

<label>Objetivo</label>

<select name="objective"
class="form-select">

<option>Hipertrofia</option>
<option>Emagrecimento</option>
<option>Força</option>

</select>

</div>

<div class="mb-3">

<label>Dias por semana</label>

<select name="days"
class="form-select">

<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>

</select>

</div>

<button class="btn btn-success">

Gerar Treino

</button>

</form>

</div>

</div>

</div>

</body>
</html>
