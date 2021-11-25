<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller {
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
            $this->load->model('UserModel','User');
            $this->load->model('UserCvModel','UserCv');
        }
        public function profile(){
            if(!$this->session->has_userdata('user_id')){
                redirect("home");exit;
            }
            $id = $this->session->userdata('user_id');
            $data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;
            $data['cvs'] = $this->UserCv->select($id);
			//echo '<pre>';print_r($data['cvs']);exit;
            $this->load->template('profile',$data);
        }
		public function editprofile(){
            if(!$this->session->has_userdata('user_id')){
                redirect("home");exit;
            }
            $id = $this->session->userdata('user_id');
			$data['user_id']= $id;
            $data['user'] = $this->User->edit($id);
            $this->load->template('editProfile',$data);
        }
		public function saveprofile(){
            $data = $this->input->post();
			$data['id'] = $this->session->userdata('user_id');
			
			$config['upload_path']   = './assets/users/'; 
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = 0; 
			$config['max_width']     = 0; 
			$config['max_height']    = 0;  
			$error = array();
			if(isset($_FILES["image"]['name'])){
				$new_name = time().$_FILES["image"]['name'];
				$config['file_name'] = $new_name;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
				}
				
				else { 
					$file = array('upload_data' => $this->upload->data()); 
				}
			}
			if(count($error)==0){
				$data['image'] = $new_name;
			}
			
            $data = $this->User->save($data);
			$data->image = $data->image==''?'user.jpg':$data->image;
            $this->session->set_userdata('user_id',$data->id);
            $this->session->set_userdata('user_name',$data->name);
            $this->session->set_userdata('user_email',$data->email);
            $this->session->set_userdata('user_image',$data->image);
            $this->session->set_userdata('gender',$data->gender);
            $this->session->set_userdata('age',$data->age);
            $this->session->set_userdata('city',$data->city);
            $this->session->set_userdata('country',$data->country);
            redirect('/user/profile');
        }
        public function register(){
            if (!empty($this->session->flashdata('preaction') )){
                //reset the flashdata
                $this->session->set_flashdata($this->session->flashdata());
            }
            $data = $this->input->post();
            // $this->form_validation->set_data($data);

            // $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[av_user_master.email]|valid_email', array('is_unique'=>'This Email is already in use'));
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()== true){        
                $response = $this->User->save($data);
                $response->image = $response->image==''?'user.jpg':$response->image;
                $this->session->set_userdata('user_id',$response->id);
                $this->session->set_userdata('user_name',$response->name);
                $this->session->set_userdata('user_email',$response->email);
                $this->session->set_userdata('user_image',$response->image);
                $this->session->set_userdata('gender',$response->gender);
                $this->session->set_userdata('age',$response->age);
                $this->session->set_userdata('city',$response->city);
                $this->session->set_userdata('country',$response->country);
                if (!empty($this->session->flashdata('preaction') )){
                    redirect($this->session->flashdata('preaction'));
                }
                redirect('/user/editprofile');
                
            }else{
                $this->session->set_flashdata('signup', array('error'=>validation_errors(), 'formdata'=>$data, 'signup'=>false));
                if (!empty($this->session->flashdata('preaction')) && substr( $this->session->flashdata('preaction'), 0, strlen('cvs/cvready') ) == 'cvs/cvready') {
                    redirect($this->session->flashdata('preaction'));
                }
                redirect('/');
            }
        }
        public function login(){
            if (!empty($this->session->flashdata('preaction') )){
                //reset the flashdata
                $this->session->set_flashdata($this->session->flashdata());                
            }
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $response = $this->User->login($email,$password);
            if(count($response)>0){
                $response->image = $response->image==''?'user.jpg':$response->image;
                $this->session->set_userdata('user_id',$response->id);
                $this->session->set_userdata('user_name',$response->name);
                $this->session->set_userdata('user_email',$response->email);
                $this->session->set_userdata('user_image',$response->image);
                $this->session->set_userdata('gender',$response->gender);
                $this->session->set_userdata('age',$response->age);
                $this->session->set_userdata('city',$response->city);
                $this->session->set_userdata('country',$response->country);
                if (!empty($this->session->flashdata('preaction') )){
                    //successfully logged in 
                    redirect($this->session->flashdata('preaction'));
                }
                redirect('/user/profile');
            }
            else{
                $this->session->set_flashdata('login', array('error'=>'Incorrect Login Details','email'=>$email, 'login'=>false));
                if (!empty($this->session->flashdata('preaction')) && substr( $this->session->flashdata('preaction'), 0, strlen('cvs/cvready') ) == 'cvs/cvready') {
                    redirect($this->session->flashdata('preaction'));
                }
                redirect('/');
            }
        }
        public function logout(){
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('user_email');
            $this->session->unset_userdata('user_image');
			$this->session->unset_userdata('gender');
            $this->session->unset_userdata('age');
            $this->session->unset_userdata('city');
            $this->session->unset_userdata('country');
            redirect('/');
        }

        public function googleLogin(){
            // $idtoken = '{ "azp": "1064984912001-e6oqm4tchuh8kdetmrjejujq8c7up9d7.apps.googleusercontent.com", "aud": "1064984912001-e6oqm4tchuh8kdetmrjejujq8c7up9d7.apps.googleusercontent.com", "sub": "116903142324894873848", "email": "teepfakk@gmail.com", "email_verified": "true", "at_hash": "piYUwKJ4oKPUQqKfaX1E0g", "exp": "1530004407", "iss": "accounts.google.com", "jti": "82bde3826921d94868bfd048a3923388ba76f9a0", "iat": "1530000807", "name": "Tolu Fakiyesi", "picture": "https://lh3.googleusercontent.com/-NNtqmE4ubUM/AAAAAAAAAAI/AAAAAAAADuo/1lThQHP_L7Q/s96-c/photo.jpg", "given_name": "Tolu", "family_name": "Fakiyesi", "locale": "en", "alg": "RS256", "kid": "dad44739576485ec30d228842e73ace0bc367bc4" } ';
            // var_dump(json_decode($idtoken)->email);
            $this->session->set_userdata('test', 'hello');
            
        }
        public function tokensignin(){
            $curl = $this->load->library('curl');
            $idtoken = $this->input->post('idtoken');
            $url = "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=$idtoken";
            $this->curl->simple_get($url);
            $response =  $this->curl->response;
            if($this->curl->response_code == '200'){
                // echo "Status 200";
                // $response = '{ "azp": "1064984912001-e6oqm4tchuh8kdetmrjejujq8c7up9d7.apps.googleusercontent.com", "aud": "1064984912001-e6oqm4tchuh8kdetmrjejujq8c7up9d7.apps.googleusercontent.com", "sub": "116903142324894873848", "email": "teepfakk@gmail.com", "email_verified": "true", "at_hash": "piYUwKJ4oKPUQqKfaX1E0g", "exp": "1530004407", "iss": "accounts.google.com", "jti": "82bde3826921d94868bfd048a3923388ba76f9a0", "iat": "1530000807", "name": "Tolu Fakiyesi", "picture": "https://lh3.googleusercontent.com/-NNtqmE4ubUM/AAAAAAAAAAI/AAAAAAAADuo/1lThQHP_L7Q/s96-c/photo.jpg", "given_name": "Tolu", "family_name": "Fakiyesi", "locale": "en", "alg": "RS256", "kid": "dad44739576485ec30d228842e73ace0bc367bc4" } ';
                $user = json_decode($response);
                $data = array(
                    'email' => $user->email,
                    'name' => $user->name,
                    'picture' => $user->picture,
                    'password' => '',
                );
                $saveduser = $this->User->socialAuth($user->email);
                if(!$saveduser){
                    $userresponse = $this->User->save($data);
                }else{
                    $userresponse = $saveduser;
                }
                $userresponse->image = $userresponse->image==''?'user.jpg':$userresponse->image;
                $this->session->set_userdata('user_id',$userresponse->id);
                $this->session->set_userdata('user_name',$userresponse->name);
                $this->session->set_userdata('user_email',$userresponse->email);
                $this->session->set_userdata('user_image',$userresponse->image);
                $this->session->set_userdata('gender',$userresponse->gender);
                $this->session->set_userdata('age',$userresponse->age);
                $this->session->set_userdata('city',$userresponse->city);
                $this->session->set_userdata('country',$userresponse->country);
                if (!empty($this->session->flashdata('preaction') )){
                    // redirect($this->session->flashdata('preaction'));
                    echo $this->session->flashdata('preaction');
                }
                    redirect('cvs');
                    // echo '/user/editprofile';
                
                
            }else{
                echo "Invalid token";
            }
        }

        public function facebookAuth(){
            
            require_once APPPATH . 'third_party/Facebook/src/Facebook/autoload.php';
            
            if(isset($_GET['state'])) {
                $_SESSION['FBRLH_state'] = $_GET['state'];
            }
            /*Step 1: Enter Credentials*/
            $fb = new \Facebook\Facebook([
                'app_id' => '254923435271632',
                'app_secret' => 'bdc29e886fb8f5a925081eb2021bed38',
                'default_graph_version' => 'v2.10',
                //'default_access_token' => '{access-token}', // optional
            ]);
            
            
            
            $access_token = $fb->getRedirectLoginHelper()->getAccessToken();
            /*Step 4: Get the graph user*/
            if(isset($access_token)) {
                try {
                    $response = $fb->get('/me?locale=en_US&fields=name,email,picture',$access_token);
                    $fb_user = $response->getGraphUser();

                    $data = array(
                        'email' => $fb_user->getEmail(),
                        'name' => $fb_user->getName(),
                        'picture' => $fb_user->getPicture()->url,
                        'password' => '',
                    );
                    $saveduser = $this->User->socialAuth($data['email']);
                    if(!$saveduser){
                        $userresponse = $this->User->save($data);
                    }else{
                        $userresponse = $saveduser;
                    }
                    $userresponse->image = $userresponse->image==''?'user.jpg':$userresponse->image;
                    $this->session->set_userdata('user_id',$userresponse->id);
                    $this->session->set_userdata('user_name',$userresponse->name);
                    $this->session->set_userdata('user_email',$userresponse->email);
                    $this->session->set_userdata('user_image',$userresponse->image);
                    $this->session->set_userdata('gender',$userresponse->gender);
                    $this->session->set_userdata('age',$userresponse->age);
                    $this->session->set_userdata('city',$userresponse->city);
                    $this->session->set_userdata('country',$userresponse->country);
                    if (!empty($this->session->flashdata('preaction') )){
                        redirect($this->session->flashdata('preaction'));
                        // echo $this->session->flashdata('preaction');
                    }
                    redirect('cvs');
                    
                } catch (\Facebook\Exceptions\FacebookResponseException $e) {
                    echo  'Graph returned an error: ' . $e->getMessage();
                } catch (\Facebook\Exceptions\FacebookSDKException $e) {
                    // When validation fails or other local issues
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                }
            }
            
            
        }

        public function facebookSignin(){

        }
    }
?>