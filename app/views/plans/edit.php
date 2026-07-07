<h2>Editar Plano</h2>


<form method="POST"
action="?controller=plan&action=update">


<input type="hidden"
       name="id"
       value="<?= $plan['id'] ?>">


<label>Nome</label>

<input type="text"
       name="name"
       value="<?= $plan['name'] ?>"
       class="form-control mb-3"
       required>


<label>Valor</label>

<input type="number"
       name="price"
       value="<?= $plan['price'] ?>"
       step="0.01"
       min="0"
       class="form-control mb-3"
       required>


<label>Duração (dias)</label>

<input type="number"
       name="duration"
       value="<?= $plan['duration'] ?>"
       min="1"
       class="form-control mb-3"
       required>


<label>Descrição</label>

<textarea name="description"
          class="form-control mb-3"><?= $plan['description'] ?></textarea>


<button class="btn btn-warning">
Atualizar Plano
</button>


</form>