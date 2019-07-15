<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profmodel extends CI_Model{
     function __construct(){
         parent:: __construct();
     }
     public function cadastraruser($user){
         $query = "INSERT INTO pessoa(Sobre,Email,Nascimento,Senha,Lat,Imagem,Sexo,Telefone,Profissao,Lng,Nome,estado,Cpf,ultima_vez,aprovada) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,AES_ENCRYPT(?,'AmPP2hsuwef9CLMF07ClYgKRhCkx5D4C'),CURDATE(),1)";
         $row = $this->db->query($query,$user);
        return array($row,$this->db->insert_id());
        }
     
     public function logar($dados){
        $loginquery = "SELECT Senha,Id,Aprovada FROM pessoa WHERE Email = ? ";
         $query = $this->db->query($loginquery,$dados[0]);
        if($query->num_rows()>0){
            $row = $query->row_array();
            if(password_verify($dados[1],$row['Senha'])){
                return array(true,$row['Id'],$row['Aprovada']);
            }
            else{
                return array(false);
            }
        }else{
            return array(false);
        }
    }
    public function update_data($table,$dados,$id){
        $this->db->where('Id',$id);
        return $this->db->update($table,$dados);


    }
    public function select_senha($email){
        $query = "SELECT Id FROM pessoa WHERE Email = ?";
        $row = $this->db->query($query,$email);
        if($row->num_rows() > 0){
            return $row->row();
        }
        return false;
    }
    public function count_fpessoas($cont){
        $query = "SELECT * FROM pessoa WHERE Nome LIKE ? AND Aprovada = 0 AND Profissao = ? AND estado = ?";
        $request = $this->db->query($query,$cont);
        return $request->num_rows();
    }
    public function get_fpessoas($cont){
        $query = "SELECT * FROM pessoa WHERE Nome LIKE ? AND Aprovada = 0 AND Profissao = ? AND estado = ? ORDER BY Id DESC LIMIT 6 OFFSET ?";
        $request = $this->db->query($query,$cont);
        if($request->num_rows()>0){
			foreach($request->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
        
    }
    public function select_data($id){
        $query = "SELECT * FROM pessoa WHERE Id = ? ";
        $row = $this->db->query($query,$id);        
        if($row->num_rows()>0){
            return $row->row();
        }
    }
    public function select_notification($id){
        $query = "SELECT * FROM ContatoProfissionais WHERE id_prof = ?";
        $row = $this->db->query($query,$id);
        if($row->num_rows()>0){
            return $row->row();
        }
    }
    public function select_notnumber($number){
        $query = "SELECT * FROM ContatoProfissionais WHERE id_prof = ?";
        $row = $this->db->query($query,$number);
        return $row->num_rows();
    }
    public function ativar_conta($id){
        $query = "UPDATE pessoa SET Aprovada = 0 WHERE Telefone = ?";
        $row = $this->db->query($query,$id);
        return $row;
    }
    public function update_senha($array){
        $query = "UPDATE PESSOA SET Senha = ? WHERE Id = ?";
        $row = $this->db->query($query,$array);
        return $row;
    }
    public function count_pessoas(){
        $query = "SELECT Nome,Id,estado,Profissao,Imagem FROM pessoa WHERE Aprovada = 0";
        $request = $this->db->query($query);
        return $request->num_rows();
    }
    public function get_pessoas($cont){
        $query = "SELECT Nome,Id,estado,Profissao,Imagem FROM pessoa WHERE Aprovada = 0 ORDER BY Id DESC  LIMIT 6 OFFSET  ?";
        $request = $this->db->query($query,array($cont));
        if($request->num_rows()>0){
			foreach($request->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
    public function sendMessage($message){
        $query = "INSERT INTO contatoprofissionais(email_r,Nome,Telefone,id_prof,Mensagem) VALUES (?,?,?,?,?)";
        $request = $this->db->query($query,$message);
        return $request;
    }
    public function selectMessages($id){
        $query = "SELECT email_r,Nome,id from contatoprofissionais WHERE id_prof = ?";
        $request = $this->db->query($query,$id);
        if($request->num_rows()>0){
            foreach($request->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function selectMessage($id){
        $query = "SELECT * from contatoprofissionais  WHERE id = ?";
        $request = $this->db->query($query,$id);
        if($request->num_rows()>0){
            return $request->rows();
        }
        return false;
    }
    public function createReport($req){
        $query = "INSERT INTO reports(Lida,envio,Mensagem,emailreport,UserId) VALUES(1,CURDATE(),?,?,?)";
        $response = $this->db->query($query,$req);
        return $response;
    }
    
}
?>