<?php 

    require 'config/db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM mobiles WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row[0];
    $nombre = $row[1];
    $marca = $row[2];
    $imagen = $row[3];

 ?>

   <form method="post" action="" enctype="multipart/form-data">
          <br>
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <br>
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?php echo $row[1] ?>">
    <br>
    <label>Marca</label>
    <input type="text" name="marca" value="<?php echo $row[2] ?>">
    <br>
    <br>
    <label>Caratula</label>
    <input type="file" name="imagen">
    <br>
    <input type="submit" name="submit">
  </form>

  <?php 

if (isset($_POST['submit'])) {
include 'config/db.php';
$id=$_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$imagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$destino='img/'.$imagen;
copy($ruta, $destino);

$sql = "UPDATE mobiles SET nombre='$nombre', foto='$destino', modelo='$marca' WHERE id ='$id'";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

 ?>