<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Aluno</title>

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
                        ✏️ Editar Aluno
                    </h2>

                    <form method="POST"
                          action="?controller=student&action=update&id=<?= $student['id'] ?>">

                        <!-- NOME -->

                        <div class="mb-3">

                            <label>Nome</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="<?= $student['name'] ?>"
                                   required>

                        </div>

                        <!-- EMAIL -->

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="<?= $student['email'] ?>"
                                   required>

                        </div>

                        <!-- IDADE -->

                        <div class="mb-3">

                            <label>Idade</label>

                            <input type="number"
                                   name="age"
                                   class="form-control"
                                   value="<?= $student['age'] ?>">

                        </div>

                        <!-- OBJETIVO -->

                        <div class="mb-3">

                            <label>Objetivo</label>

                            <select name="objective"
                                    class="form-select">

                                <option value="Hipertrofia"
                                    <?= $student['objective'] == 'Hipertrofia' ? 'selected' : '' ?>>

                                    Hipertrofia

                                </option>

                                <option value="Emagrecimento"
                                    <?= $student['objective'] == 'Emagrecimento' ? 'selected' : '' ?>>

                                    Emagrecimento

                                </option>

                                <option value="Força"
                                    <?= $student['objective'] == 'Força' ? 'selected' : '' ?>>

                                    Força

                                </option>

                            </select>

                        </div>

                        <!-- PLANOS -->

                        <div class="mb-4">

                            <label>Plano</label>

                            <select name="plan_id"
                                    class="form-select">

                                <?php foreach($plans as $plan): ?>

                                    <option value="<?= $plan['id'] ?>"

                                        <?= $student['plan_id'] == $plan['id'] ? 'selected' : '' ?>>

                                        <?= $plan['name'] ?>
                                        -
                                        R$ <?= $plan['price'] ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <button class="btn btn-dark w-100">

                            Atualizar Aluno

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