
<div class="container">
<form method="POST" action="<?php echo URL; ?>testa/indexbyid" id="form"
          onsubmit="return validation()" >
    <input type="hidden" name="GETid" value="">
        <p>
        <b> Type The id for Search ....</b>
    </p>
        <p>
        <input type="text" name="roomid" placeholder="Name *" class="form-control" value="" required>
    </p> 
    <p>
        <input type="submit" name="submit_search" value="Search" class="btn btn-primary form-control">
    </p>

    </form>



 <div class="row">




        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Food/Drink</div>

                <div class="panel-body">






        <table class="table table-bordered">
            <tr class="first-row">
                <th>Food/Drink Name</th>
                <th>Quantity</th>
                <th>Room ID</th>
                  <th>Price 1</th>
            </tr>
            <tbody>
            <?php


            foreach ( $data as $item ) {

                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->food_drink_name);  ?></td>
                    <td><?php echo htmlspecialchars($item->quantity); ?></td>
                    <td><?php echo htmlspecialchars($item->room_id); ?></td>
                        <td><?php echo htmlspecialchars($item->p); ?> $</td>
                </tr>
           <?php     
            } ?>
            </tbody>
        </table>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="panel panel-default">
                <div class="panel-heading">Bathes</div>

                <div class="panel-body">

        <table class="table table-bordered">
            <tr class="first-row">
                <th>Bathes Name</th>
                <th>Room ID</th>
              
                
            </tr>
            <tbody>
            <?php
            foreach ( $data1 as $item ) {

                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->bathes_name); ?></td>
                    <td><?php echo htmlspecialchars($item->room_id); ?></td>
                   
                </tr>
           <?php     
            } ?>
            </tbody>
        </table>
                </div>
            </div>
        </div> 
                 <div class="col-md-3 ">
            <div class="panel panel-default">
                <div class="panel-heading">Extra Services</div>

                <div class="panel-body">

        <table class="table table-bordered">
            <tr class="first-row">
                <th>Extra Services</th>
                <th>Room ID</th>
                 <th>Price </th>
            </tr>
            <tbody>
            <?php
            foreach ( $data2 as $item ) {

                ?>
                <tr>
                    
                    <td><?php echo htmlspecialchars($item->extra_services_name); ?></td>
                    <td><?php echo htmlspecialchars($item->room_id); ?></td>
    <td><?php echo htmlspecialchars($item->p); ?></td>
                </tr>
           <?php     
            } ?>
            </tbody>
        </table>
                </div>
            </div>
        </div> 

                        <div class="col-md-3 ">
            <div class="panel panel-default">
                <div class="panel-heading">Maintenance</div>

                <div class="panel-body">

        <table class="table table-bordered">
            <tr class="first-row">
                <th>Maintenance</th>
                <th>Room ID</th>
   
            </tr>
            <tbody>
            <?php
            foreach ( $data3 as $item ) {

                ?>
                <tr>
                    
                    <td><?php echo htmlspecialchars($item->maintenance_name); ?></td>
                    <td><?php echo htmlspecialchars($item->room_id); ?></td>
                </tr>
           <?php     
            } ?>
            </tbody>
        </table>
                </div>
            </div>
        </div> 

    </div>
        </div>