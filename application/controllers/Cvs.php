<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Cvs extends CI_Controller {
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
            // if(!$this->session->has_userdata('user_id')){
            //     redirect("home");exit;
            // }
            $this->load->model('CVModel','CV');
            $this->load->model('CardModel','Card');
            $this->load->model('UserCvModel','UserCv');
            $this->load->model('PaymentModel','payment');
        }
        public function index(){
            $cvs = $this->CV->select();
            $data['cvs'] = $cvs;
            $data['oldinfo'] = $this->session->userdata('cvdata');
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            // $this->load->template('cvs',$data);
            $this->load->plain_view('templates',$data);
            $this->session->set_flashdata('choice_monitor', true);
        }
        public function fillinfo(){
            $id = $this->uri->segment('3');
            if(!$id){
                redirect('cvs/');
            }

            if((null !== $this->session->flashdata('choice_monitor')) && $this->session->flashdata('choice_monitor')){
                $this->CV->save_choice($id, (int)($this->session->userdata('user_id')));
            }
            $data['cv'] = $id;
            // $data['oldinfo'] = $this->session->userdata('cvdata');
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            if( isset($_SESSION['cvdata'])){
                $data['user'] = $_SESSION['cvdata'];
            }else if (isset($_SESSION['user_id'])){
                $result = $this->UserCv->get_user_cv_details($_SESSION['user_id'], $id);
                $data['user'] = $result ? json_decode($result, true) : array();
            }
            $data['degree'] = array('Diploma', 'BSc', 'MSc', 'PhD');
            $this->load->template('fillInfo',$data);
        }


        public function generatecv(){
            $cv_data = $this->input->post();
            if( !isset($cv_data['cv'])){
                redirect('cvs');
            }
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('job_title', 'Job Title', 'required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required');


            if ($this->form_validation->run() == true){

            
                $ext = substr($_FILES['file']['name'],strrpos($_FILES['file']['name'],'.'));
                $file = time().$ext;
                move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$file);
                $cv_data['skills'] = explode(',',$cv_data['skills']);
                $cv_data['hobbies'] = explode(',',$cv_data['hobbies']);
                $cv_data['name'] = $cv_data['first_name'].' '.$cv_data['last_name'];
                $cv_data['image'] = $file;
            //$user_id = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;

                $this->session->set_userdata('cvdata', $cv_data);
                $this->generatepreview();
                redirect('/cvs/cvready/'.$cv_data['cv']);
            }else{
                $this->session->set_userdata('cvdata', $cv_data);			
                redirect('/cvs/fillinfo/'.$cv_data['cv']);
            }


        }

        private function generatepreview(){

            if(!isset($_SESSION['cvdata']) || empty($_SESSION['cvdata'])){
                redirect('cvs');
            }
            $user = $this->session->userdata('cvdata');
            $cv = $this->CV->edit($user['cv']);
            $this->load->view('cvs/'.$cv->html, $user);

            $html = $this->output->get_output();
            /* $this->load->library('phantomcapture');
            $preview = $this->phantomcapture->generatepreview($html); */

            $this->load->library('chromecapture');
            $previewfile = $this->chromecapture->captureImage($html);
            $this->session->set_userdata('filename', $previewfile);
            
            
            $user['preview'] = "{$previewfile}.png";
            // $_SESSION['cvdata'] = $user;
            $this->session->set_userdata('cvdata', $user);
            // redirect('/cvs/cvready/'.$id);
            $this->output->set_output('');
            return;
        }
        public function cvready(){
            $data = $this->session->userdata('cvdata');
            if(!$data){
                redirect('cvs/fillinfo');
            }
            $id = $this->uri->segment('3');
            if($data['cv'] != $id){
                $data['cv'] = $id;
                $this->session->set_userdata('cvdata', $data);
                $view = $this->generatepreview();
            }
            if((null !== $this->session->flashdata('choice_monitor')) && $this->session->flashdata('choice_monitor')){
                $this->CV->save_choice($id, (int)($this->session->userdata('user_id')));
            }
            $data['cv'] = $id;
            $cv = $this->CV->edit($data['cv']);
            $data['cvinfo'] = $cv;
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            if(!$this->session->has_userdata('user_id')){
                // If not logged in
                $this->session->set_flashdata('preaction', $this->uri->uri_string());                
                // $this->session->set_flashdata('signup', array('error'=>"Please create an account to continue", 'signup'=>false));                
            }else{
                if(null === $this->session->userdata('cvsave') || !$this->session->userdata('cvsave')){
                    $this->UserCv->save($data);
                    $this->session->set_userdata('cvsave', true);
                }
            }
            // failed a login or signup and is redirected back here
            if (!empty($this->session->flashdata('login') )){
                $data['err'] = $this->session->flashdata('login');
            }
            else if (!empty($this->session->flashdata('signup') )){
                $data['err'] = $this->session->flashdata('signup');
            }

            $this->load->template('cvReady',$data);
            
            
        }
        public function chosecard(){
            $data = $this->session->userdata('cvdata');
            $cv = $this->CV->edit($data['cv']);
            $data['cvinfo'] = $cv;
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            $this->load->template('choseCard',$data);
        }
        public function cardinfo(){
            $card = $this->uri->segment('3');
            $data = $this->session->userdata('cvdata');
            $cv = $this->CV->edit($data['cv']);
            $data['cvinfo'] = $cv;
            $data['card'] = $card;
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            $this->load->template('cardInfo',$data);
        }
        public function savecardinfo(){
            $data = $this->input->post();
            $this->Card->save($data);
            $this->session->unset_userdata('cvsave');
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            redirect('/cvs/printcv');
        }
        public function printcv(){
            $data = $this->session->userdata('cvdata');
            if (!$data){
                redirect('cvs');
            }
            $cv = $this->CV->edit($data['cv']);
            $data['cvinfo'] = $cv;
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            if(null === $this->session->userdata('cvsave') || !$this->session->userdata('cvsave')){
                $this->UserCv->save($data);
                $this->session->set_userdata('cvsave', true);
            }
            $this->load->template('printCV',$data);
        }

        public function preview($id){
            if (!empty($this->session->flashdata('preaction') )){
                //reset the flashdata
                $this->session->set_flashdata($this->session->flashdata());             
            }
            $cv = $this->CV->edit($id);

            if(isset($_SESSION['cvdata'])){
                $user = $this->session->userdata('cvdata');
            }else {

                $user = array(
                    'name' => 'John Doe',
                    'job_title' => 'Software Developer',
                    'description' => 'A little info about mr John Doe',
                    'image' => 'user.jpg',
                    'phone' => '080123456789',
                    'email' => 'johndoe@mail.com',
                    'education' => array(
                        'B.Sc' => array('school' => 'OAU',
                            'year' => '2010- 2014',
                            'degree' => 'B.Sc',),
                        'M.Sc' => array('school' => 'UI',
                            'year' => '2016- 2018',
                            'degree' => 'M.Sc',),
                    ),
                    'awards' => array(
                        array('title' => 'Times person of the year', 'year' => '2010', 'description' => 'Times Magazine person of the year 2010')
                    ),
                    'skills' => array(
                        'PHP', 'NodeJS', 'Technical Writing'
                    )

                );
            }
            $this->load->view('cvs/'.$cv->html, $user);
//            var_dump($user);
        }
        public function download($id){
            if(!$this->session->has_userdata('user_id')){
                // If not logged in
                $this->session->set_flashdata('preaction', $this->uri->uri_string());
                $this->session->set_flashdata('signup', array('error'=>validation_errors(), 'formdata'=>$data, 'signup'=>false));
                redirect("home");exit;
            }
            

            $cv = $this->CV->edit($id);

            if(!isset($_SESSION['cvdata']) || empty($_SESSION['cvdata'])){
                redirect('cvs');
            }
            if(!isset($_SESSION['filename']) || empty($_SESSION['filename'])){
                redirect('cvs');
            }
            // $user = $this->session->userdata('cvdata');
            // $this->load->view('cvs/'.$cv->html, $user);

            // $html = $this->output->get_output();
            /* $this->load->library('phantomcapture');
            $path = $this->phantomcapture->captureImage($html);

            $this->load->helper('download');
            force_download($path, NULL); */
            
            $filename = $this->session->userdata('filename');
            $this->load->library('chromecapture');
            $path = $this->chromecapture->generateCv($filename);

            // $this->output->clear();
            $this->load->helper('download');
            force_download($path, NULL);
        }

        public function test(){
        //    $data = array('image' => '1527543325.png');
           $data = array(
            'name' => 'John Doe',
            'job_title' => 'Software Developer',
            'description' => 'A little info about mr John Doe',
            'image' => '1527543325.png',
            'phone' => '080123456789',
            'email' => 'johndoe@mail.com',
            'education' => array(
                'B.Sc' => array('school' => 'Obafemi Awolowo University, Ile Ife',
                    'course' => 'Computer Science and Engineering',
                    'year' => '2010- 2014',
                    'degree' => 'B.Sc',),
                'M.Sc' => array('school' => 'University of Ibadan',
                    'course' => 'Information Technology',
                    'year' => '2016- 2018',
                    'degree' => 'M.Sc',),
            ),
            'experience' => array(
                array('start' => '2015',
                    'end' => '2018',
                    'company' => 'Google',
                    'title' => 'Software Engineer Intern',
                    'description' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',),
                array('start' => '2018',
                    'end' => 'Present',
                    'company' => 'Terragon',
                    'title' => 'Software Engineer Intern',
                    'description' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',),
            ),
            'awards' => array(
                array('title' => 'Times person of the year', 'year' => '2010', 'description' => 'Times Magazine person of the year 2010')
            ),
            'skills' => array(
                'PHP', 'NodeJS', 'Technical Writing'
            ),
            'hobbies' => array(
                'Climbing', 'Reading', 'Eating'
            ),
            'facebook' => 'therealtoluu',
            'github' => 'therealtoluu',

        );
           $this->load->view('cvs/orbit_new', $data);
        //    $this->load->view('cvs/pillers', $data);
        }

        public function format(){
            $view_string = $this->input->post('postdata');
            $this->load->library('editor');
            $this->load->helper('json_output_helper');
            $data = array(
                'name' => 'John Doe',
                'description' => 'A little info about mr John Doe',
                'image' => 'user.jpg',
                'phone' => '080123456789',
                'email' => 'johndoe@mail.com',
                'education' =>  array(
                    'B.Sc' => array('school' => 'OAU',
                        'year'   => '2010- 2014',
                        'degree' => 'B.Sc', ),
                    'M.Sc' => array('school' => 'UI',
                        'year'   => '2016- 2018',
                        'degree' => 'M.Sc', ),
                ),
                'experience' => array(
                    array(
                        'start' => '2017',
                        'end' => 'Present',
                        'company' => 'Google',
                        'title' => 'Software Intern',
                        'description' => '',
                    )
                ),
                'awards' => array(
                    array('title'=>'Times person of the year', 'year'=>'2010', 'description' => 'Times Magazine person of the year 2010')
                ),
                'skills' => array(
                    'PHP','NodeJS', 'Technical Writing'
                ),
                'hobbies' => array('eating', 'playing'),
                'facebook' => null,
                'twitter' => "@therealtolu",
                'linkedin' => null,
                'instagram' => null,

            );
            $response = $this->editor->view($view_string, $data, true);
            // echo "test";
            // echo $view_string;
            return json_output(200, array('status' => 200, 'response' => $response));
        }
         
        public function testt(){
            $data = array(
                'name' => 'John Doe',
                'job_title' => 'Software Developer',
                'description' => 'A little info about mr John Doe',
                'image' => '1527543325.png',
                'phone' => '080123456789',
                'email' => 'johndoe@mail.com',
                'education' => array(
                    'B.Sc' => array('school' => 'Obafemi Awolowo University, Ile Ife',
                        'course' => 'Computer Science and Engineering',
                        'year' => '2010- 2014',
                        'degree' => 'B.Sc',),
                    'M.Sc' => array('school' => 'University of Ibadan',
                        'course' => 'Information Technology',
                        'year' => '2016- 2018',
                        'degree' => 'M.Sc',),
                ),
                'experience' => array(
                    array('start' => '2015',
                        'end' => '2018',
                        'company' => 'Google',
                        'title' => 'Software Engineer Intern',
                        'description' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',),
                    array('start' => '2018',
                        'end' => 'Present',
                        'company' => 'Terragon',
                        'title' => 'Software Engineer Intern',
                        'description' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',),
                ),
                'awards' => array(
                    array('title' => 'Times person of the year', 'year' => '2010', 'description' => 'Times Magazine person of the year 2010')
                ),
                'skills' => array(
                    'PHP', 'NodeJS', 'Technical Writing'
                ),
                'hobbies' => array(
                    'Climbing', 'Reading', 'Eating'
                ),
                'facebook' => 'therealtoluu',
                'github' => 'therealtoluu',
                'instagram' => 'therealtoluu',
    
            );
            $output = $this->load->view('cvs/pillers_2', $data);
            /* $output = $this->load->view('cvs/pillers_2', $data);
            $html = $this->output->get_output();
            $this->load->library('chromecapture');
            $path = $this->chromecapture->captureImage($html); */

            /* $this->load->helper('download');
            force_download($path, NULL); */
            // redirect("preview/{$path}.png");
            
        }        
        
    }