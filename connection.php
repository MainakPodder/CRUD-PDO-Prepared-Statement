<!-- 🎯 PDO - Prepared Statement -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstarp Style -->
    <?php include "links/links.php" ?>

</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">
            <?php
            $dsn = "mysql:host=localhost; dbname=collage4";
            $userName = "root";
            $password = "";
            try {
                $conn = new PDO($dsn, $userName, $password);
                echo "🕺CONNECTION SUCCESSFULL<hr>";
            } catch (PDOException $e) {
                echo "😪OOPS,CONNECTION FAILED<hr>" . $e->getMessage();
            }


            ?>
        </h1>
    </div>
</body>

</html>