<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard extends CI_Controller {        
        function __construct(){
            parent::__construct();
            if(!$this->session->has_userdata('admin_id')){
                redirect("admin/SignIn");exit;
            }
        }
        public function index(){
            $data['action'] = 'view';
            $data['header_active'] = "dashboard";
            $this->load->model('UserModel','User');
            $this->load->model('CVModel','CV');
            $this->load->model('PaymentModel','Payment');
            $this->load->helper('file');
            $data['numberofusers'] = $this->User->count();
            $data['compiledcount'] = count(get_filenames('./preview'));
            $data['compiledsum'] = $this->Payment->get_total_payments()->price;
            $incometoday = $this->Payment->get_total_payments(true)->price;
            $data['incometoday'] = $incometoday ? $incometoday : 0;
            $data['clickrate'] = $this->CV->get_click_rates();
            $this->load->newAdmin('Dashboard', $data);
        }

        public function test(){
            $this->load->model('PaymentModel','Payment');
            var_dump($this->Payment->get_total_payments(true)->price);
            // var_dump(date("Y-m-d", time()));
        }
    }
?>