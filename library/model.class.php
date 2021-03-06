<?php

class Model extends SQLQuery {

    protected $_model;

    function __construct() {

        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = get_class($this);
        $this->_table = strtolower($this->_model) . "s";

        //echo "model contructor";
    }

    function __destruct() {
        
    }

    public function model($model) {
        require_once "../application/models/" . $model . ".php";
        return new $model();
    }

}
