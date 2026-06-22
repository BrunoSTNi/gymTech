<div class="page-header">

    <div>

        <h2>
            Alunos
        </h2>

        <span>
            Gerencie todos os alunos da sua academia
        </span>

    </div>

    <a href="?controller=student&action=create"
       class="btn btn-gradient">

        + Novo Aluno

    </a>

</div>


<div class="glass-card p-4 mt-4">

    <div class="table-responsive">

        <table class="table modern-table align-middle">

            <thead>

                <tr>

                    <th>#</th>
                    <th>Aluno</th>
                    <th>Idade</th>
                    <th>Objetivo</th>
                    <th>Plano</th>
                    <th>Ações</th>

                </tr>

            </thead>


            <tbody>

                <?php foreach($students as $student): ?>

                    <tr>

                        <td>

                            #<?= $student['id'] ?>

                        </td>


                        <td>

                            <div class="student-info">

                                <div class="avatar">

                                    <?= strtoupper(substr($student['name'],0,1)) ?>

                                </div>

                                <div>

                                    <strong>
                                        <?= $student['name'] ?>
                                    </strong>

                                    <br>

                                    <small>
                                        <?= $student['email'] ?>
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>

                            <?= $student['age'] ?> anos

                        </td>


                        <td>

                            <span class="badge bg-primary">

                                <?= $student['objective'] ?>

                            </span>

                        </td>


                        <td>

                            <span class="badge bg-success">

                                <?= $student['plan_name'] ?>

                            </span>

                        </td>


                        <td>

                            <a href="?controller=student&action=edit&id=<?= $student['id'] ?>"
                               class="btn btn-outline-warning btn-sm">

                                Editar

                            </a>


                            <a href="?controller=student&action=delete&id=<?= $student['id'] ?>"
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Deseja excluir este aluno?')">

                                Excluir

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>


            </tbody>

        </table>

    </div>

</div>