{include file='templates/header.tpl'}
{if !empty($zapatillas)}
<table>
    <thead>
        <tr>
            <th>Nombre de zapatilla</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Descripcion</th>
        <tr>
    </thead>
    <tbody>
        {foreach $zapatillas item=zapatilla}
        <tr>
            <td>{$zapatilla->nombre}</td>
            <td>{$zapatilla->marca}</td>
            <td>{$zapatilla->precio}</td>
            <td>{$zapatilla->descripcion}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{else}
<p>No hay zapatillas en ésta categoria<p>
{/if}
{include file='templates/footer.tpl'}