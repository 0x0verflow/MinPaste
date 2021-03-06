<?php 
    set_error_handler(
        function ($severity, $message, $file, $line) {
            throw new ErrorException($message, $severity, $severity, $file, $line);
        }
    );

    if (strpos($_GET["id"], '.') !== false) {
        echo '**** Attack detected! ****';
    } else {
        try {
            $content =  file_get_contents("../pastes/" . htmlspecialchars($_GET["id"]) . ".txt"); 
            echo $content;
        }
        catch (Exception $e) {
            echo "**** This paste doesn't exist! ****";
        }
    }

    restore_error_handler();
?>