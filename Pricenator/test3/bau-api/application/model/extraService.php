<?php


class ExtraServices

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
        $sql = "SELECT * FROM extra_services";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function Load ($id)
    {
        $sql = "SELECT * FROM extra_services WHERE extra_services_id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function delete ($id)
    {
        $sql = "DELETE FROM extra_services WHERE extra_services_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function save ($pic_name)
    {



/*$path ='../uploads/'.$pic_name ;
$uploadpath = $pic_name ;
move_uploaded_file($_FILES['image']['name'], $path);*/

            $sql = "INSERT INTO extra_services (extra_services_name,extra_services_price,pic_url,descrption) VALUES (:extra_services_name , :extra_services_price , :pic_name , :description )";
            $query = $this->db->prepare($sql);
            $parameters = array(':extra_services_name' => $_POST['extra_services_name'],
                ':extra_services_price' => $_POST['extra_services_price'],
                ':pic_name' => $pic_name,
                ':description' => $_POST['description']);
        
                

        $query->execute($parameters);
    
}
public function update ($pic_name){
if($pic_name == ""){
            $sql = "UPDATE extra_services SET extra_services_name = :extra_services_name , extra_services_price = :extra_services_price , descrption =  :description   WHERE extra_services_id = :GETid";
            $query = $this->db->prepare($sql);
                        $parameters = array(':extra_services_name' => $_POST['extra_services_name'],
                ':extra_services_price' => $_POST['extra_services_price'],
                'GETid' => $_POST['GETid'],
                ':description' => $_POST['description']);
}
else{
            $sql = "UPDATE extra_services SET extra_services_name = :extra_services_name , extra_services_price = :extra_services_price , pic_url = :pic_name , descrption =  :description   WHERE extra_services_id = :GETid";
            $query = $this->db->prepare($sql);
                        $parameters = array(':extra_services_name' => $_POST['extra_services_name'],
                ':extra_services_price' => $_POST['extra_services_price'],
                ':pic_name' => $pic_name,
                'GETid' => $_POST['GETid'],
                ':description' => $_POST['description']); }

        
$query->execute($parameters);

}

}