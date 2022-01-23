<?php include "connection.php" ?>

<?php
$sql = "SELECT * FROM `student`";
$result = $conn->prepare($sql);
$result->execute();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstarp Style -->
    <?php include "links/links.php" ?>

    <title>DIPLAY</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class=" col-md-8 offset-md-2 mb-5">
                <div class="alert alert-primary text-center" role="alert">
                    ---DISPLAY DATA---
                    <div class="float-sm-end">
                        <a href="insert.php"><i class="btn btn-info fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">STREAM</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">C-PASSWORD</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (($result->rowCount()) > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row["id"] ?></th>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["stream"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["password"] ?></td>
                            <td><?php echo $row["cpassword"] ?></td>
                            <td><a href="update.php?id=<?php echo $row["id"] ?>" data-toggle="tooltip"
                                    data-placement="top" title="UPDATE"><i
                                        class="btn btn-outline-success  fa fa-pencil-square-o"
                                        aria-hidden="true"></i></a>&nbsp;<a
                                    href="delete.php?id=<?php echo $row["id"] ?>" data-toggle="tooltip"
                                    data-placement="top" title="DELETE"><i class="btn btn-outline-danger fa fa-trash"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo "<h1 class=\"text-center\">😢Oops,No Row Inserted<h1>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>