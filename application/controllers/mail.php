<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->config('email');
        // $this->load->library('email');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('email/contact');
    }
    

    function send()
    {

        $config = array(
            'protocol' => 'mail',
            'smtp_host' => 'mail.raptweb.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@raptweb.com', 
            'smtp_pass' => '*P)6vw~2OOfR', 
            'mailtype' => 'html',
            'charset' => 'iso-8859-1', 
            'wordwrap' => TRUE
        );
    
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $headers = 'raptwebWebContact' . " ";
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@raptweb.com', $headers);
        $this->email->to('jeevansahu72290@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
