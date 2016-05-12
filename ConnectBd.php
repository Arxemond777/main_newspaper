<?php

namespace ConnectBd;

class ConnectBd {

    protected $mysql;

    protected function __construct($host = 'localhost', $login = 'root', $pass = '', $nameBd = 'main_newspaper') {

        @$this->mysql = new \mysqli($host, $login, $pass, $nameBd);

        if ($this->mysql->connect_error) {

            die('Ошибка подключения (' . $this->mysql->connect_errno . ') ' . $this->mysql->connect_error);

        }

        if (!$this->mysql->set_charset("utf8")) {

            printf("Ошибка при загрузке набора символов utf8: %s<br>", $this->mysql->error);

        }
    }

    protected function __destruct() {

        $this->mysql->close();

    }
}