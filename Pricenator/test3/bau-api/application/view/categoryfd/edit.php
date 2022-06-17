<?php
if ($item != null) {
    $category_food_drink_id = htmlspecialchars($item->category_food_drink_id);
    $category_food_drink_name = htmlspecialchars($item->category_food_drink_name);
    
} else {

    $category_food_drink_id = 0 ;
    $category_food_drink_name = "";
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Category Food Drink</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>categoryfd/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $category_food_drink_id ?>">
        <p>
        <b>Add Category Food Drink</b>
    </p>
        <p>
        <input type="text" name="category_food_drink_name" placeholder="Name *" class="form-control" value="<?= $category_food_drink_name?>" required>
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