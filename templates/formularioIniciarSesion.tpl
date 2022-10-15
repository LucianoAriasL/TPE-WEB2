{include file='templates/header.tpl'}
<form action="verificarLogin" method="POST">
  <div>
    <label>Usuario</label>
    <input type="text" name="usuario">
  </div>
  <div>
    <label>Contraseña</label>
    <input type="password" name="contraseña">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
</form>
<div>
  <h2>{$mensaje}<h2>
</div>
{include file='templates/footer.tpl'}