{include file='templates/header.tpl'}
<table>
    <thead>
        <tr>
            <th>Nombre de zapatilla</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{$zapatilla->nombre}</td>
            <td>{$zapatilla->marca}</td>
            <td>{$zapatilla->precio}</td>
            <td>{$zapatilla->categoria}</td>
            <td>{$zapatilla->descripcion}</td>
        </tr>
    </tbody>
</table>
{include file='templates/footer.tpl'}