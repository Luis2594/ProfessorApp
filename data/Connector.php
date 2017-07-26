<?php

class Connector {
    private $server;
    private $user;
    private $password;
    private $db;
    private $conn;

    /**
     * Constructor of the connection manager
     */
    public function Connector() {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->password = '1234';
        $this->db = 'institution';
    }
    

    /**
     * Open connection to the data base
     */
    public function connect() {
        $this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->db); //default port 3306  
    }

    /**
     * Close the connection to the data base
     */
    public function closeConn() {
        mysqli_close($this->conn);
    }

    /**
     * Executes a given query
     * @param type $query query to execute
     * @return type the related result of the given query
     */
    public function exeQuery($query) {
        $this->connect();
        $result = mysqli_query($this->conn, $query);
        $this->closeConn();
        return $result;
    }

    /**
     * Execute a query to know if a given record is saved into the db
     * @param type $query query to select data from db
     * @return boolean indicates if the given values are registred on the db
     */
    public function isRegistred($query) {
        $result = $this->exeQuery($query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     /**
     * Execute a query to know the last id of a table
     * @param type $query query to select data from db
     * @return boolean indicates if the given values are registred on the db
     */
    public function getMaxIdTable($table) {
        $query = "SELECT MAX(id" . $table . ") FROM `tb" . $table . "`";
        $result = $this->exeQuery($query);
        $array = mysqli_fetch_array($result);
        $id = trim($array[0]) + 1;
        return $id;
    }

    /**
     * Show data in console
     * @param type $data data to show in console
     */
    public function debug_to_console($data) {
        if (is_array($data)) {
            $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
        } else {
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
        }

        echo $output;
    }

    /**
     * clean the spaces 
     */
    function clean($string) {
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

}
