<div class="page-header">

    <div>

        <h2>
            Novo Exercício
        </h2>

        <span>
            Adicione exercícios à biblioteca da academia
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
                  action="?controller=exercise&action=store">

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Nome do Exercício

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Ex: Supino Reto"
                               required>

                    </div>


                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Grupo Muscular

                        </label>

                        <select name="muscle_group"
                                class="form-select"
                                required>

                            <option value="">
                                Selecione...
                            </option>

                            <option>Peito</option>
                            <option>Costas</option>
                            <option>Ombros</option>
                            <option>Bíceps</option>
                            <option>Tríceps</option>
                            <option>Pernas</option>
                            <option>Panturrilha</option>
                            <option>Abdômen</option>
                            <option>Cardio</option>

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

                            <option>Barra</option>
                            <option>Halteres</option>
                            <option>Máquina</option>
                            <option>Polia</option>
                            <option>Smith</option>
                            <option>Peso Corporal</option>
                            <option>Outro</option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Dificuldade

                        </label>

                        <select name="difficulty"
                                class="form-select">

                            <option>Iniciante</option>
                            <option>Intermediário</option>
                            <option>Avançado</option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label">

                            Objetivo

                        </label>

                        <select name="objective"
                                class="form-select">

                            <option>Hipertrofia</option>
                            <option>Emagrecimento</option>
                            <option>Força</option>
                            <option>Resistência</option>

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
                           placeholder="https://youtube.com/...">

                </div>


                <div class="mb-4">

                    <label class="form-label">

                        Descrição / Execução

                    </label>

                    <textarea name="description"
                              rows="5"
                              class="form-control"
                              placeholder="Explique como executar corretamente o exercício"></textarea>

                </div>


                <div class="form-actions">

                    <a href="?controller=exercise&action=index"
                       class="btn btn-outline-dark">

                        Cancelar

                    </a>

                    <button type="submit"
                            class="btn btn-gradient">

                        Salvar Exercício

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>