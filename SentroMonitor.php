<?php 
    # SENTRO MONITOR SYSTEM 
    # Version: 1.2.4 | developer: surelle-ha
    # Usage: updateServer("Text Here", 1);
    # Output: [STABLE]   ::1 -> [06-05-22 07:17:40] 'GET CGI/1.1 Apache/2.4.53 (Unix) PHP/8.1.5 HTTP/1.1 /UtilityAPI/SentroMonitor.php' Text Here -> ::1 <localhost>
    # Usage: updateServer("Message12", 2);
    # Output: [WARNING]  ::1 -> [06-05-22 07:17:40] 'GET CGI/1.1 Apache/2.4.53 (Unix) PHP/8.1.5 HTTP/1.1 /UtilityAPI/SentroMonitor.php' Message12 -> ::1 <localhost>
    # Usage: updateServer("Mail12345", 3);
    # Output: [CRITICAL] ::1 -> [06-05-22 07:17:40] 'GET CGI/1.1 Apache/2.4.53 (Unix) PHP/8.1.5 HTTP/1.1 /UtilityAPI/SentroMonitor.php' Mail12345 -> ::1 <localhost>
    
    date_default_timezone_set('Asia/Manila');
    
    function updateServer($updateText, $updateMark){
        $host    = "0.0.0.0"; // Change Server Host
        $port    = 1220; // Change Server Port
        if($updateMark == 1){
            $message = "[STABLE]   ".$_SERVER['REMOTE_ADDR']." -> [".date('d-m-y h:i:s')."] '".$_SERVER['REQUEST_METHOD']." ".$_SERVER['GATEWAY_INTERFACE']." ".$_SERVER['SERVER_SOFTWARE']." ".$_SERVER['SERVER_PROTOCOL']." ".$_SERVER['REQUEST_URI']."' ".$updateText." -> ".$_SERVER['SERVER_ADDR']." <".$_SERVER['SERVER_NAME'].">";
        }else if($updateMark == 2){
            $message = "[WARNING]  ".$_SERVER['REMOTE_ADDR']." -> [".date('d-m-y h:i:s')."] '".$_SERVER['REQUEST_METHOD']." ".$_SERVER['GATEWAY_INTERFACE']." ".$_SERVER['SERVER_SOFTWARE']." ".$_SERVER['SERVER_PROTOCOL']." ".$_SERVER['REQUEST_URI']."' ".$updateText." -> ".$_SERVER['SERVER_ADDR']." <".$_SERVER['SERVER_NAME'].">";
        }else if($updateMark == 3){
            $message = "[CRITICAL] ".$_SERVER['REMOTE_ADDR']." -> [".date('d-m-y h:i:s')."] '".$_SERVER['REQUEST_METHOD']." ".$_SERVER['GATEWAY_INTERFACE']." ".$_SERVER['SERVER_SOFTWARE']." ".$_SERVER['SERVER_PROTOCOL']." ".$_SERVER['REQUEST_URI']."' ".$updateText." -> ".$_SERVER['SERVER_ADDR']." <".$_SERVER['SERVER_NAME'].">";
        }
        $socket = socket_create(AF_INET, SOCK_STREAM, 0);
        $result = socket_connect($socket, $host, $port); 
        socket_write($socket, $message, strlen($message));
        socket_close($socket);
    }
?>