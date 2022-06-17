<?php
if ($item != null) {
    $food_drink_id = htmlspecialchars($item->food_drink_id);
    $food_drink_name = htmlspecialchars($item->food_drink_name);
    $price = htmlspecialchars($item->price);
    $pic_url = htmlspecialchars($item->pic_url);
    $food_drink_descrption = htmlspecialchars($item->food_drink_descrption);
    $catID = htmlspecialchars($item->category_food_drink_id);
    
}
?>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Update Food/Drink</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" action="<?php echo URL; ?>foodDrink/update" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="<?= $food_drink_id ?>">
        <p>
        <input type="text" name="food_drink_name" placeholder="Name *" class="form-control" value="<?= $food_drink_name ?>" required>
    </p>
            <p>
        <input type="text" name="food_drink_descrption" placeholder="Name *" class="form-control" value="<?= $food_drink_descrption ?>" required>
    </p>
    
                    <p>
        <input type="text" name="price" placeholder="Price *" class="form-control" value="<?= $price ?>" required>
    </p>
        <p>
                    <p>
        <b>Choose Categorie Food Drink</b>
    </p>
 
             <?php
                                    echo "<select class=\"form-control\" name=\"catID\">";
                                    foreach ($dataCategory as $item) {
             echo "<option value=\"".$item->category_food_drink_id."\"";
             if($item->category_food_drink_id == $catID ) {
                echo "selected";
             }

              echo ">" .$item->category_food_drink_name. "</option>";
                                    }
                                    echo "</select>";
                                ?> 
         
    
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