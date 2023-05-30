<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check In</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
    <body>

        <?php
        if (isset($_REQUEST['result'])) {
            if ($_REQUEST['result'] == "success") {
                echo "
            <script type=\"text/javascript\">
            alert('Successfully checked in.');
            </script>
        ";
            } else if ($_REQUEST['result'] == "wrongpass") {
                echo "
            <script type=\"text/javascript\">
            alert('Wrong PIN. Please try again.');
            </script>
        ";
            }
        } else {
            
        }
        ?>
        <a href="http://fefranci.dev.fast.sheridanc.on.ca/CheckIn/admin.php" style="position:fixed;bottom:0px;">Admin</a>
        <div class="mainBox" style="height:100%;">
            <form action="login.php" method="post">
                <div class="left-align loginBox">
                    <h1 style="text-align: center;">Check In</h1>
                    <div style="display:inline-block;text-align:left;margin:0px 50px;">
                        <?php
                        require_once 'config.php';

                        $query = "SELECT * FROM ( SELECT @row := @row +1 AS rownum, username FROM ( SELECT @row :=0) r, users ) ranked WHERE rownum % 2 = 1";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<p><label><input class='with-gap' name='users' type='radio' value='" . $row['username'] . "' />
                                <span>" . $row['username'] . "</span>";
                            }
                        }
                        ?>
                    </div>
                    <div style="display:inline-block;text-align:left;">
                        <?php
                        $query = "SELECT * FROM ( SELECT @row := @row +1 AS rownum, username FROM ( SELECT @row :=0) r, users ) ranked WHERE rownum % 2 = 0";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<p><label><input class='with-gap' name='users' type='radio' value='" . $row['username'] . "' />
                                <span>" . $row['username'] . "</span>";
                            }
                        }
                        ?>
                    </div>

                </div>
                <div class="input-field s6 inputBox">
                    <i class="material-icons prefix">lock_outline</i>
                    <input name="password" id="icon_prefix" type="password" class="validate input">
                    <label for="icon_prefix"></label>
                </div><br>
                <div class="numpad">
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '1';"><a class="btn-large numbutton">1</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '2';"><a class="btn-large numbutton">2</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '3';"><a class="btn-large numbutton">3</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '4';"><a class="btn-large numbutton">4</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '5';"><a class="btn-large numbutton">5</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '6';"><a class="btn-large numbutton">6</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '7';"><a class="btn-large numbutton">7</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '8';"><a class="btn-large numbutton">8</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '9';"><a class="btn-large numbutton">9</a></div>
                    <div class="num"></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value += '0';"><a class="btn-large numbutton">0</a></div>
                    <div class="num" onclick="document.getElementsByName('password')[0].value = document.getElementsByName('password')[0].value.
                                    substring(0, document.getElementsByName('password')[0].value.length - 1);"><a class="btn-large">DEL</a></div>
                </div>
                <div style="text-align: center;">
                    <form action="login.php" method="post">
                        <button class="btn-large waves-effect waves-light" type="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
                        $(document).ready(function () {
                            $('select').formSelect();
                        });
        </script>

    </body>
</html>
