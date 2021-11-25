<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class SignIn extends CI_Controller {
        /**
        * Index Page for this controller.
        *
        * Maps to the following URL
        * 		http://example.com/index.php/welcome
        *	- or -
        * 		http://example.com/index.php/welcome/index
        *	- or -
        * Since this controller is set as the default controller in
        * config/routes.php, it's displayed at http://example.com/
        *
        * So any other public methods not prefixed with an underscore will
        * map to /index.php/welcome/<method_name>
        * @see https://codeigniter.com/user_guide/general/urls.html
        */
        function __construct(){
            parent::__construct();
            if($this->session->has_userdata('admin_id')){
                redirect("admin");exit;
            }
            $this->load->model('admin/AdminModel','AdminModel');
        }
        public function index(){
            $this->load->view('admin/SignIn');
        }
        public function doSignIn(){
            $this->form_validation->set_rules('userName', 'User Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) { 
                $this->load->view('admin/SignIn');
            }
            else{
                $data = $this->input->post();
                $return = $this->AdminModel->doSignIn($data);
                if($return==false){
                    redirect("admin/SignIn");exit;
                }
                else{
                    redirect("admin");exit;
                }
            }
        }
    }
?>