<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
	    $data = array('title' => 'Pulpo Docs' );
		$this->load->view('header_fixed',$data);
		$this->load->view('mainpage');
		$this->load->view('docform');
		$this->load->view('footer');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */