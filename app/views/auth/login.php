<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>GymTech Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="/GymTech/public/assets/css/login.css">

</head>

<body>

<div class="login-container">

    <div class="left-side">

        <img src="/GymTech/public/assets/img/logo.png"
             class="login-logo">

        <h2>
            Gestão Inteligente para Academias
        </h2>

        <p>
            Controle alunos, planos, treinos, equipamentos e desempenho em um único sistema.
        </p>

    </div>


    <div class="right-side">

        <div class="login-card">

            <h2>Bem-vindo 👋</h2>

            <p>
                Faça login para acessar o sistema
            </p>
            <?php if(isset($_SESSION['login_error'])): ?>

                <div class="alert alert-danger shadow-sm border-0 login-alert">

                    <div class="d-flex align-items-center">

                        <div class="alert-icon">
                            ❌
                        </div>

                        <div>

                            <strong>
                                Não foi possível entrar
                            </strong>

                            <br>

                            <?= $_SESSION['login_error']; ?>

                        </div>

                    </div>

                </div>

                <?php unset($_SESSION['login_error']); ?>

                <?php endif; ?>


            <form method="POST"
                  action="?controller=auth&action=authenticate">

                <div class="mb-3">

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email"
                           required>

                </div>


                <div class="mb-4">

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Senha"
                           required>

                </div>


                <button class="btn btn-login">

                    Entrar

                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>