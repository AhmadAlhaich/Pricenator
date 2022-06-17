<?php
if ($item != null) {
    $room_id = htmlspecialchars($item->room_id);
} else {
    $room_id = 0;
    
}
?>

<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Room</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>room/update" id="form"
          onsubmit="return validation()" >

    <input type="text" name="GETid" value="<?= $room_id ?>">
        <p>
        <b>Add Room ID</b>
    </p>
        <p>
        <input type="text" name="room_id" placeholder="Room id *" class="form-control" value="<?= $room_id ?>" required>
    </p> 
    <p>
        <input type="submit" name="submit_add_edit" value="Update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
<hr/>
</div>
