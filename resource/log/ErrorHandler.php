<?php
//CONFIGURATION
//in order to enable the file write run the following command
//sudo chown -Rf www-data:www-data /var/www/html/*
class ErrorHandler {
    /**
     * Version 1.1 07/02/2018
     * @param type $method
     * @param type $data
     * @param type $userId
     */
    public static function Log($method, $data, $userId = 0) {
        ob_start(); //turn on output buffering
        var_dump($data, (string) $data); //dump data
        $result = ob_get_clean(); //capture dumped data
        
        $dir = getcwd(); //get current directory
        
        if (!is_dir($dir)) {//in case of some failre after read directory
            mkdir($dir); //create directory
        }
        
        $file = 'error.log';//file name
        date_default_timezone_set('America/Costa_Rica');//set time zone
        $date = date('m/d/Y h:i:s a', time());//capture timestamp

        //generate output
        $output = ("\r\nMethod: " . $method . ".\r\nData: " . print_r($result) . ".\r\nDate: " . $date . ".\r\nUser ID: " . $userId) . "\r\n\r\n\r\n";
        
        //hash 
        $md5 = md5($output);
        
        //write to log file
        if (!file_put_contents("$dir/$file", str_replace(PHP_EOL, '', ($md5 . $output)), FILE_APPEND)){
            echo '<script type="text/javascript">alert("Escritura a disco fallida!")</script>';
            die();
        }

        header("location: ../view/reusable/Error.php?md5=".$md5);
        //return "Reporte este código a los desarrolladores: " . $md5;
    }

}
