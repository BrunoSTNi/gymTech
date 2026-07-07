<div class="page-header">

    <div>

        <h2>
            <?= $workout['workout_name'] ?>
        </h2>

        <span>
            Visualização completa do treino
        </span>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-4">

        <div class="glass-card p-4">

            <h5 class="mb-4">
                Informações Gerais
            </h5>

            <p>
                <strong>Aluno:</strong><br>
                <?= $workout['student_name'] ?>
            </p>

            <p>
                <strong>Objetivo:</strong><br>

                <span class="badge bg-success">
                    <?= $workout['objective'] ?>
                </span>
            </p>

            <p>
                <strong>Dias de treino:</strong><br>
                <?= $workout['training_days'] ?> dias/semana
            </p>

            <p>
                <strong>Criado em:</strong><br>
                <?= date(
                    'd/m/Y',
                    strtotime($workout['created_at'])
                ) ?>
            </p>

        </div>

    </div>

    <div class="col-md-8">

        <div class="glass-card p-4">

            <div class="d-flex justify-content-between mb-4">

                <h5>
                    Exercícios do Treino
                </h5>

                <a href="?controller=workout&action=manageExercises&id=<?= $workout['id'] ?>"
                   class="btn btn-gradient">

                    Adicionar Exercícios

                </a>

            </div>

            <?php if(empty($exercises)): ?>

                <div class="alert alert-info">

                    Nenhum exercício cadastrado neste treino.

                </div>

            <?php else: ?>

                <table class="table modern-table">

                    <thead>

                        <tr>
                            <th>Exercício</th>
                            <th>Séries</th>
                            <th>Repetições</th>
                            <th>Descanso</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($exercises as $exercise): ?>

                        <tr>

                            <td>
                                <?= $exercise['name'] ?>
                            </td>

                            <td>
                                <?= $exercise['sets'] ?>
                            </td>

                            <td>
                                <?= $exercise['reps'] ?>
                            </td>

                            <td>
                                <?= $exercise['rest_time'] ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            <?php endif; ?>

        </div>

    </div>

</div>
