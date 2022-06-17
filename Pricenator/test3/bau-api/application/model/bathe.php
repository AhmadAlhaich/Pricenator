<?php


class Bathes

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
        $sql = "SELECT * FROM bathes";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM bathes WHERE bathes_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM bathes WHERE bathes_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ()
    {


            $sql = "INSERT INTO bathes (bathes_name) VALUES (:bathes_name)";
            $query = $this->db->prepare($sql);
            $parameters = array(':bathes_name' => $_POST['bathes_name']);
        
                

        $query->execute($parameters);
    
}
public function update (){

            $sql = "UPDATE bathes SET bathes_name = :bathes_name WHERE bathes_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':bathes_name' => $_POST['bathes_name'],':GETid' => $_POST['GETid']);
        
$query->execute($parameters);

}

}
