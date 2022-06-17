<?php


class Customers

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
        $sql = "SELECT * FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM customer WHERE customer_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM customer WHERE customer_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ()
    {


            $sql = "INSERT INTO customer (name,phonenumber) VALUES (:name , :phonenumber)";
            $query = $this->db->prepare($sql);
            $parameters = array(':name' => $_POST['name'] , ':phonenumber' => $_POST['phonenumber']);
        
                

        $query->execute($parameters);
    
}
public function update (){

            $sql = "UPDATE customer SET name = :name , phonenumber = :phonenumber  WHERE customer_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':name' => $_POST['name'], ':phonenumber' => $_POST['phonenumber'] ,':GETid' => $_POST['GETid']);
        
$query->execute($parameters);

}

}
