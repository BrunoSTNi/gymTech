<div class="page-header">

    <div>

        <h2>
            Treinos
        </h2>

        <span>
            Gerencie os treinos dos alunos
        </span>

    </div>

    <a href="?controller=workout&action=create"
       class="btn btn-gradient">

        + Novo Treino

    </a>

</div>

<div class="glass-card p-4 mt-4">

    <div class="table-responsive">

        <table class="table modern-table align-middle">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Aluno</th>
                    <th>Treino</th>
                    <th>Objetivo</th>
                    <th>Dias</th>
                    <th>Exercícios</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($workouts as $workout): ?>

                <tr>

                    <td>
                        #<?= $workout['id'] ?>
                    </td>

                    <td>

                        <div class="student-info">

                            <div class="avatar">

                                <?= strtoupper(substr($workout['student_name'],0,1)) ?>

                            </div>

                            <div>

                                <strong>
                                    <?= $workout['student_name'] ?>
                                </strong>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="badge bg-primary">

                            <?= $workout['workout_name'] ?>

                        </span>

                    </td>

                    <td>

                        <span class="badge bg-success">

                            <?= $workout['objective'] ?>

                        </span>

                    </td>

                    <td>

                        <?= $workout['training_days'] ?> dias

                    </td>

                    <td>

                        <span class="badge bg-info">

                            <?= $workout['total_exercises'] ?> exercícios

                        </span>

                    </td>

                    <td>

                        <a href="?controller=workout&action=edit&id=<?= $workout['id'] ?>"
                           class="btn btn-outline-warning btn-sm">

                            Editar

                        </a>

                        <a href="?controller=workout&action=manageExercises&id=<?= $workout['id'] ?>"
                           class="btn btn-outline-primary btn-sm">

                            Exercícios

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>