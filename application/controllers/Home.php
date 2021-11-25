    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller {
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
            $this->load->model('QuoteModel','Quote');
            $this->load->model('CVModel','CV');
        }
        public function index(){            
            if (!empty($this->session->flashdata('preaction') )){
                //reset the flashdata
                $this->session->set_flashdata($this->session->flashdata());
            }else{
                $this->session->unset_userdata('cvdata');
            }
            $quotes = $this->Quote->select();
            $cvs = $this->CV->select();
            $data['quotes'] = $quotes;
            $data['cvs'] = $cvs;
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            //echo '<pre>';print_r($quote);exit;
            if (!empty($this->session->flashdata('login') )){
                $data['err'] = $this->session->flashdata('login');
            }
            else if (!empty($this->session->flashdata('signup') )){
                $data['err'] = $this->session->flashdata('signup');
            }
            // $this->load->view('home',$data);
            $this->load->plain_view('index',$data);
            // var_dump($quotes);
            
            
        }        

    }