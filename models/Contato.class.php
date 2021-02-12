<?php

class Contato {
    private $id;
    private $nome;
    private $email;

    public function getId () {
        return $this->id;
    }

    public function getNome () {
        return $this->nome;
    }

    public function getEmail () {
        return $this->email;
    }

    public function setId ($value) {
        $this->id = $value;
    }

    public function setNome ($value) {
        $this->nome = $value;
    }

    public function setEmail ($value) {
        $this->email = $value;
    }
}