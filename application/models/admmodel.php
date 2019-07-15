<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admmodel extends CI_Model {
	function __construct(){
		parent::__construct();

    }
    public function logar($dados){
        $loginquery = "SELECT Senha FROM administradores WHERE Login = ?";
         $query = $this->db->query($loginquery,$dados[0]);
        if($query->num_rows()>0){
            $row = $query->row_array();
            if(password_verify($dados[1],$row['Senha'])){
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }
    //retorna os valores do banco de dados para alimentar o perfil
    public function pvalores(){
        $modquery = "SELECT * FROM moderadores";
        $psiquery = "SELECT *  FROM pessoa WHERE Profissao = 'Psicólogo'";
        $adquery = "SELECT *  FROM pessoa WHERE Profissao = 'Advogado'";
        $denquery = "SELECT * FROM denuncias ";
        $denvquery = "SELECT * FROM denunciasvirtuais";
        $tdydenquery = 'SELECT * FROM denuncias WHERE subdia = CURDATE()';
        $tdydenvquery = "SELECT * FROM denunciasvirtuais WHERE subdia = CURDATE()";
    
        $adresult = $this->db->query($adquery)->num_rows();
        $tdydenr = $this->db->query($tdydenquery)->num_rows();
        $tdydenvr = $this->db->query($tdydenvquery)->num_rows();
        $modr = $this->db->query($modquery)->num_rows();
        $psire = $this->db->query($psiquery)->num_rows();
        $denr = $this->db->query($denquery)->num_rows();
        $denvr = $this->db->query($denvquery)->num_rows();
        $numeros = array('denf'=>($denr+$denvr),'modr'=>$modr,'psicor'=>$psire,'tdy'=>($tdydenr+$tdydenvr),'denr'=>$denr,'denvr'=>$denvr,'adr'=>$adresult);
        return $numeros;
    }
    public function getn_Table($tabela){
        $contatoquery = 'SELECT * FROM '.$tabela.' WHERE Lida = 1';
        $query = $this->db->query($contatoquery);
        if($query->num_rows()>0){
            return array(true,$query->num_rows());
        }
        else{
            return array(false,'');
        }
    }
    //retorna as mensagens de acordo com a seleção da tabela e do offset
    public function get_AllMes($table,$offset){
        $sel = "SELECT * FROM ".$table." WHERE Lida = 1 ORDER BY id ASC LIMIT 15 OFFSET ".$offset;
        $selquery = $this->db->query($sel);
         if($selquery->num_rows()>0){
             foreach($selquery->result() as $row){
                 $data[] = $row;
             }
             return $data;
         }
         return false;
    }
    public function get_AllUs($table,$offset){
        $sel = "SELECT * FROM ".$table." ORDER BY id ASC LIMIT 15 OFFSET ".$offset;
        $selquery = $this->db->query($sel);
         if($selquery->num_rows()>0){
             foreach($selquery->result() as $row){
                 $data[] = $row;
             }
             return $data;
         }
         return false;
    }
    public function filterTable($offset,$query,$table){
        $sel = "SELECT * FROM ".$table." WHERE ".$query." ORDER BY id ASC LIMIT 15 OFFSET ".$offset;
        $selquery = $this->db->query($sel);
         if($selquery->num_rows()>0){
             foreach($selquery->result() as $row){
                 $data[] = $row;
             }
             return $data;
         }
         return false;
    }
    public function cont_Alltable($table,$seletor){
        if($seletor == true){
            $sel = "SELECT * FROM ".$table." WHERE Lida = 1";
        }else{
            $sel = "SELECT * FROM ".$table;
        }
        return $this->db->query($sel)->num_rows();
    }
    public function select_data($table,$arg){
        $query = 'SELECT * FROM '.$table.' WHERE id='.$arg;
        $consulta = $this->db->query($query);
        if($consulta->num_rows()>0){
            return $consulta->row();
        }
        return false;

    }
    public function delete_data($table,$arg){
        $query = "DELETE FROM ".$table." WHERE id = ".$arg;
        return $this->db->query($query) == true;
         
    }
    public function update_data($table,$arg,$id){
        $query = "UPDATE ".$table." SET ".$arg." WHERE id = ".$id;
        return $this->db->query($query);
    }

}