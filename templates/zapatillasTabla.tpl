{include file='templates/header.tpl'}
<table>
    <thead>
        <tr>
            <th>Nombre de zapatilla</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Descripcion</th>
        <tr>
    </thead>
    <tbody>
        {foreach $zapatillas item=zapatilla}
        <tr>
            <td>{$zapatilla->nombre}</td>
            <td>{$zapatilla->precio}</td>
            <td>{$zapatilla->categoria}</td>
            <td><a href="mostrarZapatilla/{$zapatilla->id_zapatilla}">Ver mas...</a></td>
            {if isset($smarty.session.Usuario)}
            <td><a href="editarZapatilla/{$zapatilla->id_zapatilla}">Editar</a></td>
            <td><a href="eliminarZapatilla/{$zapatilla->id_zapatilla}">Eliminar</a></td>
            {/if}
        </tr>
        {/foreach}
    </tbody>
</table>
{include file='templates/footer.tpl'}