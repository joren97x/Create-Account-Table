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
    <title>Update Account</title>
</head>

<body>

    <div class="container-fluid ">
        <div class="row p-5 justify-content-center">
            <div class="col-7 shadow p-5">
                <form action="functions.php" method="POST">
            <div class="row">

            <?php

                require "conn.php";
                $accountID = $_GET['ID'];
                $query = "SELECT * From tblAccounts WHERE id = '$accountID'";
                $queryRun = mysqli_query($conn, $query);

                if (mysqli_num_rows($queryRun)) {

                    $account = mysqli_fetch_array($queryRun);

            ?>

             
                
                    <div class="form-group p-2 w-50">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="hidden" name="accountID" id="accountID" value="<?php echo $account['ID'] ?>">
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $account['firstName'] ?>">

                    </div>
                    <div class="form-group p-2 w-50">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $account['lastName'] ?>">

                    </div>
                    <div class="form-group p-2">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $account['email'] ?>">
                    </div>

                    <div class="form-group p-2">
                        <div class="row">
                            <label for="Birthday">Birthday</label>
                            <div class="col">
                                <input type="date" id="birthday" name="birthday" class="form-control " value="<?php echo $account['birthday'] ?>">
                            </div>
                            <div class="col p-2">
                                <input type="radio" value="male" name="gender" id="gender" style="margin-left: 170px;" <?php echo $account['gender'] =='male'? "checked": "";  ?> > Male
                                <input type="radio" value="Female" name="gender" id="gender" <?php echo $account['gender'] == 'female'? "checked": "";  ?>> Female
                            </div>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <div class="row pt-5">
                            <div class="col-5">
                                <a href="index.php"><button type="button" class="btn btn-secondary" >Close</button></a>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" name="upd" id="upd" >Update</button>

                            </div>
                        </div>
                    </div>
                        

                        <?php
                        }
                        else {
                            echo "WAY SULOD";
                        }

                        ?>
                </form>

            </div>
        </div>
    </div>

</body>

</html>