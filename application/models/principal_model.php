<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class principal_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}
	private function calcdias($dia){
		date_default_timezone_set('America/Sao_Paulo');
		return floor((strtotime('today') - $dia)/(60*60*24));
	}
	public function count_flines(){
		$query = "SELECT * FROM denuncias WHERE Aprovada = 0";
		$row = $this->db->query($query);
		return $row->num_rows();
	}
	public function count_vlines(){
		$query = "SELECT * FROM denunciasvirtuais";
		$row = $this->db->query($query);
		return $row->num_rows();
	}
	public function get_denuncias($page){
		$sel = "SELECT * FROM denuncias WHERE Aprovada = 0 ORDER BY id DESC LIMIT 5 OFFSET ?";
		$selquery = $this->db->query($sel,$page);
         if($selquery->num_rows()>0){
             foreach($selquery->result() as $row){
				 $row->subdia = $this->calcdias(strtotime($row->subdia));
                 $data[] = $row;
             }
             return $data;
         }
         return false;
	}

	public function get_denunciasvirtuais($page){
		$sel = "SELECT * FROM denunciasvirtuais ORDER BY id DESC LIMIT 5 OFFSET ?";
		$selquery = $this->db->query($sel,$page);
         if($selquery->num_rows()>0){
             foreach($selquery->result() as $row){
				 $row->subdia = $this->calcdias(strtotime($row->subdia));
                 $data[] = $row;
             }
             return $data;
         }
         return false;
	}
	public function getdenunciaspvirtuais($cont){
		$sel = "SELECT * FROM denunciasvirtuais WHERE lugar = ? AND preconceito = ?  ORDER BY id DESC LIMIT 5 OFFSET ?";
		$selquery = $this->db->query($sel,$cont);
		if($selquery->num_rows()>0){
			foreach($selquery->result() as $row){
				$row->subdia = $this->calcdias(strtotime($row->subdia));
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function countdenunciaspvirtuais($cont){
		$sel = "SELECT * FROM denunciasvirtuais WHERE lugar = ? AND preconceito = ?";
		$response = $this->db->query($sel,$cont);
		return $response->num_rows();
	}

	public function getdenunciaspreconceito($cont){
		$query = "SELECT denuncias.subdia AS subdia,denuncias.descricao AS descricao,denuncias.id AS id FROM denuncias,local WHERE local.estado = ? AND denuncias.id_local = local.id AND denuncias.Aprovada = 0 AND denuncias.preconceito = ? ORDER BY denuncias.id DESC LIMIT 5 OFFSET ?";
		$selquery  = $this->db->query($query,$cont);
		if($selquery->num_rows()>0){
			foreach($selquery->result() as $row){
				$row->subdia = $this->calcdias(strtotime($row->subdia));
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function countpreconceito($data){
		$query = "SELECT * FROM denuncias,local WHERE local.estado = ? AND denuncias.id_local = local.id AND denuncias.preconceito = ? AND denuncias.Aprovada = 0";
		$response = $this->db->query($query,$data);
		return $response->num_rows();
	}
	public function getdenunciav($id){
		$query = "SELECT * FROM denunciasvirtuais WHERE id = ?";
		$result = $this->db->query($query,$id);
		$response = $result->row();
		$response->subdia = $this->calcdias(strtotime($response->subdia));
		return $response;
	}
	
	public function getdenuncia($id){
		$query = "SELECT denuncias.genero AS genero,denuncias.idade AS idade,denuncias.dia AS dia,denuncias.Horario AS horario,denuncias.preconceito AS preconceito, denuncias.descricao AS descricao, denuncias.subdia AS subdia,denuncias.forma AS forma,local.endereco AS endereco  FROM denuncias,local WHERE denuncias.id = ? AND Aprovada = 0 AND denuncias.id_local = local.id";
		$result = $this->db->query($query,$id);
		$response = $result->row();
		$response->subdia = $this->calcdias(strtotime($response->subdia));
		return $response;
	}
	public function getestado(){
		$query = "SELECT COUNT('estado') AS quant,estado FROM local GROUP BY estado ORDER BY quant DESC";
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function gettipoagressao(){
		$query = "SELECT COUNT('forma') AS quant,forma FROM denuncias GROUP BY forma ORDER BY quant DESC";
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function getestpreconceito(){
		$query = "SELECT COUNT('preconceito') AS quant,preconceito FROM denunciastotais GROUP BY preconceito ORDER BY quant DESC";
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function getsm(){
		$query = "SELECT COUNT('lugar') AS quant,lugar FROM denunciasvirtuais GROUP BY lugar ORDER BY quant DESC";
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function getavage(){
		$query = "SELECT AVG(idade) AS media FROM denunciastotais";
		$result = $this->db->query($query);
		$response = $result->row();
		return $response->media;
	}
	public function filterfav($preconceito){
		$query = "SELECT AVG(idade) AS media FROM denunciastotais WHERE preconceito = ?";
		$result = $this->db->query(array($preconceito));
		$response = $result->row();
		return $response->media; 	
	}
	public function selectgender(){
		$query = "SELECT COUNT('genero') AS quant,genero FROM denunciastotais GROUP BY genero ORDER BY quant DESC";
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
}




