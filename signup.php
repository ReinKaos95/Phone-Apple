
<?php require_once 'layout/style.php'; ?>

<?php require_once 'layout/navbar.php'; ?>

<?php
  require 'config/db.php';
  $sql="SELECT * FROM rol";
  $result = mysqli_query($conn, $sql);
?>


<div class="container">
  <form method="post" action="">
    <label>Usuario</label>
    <input type="text" name="username" required>
    <br>
    <label>Correo</label>
    <input type="email" name="email" required>
    <br>
    <label>Contraseña</label>
    <input type="password" name="password" required>
    <br>
    <br>
    <label>Rol</label>
    <select name="rol">
      <option value="#">Seleccione un rol</option>
           <?php
       while ($key = mysqli_fetch_assoc($result)) {
      ?>
      <option name="rol" value="<?php echo $key["id"] ?>"><?php echo $key["rol_tipo"] ?></option>
    <?php } ?>
    </select>
    <br>
    <input type="submit" name="submit">
  </form>
</div>

<?php 
include 'config/db.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = base64_encode($_POST['password']);
  $rol=$_POST['rol'];

  $validate = $conn->query("SELECT * FROM users WHERE email = '$email'");
  $count = mysqli_num_rows($validate);

  if ($count > 0) {
    echo "usuario actualmente existe";
  }

  else{
      $sql = $conn->query("INSERT INTO users (username, email, pswd, rol_id) VALUES ('$username', '$email', '$password', '$rol')");
  if ($sql) {
    echo "Creacion exitosa, ya se puede <a href='login.php'>registrar</a> ";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

}


 ?>