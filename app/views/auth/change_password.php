<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow border-0">

                <div class="card-body p-5">

                    <h3 class="mb-4 text-center">
                        🔒 Primeiro acesso
                    </h3>

                    <p class="text-muted text-center mb-4">
                        Para continuar, escolha uma nova senha.
                    </p>

                    <form method="POST"
                          action="?controller=auth&action=updatePassword">

                        <div class="mb-3">

                            <label>Nova senha</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label>Confirmar senha</label>

                            <input type="password"
                                   name="confirm_password"
                                   class="form-control"
                                   required>

                        </div>

                        <button class="btn btn-primary w-100">

                            Alterar senha

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
