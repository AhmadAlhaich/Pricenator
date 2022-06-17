<?php
require APP . 'model/categoryfd.php';

/**
 * Class Categories
 *
 */
class Categoryfd extends Controller
{
    public function index ()
    {
        $this->model = new Categoryfds($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/categoryfd/index.php';
                require APP . 'view/_templates/footer.php';

    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Categoryfds($this->db);
            $this->model->save();
        }
        header('location: ' . URL . 'categoryfd/index');
    }
        public function update ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Categoryfds($this->db);
            $this->model->update();
        }
        header('location: ' . URL . 'categoryfd/index');
    }




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new Categoryfds($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'categoryfd/index');
    }


    public function edit ($id)
    {
        $this->model = new Categoryfds($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/categoryfd/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}