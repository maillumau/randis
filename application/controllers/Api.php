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
              $resultVar = array();

              $result = $q->result();
              
              foreach ($q->result_array() as $row) {

                     array_push($resultVar,array(
                    "noreg_lama" => $row['noreg_lama'],
                    "noreg"=>$row['noreg_baru'],
                    "pemegang"=>$row['pemegang'],
                    "no_rangka"=>$row['no_rangka'],
                    "foto"=>$row['foto'],
                    "jenis"=>$row['jenis'],
                    "no_mesin"=>$row['no_mesin'],
                    "type"=>$row['type'],
                    "merek"=>$row['merek'],
                    "kubikasi"=>$row['kubikasi'],
                    "tahun"=>$row['tahun'],
                    "kondisi"=>$row['kondisi'],
                    "bahan_bakar"=>$row['bahan_bakar'],
                    ));
                
              }
           
           
             echo json_encode(array(
              'result'=>$resultVar
            ));
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


    public function check_connection(){


      $data = array();
      $status = array(); 
           
      $q = $this->db->query("SELECT * FROM app_access");
      $data = $q->row();
           
      //echo json_encode($data->access);

      if ($data->access == '1') {

          $status["konek"] = $q->result();
          echo json_encode($status);
      } else {

          $status["konek"] = $q->result();
          echo json_encode($status);
      }


    }

    public function tampil_data_by_kategori($query){

            $resultVar = array();


            if ($query == 'B' || $query == 'RR' || $query == 'RB') {
              $q = $this->db->query("SELECT * FROM kuatalmat WHERE kondisi='$query'");
              
            }else if ($query == '88' || $query == '92' || $query == 'HSD') {

              if ($query=='88') {
                  $query = 'RON 88';
              }elseif ($query=='92') {
                  $query = 'RON 92';
              }

              $q = $this->db->query("SELECT * FROM kuatalmat WHERE bahan_bakar='$query'");
              
            } elseif ($query == 'R2' || $query == 'Sedan' || $query == 'Minibus' || $query == 'Truk' || $query == 'Bus') {
              if ($query == 'R2') {
                  $query = 'Sepeda Motor';
              }
              $q = $this->db->query("SELECT * FROM kuatalmat WHERE jenis='$query'");
            }


            foreach ($q->result_array() as $row) {

                     array_push($resultVar,array(
                    "noreg"=>$row['noreg_baru'],
                    "pemegang"=>$row['pemegang'],
                    "no_rangka"=>$row['no_rangka'],
                    "foto"=>$row['foto'],
                    "jenis"=>$row['jenis'],
                    "kondisi"=>$row['kondisi'],
                    "bahan_bakar"=>$row['bahan_bakar'],
                    ));
                
            } 
           
           
            echo json_encode(array('result'=>$resultVar));
            

    }


    public function tampil_data_by_rekap(){


              $data = array(); 
           
              $mobil2000 = $this->db->query("select * FROM kuatalmat WHERE tahun <= '2000'");
              $jml_mobil2000 = $mobil2000->num_rows();


              $mobil2010 = $this->db->query("select * FROM kuatalmat WHERE tahun BETWEEN '2000' AND '2010'");
              $jml_mobil2010 = $mobil2010->num_rows();



              $mobil2019 = $this->db->query("select * FROM kuatalmat WHERE tahun BETWEEN '2011' AND '2019'");
              $jml_mobil2019 = $mobil2019->num_rows();


              $baik = $this->db->query("select * FROM kuatalmat WHERE kondisi = 'Baik'");
              $jml_baik = $baik->num_rows();

              $rr = $this->db->query("select * FROM kuatalmat WHERE kondisi = 'Rusak Ringan'");
              $jml_rr = $rr->num_rows();


              $rb = $this->db->query("select * FROM kuatalmat WHERE kondisi = 'Rusak Berat'");
              $jml_rb = $rb->num_rows();
         

              $ron88 = $this->db->query("select * FROM kuatalmat WHERE bahan_bakar = 'ron 88'");
              $jml_88 = $ron88->num_rows();


              $ron92 = $this->db->query("select * FROM kuatalmat WHERE bahan_bakar = 'ron 92'");
              $jml_92 = $ron92->num_rows();
         
         
              $hsd = $this->db->query("select * FROM kuatalmat WHERE bahan_bakar = 'HSD'");
              $jml_hsd = $hsd->num_rows();


              $totalran = $this->db->query("select * FROM kuatalmat");
              $jml_totalran = $totalran->num_rows();


              $hasil22 = array(['mobil2000' => "$jml_mobil2000",
                        'mobil2010' => "$jml_mobil2010",
                        'mobil2019' => "$jml_mobil2019",
                        'baik' =>$jml_baik,
                        'rr'=>$jml_rr,
                        'rb'=>$jml_rb, 
                        'ron88'=>$jml_88, 
                        'ron92'=>$jml_92, 
                        'hsd'=>$jml_hsd, 
                        'total'=>$jml_totalran]);
           
             echo json_encode(array('rekap'=>$hasil22));

    }
  
 
}


?>