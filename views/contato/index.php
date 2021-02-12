<?php
    include_once '../header.php';

    $contatos = $contatoService->findAll();
?>
    <div class="container my-5">
        <?= $flashAlertMessage::getSuccess() ?>
        <?= $flashAlertMessage::getError() ?>

        <div class="row">
            <div class="col">
                <a class="btn btn-success text-white my-2" href="./form.php">
                    Adicionar Contato
                </a>
            </div>
        </div>
        <?php
            if (isset($contatos)) {
        ?>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($contatos as $contato) {
                    ?>
                        <tr>
                            <td><?= $contato->getNome(); ?></td>
                            <td><?= $contato->getEmail(); ?></td>
                            <td>
                                <a class="btn btn-info text-white" href="./form.php?id=<?= $contato->getId() ?>">Editar</a>
                                <a class="btn btn-danger text-white" href="./delete.php?id=<?= $contato->getId(); ?>">Apagar</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        <?php
            } else {
                echo '<p>Nenhum contato encontrado!</p>';
            }
        ?>
    </div>
<?php
    include_once '../footer.php';
?>