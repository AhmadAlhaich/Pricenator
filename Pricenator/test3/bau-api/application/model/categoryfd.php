<?php


class Categoryfds

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
        $sql = "SELECT * FROM category_food_drink";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM category_food_drink WHERE category_food_drink_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM category_food_drink WHERE category_food_drink_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ()
    {


            $sql = "INSERT INTO category_food_drink (category_food_drink_name) VALUES (:category_food_drink_name)";
            $query = $this->db->prepare($sql);
            $parameters = array(':category_food_drink_name' => $_POST['category_food_drink_name']);
        
                

        $query->execute($parameters);
    
}
public function update (){

            $sql = "UPDATE category_food_drink SET category_food_drink_name = :category_food_drink_name WHERE category_food_drink_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':category_food_drink_name' => $_POST['category_food_drink_name'],':GETid' => $_POST['GETid']);
        
$query->execute($parameters);

}

}