<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok4 extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
    function signout(){
        $this->session->sess_destroy();
        redirect("admin");
    }
	public function index()
	{
		if(_is_user_login($this)){
            redirect(_get_user_redirect($this));
        }else{
            
            $data = array("error"=>""); 

            if(isset($_POST))
            {

                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
                $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        	

        		}else
                {
                   
                    $q = $this->db->query("Select * from `users` where (`user_name`='".$this->input->post("user_name")."') and user_password='".md5($this->input->post("user_password"))."'  Limit 1");

                    
                   // print_r($q) ; 
                    if ($q->num_rows() > 0)
                    {
                        $row = $q->row(); 
                        if($row->user_status == "0")
                        {


                            $data["error"] =  "<script type='text/javascript'>
                                                    swal({   
                                                            title: '',   
                                                            text: 'User belum aktif',   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                        });
                                            </script>";
                        }
                        else
                        {
                            $newdata = array(
                                                    
                                                   'user_name'  => $row->user_name,
                                                   'logged_in' => TRUE,
                                                   'user_id'=>$row->user_id,
                                                   'user_type_id'=>$row->user_type_id
                                                  );

      
                
                            $this->session->set_userdata($newdata);
                            redirect(_get_user_redirect($this));
                         
                        }
                    }
                    else
                    {
                        
                         $data["error"] = "<script type='text/javascript'>
                                                    swal({   
                                                            title: '',   
                                                            text: 'Username atau Password salah',   
                                                            type: 'warning',   
                                                            showCancelButton: false,   
                                                            confirmButtonColor: '#DD6B55',   
                                                            confirmButtonText: 'OK', 
                                                            closeOnConfirm: false 
                                                        });
                                            </script>";
                    }
                   
                    
                }
            }
            $data["active"] = "login";
            
            $this->load->view("admin/login",$data);
        }
	}
 

     
    public function dashboard(){
        if(_is_user_login($this)){
            $data = array();


            




            $this->load->view("kelompok4/dashboard",$data);
          
        }
    }

    public function add_randis(){

        if(_is_user_login($this)){
            $data = array();

            $this->load->model("kelompok4_model");
            $data["merk"] = $this->kelompok4_model->get_merek_randis();
            $data["silinder"] = $this->kelompok4_model->get_silinder_randis();
            $data["type"] = $this->kelompok4_model->get_type_kendaraan();
            $data["jabatan"] = $this->kelompok4_model->get_jabatan();
            $data["jenis"] = $this->kelompok4_model->get_jenis_randis();


            $this->load->view("kelompok4/add_randis",$data);
          
        }

    }

   
   public function list_randis(){

            if(_is_user_login($this)){
            $data = array();
            $this->load->model("kelompok4_model");
            $data["data_randis"] =   $this->kelompok4_model->get_all_randis_filter_by_flag_del();

            
        

            $this->load->view("kelompok4/list_randis",$data);
          
        }

   }
 
    

   
}
