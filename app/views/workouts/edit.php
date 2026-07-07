<div class="page-header">

    <div>

        <h2>
            Editar Treino
        </h2>

        <span>
            Atualize as informações do treino
        </span>

    </div>

</div>

<div class="glass-card p-5 mt-4">

<form method="POST"
      action="?controller=workout&action=update">

    <input type="hidden"
           name="id"
           value="<?= $workout['id'] ?>">

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Aluno
            </label>

            <select name="student_id"
                    class="form-select"
                    required>

                <?php foreach($students as $student): ?>

                    <option
                        value="<?= $student['id'] ?>"
                        <?= $student['id'] == $workout['student_id']
                            ? 'selected'
                            : '' ?>>

                        <?= $student['name'] ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Nome do Treino
            </label>

            <input type="text"
                   name="workout_name"
                   value="<?= $workout['workout_name'] ?>"
                   class="form-control"
                   required>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Objetivo
            </label>

            <select name="objective"
                    class="form-select">

                <option value="Hipertrofia"
                    <?= $workout['objective'] == 'Hipertrofia' ? 'selected' : '' ?>>
                    Hipertrofia
                </option>

                <option value="Emagrecimento"
                    <?= $workout['objective'] == 'Emagrecimento' ? 'selected' : '' ?>>
                    Emagrecimento
                </option>

                <option value="Força"
                    <?= $workout['objective'] == 'Força' ? 'selected' : '' ?>>
                    Força
                </option>

                <option value="Resistência"
                    <?= $workout['objective'] == 'Resistência' ? 'selected' : '' ?>>
                    Resistência
                </option>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">
                Dias de treino por semana
            </label>

            <input type="number"
                   name="training_days"
                   class="form-control"
                   min="1"
                   max="7"
                   value="<?= $workout['training_days'] ?>"
                   required>

        </div>

    </div>

    <button class="btn btn-gradient">
        Salvar Alterações
    </button>

    <a href="?controller=workout&action=index"
       class="btn btn-secondary">

        Voltar

    </a>

</form>

</div>