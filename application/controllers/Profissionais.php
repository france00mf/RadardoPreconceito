<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profissionais extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('admmodel');
		$this->load->model('profmodel');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('Geraremail');
	}
	private function versession(){
		if($this->session->userdata('id') == ''){
			session_destroy();
			redirect('Profissionais/login');
		}
	}

	private function updatedata($lugar,$dados,$id){
			return $this->profmodel->update_data($lugar,$dados,$id);
	}
	private function config_pagination($caminho,$page,$links,$uri,$linhas){
		
		$config = array(
			
			"base_url" => base_url($caminho),
			"per_page" => $page,
			"num_links"=> $links,
			"uri_segment"=>$uri,
			'total_rows' =>  $linhas
		);
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li	class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		return $this->pagination->initialize($config);
	}

	public function verificarData($data){
		date_default_timezone_set('America/Sao_Paulo');
		$idade = strtotime('-18 year',strtotime('today'));
		if(strtotime($data)>$idade){
			$this->form_validation->set_message('verificarData', 'A {field} deve ter uma data maior que 18 anos');
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
	private function cadastraruser($dados){
		return $this->profmodel->cadastraruser($dados);
	}
        private function getcaptcha($dado,$func){
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
                        return call_user_func($func,$dado);
                        
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
                        return false;
                }
	}
	public function logar($dados){
		return $this->profmodel->logar($dados);
	}
	public function perfil(){
        $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Principal');
        $dados = $this->admmodel->select_data('pessoa',$id);
        $data['conteudo'] = $dados;
        $this->load->view('perfilpessoa',$data);
        
        }
        public function cadastro(){
                $config['upload_path']          = './uploads/profissionais/';
	        $config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2080;
		$config['max_width']            = 1280;
		$config['min_width']			=200;
		$config['max_width']			= 800;
		$config['max_height']           = 1280;
		$config['detect_mime']          = true;
                $config['mod_mime_fix']         = true;
                $this->load->library('upload', $config);
                $email = $this->input->post('email');
				$pass = $this->input->post('pass');
				$confirm = $this->input->post('confirmpass');
                $nascimento = $this->input->post('nascimento');
                $lat = $this->input->post('Lat');
                $lng = $this->input->post('Lng');
				$cpf = $this->input->post('cpf');
				$estado = $this->input->post('estado');
                $genero = $this->input->post('gender');
                $telefone = $this->input->post('telefone');
                $profissao = $this->input->post('prof');
				$nome = $this->input->post('nome');
		$description = $this->input->post('description');
		$this->form_validation->set_rules('nome','nome','required|max_length[80]|min_length[10]');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[pessoa.Email]');
		$this->form_validation->set_rules('pass','Senha','required|trim|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('confirmpass','Confirmação','required|trim|min_length[5]|max_length[12]|matches[confirmpass]');
		$this->form_validation->set_rules('nascimento','Data de nascimento','required|callback_verificarData');
		$this->form_validation->set_rules('cpf','CPF','required|min_length[14]|max_length[14]');
		$this->form_validation->set_rules('description','Descrição','max_length[300]');
		$this->form_validation->set_rules('telefone','telefone','required|min_length[15]|max_length[15]');
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
				$dados = array($description,$email,$nascimento,password_hash($pass,PASSWORD_DEFAULT),$lat,'uploads/profissionais/'.$this->upload->data('file_name'),$genero,str_replace(array('(',')','-'," "),"",$telefone),$profissao,$lng,$nome,$estado,str_replace(array('.'),"",$cpf));
				$response = $this->getcaptcha($dados,array($this,'cadastraruser'));
				if($response[0] == true){
					$mensagem = $this->geraremail->gerarhtml($nome,base_url('Profissionais/ativarconta/'.$dados[7]));
					$conteudo = $this->email->full_html('Não responda- Ativação da conta',$mensagem);
					$this->email->from('enkisolucoes@gmail.com');
					$this->email->to($email);
					$this->email->subject('Não responda- Ativação da conta');
					$this->email->message($conteudo);
					$this->email->send();
               		$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
                                                Swal({
                                                        title: "Sucesso !",
                                                        text:  "Você foi cadastrado com Sucesso ! Acesse o seu email até as 00:00 de hoje para confirmar sua conta ",
                                                        type: "success"
                                                });
					})');
					redirect('Profissionais/cadastro');
					
					
					}

                        }
		}
		$this->load->view('cadastrarprofissional');
        }
        public function login(){
		$inputlogin  = $this->input->post('email');
		$inputpass  = $this->input->post('senha');
		$this->form_validation->set_rules('email','Login','required|valid_email|trim');
		$this->form_validation->set_rules('senha','Senha','required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('fracasso',validation_errors());

		}else{
			$dados = array($inputlogin,$inputpass);
            $response = $this->getcaptcha($dados,array($this,'logar'));
            if($response[0] == true){
					if($response[2] == 0){
						$session_user = array(
							'id' => $response[1] 
						);
						$this->session->set_userdata($session_user);
						redirect('Profissionais/dashboard');
					}
					else{
						$this->session->set_tempdata('invalido',"window.addEventListener('load',()=>{
							Swal({
								title:  'Erro !',
								text:  'Sua conta ainda não foi ativada',
								type: 'error'
							});
						})");
					}
			}
				else{
					$this->session->set_tempdata('loginerro',"window.addEventListener('load',()=>{
						Swal({
							title:  'Erro !',
							text:  'Login ou senha incorretos',
							type: 'error'
						});
					})");
				}
			}
		$this->load->view('login');
	}
	public function mostrarperfil(){
		$page = ($this->uri->segment(3) ? $this->uri->segment(3) : redirect('Principal/listarperfil'));
		$data['info'] = $this->profmodel->select_data(array($page));
		$this->load->view('profperfil',$data);

	}
	public function dashboard(){
		$this->versession();
		$data['informacoes'] = $this->profmodel->select_data(array($this->session->userdata('id')));
		$data['notificacoes'] = $this->profmodel->select_notnumber(array($this->session->userdata('id')));
		$email = $this->input->post('email');
		$lat = $this->input->post('Lat');
		$lng = $this->input->post('Lng');
		$estado = $this->input->post('Estado');
		$tel = $this->input->post('telefone');
		$description = $this->input->post('description');
		$this->form_validation->set_rules('Description','Descrição','max_length[300]');
		$this->form_validation->set_rules('Email','Email','valid_email|is_unique[pessoa.Email]');
		$this->form_validation->set_rules('Telefone','Telefone','min_length[15]|max_length[15]|trim|is_unique[pessoa.Telefone]');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('validationerror',validation_errors());
		}else{
			$dados = array('Email'=>$email,'Lat'=>$lat,'Lng'=>$lng,'Telefone'=>str_replace(array("(",")"," ","-"),"",$tel),'Sobre'=>$description,'estado'=>$estado);
			$pdados = array();
			foreach($dados as $key => $value ){
				if(!empty($value)){
					$pdados[$key] = $value;
				}
			}
				if($this->profmodel->update_data('pessoa',$pdados,$this->session->userdata('id'))){
					$this->session->set_tempdata('Sucesso','window.addEventListener("load",()=>{
						Swal({
								title: "Sucesso !",
								text:  "Perfil atualizado com Sucesso !",
								type: "success"
							});
						})');
						redirect('Profissionais/dashboard');
				}
			}
		$this->load->view('dashboard',$data);
	}
	public function attsenha(){
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Profissionais/login');
		$senha = $this->input->post('inputpass');
		$senhaconf = $this->input->post('inputconfpass');
		$this->form_validation->set_rules('pass','Senha','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirmpass','Confirmar Senha','trim|required|matches[pass]');
		if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error',validation_errors());
		}else{
			$response = $this->profmodel->update_senha(array($senha,substr($id,5)));
			if($response == true){
				$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
					Swal({
						title: "Sucesso !",
						text:  "Senha atualizada com sucesso",
						type: "success"
					});
				})');
				redirect('Profissionais/login');
		}
		}
		$this->load->view('trocarsenha');
	}
	public function caixadeentrada(){
		$this->versession();
	
		$data['mensagens'] = $this->profmodel->selectMessages(array($this->session->userdata('id')));
		$this->load->view('caixadeentrada');
	}
	public function vermensagem(){
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3): redirect('Profissionais/caixadeentrada/0');
		$this->versession();
		$data['conteudo'] = $this->profmodel->selectMessage();
	}
	public function report(){
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Profissionais/listarperfil');
		$mensagem = $this->input->post('mensagem');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('mensagem',"mensagem",'required');
		$this->form_validation->set_rules('email','email','required');
		$req = array($mensagem,$email,$page);
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
		}else{
			if($this->profmodel->createReport($req) == true){
					$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
				   	Swal({
					   title: "Sucesso !",
					   text:  "Report enviado com sucesso",
					   type: "success"
				   });
			  	 })');
			   redirect('Profissionais/mostrarperfil/'.$page);
			}
		}
	} 
	public function ativarconta(){
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Profissionais/login');
		 $valor = $this->profmodel->ativar_conta(array($id));
		 if($valor == true){
			 $this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
				Swal({
					title: "Sucesso !",
					text:  "Você ativou sua conta com sucesso, agora você já pode fazer login",
					type: "success"
				});
			})');
			redirect('Profissionais/login');
		 }
		 else{
			 $this->session->set_tempdata('problema','window.addEventListener("load",()=>{
				Swal({
					title: "Erro",
					text:  "Sua conta já foi ativada",
					type: "error"
				});
			})');
			redirect('Profissionais/login');
		 }
	}
	public function recuperarsenha(){
		$email = $this->input->post('email');
			$this->session->set_flashdata('fracasso',validation_errors());
			$query  = $this->profmodel->select_senha($email);
			if(!$query == false ){
						$mensagem = $this->geraremail->gerarrecovery(base_url('Profissionais/attsenha/'.rand(10000,99999).$query->Id));
						$conteudo = $this->email->full_html('Não responda-Troca de senha',$mensagem);
						$this->email->from('enkisolucoes@gmail.com');
						$this->email->to($email);
						$this->email->subject('Não responda-Troca de senha');
						$this->email->message($conteudo);
						if(	$this->email->send()){
							$this->session->set_tempdata('senhaenviada','window.addEventListener("load",()=>{
								Swal({
									title: "Sucesso",
									text:  "Uma mensagem foi enviada para o seu email verifique-o",
									type: "success"
								});
							})');
							redirect('Profissionais/login');
						}
						else{
							$this->session->set_tempdata('senhaenviada','window.addEventListener("load",()=>{
								Swal({
									title: "Erro",
									text:  "Houve algum erro no envio do email tente novamente mais tarde",
									type: "error"
								});
							})');
							redirect('Profissionais/login');
						}
					
		}}
	}

