<?php

include_once '../init.php';

$contatoId = $_GET['id'];

try {
    
    if (isset($contatoId)) {
        $contato = $contatoService->findById($contatoId);

        if($contato) {
            $contatoService->deleteContato($contato->getId());
            $flashAlertMessage->setSuccess('Contato '. $contato->getNome() . ' removido com sucesso');
        }
        else{
            $flashAlertMessage->setError('Contato inexistente');
        }
    }

} catch (Exception $e) {
    $flashAlertMessage->setError($e->getMessage());
}

header('Location: index.php');