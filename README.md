# php_revendaveiculo
Sistema de Revenda de Veículo em PHP

Manual de Instalação: Loja de Automóveis, Concessionária 
Requisitos: 
Servidor Linux com cPanel (cPanel.net), Apache, Php 5.4 ou Superior (Estável), PHP PDO (Extensão PHP), 
MOD_REWRITE E HTACCESS HABILITADOS (APACHE), Banco MySQL, phpMyAdmin 
----
Acesse o cPanel - o gerenciador de Banco de dados MySQL, crie o Banco de Dados MySQL, o Usuário de acesso ao 
banco + senha, depois atribua todas as permissões do usuário ao Banco. 
Abra o phpMyAdmin, selecione o banco que criou e importe a base de dados (BANCO-DE-DADOS.sql) que está 
dentro da pasta /INSTALACAO 
Arquivo de conexão com o banco: 
Na pasta /Script, acesse: 
-------
/Lib/DB.PHP 
Edite as informações do banco de dados, usuário e senha para conexão com o banco entre as linhas 5 a 8 depois 
salve e feche. 
 public $host = "localhost"; //Geralmente por padrão é localhost, mas dependendo da hospedagem pode ser outro endereço.
 public $base = "USUARIOCPANEL_BANCO"; //nome do banco 
 public $user = "USUARIOCPANEL_USUARIOBANCO";//""; //nome do usuario 
 public $pass = "SENHA";//""; //senha do banco 
-------
Agora compacte o conteúdo da pasta /Script em um arquivo .zip e faça o upload deste arquivo zipado pelo 
Gerenciador de Arquivos do cPanel e assim que finalizar o upload descompacte o .zip lá pelo gerenciador mesmo. 
E pronto! 
Acesso: 
Site: www.seusite.com/PASTA 
Administração: www.seusite.com/admin
O usuário e senha é admin
