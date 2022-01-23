<?php include "connection.php" ?>

<?php
try {
    if (isset($_POST["submit"])) {
        $sql = "INSERT INTO student (name, stream, email, password, cpassword) VALUES (:name, :stream, :email, :pass, :cpass)";

        // Prepare Statement
        $result = $conn->prepare($sql);

        // Bind Parameter
        $result->bindParam(':name', $name);
        $result->bindParam(':stream', $stream);
        $result->bindParam(':email', $email);
        $result->bindParam(':pass', $pass);
        $result->bindParam(':cpass', $cpass);


        $name = $_POST["sname"];
        $stream = $_POST["stream"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        // Execute Prepare Statement 
        $result->execute();
        echo $result->rowCount();
        if ($result->rowCount() == 1) {
            echo "<script>alert('🕺,DATA INSERTED PROPERLY');</script>";
        }

        header('location:display.php');
    }
} catch (PDOException $e) {
    echo "😪OOPS,CONNECTION FAILED<hr>" . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstarp Style -->
    <?php include "links/links.php" ?>

    <title>INSERT</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class=" col-md-8 offset-md-2 mt-3 mb-3">
                <div class="alert alert-primary text-center" role="alert">
                    ---INSERT DATA---
                </div>
                <form method="POST" action="" autocomplete="off">
                    <div class="form-group mb-3">
                        <label for="name">NAME:</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="name" name="sname"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="stream">STREAM:</label>
                        <input type="text" class="form-control" placeholder="Enter stream" id="stream" name="stream"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">EMAIL:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pass">PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pass" name="pass"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cpass">CONFIRM PASSWORD:</label>
                        <input type="password" class="form-control" placeholder="Enter confirm password" id="cpass"
                            name="cpass" required>
                    </div>
                    <div>
                        <div class="float-sm-start">
                            <button type="submit" class="btn btn-primary float-right" name="submit">SUBMIT</button>
                        </div>
                        <div class="float-sm-end">
                            <a href="display.php" type="submit" class="btn btn-warning float-right">CHECK FORM</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>
<?php $conn = null; ?>