<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('SESS_MEMBER_IS_LOGIN') || ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') !== 1)) 
        {
            redirect(base_url('login'));
        }
       
    }

    public function index()
    {

        $this->load->view('global/head');
        $this->load->view('home');
        $this->load->view('global/foot');
    }
}