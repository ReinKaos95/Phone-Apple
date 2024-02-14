<?php require_once 'layout/navbar.php'; ?>

<?php require_once 'layout/style.php'; ?>

  <form method="post" action="" enctype="multipart/form-data">
    <label>Caratula</label>
    <input type="file" name="imagen">
    <br>
    <input type="submit" name="submit">
  </form>


<?php 
include 'config/db.php';
if (isset($_POST['submit'])) {
  $imagen=$_FILES['imagen']['name'];
  $ruta=$_FILES['imagen']['tmp_name'];
  $destino='img/'.$imagen;
  copy($ruta, $destino);

 
  /*echo $nombre . '<br>';
  echo $marca . '<br>';
  echo $fecha_salida . '<br>';
  echo $destino . '<br>';
  echo $precio;*/

  $sql = "INSERT INTO slider (imagen) VALUES ('$destino') ";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


}

 ?>