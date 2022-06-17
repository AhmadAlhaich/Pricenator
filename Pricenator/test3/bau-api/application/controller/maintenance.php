<?php
require APP . 'model/maintenance.php';

/**
 * Class Categories
 *
 */
class Maintenance extends Controller
{
    public function index ()
    {
        $this->model = new Maintenances($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/maintenance/index.php';
                require APP . 'view/_templates/footer.php';
    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Maintenances($this->db);
            $this->model->save();
        }
        header('location: ' . URL . 'maintenance/index');
    }
        public function update ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Maintenances($this->db);
            $this->model->update();
        }
        header('location: ' . URL . 'maintenance/index');
    }




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new Maintenances($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'maintenance/index');
    }


    public function edit ($id)
    {
        $this->model = new Maintenances($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/maintenance/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}