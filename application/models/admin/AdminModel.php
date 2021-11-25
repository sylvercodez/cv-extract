<?php 
    class AdminModel extends CI_Model{
        private $table = ADMIN_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);
            
        }
        
        public function doSignIn($request){
            $this->DB1->select('*');
            $this->DB1->from($this->table);
            $this->DB1->where("name=".$this->DB1->escape($request['userName']));
            $this->DB1->where('password', md5($request['password']));
            $this->DB1->limit(1);
            $query = $this->DB1->get();
            //echo $this->DB1->last_query();exit;
            if($query->num_rows()==1){
                $data = $query->row();
                if($data->status==0){
                    $this->session->set_flashdata('error', 'Your account is disabled.');
                    return false;
                }
                else{
                    $this->session->set_userdata('admin_id', $data->id);
                    $this->session->set_flashdata('success', 'You have successfully sign in.');
                    return true;
                }
            }
            else{
                $this->session->set_flashdata('error', 'Please enter valid user name and password.');
                return false;
            }
        }
        public function changePassword($request){
            $this->DB1->select('*');
            $this->DB1->from($this->table);
            $this->DB1->where('password', md5($request['current_password']));
            $this->DB1->limit(1);
            $query = $this->DB1->get();
            //echo $this->DB1->last_query();exit;
            if($query->num_rows()==1){
                $data = $query->row();
                $this->DB1->where('id',$data->id);
				$this->DB1->update($this->table,array('password'=>md5($request['new_password'])));
                $this->session->set_flashdata('success', 'Password changes successfully.');
            }
            else{
                $this->session->set_flashdata('error', 'Please enter valid password.');
                return false;
            }
        } 
    } 
?>