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
    
    <div class="glass-card p-4 mb-4">

    <form method="GET">

        <input type="hidden"
               name="controller"
               value="exercise">

        <input type="hidden"
               name="action"
               value="index">

        <div class="row">

            <div class="col-md-4">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Pesquisar exercício..."
                       value="<?= $_GET['search'] ?? '' ?>">

            </div>

            <div class="col-md-3">

                <select name="muscle_group"
                        class="form-select">

                    <option value="">
                        Todos os grupos
                    </option>

                    <option value="Peito">Peito</option>
                    <option value="Costas">Costas</option>
                    <option value="Pernas">Pernas</option>
                    <option value="Ombros">Ombros</option>
                    <option value="Bíceps">Bíceps</option>
                    <option value="Tríceps">Tríceps</option>

                </select>

            </div>

            <div class="col-md-3">

                <select name="difficulty"
                        class="form-select">

                    <option value="">
                        Qualquer nível
                    </option>

                    <option value="Iniciante">
                        Iniciante
                    </option>

                    <option value="Intermediário">
                        Intermediário
                    </option>

                    <option value="Avançado">
                        Avançado
                    </option>

                </select>

            </div>

            <div class="col-md-2">

                <button class="btn btn-gradient w-100">

                    Filtrar

                </button>

            </div>

        </div>

    </form>

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
                            <button
                                class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#exerciseModal<?= $exercise['id'] ?>">

                                Ver

                            </button>

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
                    <?php

                    $youtubeId = '';

                    if(!empty($exercise['video_url'])){

                        preg_match(
                            '/(?:v=|youtu\.be\/)([^&]+)/',
                            $exercise['video_url'],
                            $matches
                        );

                        $youtubeId = $matches[1] ?? '';
                    }

                    ?>

                    <div class="modal fade"
                        id="exerciseModal<?= $exercise['id'] ?>"
                        tabindex="-1">

                        <div class="modal-dialog modal-xl modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <div>

                                        <h3 class="mb-1">
                                            <?= $exercise['name'] ?>
                                        </h3>

                                        <small>
                                            Exercício cadastrado no GymTech
                                        </small>

                                    </div>

                                    <button
                                        type="button"
                                        class="btn-close btn-close-white"
                                        data-bs-dismiss="modal">
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <div class="exercise-tags">

                                        <span class="badge bg-danger">
                                            <?= $exercise['muscle_group'] ?>
                                        </span>

                                        <span class="badge bg-warning text-dark">
                                            <?= $exercise['difficulty'] ?>
                                        </span>

                                        <span class="badge bg-success">
                                            <?= $exercise['objective'] ?>
                                        </span>

                                    </div>

                                    <div class="exercise-info-card">

                                        <div class="info-item">

                                            <span>🏋 Equipamento</span>

                                            <strong>
                                                <?= $exercise['equipment'] ?>
                                            </strong>

                                        </div>

                                        <div class="info-item">

                                            <span>🎯 Objetivo</span>

                                            <strong>
                                                <?= $exercise['objective'] ?>
                                            </strong>

                                        </div>

                                        <div class="info-item">

                                            <span>📈 Dificuldade</span>

                                            <strong>
                                                <?= $exercise['difficulty'] ?>
                                            </strong>

                                        </div>

                                    </div>

                                    <div class="exercise-description">

                                        <h5 class="mb-3">
                                            Como executar
                                        </h5>

                                        <p>
                                            <?= nl2br($exercise['description']) ?>
                                        </p>

                                    </div>

                                    <?php if($youtubeId): ?>

                                        <div class="mt-4">

                                            <h5 class="mb-3">

                                                Vídeo Demonstrativo

                                            </h5>

                                            <div class="video-container">

                                                <iframe
                                                    src="https://www.youtube.com/embed/<?= $youtubeId ?>"
                                                    allowfullscreen>
                                                </iframe>

                                            </div>

                                        </div>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>