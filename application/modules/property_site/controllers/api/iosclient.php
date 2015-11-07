<?php defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH.'/libraries/REST_Controller.php';

class Iosclient extends CI_Controller
{

  	function __construct()
    {
        parent::__construct();
        $this->load->model(array('miosclient','mrestfull'));
    }

////
    // 9 Maret

    function getdetailimages()
    {
        $data = $this->miosclient->getBuildingImages();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    //

  function phpinfo()
  {

    $data = phpinfo();
    
    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }

  // added 5 Mar 2015

  function buildingfacilities()
  {
    $data = $this->miosclient->getBuildingFacilities();

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }

  function detailbuilding()
  {
    $data = $this->miosclient->getBuildingDetail();

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }
  //

  // added 4 Mar 2015

   function listbuildingfav()
  {
    
    $data = $this->miosclient->getNearestIosClient1();

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }

  function addfavorite()
  {
    $this->miosclient->addFav();
    $data = array('sukses');

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }

  function removefavorite()
  {
    $this->miosclient->removeFav();
    $data = array('sukses');

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }


  // added 3 Mar 2015

  function addfeedback()
  {

    //$id_user = $_POST['id_user'];
    $targetDir = "./uploads/feedback/";

    $filename_image1 = basename($_FILES['u_avatar']['name']);

    $targetDirCopy = "./uploads/feedback/";

    if($filename_image1 != ""){
        $target_image1 = $targetDir.$filename_image1;
    }

    if (move_uploaded_file($_FILES['u_avatar']['tmp_name'], $target_image1)) {
        //echo '[{"status":"Sukses gan", "id":"' . $id_user . '"}]';
        $this->miosclient->doFeedback($filename_image1);
        $data = array('sukses');
    } else {
        //echo '[{"status":"Anda belum beruntung, coba lagi gan"}]';
        $data = array('gagal');
    }

    

    $this->output->set_header("Access-Control-Allow-Origin:*")
                 ->set_content_type('application/json')
                 ->set_output(json_encode($data));
  }


// added 3 Mar 2015 //

  function editphone()
  {
    $username = $this->uri->segment(4);
    $phone    = $this->uri->segment(5);

    $this->db->select('id')
             ->from('users')
             ->where('email',$username);

    $query = $this->db->get();

    if($query->num_rows() > 0){
      //return $query->result();

      $id = $query->result()->row()->id;

      $data = array(
        'phone' => $phone
        );

      $this->ion_auth->update($id,$data);

      $info = array('update');
    }
    else{
      //return array();
      $info = array('gagal');
    }

    $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($info));
    
  }

  function editname()
  {
    $username = $this->uri->segment(4);
    $f_name   = $this->uri->segment(5);
    $l_name   = $this->uri->segment(6);

    $this->db->select('id')
             ->from('users')
             ->where('email',$username);

    $query = $this->db->get();

    if($query->num_rows() > 0){
      //return $query->result();

      $id = $query->result()->row()->id;

      $data = array(
        'first_name' => $f_name,
        'last_name'  => $l_name
        );

      $this->ion_auth->update($id,$data);

      $info = array('update');
    }
    else{
      //return array();
      $info = array('gagal');
    }

    $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($info));
    
  }

  function logout()
  {

    $this->ion_auth->logout();

    $data = array('logout');

    $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
  }

    function nearestiosclient()
    {
        $data = $this->mrestfull->getNearestIosClient();
        //$this->mrestfull->logActivity2();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));

    }


//

      // added 2 Mar 2015

function loginclient()
  {
      $key = "playstation4joss";
      $swift = $_POST['password'];//"DybvIybHAUaQBvZ6JzfTwHNBE8we8rR4sdFEth4QTSQ=";
      $identity = $_POST['username']; //"azisseno@icloud.com"; 

      if ( $swift && $identity ) {

      //$decrypt = $this->stripPadding($this->decrypt($swift, $key));

     
      $password = $this->stripPadding($this->decrypt($swift, $key));
      $remember = TRUE;

      
      $this->ion_auth->login($identity,$password,$remember);

      if($this->ion_auth->logged_in())
      {
        $first_name = $this->ion_auth->user()->row()->first_name;
        $last_name = $this->ion_auth->user()->row()->last_name;
        $email = $this->ion_auth->user()->row()->email;
        $phone = $this->ion_auth->user()->row()->phone;
        $avatar = $this->ion_auth->user()->row()->s_avatar;

        $data = array(
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'phone' => $phone,
          's_avatar' => $avatar
          );
      }else{
        $data = array('gagal');
      }

      }else{
        $data = array('gagal');
      }
      
      //echo "capek gua tau ga sih";

     // echo json_encode($decrypt);

      $this->output->set_header("Access-Control-Allow-Origin:*")
                   ->set_content_type('application/json')
                   ->set_output(json_encode($data));
  }


  function decrypt($ciphertext_base64, $key)
  {

      $ciphertext = base64_decode($ciphertext_base64);

      $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
      if (strlen($ciphertext) < $ivSize) {
      throw new Exception('Missing initialization vector');
      }

      $iv = substr($ciphertext, 0, $ivSize);
      $ciphertext = substr($ciphertext, $ivSize);

      $plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext, MCRYPT_MODE_CBC, $iv);
      //return $plaintext;
     //echo "decrypy berhasil dipanggil";

      return rtrim($plaintext, "\0");
  }
      
      
  function stripPadding($value)
  {
      $pad = ord($value[($len = strlen($value)) - 1]);
           // echo "stripPadding berhasil dipanggil";

      return $this->paddingIsValid($pad, $value) ? substr($value, 0, $len - $pad) : $value;
  }

  function paddingIsValid($pad, $value)
  {
      $beforePad = strlen($value) - $pad;
          //  echo "paddingIsValid berhasil dipanggil";

      return substr($value, $beforePad) == str_repeat(substr($value, -1), $pad);
  }



