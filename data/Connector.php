<?php

include_once '../resource/Constants.php';
include_once '../tools/GUID.php';

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

//        LOCAL
        $this->db = 'institution';
        if ("#46-Ubuntu SMP Thu Dec 6 14:45:28 UTC 2018" == php_uname("v")){
            $this->password = '12345678';
        }else{
            $this->password = '1234';
        }

//        DEVELOP
//        $this->password = 'cindea2017@';
//         $this->db = 'test_institution';
      
//        PRODUCTION
//        $this->password = 'cindea2017@';
//         $this->db = 'institution';
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
     * V 1.1 - clean executed to the query in order to avoid sql injection
     * @param type $query query to execute
     * @return type the related result of the given query
     */
    public function exeQuery($query) {
        $this->connect();
        //$result = mysqli_query($this->conn, $this->clean($query));
        $result = mysqli_query($this->conn, ($query));
        $this->closeConn();
        return $result;
    }

    /**
     * Execute a query to know if a given record is saved into the db
     * @param type $query query to select data from db
     * @return boolean indicates if the given values are registered on the db
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
     * @return boolean indicates if the given values are registered on the db
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

    /**
     * Version 2.0 (13/02/2018)
     * @param type $method
     * @param type $data
     * @param type $userId
     */
    function Log($method, $data) {

        //start connection to logDB
        $this->conn = mysqli_connect($this->server, $this->user, $this->password, 'logDB'); //default port 3306  

        date_default_timezone_set('America/Costa_Rica'); //set time zone

        $guid = GUID();

        $query = "call systemLog('" . $method . "','" . $this->clean($data) . "','" .
                $guid . "','" . Constants::APP_PROFESSOR . "')";

        mysqli_query($this->conn, ($query));

        mysqli_close($this->conn);

        //debug_to_console($query);

        header("location: ../../view/reusable/Error.php?md5=" . $guid);
    }

}
