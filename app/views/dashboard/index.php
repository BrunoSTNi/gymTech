<div class="dashboard-header">

    <h2>
        Dashboard
    </h2>

    <span>
        Controle total da sua academia em tempo real
    </span>

</div>


<div class="row g-4 mt-2">


    <!-- Alunos -->

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


    <!-- Receita -->

    <div class="col-md-4">

        <div class="dashboard-card revenue">

            <div>

                <p>Faturamento Mensal</p>

                <h3>

                    R$ <?= number_format($totalRevenue['revenue'],2,',','.') ?>

                </h3>

            </div>

            <div class="icon">
                💰
            </div>

        </div>

    </div>


    <!-- Planos -->

    <div class="col-md-4">

        <div class="dashboard-card plans">

            <div>

                <p>Planos Ativos</p>

                <h3>
                    <?= count($studentsByPlan) ?>
                </h3>

            </div>

            <div class="icon">
                📋
            </div>

        </div>

    </div>

</div>


<div class="row mt-4">


    <div class="col-lg-6">

        <div class="glass-card p-4">

            <h5 class="mb-4">
                📊 Alunos por Plano
            </h5>

            <div class="chart-container">
                <canvas id="planChart"></canvas>
            </div>

        </div>

    </div>


    <div class="col-lg-6">

        <div class="glass-card p-4">

            <h5 class="mb-4">
                📈 Distribuição
            </h5>

            <canvas id="barChart"></canvas>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const labels = [
<?php foreach($studentsByPlan as $plan): ?>
    "<?= $plan['name'] ?>",
<?php endforeach; ?>
];


const data = [
<?php foreach($studentsByPlan as $plan): ?>
    <?= $plan['total'] ?>,
<?php endforeach; ?>
];


// Pizza

new Chart(document.getElementById('planChart'), {

    type: 'doughnut',

    data: {

        labels: labels,

        datasets: [{
            data: data,
            backgroundColor: [
                '#00c6ff',
                '#0072ff',
                '#06b6d4',
                '#0ea5e9',
                '#2563eb'
            ]
        }]
    }

});



// Barras

new Chart(document.getElementById('barChart'), {

    type: 'bar',

    data: {

        labels: labels,

        datasets: [{

            label: 'Alunos',

            data: data,

            backgroundColor:'#00c6ff',

            borderRadius: 10

        }]

    },

    options: {

        plugins: {

            legend: {

                display:false

            }

        }

    }

});

</script>