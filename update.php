<?php include "connection.php" ?>

<?php
if (isset($_POST["update"])) {

    $sql = "UPDATE student SET id=:uid,name=:name,stream=:stream,email=:email,password=:pass,cpassword=:cpass WHERE id=:uid";

    $result = $conn->prepare($sql);
    $result->bindParam(':uid', $uid, PDO::PARAM_INT);
    $result->bindParam(':name', $name);
    $result->bindParam(':stream', $stream);
    $result->bindParam(':email', $email);
    $result->bindParam(':pass', $pass);
    $result->bindParam(':cpass', $cpass);

    $uid = $_GET["id"];
    $name = $_POST["sname"];
    $stream = $_POST["stream"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $result->execute();

    echo ($result) ? "<script>alert('🕺,DATA UPDATED PROPERLY');</script>" : "<script>alert('😪,DATA NOT UPDATED PROPERLY');</script>";

    header('location:display.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- All Bootstrap Links -->
    <?php include "links/links.php" ?>

    <title>UPDATE</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class=" col-md-8 offset-md-2 mt-3 mb-3">
                <div class="alert alert-primary text-center" role="alert">
                    ---INSERT DATA---
                </div>
                <form method="POST" action="" autocomplete="off">

                    <?php
                    $id = $_GET["id"];
                    $usql = "SELECT * FROM `student` WHERE id = :id";
                    $uresult = $conn->prepare($usql);
                    // Bind Parameter
                    $uresult->bindParam(':id', $id);
                    $uresult->execute();
                    $urow = $uresult->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div class="form-group mb-3">
                        <label for="name">NAME:</label>
                        <input value="<?php echo $urow["name"]; ?>" type="text" class="form-control"
                            placeholder="Enter name" id="name" name="sname" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="stream">STREAM:</label>
                        <input value="<?php echo $urow["stream"]; ?>" type="text" class="form-control"
                            placeholder="Enter stream" id="stream" name="stream" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">EMAIL:</label>
                        <input value="<?php echo $urow["email"]; ?>" type="email" class="form-control"
                            placeholder="Enter email" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">PASSWORD:</label>
                        <input value="<?php echo $urow["password"]; ?>" type="password" class="form-control"
                            placeholder="Enter password" id="pass" name="pass" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm-password">CONFIRM PASSWORD:</label>
                        <input value="<?php echo $urow["cpassword"]; ?>" type="password" class="form-control"
                            placeholder="Enter confirm password" id="cpass" name="cpass" required>
                    </div>
                    <div>
                        <div class="float-sm-start">
                            <button type="submit" class="btn btn-primary float-right" name="update">UPDATE</button>
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