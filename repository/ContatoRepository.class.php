<?php

class ContatoRepository implements ContatoContract {
    private $conn;

    const FIND_ALL = "SELECT id, nome, email FROM contatos";

    const FIND_BY_ID = "SELECT id, nome, email FROM contatos WHERE id = ?";

    const INSERT_CONTATO = "INSERT INTO contatos (nome, email)
                            VALUES (?, ?)";
    
    const UPDATE_CONTATO = "UPDATE contatos SET nome = ?, email = ? WHERE id = ?";

    const DELETE_CONTATO = "DELETE FROM contatos WHERE id = ?";

    public function __construct($connectionDatabase){
        $this->conn = $connectionDatabase;
    }

    public function findAll () {
        $resultSet = $this->conn->query(self::FIND_ALL);
        $contatos = null;
        while ($row = $resultSet->fetch(PDO::FETCH_OBJ)) {
            $contato = new Contato();
            $contato->setId($row->id);
            $contato->setNome($row->nome);
            $contato->setEmail($row->email);

            $contatos[] = $contato;
        }

        return $contatos;
    }

    public function findById (int $contatoId) {
        $statment = $this->conn->prepare(self::FIND_BY_ID);
        $statment->bindValue(1, $contatoId);

        if ($statment->execute()) {
            $contato = null;
            while ($row = $statment->fetch(PDO::FETCH_OBJ)) {
                $contato = new Contato();
                $contato->setId($row->id);
                $contato->setNome($row->nome);
                $contato->setEmail($row->email);
            }
        }

        return $contato;
    }
    
    public function createContato(Contato $contato){
        $statment = $this->conn->prepare(self::INSERT_CONTATO);

        $statment->bindValue(1, $contato->getNome());
        $statment->bindValue(2, $contato->getEmail());

        $statment->execute();
    }

    public function updateContato(int $contatoId, Contato $contato){
        $statment = $this->conn->prepare(self::UPDATE_CONTATO);

        $statment->bindValue(1, $contato->getNome());
        $statment->bindValue(2, $contato->getEmail());
        $statment->bindValue(3, $contatoId);

        $statment->execute();
    }

    public function deleteContato(int $contatoId){
        $statment = $this->conn->prepare(self::DELETE_CONTATO);

        $statment->bindValue(1, $contatoId);

        $statment->execute();
    }
}