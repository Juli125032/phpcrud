<?php 

    include("../../connection.php");

    if(isset($_GET['id'])){
        $txtid=(isset($_GET["id"])?$_GET["id"]:"");
        $stm=$connection->prepare("SELECT * FROM contacs WHERE id=:txtid");
        $stm->bindParam(":txtid", $txtid);
        $stm->execute();
        $register=$stm->fetch(PDO::FETCH_LAZY);

        $name=$register['name'];
        $lastname=$register['lastname'];
        $phone=$register['phone'];
        $date=$register['date'];
    }

    if ($_POST) {

        $txtid = (isset($_POST["txtid"]) ? $_POST["txtid"] : "");
        $lastname = (isset($_POST["lastname"]) ? $_POST["lastname"] : "");
        $name = (isset($_POST["name"]) ? $_POST["name"] : "");
        $phone = (isset($_POST["phone"]) ? $_POST["phone"] : "");
        $date = (isset($_POST["date"]) ? $_POST["date"] : "");
    
        $stm = $connection->prepare("UPDATE contacs SET name=:name,lastname=:lastname,date=:date,phone=:phone WHERE id=:txtid");
        $stm->bindParam(":name", $name);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":date", $date);
        $stm->bindParam(":phone", $phone);
        $stm->bindParam(":txtid", $txtid);
        $stm->execute();
    
        header("location:index.php");
    }
?>

<?php include("../../template/header.php"); ?>

<form action="" method="post">
    <div class="modal-body">
        <input type="hidden" name="txtid" value="<?php echo $txtid;?>">

        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Agregar nombre" value="<?php echo $name;?>">

        <label class="form-label">Apellido</label>
        <input type="text" name="lastname" class="form-control" placeholder="Agregar Apellido" value="<?php echo $lastname;?>">

        <label class="form-label">Telefono</label>
        <input type="number" name="phone" class="form-control" placeholder="Agregar Telefono" value="<?php echo $phone;?>">

        <label class="form-label">Fecha</label>
        <input type="date" name="date" class="form-control" placeholder="Agregar Fecha" value="<?php echo $date;?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

<?php include("../../template/footer.php"); ?>