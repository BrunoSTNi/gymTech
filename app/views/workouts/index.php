<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Treinos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>
            🏋️ Treinos
        </h2>

        <a href="?controller=workout&action=create"
           class="btn btn-dark">

            Novo Treino

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Aluno</th>

                        <th>Treino</th>

                        <th>Objetivo</th>

                        <th>Dias</th>

                        <th>Ações</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($workouts as $workout): ?>

                        <tr>

                            <td><?= $workout['id'] ?></td>

                            <td><?= $workout['student_name'] ?></td>

                            <td><?= $workout['workout_name'] ?></td>

                            <td><?= $workout['objective'] ?></td>

                            <td><?= $workout['training_days'] ?></td>

                            <td>

                                <a href="?controller=workout&action=show&id=<?= $workout['id'] ?>"
                                class="btn btn-info btn-sm">

                                    Ver Treino

                                </a>

                                <a href="?controller=workoutExercise&action=create&workout_id=<?= $workout['id'] ?>"
                                class="btn btn-success btn-sm">

                                    Exercícios

                                </a>

                                <a href="?controller=workout&action=edit&id=<?= $workout['id'] ?>"
                                class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <a href="?controller=workout&action=delete&id=<?= $workout['id'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja excluir?')">

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
