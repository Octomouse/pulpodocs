<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends CI_Controller {

	public function index()
	{
	    $data = array('title' => 'Pulpo Docs' );
		$this->load->view('header',$data);
		$this->load->view('mainpage');
		$this->load->view('footer');
	}
	
	public function create(){
	    $this->load->model('document_model','document');
	    $doc=$this->document;
	    $doc->title="default title";
	    $doc->content=$this->input->post('document');
	    $doc->insert($doc);
	    $this->__show_doc($doc);
	}
	
	public function show($id){
	    $this->load->model('document_model','document');
	    $doc=$this->document->get($id);
	    $this->__show_doc($doc);
	}
	
	public function __show_doc($doc){
	    $data = array('title' => 'Pulpo Docs - ' . $doc->title );
	    $this->load->view('header_fixed',$data);
		$this->load->view('showdoc',$doc);
		$this->load->view('footer');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */