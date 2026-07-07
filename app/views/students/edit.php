<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="mb-4">
                        ✏️ Editar Aluno
                    </h2>

   <form method="POST"
      action="?controller=student&action=update&id=<?= $student['id'] ?>">

    <!-- ================= DADOS PESSOAIS ================= -->

    <h5 class="mb-4 fw-bold text-primary">
        👤 Dados Pessoais
    </h5>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Nome completo
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="<?= $student['name'] ?>"
                required>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">
                E-mail
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="<?= $student['email'] ?>"
                required>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <label class="form-label">
                Idade
            </label>

            <input
                type="number"
                name="age"
                class="form-control"
                min="10"
                max="100"
                value="<?= $student['age'] ?>">

        </div>

        <div class="col-md-8 mb-4">

            <label class="form-label">
                Plano
            </label>

            <select
                name="plan_id"
                class="form-select">

                <?php foreach($plans as $plan): ?>

                    <option
                        value="<?= $plan['id'] ?>"
                        <?= $student['plan_id']==$plan['id']?'selected':'' ?>>

                        <?= $plan['name'] ?>
                        -
                        R$
                        <?= number_format($plan['price'],2,',','.') ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>

    <hr class="my-4">

    <!-- ================= IA ================= -->

    <h5 class="mb-4 fw-bold text-success">

        🤖 Configuração da IA

    </h5>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Objetivo

            </label>

            <select
                name="objective"
                class="form-select">

                <option value="Hipertrofia"
                    <?= $student['objective']=='Hipertrofia'?'selected':'' ?>>

                    💪 Hipertrofia

                </option>

                <option value="Emagrecimento"
                    <?= $student['objective']=='Emagrecimento'?'selected':'' ?>>

                    🔥 Emagrecimento

                </option>

                <option value="Força"
                    <?= $student['objective']=='Força'?'selected':'' ?>>

                    🏋️ Força

                </option>

                <option value="Resistência"
                    <?= $student['objective']=='Resistência'?'selected':'' ?>>

                    ❤️ Resistência

                </option>

                <option value="Condicionamento"
                    <?= $student['objective']=='Condicionamento'?'selected':'' ?>>

                    ⚡ Condicionamento

                </option>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Dias de treino

            </label>

            <select
                name="training_days"
                class="form-select">

                <?php for($i=1;$i<=6;$i++): ?>

                    <option
                        value="<?= $i ?>"
                        <?= $student['training_days']==$i?'selected':'' ?>>

                        <?= $i ?>

                        dia<?= $i>1?'s':'' ?> por semana

                    </option>

                <?php endfor; ?>

            </select>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Nível de experiência

            </label>

            <select
                name="experience_level"
                class="form-select">

                <option value="Iniciante"
                    <?= $student['experience_level']=='Iniciante'?'selected':'' ?>>

                    🟢 Iniciante

                </option>

                <option value="Intermediário"
                    <?= $student['experience_level']=='Intermediário'?'selected':'' ?>>

                    🟡 Intermediário

                </option>

                <option value="Avançado"
                    <?= $student['experience_level']=='Avançado'?'selected':'' ?>>

                    🔴 Avançado

                </option>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Limitações físicas

            </label>

            <textarea
                name="limitations"
                rows="4"
                class="form-control"
                placeholder="Descreva lesões, dores ou restrições físicas..."><?= htmlspecialchars($student['limitations'] ?? '') ?></textarea>

        </div>

    </div>

    <div class="d-flex justify-content-between mt-5">

        <a href="?controller=student&action=index"
           class="btn btn-outline-secondary">

            ← Voltar

        </a>

        <button
            type="submit"
            class="btn btn-success">

            💾 Atualizar Aluno

        </button>

    </div>

</form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php require_once '../app/views/layouts/footer.php'; ?>