<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('denuncia_model');
        $this->load->model('principal_model');
        $this->load->helper('form');
        $this->load->model('profmodel');
        $this->load->library('form_validation');
        $this->load->library('pagination');

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
                    if($func == true){
                        return $this->denuncia_model->insert_contato($dado);
                    }else{
                        return $this->denuncia_model->insert_bugs($dado);
                    }
                        
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
    public function index(){
        $this->load->view('principal');
    }

    public function  mapa(){
       $data['lastreports']  = $this->denuncia_model->select_denuncia();
      
       $data['Racismo'] = $this->denuncia_model->select_locais('Racismo');
       $data['Homofobia'] = $this->denuncia_model->select_locais("Homofobia");
       $data['Transfobia'] = $this->denuncia_model->select_locais("Transfobia");
       $data['Religiosa'] = $this->denuncia_model->select_locais('Intolerância religiosa');
       $data['Sexismo'] = $this->denuncia_model->select_locais("Sexismo");
       $data['Xenofobia'] = $this->denuncia_model->select_locais('Xenofobia');
       $data['Elitismo'] = $this->denuncia_model->select_locais('Classismo');
       $data['Gordofobia'] = $this->denuncia_model->select_locais('Gordofobia');
       $data['Lgbtfobia'] = $this->denuncia_model->select_locais('LGBTfobia');
       $data['Deficientes'] = $this->denuncia_model->select_locais('Preconceito contra deficientes');

        $this->load->view('mapa',$data);
    }

    public function contato(){
        
        $nome = $this->input->post('nome');
        $assunto  = $this->input->post('assunto');
        $telefone = $this->input->post('telefone');
        $email = $this->input->post('email');
        $mensagem = $this->input->post('mensagem');
        $motivo = $this->input->post('motivo');
        $area  = $this->input->post('area');
        $this->form_validation->set_rules('nome','Nome','required|min_length[5]');
        $this->form_validation->set_rules('assunto','Assunto','min_length[5]|required');
        $this->form_validation->set_rules('telefone','Telefone','max_length[15]|min_length[15]|required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('mensagem','Mensagem','required|max_length[1000]');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('fracasso',validation_errors());
        }else{
            if($motivo == 'outro'){
                $package = array($assunto,str_replace(array('(',')','-',' '),"",$telefone),$email,$mensagem,$nome);
                if($this->getcaptcha($package,true)){
                $this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
                    Swal({
                        title: "Sucesso !",
                        text:  "Mensagem enviada com sucesso",
                        type: "success"
                    });
                })');}
                redirect('Principal/contato');
            }else{
                $package = array($email,$area,$mensagem);
                if($this->getcaptcha($package,false)){
                $this->session->set_tempdata('sucesso','window.addEventListener("load",()=>{
                    Swal({
                        title: "Sucesso !",
                        text:  "Mensagem enviada com sucesso",
                        type: "success"
                    });
                })');}
                redirect('Principal/contato');
            }
        }        
        $this->load->view('contatar');
}
    public function estatisticas(){
        $idade = $this->principal_model->getavage();
        $data['idade'] = round($idade,2);
        $data['rankinggenero'] = $this->principal_model->selectgender();
        $data['rankingsocialmedia'] = $this->principal_model->getsm();
        $data['rankingestado'] = $this->principal_model->getestado();
        $data['rankingagressao'] = $this->principal_model->gettipoagressao();
        $data['rankingpreconceito'] = $this->principal_model->getestpreconceito();

        $this->load->view('estatisticas',$data);
    }
    
    public function listarprofissionais(){
        
        $this->config_pagination('Principal/listarprofissionais',6,1,3,$this->profmodel->count_pessoas());
        $data['pagination'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3):0;
        $data['pessoas'] = $this->profmodel->get_pessoas((int)$page);
        $this->load->view('profissionais',$data);
    }
    public function flistarprofissionais(){
        $id = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
        $nome = '%'.$this->input->post('nome').'%';
        $estado = $this->input->post('estado');
        $profissao = $this->input->post('profissao');
        if($nome){
            $this->session->set_userdata('profnome',$nome);
        }
        else if($this->session->userdata('profnome')){
            $nome = '%'.$this->session->userdata('profnome').'%';
        }
        if($estado){
            $this->session->set_userdata('profestado',$estado);
        }
        else if($this->session->userdata('profestado')){
            $estado = $this->session->userdata('profestado');
        }
        if($profissao){
            $this->session->set_userdata('prfprofissao',$nome);
        }
        else if($this->session->userdata('prprofissao')){
            $profissao = $this->session->userdata('prprofissao');
        }
        $this->config_pagination('Principal/flistarprofissionais',6,1,3,$this->profmodel->count_fpessoas(array($nome,$profissao,$estado)));
        $data['pagination'] = $this->pagination->create_links();
        $data['pessoas'] = $this->profmodel->get_fpessoas(array($nome,$profissao,$estado,$id));
        $this->load->view('profissionais',$data);

}
    
    public function mural(){
        $data['seletor'] = 'estado';
        $data['locais'] =  array('AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia','CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás','MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul', 'MG'=>'Minas Gerais','PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí','RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul','RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo','SE'=>'Sergipe','TO'=>'Tocantins');
        $data['endereco'] = "Principal/pfmural";
        $this->config_pagination('Principal/mural',5,1,3,$this->principal_model->count_flines());
        $data['pagination'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $data['local'] = '';
        $data['metodo'] = "Principal/mdenunciaf/";
        $data['denuncias'] = $this->principal_model->get_denuncias((int)$page);
        $this->load->view('mural',$data);
    }
    public function mdenunciav(){
        $id = ($this->uri->segment(3))? $this->uri->segment(3) : redirect('Principal/muralvirtual');
        $data['conteudo'] = $this->principal_model->getdenunciav(array($id));
        $this->load->view('exibirdenunciav',$data);
    }

    public function mdenunciaf(){
        $id = ($this->uri->segment(3))? $this->uri->segment(3) : redirect('Principal/mural');
        $data['conteudo'] = $this->principal_model->getdenuncia(array($id));
        $this->load->view('exibirdenunciaf',$data);
    }
    public function pfmural(){
        $pesquisa = array();
        $data['seletor'] = 'estado';
        $data['endereco'] = "Principal/pfmural";
        $data['metodo'] = "Principal/mdenunciaf/";
        $data['locais'] =  array('AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia','CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás','MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul', 'MG'=>'Minas Gerais','PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí','RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul','RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo','SE'=>'Sergipe','TO'=>'Tocantins');
        $preconceito = $this->input->post('preconceito');
        $local = $this->input->post('local');
         if ($preconceito){
            $this->session->set_userdata('pesquisapreconceito',$preconceito);

        }else if($this->session->userdata('pesquisapreconceito')){
            $preconceito = $this->session->userdata('pesquisapreconceito');
        }
        if($local){
            $this->session->set_userdata('pesquisalocal',$local);
        }
        else if($this->session->userdata('pesquisalocal')){
            $local = $this->session->userdata('pesquisalocal');
        }
        $this->config_pagination('Principal/pfmural',5,1,3,$this->principal_model->countpreconceito(array($local,$preconceito)));
        $data['pagination'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $data['local'] = 'físicas';
        $data['voltar'] = "<a class='btn btn-primary' href='".base_url('Principal/mural')."'> Voltar</a>";
        $data['metodo'] = "Principal/mdenunciaf/";
        $data['denuncias'] = $this->principal_model->getdenunciaspreconceito(array($local,$preconceito,(int)$page));
        $this->load->view('mural',$data);

    }
    public function pvmural(){
        $pesquisa = array();
        $data['endereco'] = "Principal/pvmural";
        $data['seletor'] = 'local';
        $data['metodo'] = "Principal/mdenunciav/";
        $data['locais'] = array('Whatsapp' => 'Whatsapp', 'Facebook' => 'Facebook','Twitter' => 'Twitter','Instagram' => 'Instagram','Outro'=>'Outro');
        $preconceito = $this->input->post('preconceito');
        $local = $this->input->post('local');
         if ($preconceito){
            $this->session->set_userdata('pesquisapreconceito',$preconceito);

        }else if($this->session->userdata('pesquisapreconceito')){
            $preconceito = $this->session->userdata('pesquisapreconceito');
        }
        if($local){
            $this->session->set_userdata('pesquisalocal',$local);
        }
        else if($this->session->userdata('pesquisalocal')){
            $local = $this->session->userdata('pesquisalocal');
        }
        $this->config_pagination('Principal/pfmural',5,1,3,$this->principal_model->countdenunciaspvirtuais(array($local,$preconceito)));
        $data['pagination'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $data['local'] = 'virtuais';
        $data['voltar'] = "<a class='btn btn-primary' href='".base_url('Principal/muralvirtual')."'> Voltar</a>";
        $data['metodo'] = "Principal/mdenunciav/";
        $data['denuncias'] = $this->principal_model->getdenunciaspvirtuais(array($local,$preconceito,(int)$page));
        $this->load->view('mural',$data);
    }

    public function muralvirtual(){
        $data['seletor'] = 'local';
        $data['endereco'] = "Principal/pvmural";
        $data['metodo'] = "Principal/mdenunciav/";
        $data['locais'] = array('Whatsapp' => 'Whatsapp', 'Facebook' => 'Facebook','Twitter' => 'Twitter','Instagram' => 'Instagram','Outro'=>'Outro');
        $this->config_pagination('Principal/muralvirtual',5,1,3,$this->principal_model->count_vlines());
        $data['pagination'] = $this->pagination->create_links();
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $data['local'] = 'virtuais';
        $data['metodo'] = "Principal/mdenunciav/";
        $data['denuncias'] = $this->principal_model->get_denunciasvirtuais((int)$page);
        $this->load->view('mural',$data);
    }

    public function profissionais(){
        $this->load->view('bprofissionais');
    }

}

?>