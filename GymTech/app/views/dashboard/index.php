<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark shadow">

    <div class="container-fluid">

        <span class="navbar-brand">
            💪 GymTech Dashboard
        </span>

        <div>

            <a href="?controller=student&action=index"
               class="btn btn-outline-light btn-sm">

                Alunos

            </a>

            <a href="?controller=auth&action=logout"
               class="btn btn-danger btn-sm">

                Sair

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="row">

        <!-- TOTAL ALUNOS -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg">

                <div class="card-body">

                    <h5 class="text-muted">
                        Total de Alunos
                    </h5>

                    <h1>
                        <?= $totalStudents['total'] ?>
                    </h1>

                </div>

            </div>

        </div>

        <!-- FATURAMENTO -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg">

                <div class="card-body">

                    <h5 class="text-muted">
                        Faturamento Mensal
                    </h5>

                    <h1>

                        R$
                        <?= number_format($totalRevenue['revenue'], 2, ',', '.') ?>

                    </h1>

                </div>

            </div>

        </div>

        <!-- PLANOS -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg">

                <div class="card-body">

                    <h5 class="text-muted">
                        Planos Ativos
                    </h5>

                    <h1>
                        <?= count($studentsByPlan) ?>
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <!-- GRÁFICOS -->

    <div class="row mt-4">

        <!-- PIZZA -->

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h4 class="mb-4">
                        📊 Alunos por Plano
                    </h4>

                    <canvas id="planChart"></canvas>

                </div>

            </div>

        </div>

        <!-- BARRAS -->

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h4 class="mb-4">
                        📈 Distribuição
                    </h4>

                    <canvas id="barChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const labels = [

    <?php foreach($studentsByPlan as $plan): ?>

        '<?= $plan['name'] ?>',

    <?php endforeach; ?>

];

const data = [

    <?php foreach($studentsByPlan as $plan): ?>

        <?= $plan['total'] ?>,

    <?php endforeach; ?>

];


// GRÁFICO PIZZA

new Chart(document.getElementById('planChart'), {

    type: 'pie',

    data: {

        labels: labels,

        datasets: [{

            data: data

        }]
    }
});


// GRÁFICO BARRAS

new Chart(document.getElementById('barChart'), {

    type: 'bar',

    data: {

        labels: labels,

        datasets: [{

            label: 'Alunos',

            data: data

        }]
    }
});

</script>

</body>
</html>