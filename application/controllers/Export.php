<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Export extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Pdo_model');  
        $this->load->model('Export_model');
        // jika tidak memiliki sesi     
        // if (!$this->session->userdata('pdo_logged')) {
        //  redirect('Login','refresh');
        // }         
    }

    public function index() 
    { 
        // get sesion
        $session_data = $this->session->userdata('pdo_logged'); 

        // init data
        $username = $session_data['id_user'];  
        $shift =  $session_data['id_shift'];
        $tanggal = date("Y-m-d"); 
        
        // jika user sudah ada data pdo
        $result = $this->Pdo_model->cariPdo($username,$shift,$tanggal);
        if ($result) {  

            $data['pdo'] = $this->Pdo_model->cariPdoItems($username,$shift,$tanggal);
            $this->load->view('export/home_export',$data);
        }else {  
            // jika tidak punya data pdo
            redirect('Welcome','refresh');
        }

    }  

    public function getDataSummaryQcd()
    {
        $pdo = $this->input->post('id_pdo');

        $r = $this->Export_model->getSumQcd($pdo);
 
        echo json_encode($r);
    }
    
}