<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class PaymentModel extends CI_Model {
        private $table = TRANSACTIONS;
        function __construct(){
            parent::__construct();        
            // $this->load->database();
            $this->DB1 = $this->load->database('default', TRUE);            
        }
        public function get_reference($email){
            $uuid = uniqid(substr($email, 0, stripos($email, '@')));
            return $uuid;
        }

        public function save_reference($referennce_data){
            $this->DB1->insert($this->table, $referennce_data);
            return $this->DB1->insert_id();
        }

        public function get_by_reference($reference){
            $this->DB1->from($this->table);
            $this->DB1->where('reference', $reference);
            return $this->DB1->get()->row();
        }

        public function complete($transaction_ref){
            // $transaction = $this->get_by_reference($transaction_ref);
            

            // $this->DB1->where('transaction_ref', $transaction_ref);

            if($this->DB1->update($this->table, array('status'=> '1', 'updated_at'=>date("Y-m-d H:i:s", time()) ))){
                // return $this->DB1->get_where($this->table, array('transaction_ref'=>$transaction_ref))->row();
                $transaction = $this->DB1->get_where($this->table, array('transaction_ref'=>$transaction_ref))->row();
                if($cv_data = @json_decode($transaction->cvdata, true)){
                    $this->UserCv->save($cv_data);
                }
                return $transaction;
                
            }else{
                return false;
            }
        }

        public function is_cv_bought($cv){
            $this->DB1->from($this->table);
            $this->DB1->where('user_id', $this->session->userdata('user_id'));
            $this->DB1->where('cv_id', $cv);
            $this->DB1->where('status', '1');
            return $this->DB1->get()->row();
        }

        public function user_cvs(){
            $this->DB1->select('cv_id');
            $this->DB1->from($this->table);
            $this->DB1->where('user_id', $this->session->userdata('user_id'));            
            $this->DB1->where('status', '1');
            return $this->DB1->get()->result_array();
        }

        public function select($status='',$where='',$orderby='',$start='',$length=''){
            $this->DB1->select('*');
            $this->DB1->from($this->table);
            if($status!=''){
                $this->DB1->where('status', $status);
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
            $this->DB1->where('is_delete', '0');
            return $this->DB1->get()->result();
        }

        public function count($status='',$where=''){
            $this->DB1->select('count(*) total');
            $this->DB1->from($this->table);
            if($status!==''){
                $this->DB1->where('status', $status);
            }
            $this->DB1->where('is_delete', '0');
            if($where!==''){
                $this->DB1->where($where);
            }
            return $this->DB1->get()->row()->total;
        }

        public function get_total_payments($date = false){
            $this->DB1->where('status', 1);
            if($date){
                $this->DB1->like('timestamp', date("Y-m-d", time()));
            }
            $this->DB1->select_sum('price');
            return $this->DB1->get('transactions')->row();
        }
    }