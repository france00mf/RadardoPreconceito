<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}
	public function index(){
		$dados['teste'] = "passando parametro";
		$this->load->view('welcome_message',$dados);
	}
	public function login(){
		echo "login";
	}
}
