{include file='templates/header.tpl'}
{if $action=='agregar'}
<form action="finalizarAgregadoCategoria" method="POST">
    <div>
      <label>Categoria</label>
      <input type="text" name="categoria" required>
    </div>
<button>Agregar</button>
</form>
{elseif $action=='editar'}
<form action="finalizarEditadoCategoria/{$categoria->id_CategoriaDeZapatillas}" method="POST">
  <div>
    <label>Categoria</label>
    <input type="text" name="categoria" value="{$categoria->categoria}" required>
  </div>
<button>Editar</button>
</form>
{/if}
{include file='templates/footer.tpl'}