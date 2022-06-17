<?php
class Api
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }



  

    public function get_all_categories()
    {
        $sql = "SELECT id, name , slug 
        
         FROM categories" ;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }



    
   

 
      public function get_all_product()
    {
        $sql = "SELECT id , shop_id , category_id ,name , slug , price , thumbnail , description , is_verified ,published_at FROM `products` ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
 



    public function search_on_product_by_slug_or_name($slug, $name){
        $sql = "SELECT id , shop_id , category_id ,name , slug , price , thumbnail , description , is_verified ,published_at FROM products where name LIKE  '%".$name."%' OR slug LIKE  '%".$slug."%' ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
   

   public function insert_product($shop_id , $category_id ,$name ,$slug ,$price ,$thumbnail ,$description ,$is_verified )
  {
          $sql =  "INSERT INTO  products (  shop_id ,  category_id ,  name ,  slug ,  price ,  thumbnail ,  description ,  is_verified  , created_at) VALUES  ('".$shop_id."','".$category_id."','".$name."','".$slug."','".$price."','".$thumbnail."','".$description."','".$is_verified."' , now())";
          $query = $this->db->prepare($sql);
          $query->execute();
          $lastId = $this->db->lastInsertId();
          return $lastId;
  }


  public function update_product( $id , $shop_id , $category_id ,$name ,$slug ,$price ,$thumbnail ,$description ,$is_verified ){



  $sql =  "Update  products  set shop_id = '" . $shop_id  ."' ,  category_id = '" .$category_id. "' , name = '". $name ."'  , slug = '" .$slug ."' ,  price = '".$price ."' , thumbnail = '".$thumbnail ."' ,description = '".$description ."' , is_verified = '".$is_verified ."'    where id = " .$id ."";

     $query = $this->db->prepare($sql);
  $query->execute();
  }






public function insert_comment($product_id,$user_id,$body){
$sql =  "INSERT INTO  comments (   product_id ,  user_id ,  body ,created_at )VALUES  ('".$product_id."','".$user_id."','".$body."' , now())";
$query = $this->db->prepare($sql);
          $query->execute();
          $lastId = $this->db->lastInsertId();
          return $lastId;

}


public function insert_user($username , $name , $email, $email_verified_at  , $password  ){
$sql =  "INSERT INTO  users ( username ,  name ,  email ,  email_verified_at ,  password , created_at ) VALUES  ('".$username."','".$name."','".$email."','".$email_verified_at."','".$password."' , now())";
$query = $this->db->prepare($sql);
          $query->execute();
          $lastId = $this->db->lastInsertId();
          return $lastId;

}

public function insert_owner_shops($name , $email ,$password ,$phone_owner , $nameShops , $emailShops , $country ,$city ,$street ,$phone  ){




   $sql = "
SELECT AUTO_INCREMENT
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE 
       TABLE_NAME   = 'owners';";
      $query = $this->db->prepare($sql);
      $query->execute();

    $lastIdOwner =      $query->fetch()->AUTO_INCREMENT;



$sql2 =  "   START TRANSACTION;   INSERT INTO  owners ( name ,  email ,  password , phone , created_at ) VALUES  ('".$name."','".$email."','".$password."','".$phone."'  , now()) ; 



INSERT INTO    shops (  owner_id ,  name ,  email ,  country ,  city ,  street ,  phone ,  created_at  )  VALUES  ('".$lastIdOwner."','".$nameShops."','".$emailShops."','".$country."','".$city."','".$street."','".$phone."'  , now()) ; COMMIT;



";




$query2 = $this->db->prepare($sql2);
          $query2->execute();
          
        


   $sql = "
SELECT id FROM owners ORDER by
id
DESC ";
      $query = $this->db->prepare($sql);
      $query->execute();

    $idOwers =      $query->fetch()->id;


if($idOwers == $lastIdOwner ) {
  return "success";
}
else{
  return "duplicate entry ";
}

         








}


 public function login_user($username , $password){ 
      $sql = "SELECT  username ,password  FROM users  
      where UserName ='" .$username."'   and  PASSWORD ='".$password."' ";
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }


 public function login_owner($email , $password){ 
      $sql = "SELECT  email ,password  FROM owners  
      where email ='" .$email."'   and  PASSWORD ='".$password."' ";
      $query = $this->db->prepare($sql);
      $query->execute();

      return $query->fetchAll();
    }

 

public function insert_confirms($user_id ,$product_id){

$sql =  "INSERT INTO  confirms (  user_id ,product_id ,  created_at  ) VALUES  ('".$user_id."','".$product_id."' , now())";
$query = $this->db->prepare($sql);
          $query->execute();
          $lastId = $this->db->lastInsertId();
          return $lastId;

}



public function insert_upvotes($user_id ,$product_id){

$sql =  "INSERT INTO  upvotes (  user_id ,product_id ,  created_at  ) VALUES  ('".$user_id."','".$product_id."' , now())";
$query = $this->db->prepare($sql);
          $query->execute();
          $lastId = $this->db->lastInsertId();
          return $lastId;

}


public function delete_from_product($id){
    $sql =" delete from products where id ='".$id."'" ; 
    $query = $this->db->prepare($sql);
    $query->execute();
    return 'delete success';
}









}
