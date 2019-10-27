<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
     public function __construct()
     {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                
                header('Content-type: text/json');
     }


 

    public function tampil_randis(){
              $data = array(); 
           
              $q = $this->db->query("select * from `randis`");
              $data["result"] = $q->result();
           
             echo json_encode($data);
    }

    public function tampil_randis_by($no_plat){
              $data = array(); 
           
              $q = $this->db->query("select * from `randis` where NO_PLAT = '$no_plat'");
              $data["result"] = $q->result();
           
             echo json_encode($data);
    }




    public function login_to_api($login){


      if ($login == 'login') {

              $this->load->library('form_validation');
              $this->form_validation->set_rules('username', 'Username', 'trim|required');
              $this->form_validation->set_rules('password', 'Password', 'trim|required');
              if ($this->form_validation->run() == FALSE) {
                        $data["responce"] = false;
                        $data["error"] = $this->form_validation->error_string();
              }else{    

                         $username = $this->input->post("username");
                         $password = md5($this->input->post("password"));

                       
                         $q = $this->db->query("select * from users where user_name ='$username' and user_password='$password'");
                         $user_data = $q->row();      
                         if (empty($user_data)){
                                $data['error'] = true; 
                                $data['message'] = 'Invalid username or password';
                               
                            } else {

                    
                                $id = $user_data->user_id;
                                $username =  $user_data->user_name;
                                $email = $user_data->email;

                                $user = array(
                                'id'=>$id, 
                                'username'=>$username, 
                                'email'=>$email
                                );
                                $data['error'] = false; 
                                $data['message'] = 'Login successfull'; 
                                $data['user'] = $user; 

                            }
                           
                        
               }
               echo json_encode($data); 

      } else {

            $data['error'] = true; 
            $data['message'] = 'Invalid Action.';
      }
     
      
    
    }


    public function tampil_data_by($no_reg){
              $data = array(); 
           
              $q = $this->db->query("SELECT * FROM kuatalmat WHERE noreg_baru='$no_reg'");
              $data["result"] = $q->result();
           
             echo json_encode($data);
    }


    public function tampil_data(){
              $data = array(); 
           
              $q = $this->db->query("SELECT * FROM kuatalmat");
              $data["result"] = $q->result();
           
             echo json_encode($data);
    }


    public function tampil_jml_bbm(){


              $data = array(); 
           
              die('Underconstruction');
           
             echo json_encode($data);



    }

  
 
}


?>