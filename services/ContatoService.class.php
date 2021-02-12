<?php

class ContatoService {
    private $contatoRepository;

    public function __construct(ContatoContract $contatoRepository){
        $this->contatoRepository = $contatoRepository;
    }

    public function findAll () {
        $contatos = $this->contatoRepository->findAll();
        return $contatos;
    }

    public function findById (int $contatoId) {
        $contato = $this->contatoRepository->findById($contatoId);

        return $contato;
    }

    public function createContato (Contato $contato) {
        $this->contatoRepository->createContato($contato);
    }

    public function updateContato (int $contatoId, Contato $contato) {
        $this->contatoRepository->updateContato($contatoId, $contato);
    }

    public function deleteContato (int $contatoId) {
        $this->contatoRepository->deleteContato($contatoId);
    }
}