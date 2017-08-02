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
                                <a class="nav-link active" href="#">Home</a>
                                <a class="nav-link" href="#">Create a new room</a>
                                <a class="nav-link" href="#">Join a room</a>
                                <a class="nav-link" href="#">Disconnect</a>
                            </nav>
                        </div>
                    </div>
                    <div class="inner cover">
                        <h1 class="cover-heading">What is your pseudo?</h1>
                        <p class="lead">
                        <form method="POST" action="js/connection.js">
                            <div class="form-group formulaire">
                                <input name="pseudo" style="text-align:center" id="pseudo" type="text" class="form-control">
                                <input class="btn btn-lg btn-secondary"id="pseudosub"style="margin-top:20px" type="submit" value="chat">
                            </div>
                        </form>
                        </p>
                    </div>
                    <div class="mastfoot">
                        <p class="lead" id="pseudo_error"></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="js/connection.js"></script>
    </body>
</html>
