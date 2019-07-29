<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Export extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Pdo_model');  
        $this->load->model('Export_model');
        // jika tidak memiliki sesi     
        if (!$this->session->userdata('pdo_logged')) {
            $ses = $this->session->userdata('pdo_logged');
            
            // jika dia bukan admin
            if ($ses['level'] !=1) {
                redirect('Login','refresh');
            } 
        }         
    }

    public function index() 
    {  
        $this->load->view('export/home_export');
    }  

    public function getDataSummaryQcd()
    {
        $pdo = $this->input->post('id_pdo');

        $r = $this->Export_model->getSumQcd($pdo);
 
        echo json_encode($r);
    }
    
}