<?php
require APP . 'model/bathe.php';

/**
 * Class Categories
 *
 */
class Bathe extends Controller
{
    public function index ()
    {
        $this->model = new Bathes($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/bathe/index.php';
                require APP . 'view/_templates/footer.php';

    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Bathes($this->db);
            $this->model->save();
        }
        header('location: ' . URL . 'bathe/index');
    }
        public function update ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Bathes($this->db);
            $this->model->update();
        }
        header('location: ' . URL . 'bathe/index');
    }




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new Bathes($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'bathe/index');
    }


    public function edit ($id)
    {
        $this->model = new Bathes($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/bathe/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}