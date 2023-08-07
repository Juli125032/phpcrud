<?php

if ($_POST) {

    $lastname = (isset($_POST["lastname"]) ? $_POST["lastname"] : "");
    $name = (isset($_POST["name"]) ? $_POST["name"] : "");
    $phone = (isset($_POST["phone"]) ? $_POST["phone"] : "");
    $date = (isset($_POST["date"]) ? $_POST["date"] : "");

    $stm = $connection->prepare("INSERT INTO contacs(id, name, lastname, date, phone)
    VALUES(null,:name,:lastname,:date,:phone)");
    $stm->bindParam(":name", $name);
    $stm->bindParam(":lastname", $lastname);
    $stm->bindParam(":date", $date);
    $stm->bindParam(":phone", $phone);
    $stm->execute();

    header("location:index.php");
}

?>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">CREAR CONTACTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Agregar nombre" value="">

                    <label class="form-label">Apellido</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Agregar Apellido" value="">

                    <label class="form-label">Telefono</label>
                    <input type="number" name="phone" class="form-control" placeholder="Agregar Telefono" value="">

                    <label class="form-label">Fecha</label>
                    <input type="date" name="date" class="form-control" placeholder="Agregar Fecha" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>