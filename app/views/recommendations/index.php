<div class="container mt-5">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-5 text-center">

            <h2 class="mb-3">
                🤖 IA de Treinos GymTech
            </h2>

            <p class="text-muted mb-5">
                Gere automaticamente um treino personalizado com base
                no seu objetivo e na quantidade de dias disponíveis
                para treino durante a semana.
            </p>

            <?php if(!$hasWorkout): ?>

                <a href="?controller=recommendation&action=generateAI"
                   class="btn btn-success btn-lg">

                    🤖 Gerar Meu Treino Agora

                </a>

            <?php else: ?>

                <div class="alert alert-success mt-4">
                    ✅ Você já possui treinos gerados.
                </div>

                <a href="?controller=myWorkout&action=index"
                   class="btn btn-primary">

                    🏋️ Ver meus treinos

                </a>

            <?php endif; ?>

        </div>

    </div>

</div>