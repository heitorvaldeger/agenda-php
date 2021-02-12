<?php

class FlashAlertMessage {

    public function setSuccess ($message) {
        $_SESSION['msgSuccess'] = $message;
    }

    public function setError ($message) {
        $_SESSION['msgError'] = $message;
    }

    public function getSuccess () {
        if (isset($_SESSION['msgSuccess'])) {
            return '<div class="alert alert-success" role="alert">' . $_SESSION['msgSuccess'] .'</div>';
        }
    }

    public function getError () {
        if (isset($_SESSION['msgError'])) {
            return '<div class="alert alert-danger" role="alert">' . $_SESSION['msgError'] .'</div>';
        }
    }
}