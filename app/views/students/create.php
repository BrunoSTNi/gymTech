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


                <div class="row">

                    <!-- Nome -->

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


                    <!-- Email -->

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

                    <!-- Idade -->

                    <div class="col-md-4 mb-4">

                        <label class="form-label">
                            Idade
                        </label>

                        <input type="number"
                               name="age"
                               class="form-control"
                               placeholder="Ex: 25">

                    </div>


                    <!-- Objetivo -->

                    <div class="col-md-4 mb-4">

                        <label class="form-label">
                            Objetivo
                        </label>

                        <select name="objective"
                                class="form-select">

                            <option value="Hipertrofia">
                                Hipertrofia
                            </option>

                            <option value="Emagrecimento">
                                Emagrecimento
                            </option>

                            <option value="Força">
                                Força
                            </option>

                        </select>

                    </div>


                    <!-- Plano -->

                    <div class="col-md-4 mb-4">

                        <label class="form-label">
                            Plano
                        </label>

                        <select name="plan_id"
                                class="form-select">

                            <?php foreach($plans as $plan): ?>

                                <option value="<?= $plan['id'] ?>">

                                    <?= $plan['name'] ?>
                                    - R$ <?= number_format($plan['price'], 2, ',', '.') ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>


                <div class="form-actions">

                    <a href="?controller=student&action=index"
                       class="btn btn-outline-dark">

                        Cancelar

                    </a>


                    <button class="btn btn-gradient">

                        Salvar Aluno

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>