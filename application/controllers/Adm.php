<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('admmodel');
		$this->load->library('pagination');
		
		
	}
	private function versession(){
		if($this->session->userdata('user') == ''){
			session_destroy();
			redirect('administracao');
		}
	}
	private function config_pagination($caminho,$tabela,$page,$links,$uri,$seletor){
		
		$config = array(
			
			"base_url" => base_url($caminho),
			"per_page" => $page,
			"num_links"=> $links,
			"uri_segment"=>$uri,
			'total_rows' =>  $this->admmodel->cont_Alltable($tabela,$seletor)
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
	public function login(){
		$inputlogin  = $this->input->post('inputlogin');
		$inputpass  = $this->input->post('inputpass');
		$this->form_validation->set_rules('inputlogin','Login','required');
		$this->form_validation->set_rules('inputpass','Senha','required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('fracasso',validation_errors());

		}else{
			$dados = array($inputlogin,$inputpass);
			if($this->admmodel->logar($dados) == true){
				$session_user = array(
					'user' => $inputlogin 
				);
				$this->session->set_userdata($session_user);
				redirect('painel');
			}else{
				$this->session->set_flashdata('errologin','<div class="alert alert-danger">Login ou senha incorretos</div>');
				}
		}
		$this->load->view('loginadm');
	}
	public function painel(){
		$this->versession();
		$valor = $this->admmodel->pvalores();
		$contato = $this->admmodel->getn_Table('contato');
		if($contato[0] == true){
			$this->session->set_flashdata('mensagem',$contato[1]);
		}
		$reports = $this->admmodel->getn_Table('bug');
		if($reports[0]==true){
			$this->session->set_flashdata('bugreport',$reports[1]);
		}
		$falsario = $this->admmodel->getn_Table('reports');
			if($falsario[0] == true){
				$this->session->set_flashdata('falsariomensagem',$falsario[1]);
			}
		$this->load->view('perfil',$valor);
	}
	public function psicologos(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/advogados','pessoa WHERE Profissao = "Psicólogo" ','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['profissionais'] = $this->admmodel->get_AllUs('pessoa WHERE Profissao = "Psicólogo" ',$page);
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Psicólogos';
		$data['title'] = 'Psicólogos';
		$data['caminhopesquisa'] = "Adm/ppsicologos";
		$data['delvalor'] = 1;
		$this->load->view("trabalhadores",$data);
	}
	public function ppsicologos(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$data['delvalor'] = 1;
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/ppsicologos','pessoa WHERE Profissao = "Psicólogo" ','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['profissionais'] = $this->admmodel->filterTable($page,$cons.'AND Profissao = "Psicólogo" ','pessoa');
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = "Painel de Psicólogos";
		$data['caminhopesquisa'] = "Adm/ppsicologos";
		$data['caminhoRetorno'] = "Adm/psicologos";
		$data['title'] = "Pesquisa de Psicologos";
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('trabalhadores',$data);
	}

	public function advogados(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/advogados','pessoa WHERE Profissao = "Advogado" ','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['profissionais'] = $this->admmodel->get_AllUs('pessoa WHERE Profissao = "Advogado" ',$page);
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Advogados';
		$data['title'] = 'Advogados';
		$data['delvalor'] = 2;
		$data['caminhopesquisa'] = "Adm/padvogados";
		$this->load->view("trabalhadores",$data);
	}
	public function padvogados(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$data['delvalor'] = 2;
		$cons = 'Profissao = "Advogado" AND '.$filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/padvogados','pessoa WHERE Profissao = "Advogado" ','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['profissionais'] = $this->admmodel->filterTable($page,$cons,'pessoa');
		$data['pagination'] = $this->pagination->create_links();
		$data['caminhopesquisa'] = "Adm/padvogados";
		$data['caminhoRetorno'] = "Adm/advogados";
		$data['title'] = "Pesquisa Advogados";
		$data['header'] = 'Painel de Advogados';
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('trabalhadores',$data);
	}
	public function  contato(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/contato','contato','15','10','3',true);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->get_AllUs('contato WHERE Lida = 1',$page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('contato',$data);
	}
	public function pcontato(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/pcontato','contato','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->filterTable($page,$cons,'contato');
		$data['pagination'] = $this->pagination->create_links();
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('contato',$data);
	}
	public function reports(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/reports','reports','15','10','3',true);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->get_AllUs('reports WHERE Lida = 1',$page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('reports',$data);
	}
	public function preports(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/preports','reports','15','10','3',true);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->filterTable($page,$cons,'reports');
		$data['pagination'] =  $this->pagination->create_links();
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('reports',$data);	
	}
	public function moderadores(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/moderadores','moderadores','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->get_AllUs('moderadores',$page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('moderadores',$data);
	}
	public function pmoderadores(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/pmoderadores','moderadores','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->filterTable($page,$cons,'moderadores');
		$data['pagination'] = $this->pagination->create_links();
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('moderadores',$data);
	}
	public function denunciaf(){
		$this->versession();
		if($this->admmodel->select_data('denuncias',$this->uri->segment(3))==false){
			redirect('Adm/denunciasf');
		}
		else{
			$data['conteudo'] = $this->admmodel->select_data('denuncias',$this->uri->segment(3));
			$this->load->view('admdenunciaf',$data);
		}
	}
	public function freport(){
		$this->versession();
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/reports');
			$dados = $this->admmodel->select_data('reports',$id);
			$data['conteudo'] = $dados;
			$this->load->view('mensagemfalsario',$data);
	}
	public function contatoreport(){
		$this->versession();
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/contato');
			$this->admmodel->update_data('contato','Lida = 0',$id); 
			$dados = $this->admmodel->select_data('contato',$id);
			$data['conteudo'] = $dados;
			$this->load->view('mensagemcontato',$data);
	}
	public function denunciav(){
		$this->versession();
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/denunciasv');
			$dados = $this->admmodel->select_data('denunciasvirtuais',$id);
			$data['conteudo'] = $dados;
		$this->load->view('admdenunciav',$data);
	}
	public function denunciasf(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/denunciasf','denuncias','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->get_AllUs('denuncias',$page);
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Denuncias Físicas';
		$data['title'] = 'Denuncias Físicas';
		$data['caminhopesquisa'] = "Adm/pdenunciasf";
		$data['caminhodenuncia'] = "Adm/denunciaf";
		$this->load->view('admdenuncias',$data);
	}
	public function pdenunciasf(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/pdenunciasf','denuncias','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->filterTable($page,$cons,'denuncias');
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Denuncias Físicas';
		$data['title'] = 'Denuncias Físicas';
		$data['caminhopesquisa'] = "Adm/pdenunciasf";
		$data['caminhoretorno'] = "Adm/denunciasf";
		$data['caminhodenuncia'] = "Adm/admdenunciaf";
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('admdenuncias',$data);
	}
	public function denunciasv(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/denunciasv','denunciasvirtuais','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->get_AllUs('denunciasvirtuais WHERE aprovada = 2 OR aprovada = 0',$page);
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Denuncias Virtuais';
		$data['title'] = 'Denuncias Virtuais';
		$data['caminhodenuncia'] = "Adm/denunciav";
		$data['caminhopesquisa'] = "Adm/pdenunciasv";
		
		$this->load->view('admdenuncias',$data);
	}
	public function pdenunciasv(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/pdenunciasv','denunciasvirtuais','15','10','3',false);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['denuncias'] = $this->admmodel->filterTable($page,$cons,'denuncias');
		$data['pagination'] = $this->pagination->create_links();
		$data['header'] = 'Painel de Denuncias Virtuais';
		$data['title'] = 'Denuncias Virtuais';
		$data['caminhopesquisa'] = "Adm/pdenunciasv";
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$data['caminhoretorno'] = "Adm/denunciasv";
		$data['caminhodenuncia'] = "Adm/denunciav";
		$this->load->view('admdenuncias',$data);
	}
	public function bugs(){
		$this->versession();
		$this->session->unset_userdata('pesquisa');
		$this->config_pagination('Adm/bugs','bug','15','10','3',true);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['reports'] = $this->admmodel->get_AllMes('bug',$page);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('bugs',$data);
	}
	public function pesquisabugs(){
		$this->versession();
		$pesquisa = $this->input->post('pesquisa');
		$filtro = $this->input->post('filtro');
		$cons = $filtro." LIKE '%".$pesquisa."%' ";
		if($pesquisa){
			$this->session->set_userdata('pesquisa',$cons);
		}elseif($this->session->userdata('pesquisa')){
			$cons = $this->session->userdata('pesquisa');

		}
		$this->config_pagination('Adm/pesquisabugs','bug','15','10','3',true);
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		$data['reports'] = $this->admmodel->filterTable($page,$cons,'bug');
		$data['pagination'] =  $this->pagination->create_links();
		$data['retornar'] = '<div class="btn btn-primary">Voltar</div>';
		$this->load->view('bugs',$data);	
	}
	public function excluirtrab(){
		$this->versession();
			if($this->uri->segment(3) == 1){
				if($this->admmodel->delete_data('pessoa',$this->uri->segment(4)) == true){
					$this->session->set_tempdata('pdel','
						window.addEventListener("load",()=>{
							Swal({
								title: "Sucesso !",
								text:  "Psicologo excluido com sucesso",
								type: "success"
							});
						})
					');
					redirect('Adm/psicologos');
					
				}else{
					$this->session->set_tempdata('fail','
					document.addEventListener("load",()=>{
					  Swal({
						title: "falha !",
						text:  "Houve algum erro",
						type: "error"
					  });
					  })');
					redirect(base_url('Adm/psicologos'));
				}
			}else if($this->uri->segment(3) == 2){
				$id = ($this->uri->segment(4))? $this->uri->segment(4) : redirect(base_url('Adm/painel'));
				if($this->admmodel->delete_data('pessoa',$id) == true){
					$this->session->set_tempdata('adel','
						window.addEventListener("load",()=>{
							Swal({
								title: "Sucesso !",
								text:  "Advogado excluido com sucesso",
								type: "success"
							});
						})
					');
					redirect(base_url('Adm/advogados'));
					
				}else{
					$this->session->set_tempdata('fail','
					document.addEventListener("load",()=>{
					  Swal({
						title: "falha !",
						text:  "Houve algum erro",
						type: "error"
					  });
					  })');
					redirect(base_url('Adm/advogados'));
				}
			}
		}
		public function excluirfalsario(){
			$this->versession();
			$id = $this->uri->segment(3);
			if($this->admmodel->delete_data('reports',$id)==true){
				$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
					Swal({
						title: "Sucesso !",
						text:  "Report excluido com sucesso",
						type: "success"
					});
				})');
				redirect('Adm/reports');
			}
		}
		public function excluircont(){
			$this->versession();
			$id = $this->uri->segment(3);
			if($this->admmodel->delete_data('contato',$id)==true){
				$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
					Swal({
						title: "Sucesso !",
						text:  "Mensagem de contato excluida com sucesso",
						type: "success"
					});
				})');
				redirect('Adm/contato');
			}
		}
		public function excluirrepo(){
			$this->versession();
			$id = $this->uri->segment(3);
			if($this->admmodel->delete_data('bug',$id)==true){
				$this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
					Swal({
						title: "Sucesso !",
						text:  "Mensagem de Bug excluido com sucesso",
						type: "success"
					});
				})');
				redirect('Adm/bugs');
			}
		}
		public function modperfil(){
			$this->versession();
			$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/moderadores');
			$dados = $this->admmodel->select_data('moderadores',$id);
			$data['conteudo'] = $dados;
			$this->load->view('modperfil',$data);
		}
		public function deslogar(){
			session_destroy();
			redirect('Adm/login');
			
		}
		public function bugreport(){
			$this->versession();
			$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/bugs');
			$this->admmodel->update_data('bug','Lida = 0',$id); 
			$dados = $this->admmodel->select_data('bug',$id);
			$data['conteudo'] = $dados;
			$this->load->view('mensagembug',$data);
		}
		public function aprovardenuncia(){
			$this->versession();
			$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/denunciasv');
			if($this->admmodel->update_data('denunciasvirtuais','aprovada = 0',$id)){
				$this->session->set_tempdata('adv','
						window.addEventListener("load",()=>{
							Swal({
								title: "Sucesso !",
								text:  "Denuncia aprovada com sucesso",
								type: "success"
							});
						})
					');
				redirect('Adm/denunciasv');
			} 


		}
		public function reprovardenuncia(){
			$this->versession();
			$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/denunciasv');
			if($this->admmodel->delete_data('denunciasvirtuais',$id)){
				$this->session->set_tempdata('adv','
						window.addEventListener("load",()=>{
							Swal({
								title: "Sucesso !",
								text:  "Denuncia aprovada com sucesso",
								type: "success"
							});
						})
					');
				redirect('Adm/denunciasv');
			}

		}
		public function Log(){
			$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : redirect('Adm/moderadores');
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4): 0;
			$this->config_pagination('Adm/Log',' logs WHERE id_mod = '.$id,'15','10','3',false);
			$data['logs'] = $this->admmodel->filtertable($page,'id_mod = '.$id,'logs');
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view("log",$data);

			
		}
		

	}
