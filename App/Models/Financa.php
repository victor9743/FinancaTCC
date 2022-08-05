<?php

namespace App\Models;
use MF\Model\Model;
use stdClass;

class Financa extends Model {

    public function getAll()
    {
        $query = "SELECT * FROM financas";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $financa = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $financa;
    }

    public function salvarFinanca($descricao, $valor, $tipo, $data)
    {
        $query = "INSERT INTO Financas(descricao, valor, tipo, dataFinanca) VALUES(:descricao, :valor, :tipo, :data)";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":tipo", $tipo);
        $stmt->bindValue(":data", $data);

        $stmt->execute();

        return $this;

    }
}

?>