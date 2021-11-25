<?php 
    class UserModel extends CI_Model{
        private $table = USER_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);            
        }
        public function save($data){
            $image = '';
            $record['name'] = $data['name'];
            $record['email'] = $data['email'];
            $record['image'] = isset($data['image'])?$data['image']:$image;
			$record['password'] = md5($data['password']);
			$record['age'] = isset($data['age'])?$data['age']:'';
			$record['gender'] = isset($data['gender'])?$data['gender']:'';
			$record['city'] = isset($data['city'])?$data['city']:'';
			$record['country'] = isset($data['country'])?$data['country']:'';
			if(isset($data['id'])&&$data['id']>0){
				if($data['password']==''){
					unset($record['password']);
				}
				$this->DB1->where('id',$data['id']);
				$this->DB1->update($this->table,$record);
				$id = $data['id'];
			}
			else{
				$this->DB1->insert($this->table,$record);
				$id = $this->DB1->insert_id();
			}
			return $this->edit($id);
        }
        
        public function login($email,$password){
            $this->DB1->select('um.*');
            $this->DB1->from($this->table.' um');
            $this->DB1->where('um.email',$email);
            $this->DB1->where('um.password',md5($password));
            $this->DB1->where('um.status', 1);
            $this->DB1->where('um.is_delete', 0);
            return $this->DB1->get()->row();
        }
        public function socialAuth($email){
            $this->DB1->select('um.*');
            $this->DB1->from($this->table.' um');
            $this->DB1->where('um.email',$email);
            // $this->DB1->where('um.password',md5($password));
            $this->DB1->where('um.status', 1);
            $this->DB1->where('um.is_delete', 0);
            return $this->DB1->get()->row();
        }
        
        public function select1($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('cm.*');
            $this->DB1->from($this->table.' cm');
            if($status!=''){
                $this->DB1->where('cm.status', $status);
            }
            if($where!==''){
                $this->DB1->where($where);
            }
            
            if($orderby!==''){
                $this->DB1->order_by($orderby);
            }
            if($start!==''&&$length!==''){
                $this->DB1->limit($length,$start);
            }
            $this->DB1->where('cm.is_delete', '0');
            return $this->DB1->get()->result();
        }
		
		public function select($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('cm.*');
            $this->DB1->from($this->table.' cm');
            if($status!=''){
                $this->DB1->where('cm.status', $status);
            }
            if($where!==''){
                $this->DB1->where($where);
            }
            
            if($orderby!==''){
                $this->DB1->order_by($orderby);
            }
            if($start!==''&&$length!==''){
                $this->DB1->limit($length,$start);
            }
            $this->DB1->where('cm.is_delete', '0');
            return $this->DB1->get()->result();
        }
        
        public function edit($id,$status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('cm.*');
            $this->DB1->from($this->table.' cm');
            $this->DB1->where('cm.id',$id);
            if($status!=''){
                $this->DB1->where('cm.status', $status);
            }
            if($where!==''){
                $this->DB1->where($where);
            }
            
            if($orderby!==''){
                $this->DB1->order_by($orderby);
            }
            if($start!==''&&$length!==''){
                $this->DB1->limit($length,$start);
            }
            $this->DB1->where('cm.is_delete', '0');
            return $this->DB1->get()->row();
        }
        
        public function count($status='',$where=''){
            $this->DB1->select('count(*) total');
            $this->DB1->from($this->table.' cm');
            if($status!==''){
                $this->DB1->where('cm.status', $status);
            }
            $this->DB1->where('cm.is_delete', '0');
            if($where!==''){
                $this->DB1->where($where);
            }
            return $this->DB1->get()->row()->total;
        } 
        
    } 
?>