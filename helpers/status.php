<?php

class status {

    static public function msg() {
        $messages['cadastrado'] = '<p class="alert alert-success  msg-status">CADASTRADO COM SUCESSO!!!</p>';
        $messages['ok'] = '<p class="alert alert-success  msg-status">ATUALIZADO COM SUCESSO!!!</p>';
        $messages['removido'] = '<p class="alert alert-danger msg-status">REGISTRO REMOVIDO COM SUCESSO!!!</p>';
        $messages['outra-coisa'] = '<p class="alert alert-info msg-status">BLABLABLA!!!</p>';
        $messages['login-incorreto'] = '<p class="alert alert-danger msg-status">LOGIN OU SENHA INCORRETOS!!!</p>';
        $messages['email-sucesso'] = '<p class="alert alert-success msg-status">SUA MENSAGEM FOI ENVIADA COM SUCESSO! OBRIGADO</p>';
        $messages['email-erro'] = '<p class="alert alert-danger msg-status">HOUVE UM ERRO AO TENTAR ENVIAR SUA MENSAGEM! TENTE NOVAMENTE.</p>';

        if (isset($_GET['cadastrado'])) {
            return $messages['cadastrado'];
        }
        if (isset($_GET['ok'])) {
            return $messages['ok'];
        }
        if (isset($_GET['removido'])) {
            return $messages['removido'];
        }
        if (isset($_GET['outra-coisa'])) {
            return $messages['outra-coisa'];
        }
        if (isset($_GET['login-incorreto'])) {
            return $messages['login-incorreto'];
        }
        if (isset($_GET['email-erro'])) {
            return $messages['email-erro'];
        }
        if (isset($_GET['email-sucesso'])) {
            return $messages['email-sucesso'];
        }
    }

}
