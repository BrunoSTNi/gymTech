<div class="container-fluid">

    <h2 class="mb-5">
        👋 Olá, <?= $dashboard['name'] ?>
    </h2>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card student-card">
                <div class="card-body text-center">

                    <div class="student-icon">
                        💳
                    </div>

                    <div class="student-value">
                        <?= $dashboard['plan_name'] ?>
                    </div>

                    <div class="student-title">
                        Plano Atual
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card student-card">

                <div class="card-body text-center">

                    <div class="student-icon">
                        🏋️
                    </div>

                    <div class="student-value">
                        <?= $dashboard['total_workouts'] ?>
                    </div>

                    <div class="student-title">
                        Treinos Ativos
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card student-card gradient-card">

                <div class="card-body text-center">

                    <div class="student-icon">
                        🎯
                    </div>

                    <div class="student-value">
                        <?= $dashboard['objective'] ?>
                    </div>

                    <div class="student-title">
                        Objetivo
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-3">

        <div class="col-md-4 mb-4">

            <a class="quick-link"
               href="?controller=myWorkout&action=index">

                <div class="card student-card">

                    <div class="card-body">

                        <div class="student-icon">
                            🏋️
                        </div>

                        <h5>Meus Treinos</h5>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-4 mb-4">

            <a class="quick-link"
               href="?controller=myPlan&action=index">

                <div class="card student-card">

                    <div class="card-body">

                        <div class="student-icon">
                            💳
                        </div>

                        <h5>Meu Plano</h5>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-4 mb-4">

            <a class="quick-link"
               href="?controller=myProfile&action=index">

                <div class="card student-card">

                    <div class="card-body">

                        <div class="student-icon">
                            👤
                        </div>

                        <h5>Meu Perfil</h5>

                    </div>

                </div>

            </a>

        </div>

    </div>

</div>