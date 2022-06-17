<?php
require APP . 'model/room.php';

/**
 * Class Categories
 *
 */
class Room extends Controller
{
    public function index ()
    {
        $this->model = new Rooms($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/room/index.php';
                require APP . 'view/_templates/footer.php';
    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Rooms($this->db);
            $this->model->save();
        }
        header('location: ' . URL . 'room/index');
    }
        public function update ()
    {
        if (isset($_POST["submit_add_edit"])) {
            $this->model = new Rooms($this->db);
            $this->model->update();
        }
        header('location: ' . URL . 'room/index');
    }




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new Rooms($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'room/index');
    }


    public function edit ($id)
    {
        $this->model = new Rooms($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/room/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}
