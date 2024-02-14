
<?php require_once 'layout/style.php'; ?>

<?php require_once 'layout/navbar.php'; ?>

<?php
  require 'config/db.php';
  $sql="SELECT * FROM mobiles";
  $result = mysqli_query($conn, $sql);
?>


  <table class="display" style="width:100%" id="tabla">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($key = mysqli_fetch_assoc($result)) {
                 ?>
                    <tr>
                        <td><?php echo $key["id"] ?></td>
                        <td><img src="<?php echo $key["foto"] ?>"  width="200" height="200"></td>
                        <td><?php echo $key["nombre"] ?></td>
                        <td><?php echo $key["modelo"] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $key["id"] ?>">Editar</a>
                            &nbsp;
                            <a href="delete.php?id=<?php echo $key["id"] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<script type="text/javascript" src="js/script.js"></script>