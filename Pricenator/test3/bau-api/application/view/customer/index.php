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
                <div class="panel-heading">Customer</div>

                <div class="panel-body">
<form method="POST" action="<?php echo URL; ?>customer/save" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="">
        <p>
        <b>Add Customer Name</b>
    </p>
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="" required>
    </p> 
    <p>
        <b>Add Phone Number</b>
    </p>
        <p>
        <input type="text" name="phonenumber" placeholder="Phone Number *" class="form-control" value="" required>
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
                <th>Customer_ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th colspan="2"><?= $lang['Action'] ?></th>
            </tr>
            <tbody>
            <?php
            $counter = 0;
            foreach ( $data as $item ) {

                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->customer_id); ?></td>
                    <td><?php echo htmlspecialchars($item->name); ?></td>
                    <td><?php echo htmlspecialchars($item->phonenumber); ?></td>
                    <td>
                        <a class="btn btn-primary form-control" href="<?php echo URL . 'customer/edit/' . htmlspecialchars($item->customer_id); ?>">Edit</a>
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
                                       href="<?php echo URL . 'customer/delete/' . htmlspecialchars($item->customer_id); ?>"><?= $lang['Yes'] ?></a>
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