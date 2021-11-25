<?php 
    class CVModel extends CI_Model{
        private $table = CV_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);            
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
        
        public function save_choice($cv_id, $user_id){
            return $this->DB1->insert('access_logs', array('cv_id'=>$cv_id, 'user_id'=>$user_id));
        }

        public function get_click_rates(){
            // return $this->DB1->
            $cvs = $this->select();
            $data = array();
            foreach($cvs as $cv ){
                $data[$cv->id] = array(
                    'count'=>$this->get_clicks_by_id($cv->id),
                    'anonymous_count'=>$this->get_clicks_by_id($cv->id, true));
            }
            return $data;
        }

        public function get_clicks_by_id($cv_id, $user_id = false){
            $this->DB1->where('cv_id', $cv_id);
            if($user_id){
                $this->DB1->where('user_id', 0);
            }
            return $this->DB1->count_all_results('access_logs');
        }
    } 
?>