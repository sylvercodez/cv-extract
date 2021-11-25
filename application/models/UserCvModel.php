<?php 
    class UserCvModel extends CI_Model{
        private $table = USER_CV;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);            
        }
        public function save($data){
            $record['user_id'] = $data['user_id'];
            $record['cv_id'] = @$data['cvinfo']->id;
            if(!$record['cv_id']){
                $record['cv_id'] = @$data['cvinfo']['id'];
            }
            $record['cv_info'] = json_encode($data);

            if($cv = $this->modified_get_user_cv_details($record['user_id'], $record['cv_id'])){
                $record['id'] = $cv->id;
                $this->DB1->replace($this->table,$record);
            }else{
                $this->DB1->insert($this->table,$record);                
            }
        }
        
        public function select($user_id='',$status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('cm.*,cv.image,cv.html');
            $this->DB1->from($this->table.' cm');
            if($user_id!=''){
                $this->DB1->where('cm.user_id', $user_id);
            }
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
            $this->DB1->join(CV_MASTER.' AS cv', 'cv.id = cm.cv_id', 'left');
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

        public function get_user_cv_details($user_id, $cv_id){
            $this->DB1->where('user_id', $user_id);
            $this->DB1->where('cv_id', $cv_id);
            return $this->DB1->get($this->table.' cm', 1)->row('cv_info');
        }
        public function modified_get_user_cv_details($user_id, $cv_id){
            $this->DB1->where('user_id', $user_id);
            $this->DB1->where('cv_id', $cv_id);
            return $this->DB1->get($this->table.' cm', 1)->row();
        }
        
    } 
?>