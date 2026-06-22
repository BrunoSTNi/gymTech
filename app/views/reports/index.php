<div class="page-header">

    <div>

        <h2>
            Relatórios
        </h2>

        <span>
            Indicadores e métricas da academia
        </span>

    </div>

</div>


<div class="row g-4 mt-2">

    <div class="col-md-4">

        <div class="dashboard-card students">

            <div>

                <p>Total de Alunos</p>

                <h3>

                    <?= $totalStudents['total'] ?>

                </h3>

            </div>

            <div class="icon">
                👥
            </div>

        </div>

    </div>

</div>


<div class="glass-card p-4 mt-4">

    <h4 class="mb-4">

        Planos Disponíveis

    </h4>

    <table class="table modern-table">

        <thead>

            <tr>

                <th>Plano</th>
                <th>Valor</th>
                <th>Duração</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($plans as $plan): ?>

                <tr>

                    <td>
                        <?= $plan['name'] ?>
                    </td>

                    <td>
                        R$ <?= number_format($plan['price'],2,',','.') ?>
                    </td>

                    <td>
                        <?= $plan['duration'] ?> dias
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>