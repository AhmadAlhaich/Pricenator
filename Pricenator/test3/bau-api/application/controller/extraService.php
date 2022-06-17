<?php
require APP . 'model/extraService.php';

/**
 * Class Categories
 *
 */
class ExtraService extends Controller
{
    public function index ()
    {
        $this->model = new ExtraServices($this->db);
        $data = $this->model->getAll();

                require APP . 'view/_templates/header.php';
                require APP . 'view/extraService/index.php';
                require APP . 'view/_templates/footer.php';

    }

    public function save ()
    {
        if (isset($_POST["submit_add_edit"])) {
            if($_FILES['image']['size'] != Null){
        $pic_name = $_FILES['image']['name'];
        $pic = $_FILES['image']['name'];
        $pic_loc = $_FILES['image']['tmp_name'];
        $folder="../public/Images/";
        move_uploaded_file($pic_loc,$folder.$pic);
/*$pic_name = $_FILES['image']['name'];
$pic = $pic_name;
$path = URL .'uploads/'.$pic;
move_uploaded_file($pic, $path);*/

          $this->model = new ExtraServices($this->db);
            $this->model->save($pic_name);
            header('location: ' . URL . 'extraService/index');
        }    
    }
    
    }
        public function update ()
    {
                    
       if (isset($_POST["submit_add_edit"])) {
       if($_FILES['image']['size'] != Null){
        $pic_name = $_FILES['image']['name'];
        $pic = $_FILES['image']['name'];
        $pic_loc = $_FILES['image']['tmp_name'];
        $folder="../public/Images/";
        move_uploaded_file($pic_loc,$folder.$pic);
          $this->model = new ExtraServices($this->db);
            $this->model->update($pic_name);
            header('location: ' . URL . 'extraService/edit/'.$_POST['GETid']);
        }
        else{
            $pic_name="";
            $this->model = new ExtraServices($this->db);
            $this->model->update($pic_name);
            header('location: ' . URL . 'extraService/index');

        }
        
    }
}




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new ExtraServices($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'extraService/index');
    }


    public function edit ($id)
    {
        $this->model = new ExtraServices($this->db);

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/extraService/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}