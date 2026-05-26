<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">

    <div class="row vh-100 justify-content-center align-items-center">

        <div class="col-md-4">

            <div class="card shadow-lg border-0">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        💪 Gym System
                    </h2>

                    <form method="POST"
                          action="?controller=auth&action=authenticate">

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Senha</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <button class="btn btn-dark w-100">
                            Entrar
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>