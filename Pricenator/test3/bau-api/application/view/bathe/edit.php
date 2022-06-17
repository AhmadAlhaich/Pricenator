<?php
if ($item != null) {
    $bathes_id = htmlspecialchars($item->bathes_id);
    $bathes_name = htmlspecialchars($item->bathes_name);
    
} else {

    $bathes_id = 0 ;
    $bathes_name = "";
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Bathes</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>bathe/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $bathes_id ?>">
        <p>
        <b>Add Bathes Name</b>
    </p>
        <p>
        <input type="text" name="bathes_name" placeholder="Name *" class="form-control" value="<?= $bathes_name?>" required>
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