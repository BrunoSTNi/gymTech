<div class="page-header">

    <div>

        <h2>
            Novo Aluno
        </h2>

        <span>
            Cadastre um novo aluno no GymTech
        </span>

    </div>

    <a href="?controller=student&action=index"
       class="btn btn-outline-secondary">

        Voltar

    </a>

</div>


<div class="row justify-content-center mt-4">

    <div class="col-lg-8">

        <div class="glass-card p-5">

            <form method="POST"
      action="?controller=student&action=store">

    <!-- ================= DADOS PESSOAIS ================= -->

    <h5 class="mb-4 fw-bold text-primary">
        👤 Dados Pessoais
    </h5>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Nome completo
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Digite o nome do aluno"
                   required>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">
                E-mail
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="exemplo@email.com"
                   required>

        </div>

    </div>


    <div class="row">

        <div class="col-md-4 mb-4">

            <label class="form-label">
                Idade
            </label>

            <input type="number"
                   name="age"
                   class="form-control"
                   min="10"
                   max="100">

        </div>

        <div class="col-md-4 mb-4">

            <label class="form-label">
                Plano
            </label>

            <select name="plan_id"
                    class="form-select">

                <?php foreach($plans as $plan): ?>

                    <option value="<?= $plan['id'] ?>">

                        <?= $plan['name'] ?>

                        - R$
                        <?= number_format($plan['price'],2,',','.') ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>


    <hr class="my-5">


    <!-- ================= IA ================= -->

    <h5 class="mb-4 fw-bold text-success">

        🤖 Informações para IA

    </h5>


    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Objetivo

            </label>

            <select
                name="objective"
                class="form-select"
                required>

                <option value="Hipertrofia">
                    💪 Hipertrofia
                </option>

                <option value="Emagrecimento">
                    🔥 Emagrecimento
                </option>

                <option value="Força">
                    🏋️ Força
                </option>

                <option value="Resistência">
                    ❤️ Resistência
                </option>

                <option value="Condicionamento">
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
                class="form-select"
                required>

                <?php for($i=1;$i<=6;$i++): ?>

                    <option value="<?= $i ?>">

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
                class="form-select"
                required>

                <option value="Iniciante">

                    🟢 Iniciante

                </option>

                <option value="Intermediário">

                    🟡 Intermediário

                </option>

                <option value="Avançado">

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
                class="form-control"
                rows="3"
                placeholder="Ex.: Hérnia de disco, dores no joelho, lesão no ombro..."></textarea>

        </div>

    </div>


    <div class="form-actions mt-4">

        <a href="?controller=student&action=index"
           class="btn btn-outline-dark">

            Cancelar

        </a>

        <button
            type="submit"
            class="btn btn-gradient">

            💾 Salvar Aluno

        </button>

    </div>

</form>

        </div>

    </div>

</div>