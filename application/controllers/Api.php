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
    
 
}
?>