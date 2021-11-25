<?php 
    class QuoteModel extends CI_Model{
        private $table = QUOTE_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);            
        }
        
        public function select($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('qm.*');
            $this->DB1->from($this->table.' qm');
            if($status!=''){
                $this->DB1->where('qm.status', $status);
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
            $this->DB1->where('qm.is_delete', '0');
            return $this->DB1->get()->result();
        }
        
        public function count($status='',$where=''){
            $this->DB1->select('count(*) total');
            $this->DB1->from($this->table.' qm');
            if($status!==''){
                $this->DB1->where('qm.status', $status);
            }
            $this->DB1->where('qm.is_delete', '0');
            if($where!==''){
                $this->DB1->where($where);
            }
            return $this->DB1->get()->row()->total;
        } 
        
    } 
?>