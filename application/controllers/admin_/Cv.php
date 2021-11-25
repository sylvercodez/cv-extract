<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Cv extends CI_Controller {
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
            $this->load->model('admin/CvModel','Cv');
        }
        public function index(){
            $cv = $this->Cv->select();
            $data['cv'] = $cv;
            $data['action'] = 'view';
            
            $filters = array();
            if($data['action']=='view'){
                //$filters[3] = array('lable'=>'Status','data'=>array('0'=>'Disabled','1'=>'Enabled'));
            }
            
            $data['filters'] = $filters;
            
            $this->load->adminTemplate('Cv',$data);
        }
        public function add(){
            $data['id'] = $this->uri->uri_to_assoc(1)['add']?$this->uri->uri_to_assoc(1)['add']:0;
            $data['price'] = '';
            $data['image'] = '';
            $data['html'] = '';
            $data['action'] = 'add';
            if($data['id']>0){
                $result = $this->Cv->edit($data['id']);
                if(count($result)>0){
                    $data['id'] = $result->id;
                    $data['price'] = $result->price;
                    $data['image'] = $result->image;
                    $data['html'] = $result->html;
                    $data['action'] = 'edit';
                }
                else{
                    $data['id'] = 0;
                }
            }
            $this->load->adminTemplate('Cv',$data,false);
        }

        public function save_1(){
                $price = $this->input->post('price')==''?'0':$this->input->post('price');
				$html = '';

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
						'price' => $price,
					);
					if($new_name!=''){
						$data['image'] = $new_name;
					}
					if($html!=''){
						$data['html'] = $html;
					}
					$response = $this->Cv->save($data,$this->input->post('id'));
                }

            echo json_encode($response);exit;
        }
        public function select(){
            $column = array(
                0=>array('column'=>'id','prefix'=>'cm'),
                1=>array('column'=>'image','prefix'=>'cm')
            );
        
            $status = '';
            $where = '';
            $orderby = array();
            $start = $this->input->post_get('start')?intval($this->input->post_get('start')):0;
            $length = $this->input->post_get('length')?intval($this->input->post_get('length')):RECORD_PER_PAGE;
            $where = $this->Cv->filter($_REQUEST,$column);
            $orderby = $this->Cv->order($_REQUEST,$column);
            
            $total_records = $this->Cv->count($status);
            $records = $this->Cv->select($status,$where,$orderby,$start,$length);
            $filtered_records = $this->Cv->count($status,$where);
            
            $record = array();
            foreach($records as $key=>$val){
                $array = array();
                $array[] = strval($this->input->get('start')+$key+1);
                $array[] = '<a href="'. base_url('admin/cv/view/'.$val->id).'"> <img src="'.asset_url('cvs/'.$val->image).'" width="100px;" /> </a>';
                $array[] = $val->price;
                $array[] = '<a href="'.base_url('admin/Cv/add/'.$val->id).'" data-remote="false" data-toggle="modal" data-target="#myModal" class="ico edit btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
					       <a href="javascript:void(0);" id="'.$val->id.'" class="ico del btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
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


        public function save(){

            $this->load->library('upload');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');

            if ($this->form_validation->run()){
                $cv_data = array(
                    'price' => $this->input->post('price'),
                );
                if((isset($_FILES['html']['size']) && $_FILES['html']['size']>0)){

                    if (isset($_FILES['image']['size']) && $_FILES['image']['size']>0) {

                        // set variables from the form
                        $config['upload_path'] = './assets/cvs/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                        $config['max_size'] = 32768;

                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('image')) {
//                            Picture upload failed
                            $response = array(
                                'status' => '0',
                                'message' => $this->upload->display_errors(),
                            );

                            return print(json_encode($response));
                        } else {

                            // set variables from the form into an array
                            $cv_data['image'] = $this->upload->data('file_name');


//                            Upload the view
                            $config['upload_path'] = './application/views/cvs';
                            $config['allowed_types'] = 'html|txt|php';
                            $config['file_name'] = 'cv.php';
                            $config['overwrite'] = false;
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload('html')) {


                                $response = array(
                                    'status' => '0',
                                    'message' => $this->upload->display_errors(),
                                );
                                return print(json_encode($response));
                            }else{
                                $cv_data['html'] = $this->upload->data('file_name');
                                $response = $this->Cv->save($cv_data, $this->input->post('id'));

                                return print(json_encode($response));
                            }
                        }
                    }else{
                        $response = array(
                            'status' => '0',
                            'message' => array('Banner Picture is not set'),
                        );
                        return print(json_encode($response));
                    }
                }else{

                    $response = array(
                        'status' => '0',
                        'message' => array('CV HTML is required'),
                    );
                    return print(json_encode($response));
                }

            }else{
                $response = array(
                    'status' => '0',
                    'message' => validation_errors(),
                );
                return print(json_encode($response));
            }


        }



        public function download($id){

            $cv = $this->Cv->edit($id);

            $user = array(
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
                'awards' => array(
                    array('title'=>'Times person of the year', 'year'=>'2010', 'description' => 'Times Magazine person of the year 2010')
                ),
                'skills' => array(
                    'PHP','NodeJS', 'Technical Writing'
                )

            );
            $this->load->view('cvs/'.$cv->html, $user);




            $html = $this->output->get_output();
            // Convert to PDF
//            $this->dompdf->setDpi(150);
            $this->load->library("Dompdf_options");
            $this->domoptions->set('dpi',150);
            $this->load->library("Dom_pdf", $this->dompoptions);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("sample.pdf");

        }



    }
?>