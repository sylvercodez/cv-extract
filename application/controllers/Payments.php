<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Payments extends CI_Controller {
        
        function __construct(){
            parent::__construct();
            $this->load->model('QuoteModel','Quote');
            $this->load->model('PaymentModel','payment');
            $this->load->model('CVModel','CV');
            $this->load->model('UserCvModel','UserCv');
            $init_data = array('secret_key'=>SECRET_KEY, 'public_key'=>PUBLIC_KEY);
            $this->load->library('paystack', $init_data);
        }
        public function pay($cv =false){
            if(!$this->session->has_userdata('user_id')){
                // If not logged in
                $this->session->set_flashdata('preaction', $this->uri->uri_string());
                $this->session->set_flashdata('signup', array('error'=>"Please create an account to continue", 'signup'=>false));
                redirect("home");exit;
            }
            if ($cv == false){
                // show_404();
                var_dump("Error Here");
                return;
            }
            $cv_details = $this->CV->select('', array('cm.id'=>$cv));
            if(empty($cv_details)){
                var_dump("Error Heree");
                return;
            }
            if($this->payment->is_cv_bought($cv)){
                redirect('cvs/cvready/'.$cv);
            }

            $amount = (int)($cv_details[0]->price * 100);
            $email = $this->session->userdata('user_email');
            $reference = $this->payment->get_reference($email);
            // $auth_url = $this->paystack->init($reference, $amount, $email, array(), base_url('payments/verify'));            
            $cv_data = $this->session->userdata('cvdata');
            if(!$cv_data){
                $cv_data = array();
            }
            $cvinfo = $this->CV->edit($cv_data['cv']);
            $cv_data['cvinfo'] = $cvinfo;
            $cv_data['user_id'] = $this->session->userdata('user_id')?$this->session->userdata('user_id'):0;

            /*$this->payment->save_reference(array('transaction_ref'=>$reference,
                                                    'user_id'=>$this->session->userdata('user_id'),
                                                    'cv_id'=>$cv, 'cvdata'=>@json_encode($cv_data) ));
            echo(json_encode(array('price' => $amount, 'email'=> $email, 'reference'=> $reference)) );*/
            $data = (array('transaction_ref'=>$reference,
                                                    'user_id'=>$this->session->userdata('user_id'), 'price'=>(int)($cv_details[0]->price),
                                                    'cv_id'=>$cv, 'cvdata'=>@json_encode($cv_data) ));
            $this->payment->save_reference($data);
            // var_dump($data);
            echo(json_encode(array('price' => $amount, 'email'=> $email, 'reference'=> $reference)) );
        }

        public function verify($transaction_ref){            
            // $transaction_ref= $this->input->get('trxref');
            //   return json_output(400, array('message'=>'Error occured here'));
            // if(!$transaction_ref){
            //     show_404();
            // }
            // $ver_info = $this->paystack->verifyTransaction($transaction_ref);
            // if(!$ver_info){
            //     show_404();
            // }
            // if($ver_info->data->status == 'success'){
            //     $cv = $this->payment->complete($transaction_ref);
            //     // redirect('cvs/cvready/'.$cv->cv_id);
            //     redirect('cvs/printcv');
            // }else{
            //     redirect('payments/failure/');
            // }
            redirect('cvs/printcv/');
        }


        public function payment_webhook(){
            $this->load->helper('json_output_helper');
            $body = @file_get_contents("php://input");
            $signature = (isset($_SERVER['HTTP_X_PAYSTACK_SIGNATURE']) ? $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] : '');
            
            /* It is a good idea to log all events received. Add code *
             * here to log the signature and body to db or file       */
            
            if (!$signature) {
                // only a post with paystack signature header gets our attention
                exit();
            }
            
            define('PAYSTACK_SECRET_KEY',SECRET_KEY);
            // confirm the event's signature
            if( $signature !== hash_hmac('sha512', $body, PAYSTACK_SECRET_KEY) ){
              // silently forget this ever happened
              exit();
            }
            
            http_response_code(200);
            // parse event (which is json string) as object
            // Give value to your customer but don't give any output
            // Remember that this is a call from Paystack's servers and 
            // Your customer is not seeing the response here at all
            $event = json_decode($body);
            switch($event->event){
                // charge.success
                case 'charge.success':
                    // TIP: you may still verify the transaction
                        // before giving value.
                        $transaction_ref = $event->data->reference;
                        $ver_info = $this->paystack->verifyTransaction($transaction_ref);
                        if(!$ver_info){
                            exit();
                        }
                        if($ver_info->data->status == 'success'){
                            $cv = $this->payment->complete($transaction_ref);
                        }
                    break;
            }
            exit();
            
            
        }

        public function test(){
            var_dump("Error Here");
            return;
        }
        // check in the cvready function if payment for the cv has been made, the deatils should be saved in the database first
    }