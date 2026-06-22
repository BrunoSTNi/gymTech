<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Exercício</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .card-header{
            background:#212529;
            color:white;
            border-radius:15px 15px 0 0 !important;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header py-3">
                    <h3 class="mb-0">
                        💪 Cadastrar Exercício
                    </h3>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="?controller=exercise&action=store">

                        <!-- Nome -->

                        <div class="mb-3">

                            <label class="form-label">
                                Nome do Exercício
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Ex: Supino Reto"
                                   required>

                        </div>

                        <!-- Grupo Muscular -->

                        <div class="mb-3">

                            <label class="form-label">
                                Grupo Muscular
                            </label>

                            <select name="muscle_group"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Selecione...
                                </option>

                                <option value="Peito">Peito</option>

                                <option value="Costas">Costas</option>

                                <option value="Ombros">Ombros</option>

                                <option value="Bíceps">Bíceps</option>

                                <option value="Tríceps">Tríceps</option>

                                <option value="Pernas">Pernas</option>

                                <option value="Panturrilha">Panturrilha</option>

                                <option value="Abdômen">Abdômen</option>

                                <option value="Cardio">Cardio</option>

                            </select>

                        </div>

                        <!-- Vídeo -->

                        <div class="mb-3">

                            <label class="form-label">
                                Link do Vídeo
                            </label>

                            <input type="url"
                                   name="video_url"
                                   class="form-control"
                                   placeholder="https://youtube.com/...">

                        </div>

                        <!-- Descrição -->

                        <div class="mb-4">

                            <label class="form-label">
                                Descrição / Execução
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Descreva como executar corretamente o exercício..."></textarea>

                        </div>

                        <!-- Botões -->

                        <div class="d-flex justify-content-between">

                            <a href="?controller=exercise&action=index"
                               class="btn btn-secondary">

                                Voltar

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                                Salvar Exercício

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php require_once '../app/views/layouts/footer.php'; ?>