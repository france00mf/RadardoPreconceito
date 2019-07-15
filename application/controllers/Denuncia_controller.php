<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denuncia_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		//construtor e helpers de url de formulário e carregador do model de denuncia
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('denuncia_model');
	}
	public function verificarData($data){
		date_default_timezone_set('America/Sao_Paulo');
		if(strtotime($data)<strtotime('01/01/2000')){
			$this->form_validation->set_message('verificarData', 'A {field} não pode ser menor que 01/01/2000');
			return FALSE;
			}
		else if (strtotime($data)>time()){
			$this->form_validation->set_message('verificarData', 'A {field} não pode ser maior que o dia de hoje');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	//funcao para verificar o captcha fisico
	private function getcaptchafisico($local,$denuncia){
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
			$secret = '6Lef3noUAAAAAGfdZusSpUyFgMCp_oRRB-9364Jj';
			$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data1 = array('secret' => $secret, 'response' => $recaptchaResponse);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			$response = curl_exec($ch);
			curl_close($ch);
		$status = json_decode($response, true);
		if ($status['success']) {
				return $this->denuncia_model->insertdenuncia($denuncia,$local);
				
			}
		else
		{
			$this->session->set_tempdata('captchaerror',"window.addEventListener('load',()=>{
                Swal({
                    title:  'Erro !',
                    text:  'Por favor preencha o captcha',
                    type: 'error'
                });
            })");
		 }
	}
	// função para verificar o captcha virtual
	private function getcaptchavirtual($denunciavirtual){
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
			$secret = '6Lef3noUAAAAAGfdZusSpUyFgMCp_oRRB-9364Jj';
			$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data1 = array('secret' => $secret, 'response' => $recaptchaResponse);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			$response = curl_exec($ch);
			curl_close($ch);
		$status = json_decode($response, true);
		if ($status['success']) {
			return $this->denuncia_model->insertDenunciaVirtual($denunciavirtual);
			}
		else
		{
			$this->session->set_tempdata('captchaerror',"window.addEventListener('load',()=>{
                Swal({
                    title:  'Erro !',
                    text:  'Por favor preencha o captcha',
                    type: 'error'
                });
            })");
		 }
	}
	public function denuncia_virtual(){
			$config['upload_path']          = './uploads/denuncias/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2080;
			$config['max_width']            = 1280;
			$config['max_height']           = 1000;
			$config['detect_mime']          = true;
			$config['mod_mime_fix']         = true;
			$this->load->library('upload', $config);
		$this->load->library('form_validation');
		$genero = $this->input->post('gender');
		$idade = $this->input->post('age');
		$date = $this->input->post('date');
		$hora = $this->input->post('hora');
		$local = $this->input->post('address');
		$preconceito = $this->input->post('prejudice');
		$description = $this->input->post('description');
		$this->form_validation->set_rules('age', 'Idade', 'required|numeric');
		$this->form_validation->set_rules('gender', 'Gênero', 'required');
		$this->form_validation->set_rules('date', 'Data', 'required|callback_verificarData');
		$this->form_validation->set_rules('hora','hora','required');
		$this->form_validation->set_rules('descricao','descrição','required|max_length[800]|min_length[150]');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('validationerror',validation_errors());
		}
		else
		{
			if (!$this->upload->do_upload('arquivo'))
			{
					$this->session->set_flashdata('error',$this->upload->display_errors());
			}
			else{
				$denuncia = array($genero,$idade,$date,$hora,$preconceito,'uploads/denuncias/'.$this->upload->data('file_name'),$description,$local);
				if($this->getcaptchavirtual($denuncia)){
					$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
						Swal({
							title: "Sucesso !",
							text:  "Denuncia Enviada com Sucesso !",
							type: "success"
						});
					})');
					redirect('Denuncia_controller/denuncia_virtual');
				}
			}
		}
		
		$this->load->view('denunciavirtual');
}
	public function denuncia_fisica(){
		
		$this->load->library('form_validation');
		//configuração do sistema de uploads de imagens
		//carregar do input date
		$date = $this->input->post('date');
		//carregador do inputidade
		$age = $this->input->post('age');
		$data = array('age' => $date);
		//carregador do local
	  $endereco =	$this->input->post('address');
		//carregador da descrição
		$descricao = $this->input->post('description');
		//carregador da idade
		$gender  = $this->input->post('gender');
		$horario = $this->input->post('hour');
		//carregador do preconceito
		$preconceito = $this->input->post('prejudice');
		//carregador da agressao
		$agressao = $this->input->post('agression');
		//carregador de latitude
		$lat = $this->input->post('lat');
		//carregador de longitude
		$lng = $this->input->post('lng');
		//carregador de inputestado
		$estado = $this->input->post('state');
		$permissao = $this->input->post('permissao');
		//Regras de validação para o formulario
		$this->form_validation->set_rules('date','Data do acontecimento','required|callback_verificarData');
		$this->form_validation->set_rules('age','Idade','required|numeric');
		$this->form_validation->set_rules('address','endereço','required');
		$this->form_validation->set_rules('descricao','descricao',"required|max_length[800]|min_length[150]");
		//verificador para ver se o upload do arquivo foi bem sucedido
		if($this->form_validation->run()==FALSE){

			$this->session->set_flashdata('error',validation_errors());
		}else{
			$local = array($endereco,$estado,$lng,$lat);
			$denuncia = array($descricao,$date,$agressao,$gender,$preconceito,$age,$horario,$permissao);
			if($this->getcaptchafisico($local,$denuncia)){
				$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
					Swal({
						title: "Sucesso !",
						text:  "Denuncia Enviada com Sucesso !",
						type: "success"
					});
				})');
				redirect('Denuncia_controller/denuncia_fisica');
			}
		}

		$this->load->view('denunciafisica',$data);
	}
}
