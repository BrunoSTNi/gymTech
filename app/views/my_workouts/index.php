<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold mb-1">
                🏋️ Meus Treinos
            </h2>

            <p class="text-muted mb-0">
                Acompanhe seus treinos e sua evolução.
            </p>

        </div>

        <?php if(empty($workouts)): ?>

            <a href="?controller=recommendation&action=generateAI"
               class="btn btn-success btn-lg shadow">

                🤖 Gerar treino com IA

            </a>

        <?php endif; ?>

    </div>


    <?php if(empty($workouts)): ?>

        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-body text-center py-5">

                <div style="font-size:80px;">
                    🏋️
                </div>

                <h3 class="mt-3">
                    Nenhum treino encontrado
                </h3>

                <p class="text-muted mb-4">
                    Gere automaticamente um treino personalizado com IA.
                </p>

                <a href="?controller=recommendation&action=generateAI"
                   class="btn btn-success btn-lg">

                    🤖 Gerar treino automaticamente

                </a>

            </div>

        </div>

    <?php endif; ?>


    <div class="row">

        <?php foreach($workouts as $workout): ?>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card workout-card h-100 border-0 shadow">

                    <div class="card-header workout-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <h4 class="mb-0">

                                <?= $workout['workout_name'] ?>

                            </h4>

                            <span class="badge bg-light text-dark">

                                <?= $workout['training_days'] ?> dias

                            </span>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <span class="text-muted">
                                🎯 Objetivo
                            </span>

                            <h5 class="mt-2">

                                <?= $workout['objective'] ?>

                            </h5>

                        </div>

                        <div class="mb-4">

                            <span class="text-muted">
                                📅 Frequência semanal
                            </span>

                            <div class="fw-bold">

                                <?= $workout['training_days'] ?>
                                dias por semana

                            </div>

                        </div>

                        <a href="?controller=myWorkout&action=show&id=<?= $workout['id'] ?>"
                           class="btn btn-primary w-100">

                            👀 Ver treino completo

                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>