<?php

Class DB {

    public $host = "localhost"; //host ou ip do banco
    public $base = "USUARIOCPANEL_BANCO"; //nome do banco 
    public $user = "USUARIOCPANEL_USUARIOBANCO";//""; //nome do usuario 
    public $pass = "SENHA";//""; //senha do banco
    public $con;
    public $sql;
    public $res;
    public $data;
    public $erro;
    public $rows;
    public $page = 0;
    public $perpage = 10;
    public $current = 1;
    public $url = null;
    public $link = '';
    public $total = '';
    public $pagination = false;

    public function __construct() {
        $this->con = $this->open();
    }

    public function open() {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->base", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $this->con;
    }

    public function query($sql) {
        $this->con->query($sql);
    }

    public function fetchAll($sql) {

        if ($this->pagination == true) {
            $res = $this->con->query($sql) or die($this->con->errorInfo()[2]); //tratamento de exceções
            $this->rows = count($res->fetchAll(PDO::FETCH_OBJ));
            $this->paginateLink();
            $sql .= " LIMIT $this->page, $this->perpage";
            $this->pagination = false;
        }
        $res = $this->con->query($sql) or die($this->con->errorInfo()[2]); //tratamento de exceções
        if ($res) {
            $this->data = $res->fetchAll(PDO::FETCH_OBJ);
            return $this->data;
        }
    }

    public function paginate($perpage) {
        $this->pagination = true;
        $this->perpage = $perpage;
        return $this;
    }

    public function paginateLink() {

        $page = 0;
        if (Router::getUri(3) != "") {
            $page = Router::getUri(3);
        } elseif (Router::getUri(2) != "") {
            $page = Router::getUri(2);
        } elseif (Router::getUri(1) != "") {
            $page = Router::getUri(1);
        }

        if ($page > 0) {
            $this->current = $page;
            $this->page = $this->perpage * $page - $this->perpage;
            if ($page == 1) {
                $this->page = 0;
            }
        }
        if (Router::getUri(1) == "") {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/pagina/";
        } else {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/" . Router::getUri(1) . "/";
        }

        if (Router::getUri(2) == "") {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/" . Router::getUri(1) . "/pagina/";
        } else {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/" . Router::getUri(1) . "/" . Router::getUri(2) . "/";
        }

        if (Router::getUri(3) == "") {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/" . Router::getUri(1) . "/" . Router::getUri(2) . "pagina/";
        } else {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/" . Router::getUri(1) . "/" . Router::getUri(2) . "/";
        }

        if (Router::getUri(0) == "" || Router::getUri(0) == "index") {
            $this->url = Router::base() . "/" . Router::getUri(0) . "/pagina/";
        }

        $this->total = $this->rows;
        if ($this->rows > $this->perpage) {
            $this->link = "<nav><ul class=\"pagination\">"; // ORIGINAL BOOTSTRAP

              $prox = "javascript:;";
              $ant = "javascript:;";
              if ($this->current >= 2) {
              $ant = $this->url . ($this->current - 1);
              }
              if ($this->current >= 1 && $this->current < ($this->total / $this->perpage)) {
              $prox = $this->url . ($this->current + 1);
              }
              $this->link .= '<li><a href="' . $ant . '">&laquo;</a></li>'."\n";

            $from = round($this->total / $this->perpage);
            if ($from == 1) {
                $from++;
            }
            for ($i = 1; $i <= $from; $i++) {
                if ($this->current == $i) {
                    $this->link .= "<li class=\"active\"><a>$i</a></li>\n";
                } else {
                    $this->link .= "<li><a href=\"" . $this->url . "$i/\">$i</a></li>\n";
                }
            }
            $this->link .= '<li><a href="' . $prox . '">&raquo;</a></li>';
            $this->link .= "</ul></nav>\n";
        }
        return $this;
    }


}
