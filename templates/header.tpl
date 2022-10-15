<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="{BASE_URL}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$encabezado}</title>
    </head>
    <body>
        <h1>{$titulo}</h1>
        <nav>
            <div>
                <ul>
                  <li>
                    <a href="tabla">Inicio</a>
                  </li>
                  {if !isset($smarty.session.Usuario)}
                  <li>
                    <a href="iniciarSesion">Iniciar Sesion</a>
                  </li>
                  {/if}
                  <li>
                    <a href="mostrarCategorias">Categorias</a>
                  </li>
                  {if isset($smarty.session.Usuario)}
                  <li>
                    <a href="agregarZapatilla">Agregar Zapatilla</a>
                  </li>
                  <li>
                    <a href="agregarCategoria">Agregar Categoria</a>
                  </li>
                  <li>
                    <a href="cerrarSesion">Cerrar Sesion</a>
                  </li>
                  {/if}
                </ul>
            </div>
          </nav>