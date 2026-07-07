<div class="page-header">

    <div>

        <h2>
            Editar Exercício
        </h2>

        <span>
            Atualize as informações do exercício
        </span>

    </div>

    <a href="?controller=exercise&action=index"
       class="btn btn-outline-secondary">

        Voltar

    </a>

</div>


<div class="row justify-content-center mt-4">

    <div class="col-lg-10">

        <div class="glass-card p-5">

            <form method="POST"
                  action="?controller=exercise&action=update&id=<?= $exercise['id'] ?>">

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Nome do Exercício

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="<?= $exercise['name'] ?>"
                               required>

                    </div>


                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Grupo Muscular

                        </label>

                        <select name="muscle_group"
                                class="form-select"
                                required>

                            <?php
                            $groups = [
                                'Peito',
                                'Costas',
                                'Ombros',
                                'Bíceps',
                                'Tríceps',
                                'Pernas',
                                'Panturrilha',
                                'Abdômen',
                                'Cardio'
                            ];

                            foreach($groups as $group):
                            ?>

                                <option value="<?= $group ?>"
                                    <?= $exercise['muscle_group'] == $group ? 'selected' : '' ?>>

                                    <?= $group ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Equipamento

                        </label>

                        <select name="equipment"
                                class="form-select">

                            <?php

                            $equipments = [
                                'Barra',
                                'Halteres',
                                'Máquina',
                                'Polia',
                                'Smith',
                                'Peso Corporal',
                                'Outro'
                            ];

                            foreach($equipments as $equipment):
                            ?>

                                <option value="<?= $equipment ?>"
                                    <?= $exercise['equipment'] == $equipment ? 'selected' : '' ?>>

                                    <?= $equipment ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Dificuldade

                        </label>

                        <select name="difficulty"
                                class="form-select">

                            <?php

                            $levels = [
                                'Iniciante',
                                'Intermediário',
                                'Avançado'
                            ];

                            foreach($levels as $level):
                            ?>

                                <option value="<?= $level ?>"
                                    <?= $exercise['difficulty'] == $level ? 'selected' : '' ?>>

                                    <?= $level ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Objetivo

                        </label>

                        <select name="objective"
                                class="form-select">

                            <?php

                            $objectives = [
                                'Hipertrofia',
                                'Emagrecimento',
                                'Força',
                                'Resistência'
                            ];

                            foreach($objectives as $objective):
                            ?>

                                <option value="<?= $objective ?>"
                                    <?= $exercise['objective'] == $objective ? 'selected' : '' ?>>

                                    <?= $objective ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>


                <div class="mb-4">

                    <label class="form-label">

                        Vídeo Demonstrativo

                    </label>

                    <input type="url"
                           name="video_url"
                           class="form-control"
                           value="<?= $exercise['video_url'] ?>">

                </div>


                <div class="mb-4">

                    <label class="form-label">

                        Descrição / Execução

                    </label>

                    <textarea name="description"
                              rows="5"
                              class="form-control"><?= $exercise['description'] ?></textarea>

                </div>


                <div class="form-actions">

                    <a href="?controller=exercise&action=index"
                       class="btn btn-outline-dark">

                        Cancelar

                    </a>

                    <button type="submit"
                            class="btn btn-gradient">

                        Salvar Alterações

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>