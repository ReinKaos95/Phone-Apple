
<?php require_once 'layout/style.php'; ?>

<?php require_once 'layout/navbar.php'; ?>

<?php
  require 'config/db.php';
  $sql="SELECT * FROM mobiles";
  $result = mysqli_query($conn, $sql);
?>




<div class="container text-center">
  <div class="row align-items-center">
                <?php
                while ($key = mysqli_fetch_assoc($result)) {
                 ?>
    <div class="col">
      <img src="<?php echo $key["foto"] ?>"  width="150" height="300">
      <br>
      <a href="celular.php?id=<?php echo $key["id"] ?>"><?php echo $key["nombre"] . "&nbsp;" ?> <?php echo $key["modelo"] ?></a>
    </div>
     <?php } ?>
  </div>
</div>