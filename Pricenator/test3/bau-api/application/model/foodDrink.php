<?php


class FoodDrinks

{
    /**
     * @param object $db A PDO database connection
     */
    function __construct ($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAll ()
    {
        $sql = "SELECT * FROM food_drink";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getCatName(){
        $sql = "SELECT * FROM category_food_drink";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM food_drink WHERE food_drink_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM food_drink WHERE food_drink_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ($pic_name)
    {



/*$path ='../uploads/'.$pic_name ;
$uploadpath = $pic_name ;
move_uploaded_file($_FILES['image']['name'], $path);*/

            $sql = "INSERT INTO food_drink (food_drink_name,food_drink_descrption,price,category_food_drink_id,pic_url) VALUES (:food_drink_name , :food_drink_descrption,:price ,:catID, :pic_name )";
            $query = $this->db->prepare($sql);
            $parameters = array(':food_drink_name' => $_POST['food_drink_name'],
                ':food_drink_descrption' => $_POST['food_drink_descrption'],
                ':pic_name' => $pic_name,
                ':catID' => $_POST['catID'],
                ':price' => $_POST['price']);
        
                

        $query->execute($parameters);
    
}
public function update ($pic_name){
if($pic_name == ""){
            $sql = "UPDATE food_drink SET food_drink_name = :food_drink_name , food_drink_descrption = :food_drink_descrption , price =  :price , category_food_drink_id = :catID    WHERE food_drink_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':food_drink_name' => $_POST['food_drink_name'],
                ':food_drink_descrption' => $_POST['food_drink_descrption'],
                ':catID' => $_POST['catID'],
                ':GETid' => $_POST['GETid'],
                ':price' => $_POST['price']);
}
else{
            $sql = "UPDATE food_drink SET food_drink_name = :food_drink_name , food_drink_descrption = :food_drink_descrption , price =  :price , category_food_drink_id = :catID ,pic_url = :pic_name   WHERE food_drink_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':food_drink_name' => $_POST['food_drink_name'],
                ':food_drink_descrption' => $_POST['food_drink_descrption'],
                ':pic_name' => $pic_name,
                ':catID' => $_POST['catID'],
                ':GETid' => $_POST['GETid'],
                ':price' => $_POST['price']);

        

}
$query->execute($parameters);
}
}