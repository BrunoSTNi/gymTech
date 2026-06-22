<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Novo Treino</title>

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
                        🏋️ Novo Treino
                    </h2>

                    <form method="POST"
                          action="?controller=workout&action=store">

                        <!-- ALUNO -->

                        <div class="mb-3">

                            <label>Aluno</label>

                            <select name="student_id"
                                    class="form-select">

                                <?php foreach($students as $student): ?>

                                    <option value="<?= $student['id'] ?>">

                                        <?= $student['name'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- TREINO -->

                        <div class="mb-3">

                            <label>Nome do treino</label>

                            <input type="text"
                                   name="workout_name"
                                   class="form-control"
                                   placeholder="Treino A">

                        </div>

                        <!-- OBJETIVO -->

                        <div class="mb-3">

                            <label>Objetivo</label>

                            <select name="objective"
                                    class="form-select">

                                <option>Hipertrofia</option>

                                <option>Emagrecimento</option>

                                <option>Força</option>

                            </select>

                        </div>

                        <!-- DIAS -->

                        <div class="mb-4">

                            <label>Dias de treino</label>

                            <select name="training_days" class="form-select">
                                <option value="1">1 dia</option>
                                <option value="2">2 dias</option>
                                <option value="3">3 dias</option>
                                <option value="4">4 dias</option>
                                <option value="5">5 dias</option>
                                <option value="6">6 dias</option>
                                <option value="7">7 dias</option>
                            </select>

                        </div>

                        <button class="btn btn-dark w-100">

                            Salvar Treino

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