<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <title>Chat</title>
    </head>
    <body class="container-fluid">
        <?php
        echo date("Y-m-d H:i:s");
        echo "<p>".$_SESSION['pseudo']."</p>";
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $_SESSION['pseudo'] = $post['pseudo'];
        ?>
        <section style="height:50vh;background-color:gray;overflow-y: scroll;word-wrap: break-word;" class="col-md-6 col-md-offset-4" id="chat">
            
        </section>
        <section id="chatinput">
            <form action="messages_handler/createmessage.php" method="POST">
                <input id="message" type="text" name="message" placeholder="message">
                <input id="send" type="submit" value="send message">
            </form>
        </section>
        <script src="js/ajax.js"></script>
    </body>
</html>