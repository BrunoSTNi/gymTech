<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <title>Adicionar Exercício</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                💪 Adicionar Exercício ao Treino

            </h3>

        </div>

        <div class="card-body">

            <form method="POST"
                  action="?controller=workoutExercise&action=store">

                <input type="hidden"
                       name="workout_id"
                       value="<?= $workout_id ?>">

                <div class="mb-3">

                    <label>Exercício</label>

                    <select name="exercise_id"
                            class="form-select">

                        <?php foreach($exercises as $exercise): ?>

                            <option value="<?= $exercise['id'] ?>">

                                <?= $exercise['name'] ?>

                                -

                                <?= $exercise['muscle_group'] ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Séries</label>

                    <input type="number"
                           name="sets"
                           class="form-control"
                           min="1"
                           max="10">

                </div>

                <div class="mb-3">

                    <label>Repetições</label>

                    <input type="text"
                           name="reps"
                           class="form-control"
                           placeholder="10-12">

                </div>

                <div class="mb-3">

                    <label>Descanso</label>

                    <input type="text"
                           name="rest_time"
                           class="form-control"
                           placeholder="60 segundos">

                </div>

                <div class="mb-4">

                    <label>Observações</label>

                    <textarea name="notes"
                              class="form-control"></textarea>

                </div>

                <button class="btn btn-success">

                    Salvar

                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>
<?php require_once '../app/views/layouts/footer.php'; ?>