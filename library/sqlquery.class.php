<?php

class SQLQuery {

    private $conn;
    private $stmt;
    private $error;

    public function connect($host, $user, $pass, $dbname) {
        // Set DSN
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname.';charset=utf8';
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->conn = new PDO($dsn, $user, $pass, $options);
            //echo $dsn;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

// Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->conn->prepare($sql);
    }

// Bind values
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insertById() {
        $this->execute();
        return $this->stmt = $this->conn->lastInsertId();
    }

    // Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function getAllPro($active = '') {
        if ($active == '') {
            $act = "";
        } else {
            $act = "WHERE products.active=$active";
        }

        $this->query("SELECT products.*, users.full_name as creator,
            categories.cat_name,manufactures.man_name FROM products
            INNER JOIN users ON products.user = users.user_id
            INNER JOIN categories ON products.cat = categories.cat_id
            INNER JOIN manufactures ON products.man = manufactures.man_id
            $act 
            ");
        $products = $this->resultSet();
        if ($products) {
            return $products;
        } else {
            return false;
        }
    }

    public function search($searched) {
        $this->query("SELECT products.*, users.full_name as creator,
            categories.cat_name,manufactures.man_name  FROM products
            INNER JOIN users ON products.user = users.user_id
            INNER JOIN categories ON products.cat = categories.cat_id
            INNER JOIN manufactures ON products.man = manufactures.man_id
            WHERE name LIKE '%$searched%'");
        // $this->bind(':searched',$searched);
        $results = $this->resultSet();
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }

}
