
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
    <input type="text" name="username">
    <br>
    <label>Contraseña</label>
    <input type="password" name="password">
    <br>
    <br>
    <label>Rol</label>
    <select>
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
  $password = base64_encode($_POST['password']);
  $rol=$_POST['rol'];

 
  echo $username . '<br>';
  echo $password . '<br>';
  echo $rol;

  /*$sql = "INSERT INTO mobiles (nombre, modelo, foto) VALUES ('$nombre', '$marca', '$destino') ";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }*/


}

 ?>