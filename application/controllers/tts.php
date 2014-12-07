<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tts extends CI_Controller {
	public function index(){
	    $data = array('title' => 'Pulpo Docs' );
		$this->load->view('header',$data);
		$this->load->view('ttsform');
		$this->load->view('footer');
	}
	
	public function getaudio(){
	    $this->output->set_content_type('mp3');
        
        $baseurl="http://gbobr.koding.io:59125/process?INPUT_TYPE=TEXT&OUTPUT_TYPE=AUDIO&OUTPUT_TEXT=&effect_Volume_selected=&effect_Volume_parameters=amount%3A2.0%3B&effect_Volume_default=Default&effect_Volume_help=Help&effect_TractScaler_selected=&effect_TractScaler_parameters=amount%3A1.5%3B&effect_TractScaler_default=Default&effect_TractScaler_help=Help&effect_F0Scale_selected=&effect_F0Scale_parameters=f0Scale%3A2.0%3B&effect_F0Scale_default=Default&effect_F0Scale_help=Help&effect_F0Add_selected=&effect_F0Add_parameters=f0Add%3A50.0%3B&effect_F0Add_default=Default&effect_F0Add_help=Help&effect_Rate_selected=&effect_Rate_parameters=durScale%3A1.5%3B&effect_Rate_default=Default&effect_Rate_help=Help&effect_Robot_selected=&effect_Robot_parameters=amount%3A100.0%3B&effect_Robot_default=Default&effect_Robot_help=Help&effect_Whisper_selected=&effect_Whisper_parameters=amount%3A100.0%3B&effect_Whisper_default=Default&effect_Whisper_help=Help&effect_Stadium_selected=&effect_Stadium_parameters=amount%3A100.0&effect_Stadium_default=Default&effect_Stadium_help=Help&effect_Chorus_selected=&effect_Chorus_parameters=delay1%3A466%3Bamp1%3A0.54%3Bdelay2%3A600%3Bamp2%3A-0.10%3Bdelay3%3A250%3Bamp3%3A0.30&effect_Chorus_default=Default&effect_Chorus_help=Help&effect_FIRFilter_selected=&effect_FIRFilter_parameters=type%3A3%3Bfc1%3A500.0%3Bfc2%3A2000.0&effect_FIRFilter_default=Default&effect_FIRFilter_help=Help&effect_JetPilot_selected=&effect_JetPilot_parameters=&effect_JetPilot_default=Default&effect_JetPilot_help=Help&HELP_TEXT=&exampleTexts=&VOICE_SELECTIONS=dfki-spike%20en_GB%20male%20unitselection%20general&AUDIO_OUT=WAVE_FILE&LOCALE=en_GB&VOICE=dfki-spike&AUDIO=WAVE_FILE";
        $audiourl=$baseurl."&INPUT_TEXT=".urlencode($this->input->get_post('text'));
        $wpm = $this->input->get_post('wpm');
        $speed = $wpm * 0.00575; //Sox speed to wpm constant
        $fp = popen('curl "'.$audiourl.'" | sox -t s4 - -t wav - tempo '.$speed.' | lame --preset insane - -', "r");
        while(!feof($fp))
        {
            // send the current file part to the browser
            $this->output->append_output(fread($fp, 1024));
        } 
        pclose($fp);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */