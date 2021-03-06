<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- tell internet to use the latest rendering engine -->
        <meta http-eqiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial- scle = 1">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet.css">
        <link async href="http://fonts.googleapis.com/css?family=Advent%20Pro" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <table>
            <thead>
                <td>Name</td>
                <td>Price</td>
            </thead>

            <tbody>
                <?php
                    // Start the sessions and connect to the database
                    require_once('connect.php');
                    session_start();

                    // Localize the SESSION
                    $userid = $_SESSION['userid'];

                    $query = "SELECT * FROM carts WHERE users_userid = :userid";
                    $stmt = $dbh->prepare($query);
                    $stmt->execute(
                        array(
                            'userid' => $userid
                        )
                    );
                    $products = $stmt->fetchAll();

                    foreach ($products as $row) {
                        echo "<tr>";
                            echo "<td>" . $row['productName'] . "</td>";
                            echo "<td>" . $row['productPrice'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>


    </body>
</html>
