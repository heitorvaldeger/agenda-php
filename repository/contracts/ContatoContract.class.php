<?php

interface ContatoContract {
    public function findAll();
    public function findById(int $contatoId);
    public function createContato(Contato $contato);
    public function updateContato(int $contatoId, Contato $contato);
    public function deleteContato(int $contatoId);
}