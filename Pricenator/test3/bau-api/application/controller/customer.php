<?php
require APP . 'model/customer.php';

/**
 * Class Categories
 *
 */
class Customer extends Controller
{
    public function index ()
    {
        $this->model = new Customers($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/customer/index.php';
                require APP . 'view/_templates/footer.php';

    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Customers($this->db);
            $this->model->save();
        }
        header('location: ' . URL . 'customer/index');
    }
        public function update ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Customers($this->db);
            $this->model->update();
        }
        header('location: ' . URL . 'customer/index');
    }




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new Customers($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'customer/index');
    }


    public function edit ($id)
    {
        $this->model = new Customers($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/customer/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}