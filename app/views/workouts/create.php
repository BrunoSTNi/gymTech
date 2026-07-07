<div class="page-header">

    <div>

        <h2>
            Novo Treino
        </h2>

        <span>
            Cadastre um novo treino para um aluno
        </span>

    </div>

</div>

<div class="glass-card p-5 mt-4">

<form method="POST"
      action="?controller=workout&action=store">

    <div class="row">

        <div class="col-md-6 mb-4">

            <label>Aluno</label>

            <select name="student_id"
                    class="form-select"
                    required>

                <?php foreach($students as $student): ?>

                    <option value="<?= $student['id'] ?>">

                        <?= $student['name'] ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label>Nome do Treino</label>

            <input type="text"
                   name="workout_name"
                   class="form-control"
                   placeholder="Treino A"
                   required>

        </div>

        <div class="col-md-6 mb-4">

            <label>Objetivo</label>

            <select name="objective"
                    class="form-select">

                <option>Hipertrofia</option>
                <option>Emagrecimento</option>
                <option>Força</option>
                <option>Resistência</option>

            </select>

        </div>

        <div class="col-md-6 mb-4">

            <label>Dias por semana</label>

            <input type="number"
                   name="training_days"
                   class="form-control"
                   min="1"
                   max="7"
                   required>

        </div>

    </div>

    <button class="btn btn-gradient">

        Salvar Treino

    </button>

</form>

</div>