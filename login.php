
<?php require_once 'layout/style.php'; ?>

<?php require_once 'layout/navbar.php'; ?>

<?php
  session_start();
  
?>


<div class="container">
  <form method="post" action="">
    <label>Usuario</label>
    <input type="text" name="username" required>
    <br>
    <label>Contraseña</label>
    <input type="password" name="password" required>
    <br>
    <br>
    <input type="submit" name="submit">
  </form>
</div>

