<?php

namespace App\Models;
use MF\Model\Model;
use stdClass;

class Usuario extends Model {

    private $usuario;
    private $senha;
    private $email;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function salvar($usuario, $email, $senha) {
        $query = "insert into usuariosFinanca(usuario, email, senha) values ( :usuario, :email, :senha)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':usuario', $usuario);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        
        $stmt->execute();

        return $this;
    }

    public function verificarUsuario($usuario) {
        $query = "select count(*) as count FROM usuariosFinanca WHERE usuario = :usuario";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':usuario', $usuario);

        $stmt->execute();
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $usuario;
    }

    public function VerificarEmail($email){
        $query = "SELECT count(*) as count FROM usuariosFinanca WHERE email = :email";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $email = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $email;


    }

    public function login($email, $senha){
        $obj = new stdClass();
        $query = "SELECT usuario FROM usuariosFinanca WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        $acesso = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($acesso)){
            $obj->acesso = true;
            $obj->usuario = $acesso['usuario'];
            return $obj;
        } else {
            $obj->acesso =  false;
            return $obj;
        }
        
        
        //return $acesso;
    }
}
?>