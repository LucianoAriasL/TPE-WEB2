{include file='templates/header.tpl'}
<table>
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Zapatillas</th>
        <tr>
    </thead>
    <tbody>
        {foreach $categorias item=categoria}
        <tr>
            <td>{$categoria->categoria}</td>
            <td><a href="mostrarPorCategoria/{$categoria->id_CategoriaDeZapatillas}">Ver zapatillas de esta categoria</a></td>
            {if isset($smarty.session.Usuario)}
            <td><a href="editarCategoria/{$categoria->id_CategoriaDeZapatillas}">Editar</a></td>
            <td><a href="eliminarCategoria/{$categoria->id_CategoriaDeZapatillas}">Eliminar</a></td>
            {/if}
        </tr>
        {/foreach}
    </tbody>
</table>
{include file='templates/footer.tpl'}