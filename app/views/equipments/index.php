<h2 class="mb-4">
    🛠️ Gestão de Equipamentos
</h2>

<a href="?controller=equipment&action=create"
   class="btn btn-primary mb-4">
    + Novo Equipamento
</a>


<div class="card glass-card">

<div class="card-body">

<table class="table table-hover align-middle">

<thead>

<tr>
    <th>Equipamento</th>
    <th>Categoria</th>
    <th>Patrimônio</th>
    <th>Fabricante</th>
    <th>Status</th>
    <th>Ações</th>
</tr>

</thead>


<tbody>

<?php foreach($equipments as $equipment): ?>

<tr>

<td>
    💪 <?= $equipment['name'] ?>
</td>


<td>
    <?= $equipment['category'] ?>
</td>


<td>
    <?= $equipment['serial_number'] ?>
</td>


<td>
    <?= $equipment['manufacturer'] ?>
</td>


<td>

<?php if($equipment['status'] == 'ativo'): ?>

<span class="badge bg-success">
    🟢 Ativo
</span>


<?php elseif($equipment['status'] == 'manutencao'): ?>

<span class="badge bg-warning text-dark">
    🟡 Manutenção
</span>


<?php else: ?>

<span class="badge bg-danger">
    🔴 Inativo
</span>


<?php endif; ?>

</td>

<td>

    <a href="?controller=equipment&action=edit&id=<?= $equipment['id'] ?>"
       class="btn btn-warning btn-sm">
        ✏️ Editar
    </a>

    <a href="?controller=equipment&action=delete&id=<?= $equipment['id'] ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Deseja excluir este equipamento?')">
        🗑️ Excluir
    </a>

</td>


</tr>

<?php endforeach; ?>


</tbody>

</table>

</div>

</div>