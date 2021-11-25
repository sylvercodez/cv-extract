<?php 
    class CardModel extends CI_Model{
        private $table = CARD_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);
        }
        public function save($data){
            $record['name'] = $data['name'];
            $record['number'] = $data['number'];
            $record['expiry_date'] = $data['expiry_date'];
            $record['code'] = $data['code'];
            $this->DB1->insert($this->table,$record);
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