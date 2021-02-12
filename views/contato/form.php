<?php
    include_once '../header.php';

    $contatoId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $contato = null;
    if ($contatoId) {
        $contato = $contatoService->findById($contatoId);
    }
?>
    <div class="container my-5">
        <?= $flashAlertMessage->getError() ?>
        <div class="row">
            <div class="col">
                <h2> <?= $contato ? 'Editando' : 'Novo'?> Contato</h2>
                <hr />
            </div>
        </div>

        <form action="./store.php<?= $contato ? '?id='.$contato->getId() : null?>" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $contato ? $contato->getNome() : '' ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $contato ? $contato->getEmail() : '' ?>">
            </div>

            <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
<?php
    include_once '../footer.php';
?>