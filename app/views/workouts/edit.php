<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Treino</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="mb-4">
                        ✏️ Editar Treino
                    </h2>

                    <form method="POST"
                          action="?controller=workout&action=update&id=<?= $workout['id'] ?>">

                        <div class="mb-3">

                            <label>Aluno</label>

                            <select name="student_id"
                                    class="form-select">

                                <?php foreach($students as $student): ?>

                                    <option
                                        value="<?= $student['id'] ?>"
                                        <?= $student['id'] == $workout['student_id'] ? 'selected' : '' ?>>

                                        <?= $student['name'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label>Nome do Treino</label>

                            <input type="text"
                                   name="workout_name"
                                   class="form-control"
                                   value="<?= $workout['workout_name'] ?>"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Objetivo</label>

                            <select name="objective"
                                    class="form-select">

                                <option value="Hipertrofia"
                                    <?= $workout['objective'] == 'Hipertrofia' ? 'selected' : '' ?>>
                                    Hipertrofia
                                </option>

                                <option value="Emagrecimento"
                                    <?= $workout['objective'] == 'Emagrecimento' ? 'selected' : '' ?>>
                                    Emagrecimento
                                </option>

                                <option value="Força"
                                    <?= $workout['objective'] == 'Força' ? 'selected' : '' ?>>
                                    Força
                                </option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label>Dias de Treino por Semana</label>

                            <input type="number"
                                   name="training_days"
                                   class="form-control"                                   
                                   value="<?= $workout['training_days'] ?>"
                                   min="1"
                                   max="7"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-success w-100">

                            Atualizar Treino

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php require_once '../app/views/layouts/footer.php'; ?>