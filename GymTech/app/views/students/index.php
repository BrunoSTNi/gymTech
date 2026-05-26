<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Alunos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">

        <span class="navbar-brand">
            💪 Gym System
        </span>

        <div>

            <a href="?controller=dashboard&action=index"
               class="btn btn-outline-light btn-sm">
                Dashboard
            </a>

            <a href="?controller=auth&action=logout"
               class="btn btn-danger btn-sm">
                Sair
            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            👥 Alunos
        </h2>

        <a href="?controller=student&action=create"
           class="btn btn-primary">

            Novo Aluno

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Idade</th>
                        <th>Objetivo</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>

                </thead>

                <tbody>

                <?php foreach($students as $student): ?>

                    <tr>

                        <td>
                            <?= $student['id'] ?>
                        </td>

                        <td>
                            <?= $student['name'] ?>
                        </td>

                        <td>
                            <?= $student['email'] ?>
                        </td>

                        <td>
                            <?= $student['age'] ?>
                        </td>

                        <td>
                            <?= $student['objective'] ?>
                        </td>

                        <td>
                            <?= $student['plan_name'] ?>
                        </td>

                        <td>
                            <a href="?controller=student&action=edit&id=<?= $student['id'] ?>"
                                class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            <a href="?controller=student&action=delete&id=<?= $student['id'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja realmente excluir?')">
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