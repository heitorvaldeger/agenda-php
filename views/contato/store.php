<?php

include_once '../init.php';

try {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_CALLBACK, array('options' => function ($value) {
        return trim($value);
    }));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($nome && $email) {
        $contato = new Contato();
        $contato->setNome($nome);
        $contato->setEmail($email);

        $contatoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($contatoId) {
            $contatoService->updateContato($contatoId, $contato);
            $flashAlertMessage->setSuccess('Contato ' . $contato->getNome() . ' atualizado com sucesso!');
        }
        if ($contatoId === null) {
            $contatoService->createContato($contato);
            $flashAlertMessage->setSuccess('Contato ' . $contato->getNome() . ' criado com sucesso!');
        }
    }
    else {
        $flashAlertMessage->setError('Preencha os campos corretamente');
        header('Location: create.php');
        die;
    }
} catch (Exception $e) {
    $flashAlertMessage->setError($e->getMessage());
}
header('Location: index.php');