<?php 
    class CategoryModel extends CI_Model{
        private $table = CATEGORY_MASTER;
        function __construct(){
            parent::__construct();
            $this->DB1 = $this->load->database('default', TRUE);
        }
        
        public function save($data,$id=0){
            if($id==0){
                $this->DB1->insert($this->table, $data);
            }
            else{
                $this->DB1->set($data); 
                $this->DB1->where("id", $id); 
                $this->DB1->update($this->table, $data);
            }
            if($this->DB1->affected_rows()>0){
                $return = array(
                                'status' => '1',
                                'message' => 'Category saved successfully.'
                            );
            }
            else{
                $return = array(
                                'status' => '0',
                                'message' => 'Something went wrong.'
                            );
            }
            return $return;
        }
        public function checkDuplicate($name,$id,$parent_id){
            $this->DB1->select('ifnull(count(cm.id),0) as total');
            $this->DB1->from($this->table.' cm');
            $this->DB1->where('cm.id != '.$id);
            $this->DB1->where('cm.name', $name);
            $this->DB1->where('cm.parent_id', $parent_id);
            $this->DB1->where('cm.is_delete', '0');
            $response = $this->DB1->get()->row();
            if($response->total>0){
                $return = array(
                                'status' => 0,
                                'message' => 'This category already exists.',
                            );
                return $return;
            }
            else{
                return true;
            }
        }
        public function select($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('cm.*,pc.name parent_name');
            $this->DB1->from($this->table.' cm');
            $this->DB1->join($this->table.' pc', 'pc.id=cm.parent_id', 'left');
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
        
        public function edit($id){
            $this->DB1->select('cm.*,pc.name parent_name');
            $this->DB1->from($this->table.' cm');
            $this->DB1->join($this->table.' pc', 'pc.id=cm.parent_id', 'left');
            $this->DB1->where('cm.id', $id);
            $this->DB1->where('cm.is_delete', '0');
            return $this->DB1->get()->row();
        }
        
        public function count($status='',$where=''){
            $this->DB1->select('count(*) total');
            $this->DB1->from($this->table.' cm');
            $this->DB1->join($this->table.' pc', 'pc.id=cm.parent_id', 'left');
            if($status!==''){
                $this->DB1->where('cm.status', $status);
            }
            $this->DB1->where('cm.is_delete', '0');
            if($where!==''){
                $this->DB1->where($where);
            }
            return $this->DB1->get()->row()->total;
        } 
        
        /**
         * @param int status, default all
         * @param string where conditions, default all
         * @param array order by, default array
         * @param int start, default none
         * @param int length, default none
         * @return array of available parents
         * */
        public function getParents($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select("IFNULL(`cm`.`parent_id`,'0') `parent_id`,IFNULL(`pc`.`name`,'') `parent_name`");
            $this->DB1->from($this->table.' cm');
            $this->DB1->join($this->table.' pc', 'pc.id=cm.parent_id', 'left');
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
        
        /**
         * @param int id, default none
         * @param int status, default none
         * @return array if success, false if no record updated
         * */
        public function status($id,$status){
            $this->DB1->set('status', $status);  
            $this->DB1->where('id', $id);  
            $this->DB1->update($this->table.' cm');
            if($this->DB1->affected_rows()>0){
                $return['status'] = 1;
                $return['message'] = 'Record updated.';
                return $return;
            }
            else{
                return false;
            }
        }
        
        /**
         * @param int id, default none
         * @param int status, default none
         * @return array if success, false if no record deleted
         * */
        public function delete($id){
            $this->DB1->set('cm.is_delete', '1');  
            $this->DB1->where('cm.id', $id);  
            $this->DB1->update($this->table.' cm');
            if($this->DB1->affected_rows()>0){
                $return['status'] = 1;
                $return['message'] = 'Record deleted.';
                return $return;
            }
            else{
                return false;
            }
        }
        
        public function getData($request, $conn, $table, $primaryKey, $columns, $status=''){
            $bindings = array();
            $ssp = new SSP();
            
    		$limit = explode(",",$ssp::limit( $request, $columns ));
            $order = $ssp::order( $request, $columns );
    		$where = $ssp::filter( $request, $columns, $bindings );
            
            $this->DB1->select('cm.*,pc.name as parent_name');
            $this->DB1->from($this->table.' AS cm');
            $this->DB1->join($this->table.' AS pc', 'pc.id=cm.parent_id', 'left');
            if($status!=''){
                $this->DB1->where('cm.status', $status);
            }
            $this->DB1->where('cm.is_delete', '0');
            if($where!=null){
                $this->DB1->where($where);
            }
            
            $this->DB1->order_by($order);
            if(count($limit)>0){
                $this->DB1->limit($limit[0],$limit[1]);
            }
            $data = $this->DB1->get()->result_array();
            //echo $this->DB1->last_query();exit;
            $recordsFiltered = $this->count('',$where);
            $recordsTotal = count($data);
            
    		/*
    		 * Output
    		 */
    		return array(
    			"draw"            => isset ( $request['draw'] ) ?
    				intval( $request['draw'] ) :
    				0,
    			"recordsTotal"    => intval( $recordsTotal ),
    			"recordsFiltered" => intval( $recordsFiltered ),
    			"data"            => $ssp::data_output( $columns, $data )
    		);
        }
    } 
?>