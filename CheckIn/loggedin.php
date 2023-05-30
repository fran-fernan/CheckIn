<?php
ob_start();
session_start();
require_once 'config.php';

//if the session doesn't exist
if (!isset($_SESSION['username'])) {
    //redirect back to the login page
    header('location:admin.php?result=login');
}
?>

<html>
    <body>
        <div id="wrapper">

            <?php
            echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
            ?>

            <form action="admin1.php" method="post">
                <table>
                    <h3>Add new user:</h3>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" required autofocus></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Register"></td>
                    </tr>
                </table>
            </form>

            <form action="admin2.php" method="post">
                <table>
                    <h3>Delete user:</h3>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" required autofocus></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Delete"></td>
                    </tr>
                </table>
            </form>
            <br><br>
            <form action="logout.php" method="post">
                <input type="submit" value="Log Out">
            </form>
        </form>

        <?php
        require_once 'config.php';
        $query = "Select * from history order by checkin_id desc;";
        $result = mysqli_query($conn, $query);

        echo "<div style='position:absolute;left:400px;top:0px'><h3>Check ins</h3>";
        echo "<table style='border-collapse:collapse';><tr><th>Name</th><th>Time</th><th>Date</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td style='border:1px solid black;padding:4px'>" . $row['username'] . "</td>";
            echo "<td style='border:1px solid black;padding:4px'>" . $row['time'] . "</td>";
            echo "<td style='border:1px solid black;padding:4px'>" . $row['date'] . "</td></tr>";
        }
        echo "</table></div>";
        
        ?>

        <?php
        if (isset($_REQUEST['result'])) {
            if ($_REQUEST['result'] == userexists) {
                echo "User already exists";
            } elseif ($_REQUEST['result'] == success) {
                echo "New user is registered";
            } elseif ($_REQUEST['result'] == fail) {
                echo "New user is not registered";
            }
        }
        if (isset($_REQUEST['result'])) {
            if ($_REQUEST['result'] == delete) {
                echo "User deleted";
            }
        }
        ?>
    </div>
</body>
</html>