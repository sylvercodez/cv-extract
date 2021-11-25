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
            if(!$this->session->has_userdata('admin_id')){
                redirect("admin/SignIn");exit;
            }
            $this->load->model('UserModel','User');
        }
        public function index(){
            $user = $this->User->select();
            $data['user'] = $user;
            $data['action'] = 'view';
            $data['header_active'] = "users";
            
            $filters = array();
            if($data['action']=='view'){
                $filters[4] = array('lable'=>'Gender','data'=>array('Male'=>'Male','Female'=>'Female'));
            }
            $data['filters'] = $filters;
            
            $this->load->newAdmin('User',$data);
        }
        public function add(){
            $data['id'] = $this->uri->uri_to_assoc(1)['add']?$this->uri->uri_to_assoc(1)['add']:0;
            $data['image'] = '';
            $data['action'] = 'add';
            if($data['id']>0){
                $result = $this->Cv->edit($data['id']);
                if(count($result)>0){
                    $data['id'] = $result->id;
                    $data['image'] = $result->image;
                    $data['action'] = 'edit';
                }
                else{
                    $data['id'] = 0;
                }
            }
			$this->load->adminTemplate('Cv',$data,false);
        }
        public function save(){
                      
                $config['upload_path']   = './assets/cvs/'; 
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']      = 0; 
                $config['max_width']     = 0;
                $config['max_height']    = 0;  
                
                $new_name = isset($_FILES["image"]['name'])&&$_FILES["image"]['name']!==''?time().'_'.$_FILES["image"]['name']:'';
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                
                if ($new_name!=='' && ! $this->upload->do_upload('image')) {
                    $response = array(
                        'status' => '0',
                        'message' => $this->upload->display_errors(),
                    );
                }
                
                else {
                    $this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('image')) {
						$error = array('error' => $this->upload->display_errors());
					}
					
					else { 
						$file = array('upload_data' => $this->upload->data()); 
					}
					
					$data = array(
						'image' => $new_name,
						'html' => '',
					);
					$response = $this->Cv->save($data,$this->input->post('id'));
                }
            
            echo json_encode($response);exit;
        }
        public function select(){
            $column = array(
                0=>array('column'=>'id','prefix'=>'cm'),
                1=>array('column'=>'name','prefix'=>'cm'),
                2=>array('column'=>'image','prefix'=>'cm'),
                3=>array('column'=>'email','prefix'=>'cm'),
                4=>array('column'=>'gender','prefix'=>'cm'),
                5=>array('column'=>'age','prefix'=>'cm'),
                6=>array('column'=>'city','prefix'=>'cm'),
                7=>array('column'=>'country','prefix'=>'cm'),
            );
        
            $status = '';
            $where = '';
            $orderby = array();
            $start = $this->input->post_get('start')?intval($this->input->post_get('start')):0;
            $length = $this->input->post_get('length')?intval($this->input->post_get('length')):RECORD_PER_PAGE;
            $where = $this->User->filter($_REQUEST,$column);
            $orderby = $this->User->order($_REQUEST,$column);
            
            $total_records = $this->User->count($status);
            $records = $this->User->select($status,$where,$orderby,$start,$length);
            $filtered_records = $this->User->count($status,$where);
            
            $record = array();
            foreach($records as $key=>$val){
				$val->image = $val->image!=''?$val->image:'user.jpg';
                $array = array();
                $array[] = strval($this->input->get('start')+$key+1);
                $array[] = $val->name;
                $array[] = '<img src="'.asset_url('users/'.$val->image).'" width="100px;" />';
                $array[] = $val->email;
                $array[] = $val->gender;
                $array[] = $val->age;
                $array[] = $val->city;
                $array[] = $val->country;
                array_push($record,$array);
            }
            
            $data = array(
        			"draw"            => $this->input->post_get('draw') ? intval( $this->input->post_get('draw') ) : 0,
        			"recordsTotal"    => intval( $total_records ),
        			"recordsFiltered" => intval( $filtered_records ),
        			"data"            => $record,
        		);
            echo json_encode($data);exit;
        }
        public function status(){
            $return = false;
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            if($id>0){
                $return = $this->Category->status($id,$status);
            }
            if($return===false){
                $return['status'] = 0;
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);exit;
        }
        public function delete(){
            $return = false;
            $id = $this->input->post_get('id');
            if($id>0){
                $return = $this->Cv->delete($id);
            }
            if($return===false){
                $return['status'] = 0;
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);exit;
        }
    }
?>