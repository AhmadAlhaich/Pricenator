<?php
require APP . 'model/foodDrink.php';
require APP . 'model/categoryfd.php';
/**
 * Class Categories
 *
 */
class FoodDrink extends Controller
{
    public function index ()
    {
        $this->model = new FoodDrinks($this->db);
        $data = $this->model->getAll();
        $this->modelCategory = new Categoryfds($this->db);
        $dataCategory = $this->modelCategory->getAll();

    // echo "data count = ".count($data);

                require APP . 'view/_templates/header.php';
                require APP . 'view/foodDrink/index.php';
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

          $this->model = new FoodDrinks($this->db);
            $this->model->save($pic_name);
            header('location: ' . URL . 'foodDrink/index');
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
          $this->model = new FoodDrinks($this->db);
          $this->model->update($pic_name);
            header('location: ' . URL . 'foodDrink/edit/'.$_POST['GETid']);
        }
        else{
            $pic_name="";
            $this->model = new FoodDrinks($this->db);
            $this->model->update($pic_name);
            header('location: ' . URL . 'foodDrink/edit/'.$_POST['GETid']);

        }
        
    }
}




    public function delete ($id)
    {
        if (isset($id)) {
            $this->model = new FoodDrinks($this->db);
            $this->model->delete($id);
        }
        header('location: ' . URL . 'foodDrink/index');
    }


    public function edit ($id)
    {
        $this->model = new FoodDrinks($this->db);
        $this->modelCategory = new Categoryfds($this->db);
        $dataCategory = $this->modelCategory->getAll();

        if (isset($id)) {
            $item = $this->model->Load($id);
        } else {
            $item = null;
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/foodDrink/edit.php';
        require APP . 'view/_templates/footer.php';
    }
}