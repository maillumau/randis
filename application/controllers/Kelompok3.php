<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok3 extends CI_Controller {
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


            




            $this->load->view("kelompok3/dashboard",$data);
          
        }
    }

    public function add_randis(){

        if(_is_user_login($this)){
            $data = array();

            $this->load->model("kelompok3_model");
            $data["merk"] = $this->kelompok3_model->get_merek_randis();
            $data["silinder"] = $this->kelompok3_model->get_silinder_randis();
            $data["type"] = $this->kelompok3_model->get_type_kendaraan();
            $data["jabatan"] = $this->kelompok3_model->get_jabatan();
            $data["jenis"] = $this->kelompok3_model->get_jenis_randis();


            if($_POST){

                        $file_name="";
                        $config['upload_path'] = './uploads/foto_mobil_kel3/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $new_name = $this->input->post("noreg_baru").$this->input->post("merek");
                        $config['file_name'] = $new_name;
                        $this->load->library('upload', $config);
                        $this->upload->overwrite = true;
                    

                        

                        if($_FILES["foto"]["size"] > 0)

                                if ( ! $this->upload->do_upload('foto')){
                                    $error = array('error' => $this->upload->display_errors());
                        
                                }else{
                                    $this->upload->data();

       
                                    $path = $_FILES['foto']['name'];
                                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                                    
                                } 

                                $noreg_lama = $this->input->post("noreg_lama");
                                $noreg_baru = $this->input->post("noreg_baru");
                                $no_rangka = $this->input->post("no_rangka");
                                $no_mesin = $this->input->post("no_mesin");
                                $jenis = $this->input->post("jenis");
                                $type = $this->input->post("type");
                                $merek = $this->input->post("merek");
                                $kubikasi = $this->input->post("kubikasi");
                                $tahun = $this->input->post("tahun");
                                $kondisi = $this->input->post("kondisi");
                                $pemegang = $this->input->post("pemegang");
                                $bahan_bakar = $this->input->post("bahan_bakar");
                                $foto = $noreg_baru.$merek.'.'.$ext;
                            
 
            
                            
                                $this->load->model("common_model");
                                $this->common_model->data_insert("kuatalmat",
                                    array(
                                    "noreg_lama" => $noreg_lama,
                                    "noreg_baru" => $noreg_baru,
                                    "no_rangka" => $no_rangka,
                                    "no_mesin" => $no_mesin,
                                    "jenis" => $jenis,
                                    "type" => $type,
                                    "merek" => $merek,
                                    "kubikasi" => $kubikasi,
                                    "tahun" => $tahun,
                                    "pemegang" => $pemegang,
                                    "foto" => $foto,
                                    "bahan_bakar" => $bahan_bakar,
                                    "tgl_buat"=>date("Y-m-d H:i:sa"),
                                    'flag_del' => 0
                                    ));


                        $data["sukses"] =  "data berhasil disimpan";


            }



            $this->load->view("kelompok3/add_randis",$data);
          
        }

    }

   
   public function list_randis(){

            if(_is_user_login($this)){
            $data = array();
            $this->load->model("kelompok3_model");
            $data["data_randis"] =   $this->kelompok3_model->get_all_randis_filter_by_flag_del();



            
        

            $this->load->view("kelompok3/list_randis",$data);
          
        }

   }


  public function list_edit_randis(){

            if(_is_user_login($this)){
            $data = array();
            $this->load->model("kelompok3_model");
            $data["data_randis"] =   $this->kelompok3_model->get_all_randis_filter_by_flag_del_order_by_time();

            
            $this->load->view("kelompok3/list_edit_randis",$data);
          
        }

   }
 


     public function cetak_QR(){



        if ($_POST['no_plat']) {


            $no_plat = $_POST['no_plat'];

             $this->load->library('ciqrcode'); //pemanggilan library QR CODE
     
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './uploads/foto_qrcode_kel3/'; //direktori penyimpanan qr code
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

            $data = array( 'data'=>array('sukses',$no_plat,'kelompok3'));
            echo json_encode($data);
            
        }



       
     }



    function delete($id){ 

        $this->db->query("update kuatalmat set flag_del = 1 where id = '".$id."'");
        redirect("kelompok3/list_randis");
           
    }


    public function add_jenis(){
        if(_is_user_login($this)){
           $this->load->model("kelompok3_model");
           $data = array();

           if($_POST){

                    $jenis = $this->input->post("jenis");
                    $kode = $this->input->post("kode");

                    $this->load->model("common_model");
                    $this->common_model->data_insert("jenisran",
                    array(
                                    "jenis" => $jenis,
                                    "kode" => $kode,
                                    'flag_del' => 0
                    ));
                    $data["sukses"] =  "data berhasil disimpan";
           }

           $data['jenis_kendaraan'] = $this->kelompok3_model->get_jenis_randis();


           $this->load->view("kelompok3/add_jenis",$data);
        }

    }

    public function add_type(){
        if(_is_user_login($this)){

            $data = array();

           $this->load->model("kelompok3_model");
           $data = array();

           if($_POST){

                    $type = $this->input->post("type");
                    $kode = $this->input->post("kode");

                    $this->load->model("common_model");
                    $this->common_model->data_insert("typeran",
                    array(
                                    "type" => $type,
                                    "kode" => $kode,
                                    'flag_del' => 0
                    ));
                    $data["sukses"] =  "data berhasil disimpan";
           }

           $data['tipe_kendaraan'] = $this->kelompok3_model->get_type_kendaraan();



           $this->load->view("kelompok3/add_type",$data);

        }
        
    }

    public function add_merk(){

        if(_is_user_login($this)){


            $data = array();


           $this->load->model("kelompok3_model");
           $data = array();

           if($_POST){

                    $merek = $this->input->post("merek");
                    $kode = $this->input->post("kode");

                    $this->load->model("common_model");
                    $this->common_model->data_insert("merekran",
                    array(
                                    "merek" => $merek,
                                    "kode" => $kode,
                                    'flag_del' => 0
                    ));
                    $data["sukses"] =  "data berhasil disimpan";
           }
           $data['merek_kendaraan'] = $this->kelompok3_model->get_merek_randis();


           $this->load->view("kelompok3/add_merk",$data);

        }
        
    }


    public function add_pemegang(){

        if(_is_user_login($this)){


            $data = array();


           $this->load->model("kelompok3_model");
           $data = array();

           if($_POST){

                    $pemegang = $this->input->post("pemegang");
                    $kode = $this->input->post("kode_pemegang");

                    $this->load->model("common_model");
                    $this->common_model->data_insert("pemegangran",
                    array(
                                    "pemegang" => $pemegang,
                                    "kode_pemegang" => $kode,
                                    'flag_del' => 0
                    ));
                    $data["sukses"] =  "data berhasil disimpan";
           }
           $data['pemegang_kendaraan'] = $this->kelompok3_model->get_jabatan();


           $this->load->view("kelompok3/add_pemegang",$data);

        }
        
    }

    public function delete_jenis($id){

        $this->db->query("update jenisran set flag_del = 1 where id = '".$id."'");
        redirect("kelompok3/add_jenis");

    }


    public function delete_tipe($id){

        $this->db->query("update typeran set flag_del = 1 where id = '".$id."'");
        redirect("kelompok3/add_type");

    }


   public function delete_merek($id){

        $this->db->query("update merekran set flag_del = 1 where id = '".$id."'");
        redirect("kelompok3/add_merk");

    }


    public function delete_pemegang($id){

        $this->db->query("update pemegangran set flag_del = 1 where id = '".$id."'");
        redirect("kelompok3/add_pemegang");

    }


    public function edit_randis($id){

        if(_is_user_login($this)){
            $data = array();

            $this->load->model("kelompok3_model");
            $data["merk"] = $this->kelompok3_model->get_merek_randis();
            $data["silinder"] = $this->kelompok3_model->get_silinder_randis();
            $data["type"] = $this->kelompok3_model->get_type_kendaraan();
            $data["jabatan"] = $this->kelompok3_model->get_jabatan();
            $data["jenis"] = $this->kelompok3_model->get_jenis_randis();

            $data['kuatalmat'] = $this->kelompok3_model->get_kuatalmat_by($id);


            if($_POST){

//var_dump($_POST); die();


                                if (empty($_FILES['foto']['size'])) {

                                    $noreg_lama = $this->input->post("noreg_lama");
                                    $noreg_baru = $this->input->post("noreg_baru");
                                    $no_rangka = $this->input->post("no_rangka");
                                    $no_mesin = $this->input->post("no_mesin");
                                    $jenis = $this->input->post("jenis");
                                    $type = $this->input->post("type");
                                    $merek = $this->input->post("merek");
                                    $kubikasi = $this->input->post("kubikasi");
                                    $tahun = $this->input->post("tahun");
                                    $kondisi = $this->input->post("kondisi");
                                    $pemegang = $this->input->post("pemegang");
                                    $bahan_bakar = $this->input->post("bahan_bakar");
                                    $foto =  $this->input->post("foto");

                                } else {

                                    $file_name="";
                                    $config['upload_path'] = './uploads/foto_mobil_kel3/';
                                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                    $new_name = $this->input->post("noreg_baru").$this->input->post("merek");
                                    $config['file_name'] = $new_name;
                                    $this->load->library('upload', $config);
                                    $this->upload->overwrite = true;

                                    if ( ! $this->upload->do_upload('foto')){
                                        $error = array('error' => $this->upload->display_errors());
                        
                                    }else{
                                        $this->upload->data();

       
                                        $path = $_FILES['foto']['name'];
                                        @$ext = pathinfo($path, PATHINFO_EXTENSION);
                                    
                                    } 

                                    $noreg_lama = $this->input->post("noreg_lama");
                                    $noreg_baru = $this->input->post("noreg_baru");
                                    $no_rangka = $this->input->post("no_rangka");
                                    $no_mesin = $this->input->post("no_mesin");
                                    $jenis = $this->input->post("jenis");
                                    $type = $this->input->post("type");
                                    $merek = $this->input->post("merek");
                                    $kubikasi = $this->input->post("kubikasi");
                                    $tahun = $this->input->post("tahun");
                                    $kondisi = $this->input->post("kondisi");
                                    $pemegang = $this->input->post("pemegang");
                                    $bahan_bakar = $this->input->post("bahan_bakar");
                                    $foto = $noreg_baru.$merek.'.'.@$ext;
                                }
                                
                            
 
            
                            
                                $this->load->model("common_model");
                                $update_array = array(
                                    "noreg_lama" => $noreg_lama,
                                    "noreg_baru" => $noreg_baru,
                                    "no_rangka" => $no_rangka,
                                    "no_mesin" => $no_mesin,
                                    "jenis" => $jenis,
                                    "type" => $type,
                                    "merek" => $merek,
                                    "kubikasi" => $kubikasi,
                                    "tahun" => $tahun,
                                    "pemegang" => $pemegang,
                                    "foto" => $foto,
                                    "kondisi"=>$kondisi,
                                    "bahan_bakar" => $bahan_bakar,
                                    "tgl_edit"=>date("Y-m-d H:i:sa")
                                    );

                                $this->common_model->data_update("kuatalmat",$update_array,array("id"=>$id));


                        $data["sukses"] =  "data berhasil disimpan";
                        redirect("kelompok3/list_edit_randis");



                           


            }


           
            $this->load->view("kelompok3/edit_randis",$data);
          
        }

    }
}

