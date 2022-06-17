<?php
require APP . 'model/testa.php';

/**
 * Class Categories
 *
 */
class Testa extends Controller
{
    public function index ()
    {
        $this->model = new Testas($this->db);
   $data = $this->model->getAll();
        $data1 = $this->model->getAll1();
        $data2 = $this->model->getAll2();
        $data3 = $this->model->getAll3();

                require APP . 'view/_templates/header.php';
                require APP . 'view/testa/index.php';
                require APP . 'view/_templates/footer.php';
    }



  public function indexbyid ()
    {

          if (isset($_POST["submit_search"])) {
   
                  
       $this->model = new Testas($this->db);
     $data = $this->model->getAllid($_POST['roomid']);
        $data1 = $this->model->getAllid1();
        $data2 = $this->model->getAllid2();
        $data3 = $this->model->getAllid3();
     
          


        }

                require APP . 'view/_templates/header.php';
                require APP . 'view/testa/index.php';
                require APP . 'view/_templates/footer.php';

        //  header('location: ' . URL . 'testa/p2');
    }












}
