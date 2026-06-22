<?php $role = $_SESSION['user']['role']; ?>

<div class="sidebar">

    <div class="logo">
        <img src="/GymTech/public/assets/img/logo.png"
             width="150">
    </div>

    <div class="menu">

        <!-- Dashboard -->
        <a href="?controller=dashboard&action=index">
            🏠 Dashboard
        </a>


        <!-- Somente ADMIN -->
        <?php if($role == 'admin'): ?>

            <a href="?controller=student&action=index">
                👥 Alunos
            </a>

            <a href="?controller=plan&action=index">
                💳 Planos
            </a>

            <a href="?controller=equipment&action=index">
                🛠️ Equipamentos
            </a>

            <a href="?controller=reports&action=index">
                📊 Relatórios
            </a>

        <?php endif; ?>


        <!-- ADMIN e PERSONAL -->
        <?php if($role == 'admin' || $role == 'trainer'): ?>

            <a href="?controller=workout&action=index">
                🏋️ Treinos
            </a>

            <a href="?controller=exercise&action=index">
                💪 Exercícios
            </a>

            <a href="?controller=recommendation&action=index">
                🤖 IA de Treinos
            </a>

        <?php endif; ?>


        <!-- ALUNO -->
        <?php if($role == 'student'): ?>

            <a href="?controller=myProfile&action=index">
                👤 Meu Perfil
            </a>

            <a href="?controller=myPlan&action=index">
                💳 Meu Plano
            </a>

            <a href="?controller=myWorkout&action=index">
                🏋️ Meu Treino
            </a>

        <?php endif; ?>


        <!-- Sair -->
        <a href="?controller=auth&action=logout">
            🚪 Sair
        </a>

    </div>

</div>


<div class="main-content">

<div class="topbar">

<div class="topbar-brand">

    <div class="brand-text">

        <h3>
            GymTech
        </h3>

        <span>
            Sistema Inteligente de Gestão Fitness
        </span>

    </div>

</div>


    <div class="user-area">

        <button class="notification-btn">

            🔔

        </button>


        <div class="user-info">

            <div class="user-details">

                <strong>
                    <?= $_SESSION['user']['name'] ?>
                </strong>

                <small>
                    <?= ucfirst($role) ?>
                </small>

            </div>


            <a href="?controller=auth&action=logout"
               class="logout-btn">

                🚪 Sair

            </a>

        </div>

    </div>

</div>


<div class="page-content">