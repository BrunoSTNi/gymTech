<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Exercícios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>💪 Exercícios</h2>

        <a href="?controller=exercise&action=create"
           class="btn btn-success">

            Novo Exercício

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Exercício</th>
                        <th>Grupo Muscular</th>
                        <th>Vídeo</th>
                        <th>Ações</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($exercises as $exercise): ?>

                    <tr>

                        <td><?= $exercise['id'] ?></td>

                        <td>
                            <?= $exercise['name'] ?>
                        </td>

                        <td>

                            <?php

                            $badge = "secondary";

                            switch($exercise['muscle_group']){

                                case 'Peito':
                                    $badge = "danger";
                                    break;

                                case 'Costas':
                                    $badge = "primary";
                                    break;

                                case 'Pernas':
                                    $badge = "success";
                                    break;

                                case 'Ombros':
                                    $badge = "warning";
                                    break;

                                case 'Bíceps':
                                    $badge = "info";
                                    break;

                                case 'Tríceps':
                                    $badge = "dark";
                                    break;
                            }

                            ?>

                            <span class="badge bg-<?= $badge ?>">

                                <?= $exercise['muscle_group'] ?>

                            </span>

                        </td>

                        <td>

                            <?php if(!empty($exercise['video_url'])): ?>

                                <a href="<?= $exercise['video_url'] ?>"
                                   target="_blank"
                                   class="btn btn-outline-primary btn-sm">

                                    Assistir

                                </a>

                            <?php else: ?>

                                <span class="text-muted">
                                    Sem vídeo
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="?controller=exercise&action=edit&id=<?= $exercise['id'] ?>"
                               class="btn btn-warning btn-sm">

                                Editar

                            </a>

                            <a href="?controller=exercise&action=delete&id=<?= $exercise['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Deseja excluir este exercício?')">

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
