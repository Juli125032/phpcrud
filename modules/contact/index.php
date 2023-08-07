<?php 

    include("../../connection.php");
    $stm=$connection->prepare("SELECT * FROM contacs");
    $stm->execute();
    $contacts = $stm->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id'])){
        $txtid=(isset($_GET["id"])?$_GET["id"]:"");
        $stm=$connection->prepare("DELETE FROM contacs WHRE id=:txtid");
        $stm->bindParam(":id", $txtid);
        $stm->execute();
    
        header("location:index.php");

    }
?>

<?php include("../../template/header.php"); ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Agregar Contacto
</button>
<div class="table-responsive">
    <table class="table table-primary">
        <thead class="table table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contacts as $contact) { ?>
            <tr class="">
                <td scope="row"><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['name']; ?></td>
                <td><?php echo $contact['lastname']; ?></td>
                <td><?php echo $contact['phone']; ?></td>
                <td><?php echo $contact['date']; ?></td>
                <td>
                    <a href="edit.php?id<?php echo $contact['id'];?>" class="btn btn-warning">Editar</a>
                    <a href="index.php?id<?php echo $contact['id'];?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("create.php"); ?>


<?php include("../../template/footer.php"); ?>

