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
                <div class="panel-heading">Category Food Drink</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>categoryfd/save" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="">
        <p>
        <b>Add Category Food Drink Name</b>
    </p>
        <p>
        <input type="text" name="category_food_drink_name" placeholder="Name *" class="form-control" value="" required>
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
                <th>category_food_drink_ID</th>
                <th>category_food_drink_Name</th>
                <th colspan="2"><?= $lang['Action'] ?></th>
            </tr>
            <tbody>
            <?php
            $counter = 0;
            foreach ( $data as $item ) {

                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->category_food_drink_id); ?></td>
                    <td><?php echo htmlspecialchars($item->category_food_drink_name); ?></td>
                    <td>
                        <a class="btn btn-primary form-control" href="<?php echo URL . 'categoryfd/edit/' . htmlspecialchars($item->category_food_drink_id); ?>">Edit</a>
                    </td>
                    <td><a onclick="alert('<?= $counter ?>')" class="btn btn-danger form-control text-light"><?= $lang['Delete'] ?></a></td>
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
                                       href="<?php echo URL . 'categoryfd/delete/' . htmlspecialchars($item->category_food_drink_id); ?>"><?= $lang['Yes'] ?></a>
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

</div>