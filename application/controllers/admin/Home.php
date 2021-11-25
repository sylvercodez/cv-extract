<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('admin_id')){
            redirect("admin/SignIn");exit;
        }
    }
    public function index(){
        $data = new stdClass();
        $data->header_active = "cvs";
        $data->action = 'view';
        $filters = array();
        if($data->action=='view'){
            $filters[3] = array('lable'=>'Status','data'=>array('0'=>'Disabled','1'=>'Enabled'));
        }
        
        $data->filters = $filters;
        // $this->load->newAdmin('Old_Cv', $data);
        $this->load->newAdmin('Cv', $data);
    }

    public function compose(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('html', 'HTML', 'trim|required');

        if (!$this->form_validation->run()){
            $this->load->newAdmin('createPage');
        }else{
            $this->load->newAdmin('createPage');
        }
    }
    public function ping(){
        $this->load->model('UserModel','User');
        var_dump( (int)(57/2) );
    }
}