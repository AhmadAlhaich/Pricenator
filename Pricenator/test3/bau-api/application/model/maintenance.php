<?php


class Maintenances

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
        $sql = "SELECT * FROM maintenance";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM maintenance WHERE maintenance_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM maintenance WHERE maintenance_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ()
    {


            $sql = "INSERT INTO maintenance (maintenance_name) VALUES (:maintenance_name)";
            $query = $this->db->prepare($sql);
            $parameters = array(':maintenance_name' => $_POST['maintenance_name']);
        
                

        $query->execute($parameters);
    
}
public function update (){

            $sql = "UPDATE maintenance SET maintenance_name = :maintenance_name WHERE maintenance_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':maintenance_name' => $_POST['maintenance_name'],':GETid' => $_POST['GETid']);
        
$query->execute($parameters);

}

}