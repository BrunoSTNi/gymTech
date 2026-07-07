<div class="container">

    <div class="card student-card gradient-card">

        <div class="card-body text-center">

            <h2 class="mb-4">
                <?= $plan['name'] ?>
            </h2>

            <div class="plan-price mb-4">

                R$ <?= number_format(
                    $plan['price'],
                    2,
                    ',',
                    '.'
                ) ?>

            </div>

            <div class="plan-feature">

                📅 Duração:
                <?= $plan['duration'] ?> dias

            </div>

            <div class="plan-feature">

                📝 <?= $plan['description'] ?>

            </div>

        </div>

    </div>

</div>