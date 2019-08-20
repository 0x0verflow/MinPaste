<!doctype html>
<html>
    <head>
        <title>MinPaste</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="controls-box">
            <div class="controls-box-title" onclick="window.location.href = '../';">MinPaste</div>
            <a onclick="" style="color: grey !important;"><strong>s</strong>ave</a>
            <a onclick="window.location.href = window.location.href.replace('/view/', '/viewraw/');"><strong>r</strong>aw</a>
            <a onclick="window.location.href = '../view/?id=about';"><strong>a</strong>bout</a>
        </div>
        <form id="form">
            <textarea name="text"><?php 
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
            ?></textarea>
        </form>
    </body>
</html>