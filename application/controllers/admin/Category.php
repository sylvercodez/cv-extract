<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Category extends CI_Controller {
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
            $this->load->model('admin/CategoryModel','Category');
        }
        public function index(){
            $category = $this->Category->select();
            $data['category'] = $category;
            $data['action'] = 'view';
            
            $filters = array();
            if($data['action']=='view'){
                $result = $this->Category->getParents();
                $parents = array();
                if(count($result)>0){
                    foreach($result as $key=>$val){
                        $parents[$val->parent_id] = $val->parent_name;
                    }
                }
                $filters[3] = array('lable'=>'Status','data'=>array('0'=>'Disabled','1'=>'Enabled'));
                $filters[2] = array('lable'=>'Country','data'=>$parents);
            }
            
            $data['filters'] = $filters;
            
            $this->load->adminTemplate('Category',$data);
        }
        public function add(){
            $data['id'] = $this->uri->uri_to_assoc(1)['add']?$this->uri->uri_to_assoc(1)['add']:0;
            $data['name'] = '';
            $data['parent'] = 0;
            $data['image'] = '';
            $data['title'] = '';
            $data['description'] = '';
            $data['keywords'] = '';
            $data['action'] = 'add';
            if($data['id']>0){
                $result = $this->Category->edit($data['id']);
                if(count($result)>0){
                    $data['id'] = $result->id;
                    $data['name'] = $result->name;
                    $data['parent'] = $result->parent_id;
                    $data['image'] = $result->image;
                    $data['title'] = $result->title;
                    $data['description'] = $result->description;
                    $data['keywords'] = $result->keywords;
                    $data['action'] = 'edit';
                }
                else{
                    $data['id'] = 0;
                }
            }
            $data['parents'] = $this->Category->select('',"cm.is_delete='0' AND cm.id!='".$data['id']."'");
            $this->load->adminTemplate('Category',$data,false);
        }
        public function save(){
            /* Set validation rule for name field in the form */ 
            $rules = array(
                'name' => array(
                    'field' => 'name',
                    'label' => 'Category Name',
                    'rules' => 'required|trim|min_length[2]',
                ),
                'title' => array(
                    'field' => 'title',
                    'label' => 'Category Title',
                    'rules' => 'required|trim|min_length[5]',
                )
            );
             
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) { 
                $response = array(
                    'status' => '0',
                    'message' => validation_errors(),
                );
            }
            else{            
                $config['upload_path']   = './uploads/category/'; 
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
                    $parent_id = $this->input->post('parent_id')==''?'0':$this->input->post('parent_id');
                    $check = $this->Category->checkDuplicate($this->input->post('name'),$this->input->post('id'),$parent_id);
                    if($check===true){
                        $this->load->library('CI_Image_lib');
                        $this->upload->do_resize($new_name);
                        $file = array('upload_data' => $this->upload->data());
                        $data = array(
                            'name' => $this->input->post('name'),
                            'image' => $new_name,
                            'parent_id' => $parent_id,
                            'title' => $this->input->post('title'),
                            'description' => $this->input->post('description'),
                            'keywords' => $this->input->post('keywords'),
                        );
                        $response = $this->Category->save($data,$this->input->post('id'));
                    }
                    else{
                        $response = $check;
                    }
                }
            }
            echo json_encode($response);exit;
        }
        public function select(){
            $column = array(
                0=>array('column'=>'id','prefix'=>'cm'),
                1=>array('column'=>'name','prefix'=>'cm'),
                2=>array('column'=>'name','prefix'=>'pc','filter_column'=>'id','child_column'=>'parent_id','child_prefix'=>'cm'),
                3=>array('column'=>'status','prefix'=>'cm')
            );
        
            $status = '';
            $where = '';
            $orderby = array();
            $start = $this->input->post_get('start')?intval($this->input->post_get('start')):0;
            $length = $this->input->post_get('length')?intval($this->input->post_get('length')):RECORD_PER_PAGE;
            $where = $this->Category->filter($_REQUEST,$column);
            $orderby = $this->Category->order($_REQUEST,$column);
            
            $total_records = $this->Category->count($status);
            $records = $this->Category->select($status,$where,$orderby,$start,$length);
            $filtered_records = $this->Category->count($status,$where);
            
            $record = array();
            foreach($records as $key=>$val){
                $array = array();
                $array[] = strval($this->input->get('start')+$key+1);
                $array[] = $val->name;
                $array[] = $val->parent_name;
                if($val->status==1){
                    $array[] = '<label>
									<input id="'.$val->id.'" value="0" name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat btn-status" type="checkbox"  checked="checked"/>
									<span class="lbl"></span>
								</label>';
                }
                else{
                    $array[] = '<label>
									<input id="'.$val->id.'" value="1" name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat btn-status" type="checkbox" />
									<span class="lbl"></span>
								</label>';
                }
                $array[] = '<a href="'.base_url('admin/Category/add/'.$val->id).'" data-remote="false" data-toggle="modal" data-target="#myModal" class="ico edit">Edit</a>
					       <a href="javascript:void(0);" id="'.$val->id.'" class="ico del btn-delete">Delete</a>';
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
                $return = $this->Category->delete($id);
            }
            if($return===false){
                $return['status'] = 0;
                $return['message'] = 'Something went wrong.';
            }
            echo json_encode($return);exit;
        }
    }
?>