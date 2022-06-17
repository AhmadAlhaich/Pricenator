<?php
require APP . 'model/reservation.php';

/**
 * Class Categories
 *
 */
class Reservation extends Controller
{
    public function index ()
    {
        $this->model = new Reservations($this->db);
        $data = $this->model->getAll();
        $data1 = $this->model->getAll1();
        $data2 = $this->model->getAll2();
        $data3 = $this->model->getAll3();

                require APP . 'view/_templates/header.php';
                require APP . 'view/reservation/index.php';
                require APP . 'view/_templates/footer.php';
    }








}
