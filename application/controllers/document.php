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
	    
	    $doc=array(
	                 "title" => $this->input->post('title'),
	                 "content" => $this->input->post('document'),
	                 "summary" => $this->input->post('summary')
	              );
	    
	    $this->document->insert($doc);
	    $id=$this->db->insert_id();
	    
	    $data = array('title' => 'Pulpo Docs' );
		$this->load->view('header_fixed',$data);
		
	    $data=array("id" => $id,
	                "longurl" => site_url("document/show/$id"),
	                "shorturl" => site_url("document/show_summary/$id")
	                );  
		$this->load->view('saved', $data);
		$this->load->view('footer');
	    
	    //$this->__show_doc($doc);
	}
	
	public function show($id){
	    $this->load->library('markdown');
	    $this->load->model('document_model','document');
	    $doc=$this->document->as_array()->get($id);
	    $doc['content']=$this->markdown->parse($doc['content']);
	    $this->__show_doc($doc);
	}
	
	public function show_summary($id){
	    $this->load->library('markdown');
	    $this->load->model('document_model','document');
	    $doc=$this->document->as_array()->get($id);
	    
	    if($doc['summary']=="")
            $doc['summary']=$doc['content'];
            
	    $doc['content']=$this->markdown->parse($doc['summary']);
	    $this->__show_doc($doc);
	}	
	public function __show_doc($doc){
	    $data = array('title' => 'Pulpo Docs - ' . $doc['title'] );
	    $this->load->view('header_fixed',$data);
		$this->load->view('showdoc',$doc);
		$this->load->view('footer');
	}
}

/* End of file document.php */
/* Location: ./application/controllers/document.php */