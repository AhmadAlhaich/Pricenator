<?php


class Rooms

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
        $sql = "SELECT * FROM room";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM room WHERE room_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM room WHERE room_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ()
    {


            $sql = "INSERT INTO room (room_id) VALUES (:room_id)";
            $query = $this->db->prepare($sql);
            $parameters = array(':room_id' => $_POST['room_id']);
        
                

        $query->execute($parameters);
    
}
public function update (){

            $sql = "UPDATE room SET room_id = :room_id WHERE room_id = :GETid";
            $query = $this->db->prepare($sql);
            $parameters = array(':room_id' => $_POST['room_id'],':GETid' => $_POST['GETid']);
        
$query->execute($parameters);

}

}
