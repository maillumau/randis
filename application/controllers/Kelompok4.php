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


            if($_POST){

                        $file_name="";
                        $config['upload_path'] = './uploads/foto_mobil/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $new_name = $this->input->post("NO_PLAT").$this->input->post("MERK");
                        $config['file_name'] = $new_name;
                        $this->load->library('upload', $config);

                    

                        

                        if($_FILES["foto_mobil"]["size"] > 0)

                                if ( ! $this->upload->do_upload('foto_mobil')){
                                    $error = array('error' => $this->upload->display_errors());
                        
                                }else{
                                    $this->upload->data();

       
                                    $path = $_FILES['foto_mobil']['name'];
                                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                                    
                                } 

                                $JABATAN = $this->input->post("JABATAN");
                                $NO_PLAT = $this->input->post("NO_PLAT");
                                $NO_RANGKA = $this->input->post("NO_RANGKA");
                                $NO_MESIN = $this->input->post("NO_MESIN");
                                $JENIS = $this->input->post("JENIS");
                                $TYPE = $this->input->post("TYPE");
                                $MERK = $this->input->post("MERK");
                                $SILINDER = $this->input->post("SILINDER");
                                $TAHUN = $this->input->post("TAHUN");

                                $GAMBAR = $NO_PLAT.$MERK.'.'.$ext;
                            
 
            
                            
                                $this->load->model("common_model");
                                $this->common_model->data_insert("randis",
                                    array(
                                    "JABATAN" => $JABATAN,
                                    "NO_PLAT" => $NO_PLAT,
                                    "NO_RANGKA" => $NO_RANGKA,
                                    "NO_MESIN" => $NO_MESIN,
                                    "JENIS" => $JENIS,
                                    "TYPE" => $TYPE,
                                    "MERK" => $MERK,
                                    "SILINDER" => $SILINDER,
                                    "TAHUN" => $TAHUN,
                                    "GAMBAR" => $GAMBAR,
                                    'flag_del' => 0
                                    ));


                        $data["sukses"] =  "data berhasil disimpan";


            }



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
 


     public function cetak_QR(){



        if ($_POST['no_plat']) {


            $no_plat = $_POST['no_plat'];

             $this->load->library('ciqrcode'); //pemanggilan library QR CODE
     
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './uploads/foto_qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
     
            $image_name=$no_plat.'.png'; //buat name dari qr code sesuai dengan no_plat
     
            $params['data'] = $no_plat; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $data = array( 'data'=>array('sukses',$no_plat));
            echo json_encode($data);
            
        }



       
     }



    function delete($id){ 

        $this->db->query("update data_randis set flag_del = 1 where NO = '".$id."'");
        redirect("kelompok4/list_randis");
           
    }

   
}

