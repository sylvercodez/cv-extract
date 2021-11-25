<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';
//require_once (FCPATH . 'vendor/symfony/process/Process.php');
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\Response;


class Chromecapture
{
	private $width = 1024;
	private $height = 768;
	private $clipwidth = 0;
	private $clipheight = 0;
	private $url = 'http://advancecv.com';
    // private $url = 'http://127.0.0.1/av-code';
	private $filename = 'phantomcapture.png';
	private $backgroundcolor = '#FFFFFF';
	private $file_template = 'capture';

	public function __construct($config = array())
	{
		empty($config) OR $this->initialize($config);
		log_message('info', 'Phantomcapture Class Initialized');
	}

	/**
	 * Initialize preferences
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function initialize($config = array())
	{
		// define directory phantomjs
		define('PHANTOMJS', FCPATH.'phantomjs/');

		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}

	}

	public function captureImage($view){
	    $path = $this->writeFile($view);
	    $this->phantomImageProcess($path)->setTimeout(10)->mustRun();
		return $path;
		// return substr($path, 0, -4).'pdf';
		
	}
	public function generateCv($path){		
		$this->phantomProcess($path)->setTimeout(10)->mustRun();
		return "compiled/{$path}.pdf";
	}
    public function writeFile($view){

		$path = md5(uniqid());
	    file_put_contents('cvpdf/'. $path. '.html', $view);

	    return $path;
    }

    protected function phantomImageProcess($path){
		$image = 'preview/'.$path.'.png';
		$html = 'cvpdf/'. $path. '.html';
		// $resp = "google-chrome --headless --disable-gpu --print-to-pdf={$pdf} {$this->url}/{$html}";
		$resp = "google-chrome --headless --disable-gpu --screenshot={$image} --window-size=1000,1414 {$this->url}/{$html}";
		return new Process($resp);
	}
    protected function phantomProcess($path){
		$pdf = 'compiled/'.$path.'.pdf';
		$html = 'cvpdf/'. $path. '.html';
		$resp = "google-chrome --headless --disable-gpu --print-to-pdf={$pdf} --window-size=1050,1485 {$this->url}/{$html}";
		return new Process($resp);
	}
	public function generatepreview($html){
		$path = $this->writePreviewFile($html);
	    $this->phantomPreviewProcess($path)->setTimeout(10)->mustRun();
		return substr($path, 12, -4).'jpeg';
	}

	public function writePreviewFile($view){

		file_put_contents($path = 'previewhtml/'. md5(uniqid()). '.html', $view);
		return $path;
	}

	protected function phantomPreviewProcess($path){
		return new Process('./phantomjs/bin/phantomjs ./phantomjs/examples/previewcapture.js '.$path );		
	}
}

/* End of file Phantomcapture.php */
/* Location: ./application/libraries/Phantomcapture.php */