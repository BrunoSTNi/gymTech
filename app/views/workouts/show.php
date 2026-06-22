<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Ficha de Treino</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            <h3>

                🏋️ <?= $workout['workout_name'] ?>

            </h3>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">

                    <strong>Aluno:</strong>

                    <?= $workout['student_name'] ?>

                </div>

                <div class="col-md-3">

                    <strong>Objetivo:</strong>

                    <?= $workout['objective'] ?>

                </div>

                <div class="col-md-3">

                    <strong>Dias:</strong>

                    <?= $workout['training_days'] ?>

                </div>

            </div>

            <table class="table table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>Exercício</th>

                        <th>Grupo</th>

                        <th>Séries</th>

                        <th>Repetições</th>

                        <th>Descanso</th>

                        <th>Ações</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($exercises as $exercise): ?>

                    <tr>

                        <td>

                            <?= $exercise['exercise_name'] ?>

                        </td>

                        <td>

                            <?= $exercise['muscle_group'] ?>

                        </td>

                        <td>

                            <?= $exercise['sets'] ?>

                        </td>

                        <td>

                            <?= $exercise['reps'] ?>

                        </td>

                        <td>

                            <?= $exercise['rest_time'] ?>

                        </td>

                        <td>

                            <a href="?controller=workoutExercise&action=delete&id=<?= $exercise['id'] ?>&workout_id=<?= $workout['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Deseja remover este exercício?')">

                            Excluir

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>
<?php require_once '../app/views/layouts/footer.php'; ?>