////
    // added 27 Feb 2015 //

    function feedback_apps()
    {
      $data = $this->mrestfull->sendFeedbackApps();
        
      $this->output->set_header("Access-Control-Allow-Origin:*")
                   ->set_content_type('application/json')
                   ->set_output(json_encode($data));
    }

    function checkusername() 
    {
      $username = $this->uri->segment(4);

      if($this->ion_auth->username_check($username)){
        $data = array('gagal');
      }else{
        $data = array('sukses');
      }
        
      $this->output->set_header("Access-Control-Allow-Origin:*")
                   ->set_content_type('application/json')
                   ->set_output(json_encode($data));
    }

    //

    // added 26 Feb 2015 //

    function register()
    {
      $username = $_POST['email'];
      $password = $_POST['password'];
      $email    = $_POST['email'];

      $additional_data = array(
          'first_name' => $_POST['f_name'],
          'last_name'  => ''
        );

      if($username && $password && $email && $additional_data){
        // if true
        $this->ion_auth->register($username,$password,$email,$additional_data);

        $data = array('sukses');
      }else{
        $data = array('gagal');
      }

      $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode([$data]));

    }

   //

  

    // added 25 Feb 2015 //

    //function loginclient2() // dropped
    //{

    //}

    //

    // added 24 Feb 2015 //

    function favorite()
    {
      $data = $this->mrestfull->getFavoriteData();
        
      $this->output->set_header("Access-Control-Allow-Origin:*")
                   ->set_content_type('application/json')
                   ->set_output(json_encode($data));
    }

    function nearestbuildingregistereduser()
    {
      $data = $this->mrestfull->getNearestIosClient2();
        
      $this->output->set_header("Access-Control-Allow-Origin:*")
                   ->set_content_type('application/json')
                   ->set_output(json_encode($data));
    }

    // EOL //

    //function getnearestbuilding()
    //{
    //    $data = $this->mrestfull->getBuildingImages();
        
    //    $this->output->set_header("Access-Control-Allow-Origin:*")
    //                 ->set_content_type('application/json')
    //                 ->set_output(json_encode($data));
    //}

    function contact()
    {
      if($_POST()){
        $this->miosclient->doContact();
        $data = array('sukses');
      }else{
        $data = array('gagal');
      }
        //$data = $this->mrestfull->doContact();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function feedback()
    {
        $data = $this->mrestfull->getBuildingImages();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function recentview()
    {
        $data = $this->miosclient->getVisit();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function forgotpassword()
    {
        $email = $this->uri->segment(4);

        if($this->ion_auth->username_check($email)){
          $this->ion_auth->forgotten_password($email);
          //$data = $this->mrestfull->getBuildingImages();
         $data = array('sukses');
      }else{
        $data = array('gagal');
      }

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function userprofile()
    {
        $data = $this->miosclient->getUserProfile();
        
        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($data));
    }

    function uploadimage()
    {
        $id_user = $_POST['id_user'];
        $targetDir = "./uploads/user/avatar/";

        $filename_image1 = basename($_FILES['u_avatar']['name']);

        $targetDirCopy = "./uploads/user/avatar/";

        if($filename_image1 != ""){
            $target_image1 = $targetDir.$filename_image1;
        }

        if (move_uploaded_file($_FILES['u_avatar']['tmp_name'], $target_image1)) {
            //echo '[{"status":"Sukses gan", "id":"' . $id_user . '"}]';
            $id = $id_user;
            $data = array(
              's_avatar' => $filename_image1
              );

            $this->ion_auth->update($id,$data);

            $pocky = array('sukses cok');
        } else {
            //echo '[{"status":"Anda belum beruntung, coba lagi gan"}]';
            $pocky = array('gagal cok');
        }
        

        $this->output->set_header("Access-Control-Allow-Origin:*")
                     ->set_content_type('application/json')
                     ->set_output(json_encode($pocky));
    }

}