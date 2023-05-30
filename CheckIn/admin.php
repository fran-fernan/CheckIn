<?php
ob_start();
require_once 'config.php';
?>

<html>
    <body>
        <div id="wrapper">

            <h2>Admin Login</h2>

            <form action="adminlogin.php" method="post">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="login" required autofocus></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="pass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>

            <?php
            if (isset($_REQUEST['result'])) {
                if ($_REQUEST['result'] == fail) {
                    echo "Either username or password is incorrect";
                }
                if ($_REQUEST['result'] == login) {
                    echo "Please log in";
                }
            }
            ?>
        </div>
    </body>
</html>