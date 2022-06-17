<?php
if ($item != null) {
    $maintenance_id = htmlspecialchars($item->maintenance_id);
    $maintenance_name = htmlspecialchars($item->maintenance_name);
    
} else {

    $maintenance_id = 0 ;
    $maintenance_name = "";
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Maintenance</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>maintenance/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $maintenance_id ?>">
        <p>
        <b>Add Maintenance Name</b>
    </p>
        <p>
        <input type="text" name="maintenance_name" placeholder="Name *" class="form-control" value="<?= $maintenance_name?>" required>
    </p> 
    <p>
        <input type="submit" name="submit_add_edit" value="Update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
</div>