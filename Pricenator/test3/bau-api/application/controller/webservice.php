<?php
require APP . 'model/api.php';

/**
 * Class webservice
 *
 */
class webservice extends Controller
{

  
         

            public function get_all_categories()
          {
            try
            {
              $this->model = new Api($this->db);
              $items = $this->model->get_all_categories();
              foreach($items as $item)
              {
                 $data[] = array('id'=>$item->id,'name'=>$item->name,
                  'slug'=>$item->slug
                  /** hon iza mtl name bhot l esem l mawjod 3nde bl data base li baaad l sahem **/
                );
              }
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$data));
              echo $response;
            }
            catch(\Exception $e)
            {$response = json_encode(array('success'=>'0' ,'message' => 'Unexpected Error, please try again later', 'title'=>'Error'));
              echo $response;
            }
          }

      public function get_all_product()
          {
            try
            {
              $this->model = new Api($this->db);
              $items = $this->model->get_all_product();
              foreach($items as $item)
              {
                 $data[] = array('id'=>$item->id,'shop_id '=>$item->shop_id 
                  ,'category_id  '=>$item->category_id ,'name  '=>$item->name ,'slug '=>$item->slug ,'price '=>$item->price
                  ,'thumbnail'=>$item->thumbnail  ,'description  '=>$item->description  ,'is_verified  '=>$item->is_verified 
                    ,'published_at   '=>$item->published_at  
                  /** hon iza mtl name bhot l esem l mawjod 3nde bl data base li baaad l sahem **/
                );
              }
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$data));
              echo $response;
            }
            catch(\Exception $e)
            {$response = json_encode(array('success'=>'0' ,'message' => 'Unexpected Error, please try again later', 'title'=>'Error'));
              echo $response;
            }
          }

     
      public function search_on_product_by_slug_or_name()
          {
    

            try
            {
              $this->model = new Api($this->db);
              $name = $_GET['name'];
             $slug= $_GET['slug'];
              $items = $this->model->search_on_product_by_slug_or_name($name,$slug);
$data[] = 'no data';
              foreach($items as $item)
              {
                 $data[] = array('id'=>$item->id,'shop_id '=>$item->shop_id 
                  ,'category_id  '=>$item->category_id ,'name  '=>$item->name ,'slug '=>$item->slug ,'price '=>$item->price
                  ,'thumbnail'=>$item->thumbnail  ,'description  '=>$item->description  ,'is_verified  '=>$item->is_verified 
                    ,'published_at   '=>$item->published_at  
                  /** hon iza mtl name bhot l esem l mawjod 3nde bl data base li baaad l sahem **/
                );
              }
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$data));
              echo $response;
            }
            catch(\Exception $e)
            {$response = json_encode(array('success'=>'0' ,'message' => 'Unexpected Error, please try again later', 'title'=>'Error'));
              echo $response;
            }
          }




public function insert_product( )
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_product($_POST['shop_id'],$_POST['category_id'],$_POST['name'],$_POST['slug'],$_POST['price'],$_POST['phonenumber'],$_POST['thumbnail'],$_POST['description'],$_POST['is_verified']);  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }
       


public function update_product( )
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->update_product($_POST['id'],$_POST['shop_id'],$_POST['category_id'],$_POST['name'],$_POST['slug'],$_POST['price'],$_POST['phonenumber'],$_POST['thumbnail'],$_POST['description'],$_POST['is_verified']);  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }
       







public function insert_comment()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_comment($_POST['product_id']  ,$_POST['user_id'] ,$_POST['body'] );  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }

public function insert_user()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_user($_POST['username'],$_POST['name'] ,$_POST['email'],$_POST['email_verified_at'] ,$_POST['password']);  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }


          public function login_user()
          {
            try
            {
              $this->model = new Api($this->db);
              $items = $this->model->login_user($_POST['username'], $_POST['password']);

         if (empty($items) ){
  $msg='UserNameOrPassWordError';
   
} else {

    $msg='success';
   
  
}
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'msg'=>$msg));
              echo $response;
            }
            catch(\Exception $e)
            {$response = json_encode(array('success'=>'0' ,'message' => 'Unexpected Error, please try again later', 'title'=>'Error'));
              echo $response;
            }
          }




          public function login_owner()
          {
            try
            {
              $this->model = new Api($this->db);
              $items = $this->model->login_owner($_POST['email'], $_POST['password']);

         if (empty($items) ){
  $msg='UserNameOrPassWordError';
   
} else {

    $msg='success';
   
  
}
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'msg'=>$msg));
              echo $response;
            }
            catch(\Exception $e)
            {$response = json_encode(array('success'=>'0' ,'message' => 'Unexpected Error, please try again later', 'title'=>'Error'));
              echo $response;
            }
          }

  public function insert_confirms()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_confirms($_POST['user_id'] , $_POST['product_id'] );  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }


public function insert_upvotes()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_upvotes($_POST['user_id'] , $_POST['product_id'] );  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }

public function insert_owner_shops()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->insert_owner_shops($_POST['name'] , $_POST['email'], $_POST['password'],$_POST['phone_owner'], $_POST['nameShops'], $_POST['emailShops'], $_POST['country'], $_POST['city'], $_POST['street'],  $_POST['phone'] );  /** hon asme li 3am bst2balon w ab3aton 3ala api datbase **/

              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }
          
          

          


  public function delete_from_product()
          {
            try
            {
              $this->model = new Api($this->db);
              $id = $this->model->delete_from_product($_POST ['id']);  
              $response = json_encode(array('success'=>'1' ,'message' => 'Received', 'title'=>'Success', 'data'=>$id));
              echo $response;
            }
            catch(\Exception $e)
            {
              echo 0;
            }
          }







}
