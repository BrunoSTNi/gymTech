<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                🏋️ <?= $workout['workout_name'] ?>
            </h2>

            <p class="text-muted">
                Objetivo:
                <?= $workout['objective'] ?>
            </p>

        </div>

        <div>

            <a href="?controller=myWorkout&action=index"
               class="btn btn-secondary">

                ← Voltar

            </a>

        </div>

    </div>


    <?php foreach($exercises as $exercise): ?>

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-9">

                        <h4 class="fw-bold">

                            💪 <?= $exercise['name'] ?>

                        </h4>

                        <p class="text-muted mb-2">

                            <?= $exercise['description'] ?>

                        </p>

                        <span class="badge bg-primary">

                            <?= $exercise['muscle_group'] ?>

                        </span>

                        <span class="badge bg-success">

                            <?= $exercise['difficulty'] ?>

                        </span>

                    </div>

                    <div class="col-md-3 text-end">

                        <div class="mb-2">

                            <span class="badge bg-dark">

                                <?= $exercise['sets'] ?> Séries

                            </span>

                        </div>

                        <div class="mb-2">

                            <span class="badge bg-info text-dark">

                                <?= $exercise['reps'] ?> Reps

                            </span>

                        </div>

                        <div class="mb-3">

                            <span class="badge bg-warning text-dark">

                                <?= $exercise['rest_time'] ?>s Descanso

                            </span>

                        </div>

                    </div>

                </div>

                <hr>

                <?php if(!empty($exercise['video_url'])): ?>

                    <a
                        href="<?= $exercise['video_url'] ?>"
                        target="_blank"
                        class="btn btn-outline-danger">

                        ▶ Assistir execução

                    </a>

                <?php endif; ?>

            </div>

        </div>

    <?php endforeach; ?>


    <div class="text-center mt-5">

        <a
            href="?controller=myWorkout&action=index"
            class="btn btn-lg btn-primary">

            ← Voltar aos Treinos

        </a>

    </div>

</div>