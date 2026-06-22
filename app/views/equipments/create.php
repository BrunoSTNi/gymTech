<h2 class="mb-4">
    ➕ Novo Equipamento
</h2>


<div class="card glass-card">

<div class="card-body">

<form method="POST"
      action="?controller=equipment&action=store">


<div class="row">


<div class="col-md-6 mb-3">

<label>
Nome do Equipamento
</label>

<input type="text"
       name="name"
       class="form-control"
       required>

</div>


<div class="col-md-6 mb-3">

<label>
Categoria
</label>

<select name="category"
        class="form-select"
        required>

<option value="">
Selecione
</option>

<option>
Musculação
</option>

<option>
Cardio
</option>

<option>
Funcional
</option>

</select>

</div>


<div class="col-md-6 mb-3">

<label>
Número de Patrimônio
</label>

<input type="text"
       name="serial_number"
       class="form-control">

</div>


<div class="col-md-6 mb-3">

<label>
Fabricante
</label>

<input type="text"
       name="manufacturer"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>
Data da Compra
</label>

<input type="date"
       name="purchase_date"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>
Última Manutenção
</label>

<input type="date"
       name="last_maintenance"
       class="form-control">

</div>


<div class="col-md-4 mb-3">

<label>
Próxima Manutenção
</label>

<input type="date"
       name="next_maintenance"
       class="form-control">

</div>


<div class="col-md-6 mb-4">

<label>
Status
</label>


<select name="status"
        class="form-select">

<option value="ativo">
🟢 Ativo
</option>

<option value="manutencao">
🟡 Em manutenção
</option>

<option value="inativo">
🔴 Inativo
</option>

</select>


</div>

</div>


<button class="btn btn-success">
Salvar Equipamento
</button>


<a href="?controller=equipment&action=index"
   class="btn btn-secondary">
Voltar
</a>


</form>

</div>

</div>