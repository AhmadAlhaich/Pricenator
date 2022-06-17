<script>
    function alert(number) {
        s = "alertdiv".concat(number);
        document.getElementById(s).style.display = "block";
    }
    function back(number) {
        s = "alertdiv".concat(number);
        document.getElementById(s).style.display = "none";
    }
</script>
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Food Drink</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" action="<?php echo URL; ?>foodDrink/save" id="form"
          onsubmit="return validation()" >
        <p>
        <input type="text" name="food_drink_name" placeholder="Name *" class="form-control" value="" required>
    </p>
            <p>
        <input type="text" name="food_drink_descrption" placeholder="Description *" class="form-control" value="" required>
    </p>
    <p>           
        <input type="text" name="price" placeholder="Price *" class="form-control" value="" required>
    </p>
    <p>
                    <p>
        <b>Choose Categorie Food Drink</b>
    </p>
 
             <?php
                                    echo "<select class=\"form-control\" name=\"catID\">";
                                    foreach ($dataCategory as $item) {
             echo "<option value=\"".$item->category_food_drink_id."\">" .$item->category_food_drink_name. "</option>";
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
        <input type="file" name="image" class="form-control" required>
    </p>
    <p>
        <input type="submit" name="submit_add_edit" value="Save" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
<hr/>
  <div class="row">
        <div class="col-md-12 ">
        <table class="table table-bordered">
            <tr class="first-row">
                <th>Food/Drink ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th colspan="2"><?= $lang['Action'] ?></th>
            </tr>
            <tbody>
            <?php
            $counter = 0;
            foreach ( $data as $item ) {

                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->food_drink_id); ?></td>
                    <td><?php echo htmlspecialchars($item->food_drink_name); ?></td>
                    <td><?php echo htmlspecialchars($item->food_drink_descrption); ?></td>
                    <td><?php echo htmlspecialchars($item->price); ?></td>
                    <td>        <div class="panel-body" style="height:150px ; background: url('<?php echo URL . 'public/Images/'.$item->pic_url; ?>'); background-size: 200px; background-position: center center;background-repeat: no-repeat;">
    </div></td>
                    
                    <td>
                        <a class="btn btn-primary form-control" href="<?php echo URL . 'foodDrink/edit/' . htmlspecialchars($item->food_drink_id); ?>">Edit</a>
                    </td>
                    <td><a onclick="alert('<?= $counter ?>')" class="btn btn-danger form-control text-light">Delete</a></td>
                </tr>
                                <div class="example-modal">
                    <div id="alertdiv<?= $counter ?>" class="modal modal-warning" style="display:none">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center">Warning</h4>
                                </div>
                                <div class="modal-body">
                                    <p><?= $lang['Warning_Message'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" onclick="back('<?= $counter ?>')" class="btn btn-outline pull-left"
                                       data-dismiss="modal"><?= $lang['Cancel'] ?></a>
                                    <a type="button" class="btn btn-outline pull-right"
                                       href="<?php echo URL . 'foodDrink/delete/' . htmlspecialchars($item->food_drink_id); ?>"><?= $lang['Yes'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $counter++;
            } ?>
            </tbody>
        </table>
    </div>

            </div> 

</div>