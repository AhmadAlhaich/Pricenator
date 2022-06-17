<?php
if ($item != null) {
    $extra_services_id = htmlspecialchars($item->extra_services_id);
    $extra_services_name = htmlspecialchars($item->extra_services_name);
    $extra_services_price = htmlspecialchars($item->extra_services_price);
    $pic_url = htmlspecialchars($item->pic_url);
    $description = htmlspecialchars($item->descrption);
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Update Extra Services</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" action="<?php echo URL; ?>extraService/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $extra_services_id ?>">
        <p>
        <input type="text" name="extra_services_name" placeholder="Name *" class="form-control" value="<?= $extra_services_name ?>" required>
    </p>
    <p>
                    <p>
        <input type="text" name="extra_services_price" placeholder="Price *" class="form-control" value="<?= $extra_services_price ?>" required>
    </p>
    </p>
    <p>
        <b>
            Choose a photo
        </b>
    </p>
    <p>
        <input type="file" name="image" class="form-control">
    </p>
    <p>
        <input type="text" name="description" placeholder="Description *" class="form-control" value="<?= $description ?>" required>
    </p>
    <p>
        <input type="submit" name="submit_add_edit" value="Update" class="btn btn-primary form-control">
    </p>
        <div class="panel-body" style="height:150px ; background: url('<?php echo URL . 'public/Images/'.$pic_url; ?>'); background-size: 100px; background-position: center center;background-repeat: no-repeat;">
    </div>

    </form>
                </div>
            </div>
        </div>
    </div>
</div>