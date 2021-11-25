<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class MY_Loader extends CI_Loader {
        public function template($template_name, $vars = array(), $template = TRUE, $return = FALSE){
            if($return):
                $content = '';
                if($template):
                    $content  .= $this->view('header', $vars, $return);
                endif;
                $content .= $this->view($template_name, $vars, $return);
                if($template):
                    $content .= $this->view('footer', $vars, $return);
                endif;
        
                return $content;
            else:
                if($template):
                    $this->view('header', $vars);
                endif;
                $this->view($template_name, $vars);
                if($template):
                    $this->view('footer', $vars);
                endif;
            endif;
        }
		public function adminTemplate($template_name, $vars = array(), $template = TRUE, $return = FALSE){
            if($return):
                $content = '';
                if($template):
                    $content  .= $this->view('admin/templates/header', $vars, $return);
                endif;
                $content .= $this->view($template_name, $vars, $return);
                if($template):
                    $content .= $this->view('admin/templates/footer', $vars, $return);
                endif;
        
                return $content;
            else:
                if($template):
                    $this->view('admin/templates/header', $vars);
                endif;
                $this->view('admin/'.$template_name, $vars);
                if($template):
                    $this->view('admin/templates/footer', $vars);
                endif;
            endif;
        }
		public function newAdmin($template_name, $vars = array()){
            $this->view('admin2/header', $vars);
            $this->view('admin2/'.$template_name, $vars);
            $this->view('admin2/footer', $vars);
        }
        public function plain_view($template_name, $vars = array()){
            $this->view('plain/header', $vars);
            $this->view('plain/'.$template_name, $vars);
            $this->view('plain/footer', $vars);
        }
    }
?>