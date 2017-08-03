<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Chat</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="css/cover.css" rel="stylesheet">
    </head>

    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner">
                            <h3 class="masthead-brand">Chat 0.0.1</h3>
                            <nav class="nav nav-masthead">
                                <a class="nav-link active" href="index.php">Home</a>
                                <a class="nav-link" href="#">Create a new room</a>
                                <a class="nav-link" href="#">Join a room</a>
                                <a class="nav-link" href="#">Disconnect</a>
                            </nav>
                        </div>
                    </div>
                    <div class="inner cover">
                        <h1 class="cover-heading" style="margin-top:50px;">Tchat</h1>
                        <?php
                        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        if (!isset($post['pseudo']) || empty($post['pseudo'])) {
                            echo "<p>Vous devez être connecté</p>";
                        } else if (isset($post['pseudo'])) {
                            $_SESSION['pseudo'] = $post['pseudo'];
                            echo "<p>" . $_SESSION['pseudo'] . "</p>";
                            ?>
                            <section style="height:50vh;
                                     background-color:gray;
                                     overflow-y: scroll;
                                     word-wrap: break-word;
                                     text-align:left"
                                     class="container"
                                     id="chat">
                            </section>
                            <section id="chatinput" class="container" style="margin-top:10px">
                                <form action="messages_handler/createmessage.php" method="POST" autocomplete="off">
                                    <div class="form-group">
                                        <input id="message" type="text" class="form-control" name="message" style="text-align:center;width:100%" placeholder="message">
                                        <input id="send" type="submit" value="send message" class="btn btn-lg btn-secondary" style="margin-top:5px;height:50px">
                                    </div>
                                </form>
                            </section>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="mastfoot">
                        <p class="lead" id="pseudo_error"></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/ajax.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <!--<script src="js/connection.js"></script>-->
    </body>
</html>
