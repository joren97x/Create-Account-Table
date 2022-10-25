<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>View Account</title>
</head>

<body>

    <?php

            require "conn.php";
            $accountID = $_GET['ID'];
            $query = "SELECT * From tblAccounts WHERE id='$accountID'" ;
            $queryRun = mysqli_query($conn, $query);

            if(mysqli_num_rows($queryRun) > 0) {

                $account = mysqli_fetch_array($queryRun);

         ?>

    <div class="container-fluid ">
        <div class="row p-5 justify-content-center">
            <div class="col-7 shadow p-5">
                <h5>Details</h5>
                <div class="row ">
                    <div class="col h6 pt-3">
                        First Name: <?php echo $account['firstName']; ?>
                    </div>
                    <div class="col h6 pt-3">
                        Email: <?php echo $account['email']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col h6 pt-3">
                        Last Name: <?php echo $account['lastName']; ?>
                    </div>
                    <div class="col h6 pt-3">
                        Gender: <?php echo $account['gender']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col h6 pt-3">
                        Birthday: <?php echo $account['birthday']; ?>
                    </div>
                    <div class="col h6 pt-3">
                        Age: <?php echo $account['age']; ?>
                    </div>
                </div>

                <div class="d-flex flex-row-reverse">
                    <div class="col-12 d-flex justify-content-end ">
                        <a href="index.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
            }
            else {
                echo "WAY SUD";
            }
    ?>

</body>

</html>