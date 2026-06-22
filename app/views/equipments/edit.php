<h2 class="mb-4">
    ✏️ Editar Equipamento
</h2>


<div class="card glass-card">

<div class="card-body">

<form method="POST"
      action="?controller=equipment&action=update">


<input type="hidden"
       name="id"
       value="<?= $equipment['id'] ?>">


<div class="row">


<div class="col-md-6 mb-3">

<label>Nome</label>

<input type="text"
       name="name"
       class="form-control"
       value="<?= $equipment['name'] ?>"
       required>

</div>


<div class="col-md-6 mb-3">

<label>Categoria</label>

<select name="category"
        class="form-select">

<option <?= $equipment['category'] == 'Musculação' ? 'selected' : '' ?>>
Musculação
</option>

<option <?= $equipment['category'] == 'Cardio' ? 'selected' : '' ?>>
Cardio
</option>

<option <?= $equipment['category'] == 'Funcional' ? 'selected' : '' ?>>
Funcional
</option>

</select>

</div>


<div class="col-md-6 mb-3">

<label>Patrimônio</label>

<input type="text"
       name="serial_number"
       value="<?= $equipment['serial_number'] ?>"
       class="form-control">

</div>


<div class="col-md-6 mb-3">

<label>Fabricante</label>

<input type="text"
       name="manufacturer"
       value="<?= $equipment['manufacturer'] ?>"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>Data Compra</label>

<input type="date"
       name="purchase_date"
       value="<?= $equipment['purchase_date'] ?>"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>Última manutenção</label>

<input type="date"
       name="last_maintenance"
       value="<?= $equipment['last_maintenance'] ?>"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>Próxima manutenção</label>

<input type="date"
       name="next_maintenance"
       value="<?= $equipment['next_maintenance'] ?>"
       class="form-control">

</div>


<div class="col-md-6 mb-4">

<label>Status</label>

<select name="status"
        class="form-select">

<option value="ativo"
<?= $equipment['status'] == 'ativo' ? 'selected' : '' ?>>
🟢 Ativo
</option>


<option value="manutencao"
<?= $equipment['status'] == 'manutencao' ? 'selected' : '' ?>>
🟡 Manutenção
</option>


<option value="inativo"
<?= $equipment['status'] == 'inativo' ? 'selected' : '' ?>>
🔴 Inativo
</option>


</select>

</div>


</div>


<button class="btn btn-success">
Salvar Alterações
</button>


<a href="?controller=equipment&action=index"
   class="btn btn-secondary">
Voltar
</a>


</form>

</div>

</div>