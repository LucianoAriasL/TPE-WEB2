{include file='templates/header.tpl'}
{if $action=='Agregar'}
<form action="finalizarAgregadoZapatilla" method="POST">
    <div>
      <label>Nombre</label>
      <input type="text" name="nombre" required>
    </div>
    <div>
        <label>Marca</label>
        <input type="text" name="marca" required>
    </div>
    <div>
        <label>Precio</label>
        <input type="number" name="precio" required>
    </div>
    <label>Descripcion</label>
    <div>   
        <textarea name="descripcion" rows="10" cols="30" required></textarea>
    </div>
<select name="categoria">
    {foreach $categorias as $categoria}
    <option value="{$categoria->id_CategoriaDeZapatillas}">{$categoria->categoria}</option>
    {/foreach}
</select>
<button>{$action}</button>
</form>
{elseif $action=='Editar'}
<form action="finalizarEditadoZapatilla/{$zapatilla->id_zapatilla}" method="POST">
    <div>
      <label>Nombre</label>
      <input type="text" name="nombre" value="{$zapatilla->nombre}" required>
    </div>
    <div>
        <label>Marca</label>
        <input type="text" name="marca" value="{$zapatilla->marca}" required>
    </div>
    <div>
        <label>Precio</label>
        <input type="number" name="precio" value="{$zapatilla->precio}" required>
    </div>
    <label>Descripcion</label>
    <div>
        <textarea type="text" name="descripcion" rows="10" cols="30" required>{$zapatilla->descripcion}</textarea>
    </div>
    <select name="categoria">
        <option value="{$zapatilla->id_CategoriaDeZapatillas_fk}"selected>{$zapatilla->categoria}</option>
        {foreach $categorias as $categoria}
        {if $categoria->categoria!=$zapatilla->categoria}
        <option value="{$categoria->id_CategoriaDeZapatillas}">{$categoria->categoria}</option>
        {/if}
        {/foreach}
    </select>
    <button>{$action}</button>
</form>
{/if}
{include file='templates/footer.tpl'}