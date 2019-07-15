<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class denuncia_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}
	protected function insertLocal($local){
		$insertquery = "INSERT INTO local(endereco,estado,lng,lat) VALUES (?,?,?,?)";
		$this->db->query($insertquery,$local);
		return $this->db->insert_id();
	}
	public function insertDenuncia($denuncia,$local){
		$id = $this->insertLocal($local);
		$denuncia[] = $id;
		$insertdenunciaquery = "INSERT INTO denuncias(descricao,dia,forma,genero,preconceito,idade,Horario,Aprovada,id_local,subdia) VALUES (?,?,?,?,?,?,?,?,?,CURDATE())";
		$query = "INSERT INTO denunciastotais(horario,idade,preconceito,genero,dia) VALUES(?,?,?,?,?)";
		$this->db->query($query,array($denuncia[6],$denuncia[5],$denuncia[4],$denuncia[3],$denuncia[1]));
		$result = $this->db->query($insertdenunciaquery,$denuncia);
		return $result;
		
	}
	public function insertDenunciaVirtual($denuncia){
			$insertDenunciaVirtual = "INSERT INTO denunciasvirtuais(genero,idade,dia,horario,preconceito,fotocaminho,descricao,lugar,subdia,aprovada) VALUES (?,?,?,?,?,?,?,?,CURDATE(),2)";
			$query = "INSERT INTO denunciastotais(horario,idade,preconceito,genero,dia) VALUES(?,?,?,?,?)";
			$this->db->query($query,array($denuncia[3],$denuncia[1],$denuncia[4],$denuncia[0],$denuncia[2]));
			return $this->db->query($insertDenunciaVirtual,$denuncia);

	}

	public function select_denuncia(){
		$query = "SELECT denuncias.preconceito AS preconceito,denuncias.descricao AS descricao,local.estado AS estado,local.endereco AS endereco,denuncias.id AS id  FROM denuncias,local WHERE denuncias.id_local = local.id AND denuncias.aprovada = 0 ORDER BY denuncias.id DESC LIMIT 4";
		$row = $this->db->query($query);
		if($row->num_rows()>0){
			foreach($row->result() as $result){
				$data[] = $result;
			}
			return $data;
		}
		return false;
		
	}
	public function select_locais($preconceito){
		$denunciaquery = "SELECT id_local FROM denuncias WHERE preconceito = ".$this->db->escape($preconceito);
		$denunrow = $this->db->query($denunciaquery);
		if($denunrow->num_rows()>0){
			foreach($denunrow->result() as $dresult){
				$denuncias[] = $dresult->id_local;
			}
			foreach($denuncias as $id){
				$denunciaquery = "SELECT * FROM local WHERE id = ".$this->db->escape($id);
				foreach($this->db->query($denunciaquery)->result() as  $result){
					$coordenadas[] = $result;
				}
			}
			return $coordenadas;
		}
		return false;
}
	public function insert_contato($pacote){
		$query = "INSERT INTO contato(assunto,telefone,email_r,mensagem,Nome,Lida,dia) VALUES (?,?,?,?,?,1,CURDATE())";
		 return $this->db->query($query,$pacote);
	}

	public function insert_bugs($pacote){
		$query = "INSERT INTO bug(email,Area,Mensagem,Lida,dia) VALUES (?,?,?,1,CURDATE())";
		return $this->db->query($query,$pacote);
	}
}
