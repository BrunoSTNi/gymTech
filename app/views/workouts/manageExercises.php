<div class="page-header">

    <div>

        <h2>
            Montagem do Treino
        </h2>

        <span>
            <?= $workout['workout_name'] ?>
        </span>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-4">

        <div class="glass-card p-4">

            <h5 class="mb-4">
                Adicionar Exercício
            </h5>

            <form method="POST"
                  action="?controller=workout&action=addExercise">

                <input type="hidden"
                       name="workout_id"
                       value="<?= $workout['id'] ?>">

                <div class="mb-3">

                    <label>Exercício</label>

                    <select name="exercise_id"
                            class="form-select"
                            required>

                        <?php foreach($allExercises as $exercise): ?>

                            <option value="<?= $exercise['id'] ?>">

                                <?= $exercise['name'] ?>
                                -
                                <?= $exercise['muscle_group'] ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Séries</label>

                    <input type="number"
                           name="sets"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Repetições</label>

                    <input type="text"
                           name="reps"
                           class="form-control"
                           placeholder="12 ou 8-10"
                           required>

                </div>

                <div class="mb-3">

                    <label>Descanso</label>

                    <input type="text"
                           name="rest_time"
                           class="form-control"
                           placeholder="60 segundos">

                </div>

                <div class="mb-4">

                    <label>Observações</label>

                    <textarea name="notes"
                              class="form-control"></textarea>

                </div>

                <button class="btn btn-gradient w-100">

                    Adicionar Exercício

                </button>

            </form>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="glass-card p-4">

            <h5 class="mb-4">

                Exercícios do Treino

            </h5>

            <?php if(empty($currentExercises)): ?>

                <div class="alert alert-info">

                    Nenhum exercício adicionado ainda.

                </div>

            <?php else: ?>

                <?php foreach($currentExercises as $exercise): ?>

                    <div class="card mb-3 shadow-sm">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h5>

                                        <?= $exercise['exercise_name'] ?>

                                    </h5>

                                    <small>

                                        <?= $exercise['muscle_group'] ?>

                                    </small>

                                    <br><br>

                                    <?= $exercise['sets'] ?> séries
                                    •
                                    <?= $exercise['reps'] ?> reps
                                    •
                                    <?= $exercise['rest_time'] ?>

                                </div>

                                <div>

                                    <a href="?controller=workout&action=removeExercise&id=<?= $exercise['id'] ?>&workout_id=<?= $workout['id'] ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Remover exercício do treino?')">

                                        Remover

                                    </a>

                                </div>

                            </div>

                            <?php if(!empty($exercise['notes'])): ?>

                                <hr>

                                <small class="text-muted">

                                    <?= $exercise['notes'] ?>

                                </small>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>
