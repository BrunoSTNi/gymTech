<div class="page-header">

    <div>

        <h2>
            Novo Plano
        </h2>

        <span>
            Cadastre um novo plano para a academia
        </span>

    </div>

    <a href="?controller=plan&action=index"
       class="btn btn-outline-secondary">

        Voltar

    </a>

</div>


<div class="row justify-content-center mt-4">

    <div class="col-lg-8">

        <div class="glass-card p-5">

            <form method="POST"
                  action="?controller=plan&action=store">


                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Nome do Plano
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Ex: Premium"
                               required>

                    </div>


                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Valor Mensal
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                R$
                            </span>

                            <input type="number"
                                   name="price"
                                   step="0.01"
                                   min="0"
                                   class="form-control"
                                   placeholder="99.90"
                                   required>

                        </div>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-4">

                        <label class="form-label">
                            Duração (dias)
                        </label>

                        <input type="number"
                               name="duration"
                               min="1"
                               class="form-control"
                               placeholder="30"
                               required>

                    </div>

                </div>


                <div class="mb-4">

                    <label class="form-label">
                        Descrição
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"
                              placeholder="Descreva os benefícios do plano"></textarea>

                </div>


                <div class="form-actions">

                    <a href="?controller=plan&action=index"
                       class="btn btn-outline-dark">

                        Cancelar

                    </a>

                    <button type="submit"
                            class="btn btn-gradient">

                        Salvar Plano

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>