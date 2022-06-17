<?php


class Testas

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
        $sql = "select f.food_drink_name , fd.quantity  , res.room_id 
from reservation as res , food_drink_resrvation as  fd , food_drink as f
where res.room_id = 0 and  res.reservation_id= fd.resrvation_id and f.food_drink_id=fd.food_drink_id  group by food_drink_resrvation_id desc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
        public function getAll1 ()
    {
        $sql = "SELECT b.bathes_name ,r.room_id 
from reservation as r , bathes_resrvation as bathr , bathes as b 
where  r.room_id = 0 and r.reservation_id= bathr.resrvation_id and bathr.bathes_id=b.bathes_id    group by bathes_resrvation_id desc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
            public function getAll2 ()
    {
        $sql = "SELECT s.extra_services_name ,r.room_id from reservation as r , extra_services_resrvation as exr , extra_services as s where
r.room_id = 0 and
         r.reservation_id= exr.resrvation_id and exr.extra_services_id=s.extra_services_id  group by extra_services_resrvations_id  desc ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
            public function getAll3 ()
    {
        $sql = "SELECT m.maintenance_name ,r.room_id
from reservation as r , maintenance_resrvation as mr , maintenance as m
where
r.room_id = 0 and
r.reservation_id= mr.resrvation_id and mr.maintenance_id=m.maintenance_id  group by maintenance_resrvation_id desc  ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



    public function getAllid ()
    {
        $sql = "select f.food_drink_name , fd.quantity  , res.room_id ,   sum(f.price) * fd.quantity as p 
from reservation as res , food_drink_resrvation as  fd , food_drink as f
where  res.room_id = :roomid and    res.reservation_id= fd.resrvation_id and f.food_drink_id=fd.food_drink_id  group by food_drink_resrvation_id desc";
        $query = $this->db->prepare($sql);
        $parameters = array(':roomid' => $_POST['roomid']);

        $query->execute($parameters);
     

        return $query->fetchAll();
    }




    public function getAllid1 ()
    {
        $sql = "SELECT b.bathes_name ,r.room_id
from reservation as r , bathes_resrvation as bathr , bathes as b 
where     r.room_id =  :roomid and  r.reservation_id= bathr.resrvation_id and bathr.bathes_id=b.bathes_id    group by bathes_resrvation_id desc";
        $query = $this->db->prepare($sql);
            $parameters = array(':roomid' => $_POST['roomid']);

        $query->execute($parameters);
     

        return $query->fetchAll();
    }
            public function getAllid2 ()
    {
        $sql = "SELECT s.extra_services_name ,r.room_id

,  s.extra_services_price p 
         from reservation as r , extra_services_resrvation as exr , extra_services as s where


r.room_id =  :roomid  and 

         r.reservation_id= exr.resrvation_id and exr.extra_services_id=s.extra_services_id  group by extra_services_resrvations_id  desc ";
        $query = $this->db->prepare($sql);
         $parameters = array(':roomid' => $_POST['roomid']);

        $query->execute($parameters);

        return $query->fetchAll();
    }
            public function getAllid3 ()
    {
        $sql = "SELECT m.maintenance_name ,r.room_id
from reservation as r , maintenance_resrvation as mr , maintenance as m
where r.room_id=  :roomid  and  
r.reservation_id= mr.resrvation_id and mr.maintenance_id=m.maintenance_id  group by maintenance_resrvation_id desc  ";
        $query = $this->db->prepare($sql);
            $parameters = array(':roomid' => $_POST['roomid']);

        $query->execute($parameters);
     
        return $query->fetchAll();
    }

}
