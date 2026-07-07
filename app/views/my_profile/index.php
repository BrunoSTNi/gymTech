<div class="container">

    <div class="card student-card">

        <div class="card-body">

            <div class="text-center">

                <div class="profile-avatar">

                    <?= strtoupper(substr($profile['name'],0,1)) ?>

                </div>

                <h2 class="mt-4">

                    <?= $profile['name'] ?>

                </h2>

                <p class="text-muted">

                    <?= $profile['objective'] ?>

                </p>

            </div>

            <div class="profile-info">

                <p>
                    <strong>Email:</strong>
                    <?= $profile['email'] ?>
                </p>

                <p>
                    <strong>Idade:</strong>
                    <?= $profile['age'] ?> anos
                </p>

                <p>
                    <strong>Objetivo:</strong>
                    <?= $profile['objective'] ?>
                </p>

            </div>

        </div>

    </div>

</div>