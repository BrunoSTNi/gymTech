<div class="page-header">

    <div>

        <h2>
            Planos
        </h2>

        <span>
            Gerencie os planos disponíveis da academia
        </span>

    </div>


    <a href="?controller=plan&action=create"
       class="btn btn-gradient">

        + Novo Plano

    </a>

</div>


<?php if(isset($_SESSION['error'])): ?>

    <div class="alert alert-danger mt-4">

        <?= $_SESSION['error']; ?>

    </div>

    <?php unset($_SESSION['error']); ?>

<?php endif; ?>


<?php if(isset($_SESSION['success'])): ?>

    <div class="alert alert-success mt-4">

        <?= $_SESSION['success']; ?>

    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>


<div class="glass-card p-4 mt-4">


    <div class="table-responsive">


        <table class="table modern-table align-middle">


            <thead>

                <tr>

                    <th>#</th>
                    <th>Plano</th>
                    <th>Valor</th>
                    <th>Duração</th>
                    <th>Alunos</th>
                    <th>Descrição</th>
                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>


                <?php foreach($plans as $plan): ?>


                    <tr>


                        <td>

                            #<?= $plan['id'] ?>

                        </td>


                        <td>

                            <div class="student-info">


                                <div class="avatar">

                                    <?= strtoupper(substr($plan['name'],0,1)) ?>

                                </div>


                                <div>

                                    <strong>

                                        <?= $plan['name'] ?>

                                    </strong>

                                </div>


                            </div>


                        </td>


                        <td>

                            <span class="badge bg-success">

                                R$ <?= number_format($plan['price'], 2, ',', '.') ?>

                            </span>

                        </td>


                        <td>

                            <span class="badge bg-primary">

                                <?= $plan['duration'] ?> dias

                            </span>

                        </td>


                        <td>

                            <span class="badge bg-info">

                                👥 <?= $plan['total_students'] ?> alunos

                            </span>

                        </td>


                        <td>

                            <small class="text-muted">

                                <?= $plan['description'] ?>

                            </small>

                        </td>


                        <td>
                            <div class="action-buttons">


                                <a href="?controller=plan&action=edit&id=<?= $plan['id'] ?>"
                                class="btn btn-outline-warning btn-sm">

                                    Editar

                                </a>


                                <a href="?controller=plan&action=delete&id=<?= $plan['id'] ?>"
                                class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Deseja excluir este plano?')">

                                    Excluir

                                </a>
                            </div>

                        </td>


                    </tr>


                <?php endforeach; ?>


            </tbody>


        </table>


    </div>


</div>