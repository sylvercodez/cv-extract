<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		//echo PHP_OS; exit();
		// $config['url'] = 'http://phantomjs.org/screen-capture.html'; //set url
		$config['url'] = 'http://localhost/niggs'; //set url
		$config['filename'] = date('YMd').'-worksaurus.png'; //set file name
		$config['width'] = 1366; // set width
		$config['height'] = 768; // set height
		// $config['clipwidth'] = 1024; // optional
		// $config['clipheight'] = 768; // optional

		$this->load->library('phantomcapture', $config);
		$this->phantomcapture->captureit();
		echo "yo";
	}

	public function test(){
        $this->load->model('admin/CvModel','Cv');


        $cv = $this->Cv->edit(2);

        $user = array(
            'name' => 'John Doe',
            'description' => 'A little info about mr John Doe',
            'image' => 'user.jpg',
            'phone' => '080123456789',
            'email' => 'johndoe@mail.com',
            'education' =>  array(
                'B.Sc' => array('school' => 'OAU',
                    'year'   => '2010- 2014',
                    'degree' => 'B.Sc', ),
                'M.Sc' => array('school' => 'UI',
                    'year'   => '2016- 2018',
                    'degree' => 'M.Sc', ),
            ),
            'awards' => array(
                array('title'=>'Times person of the year', 'year'=>'2010', 'description' => 'Times Magazine person of the year 2010')
            ),
            'skills' => array(
                'PHP','NodeJS', 'Technical Writing'
            )

        );
        $this->load->view('cvpdf/'.$cv->html, $user);

        $html = $this->output->get_output();
        $this->load->library('phantomcapture');
        $this->phantomcapture->captureImage($html);
/*$this->load->view('test');
        $html = $this->output->get_output();
        $this->load->library('phantomcapture');
        $this->phantomcapture->captureImage($html);*/

     }
}

/* End of file Phantomjs.php */
/* Location: ./application/controllers/Phantomjs.php */