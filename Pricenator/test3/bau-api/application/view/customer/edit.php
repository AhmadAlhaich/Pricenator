<?php
if ($item != null) {
    $customer_id = htmlspecialchars($item->customer_id);
    $name = htmlspecialchars($item->name);
    $phonenumber = htmlspecialchars($item->phonenumber);
} else {
    $customer_id = 0;
    $name = "" ; 
    $phonenumber = "";
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Customer</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>customer/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $customer_id ?>">
        <p>
        <b>Add Customer Name</b>
    </p>
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="<?= $name ?>" required>
    </p> 
    <p>
        <b>Add Phone Number</b>
    </p>
        <p>
        <input type="text" name="phonenumber" placeholder="Phone Number *" class="form-control" value="<?= $phonenumber ?>" required>
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