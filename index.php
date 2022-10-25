

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
    <title>View Accounts</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-10">

            </div>
            <div class="col-2 mb-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle"> </i>Create
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="functions.php" method="POST">
                                <div class="modal-body">

                                    <div class="form-group p-2">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName">

                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName">

                                    </div>
                                    <div class="form-group p-2">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>

                                    <div class="form-group p-2">
                                        <label for="Birthday">Birthday</label><br>
                                        <input type="date" id="birthday" name="birthday" class="form-inline pr-5 ml-2">
                                        <input type="radio" name="gender" id="gender" style="margin-left: 140px;" value="male"> Male
                                        <input type="radio" name="gender" id="gender" value="female"> Female

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="sub" name="sub">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container shadow">
        <div class="row p-5">
            <table class="table table-bordered text-center">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                
                <?php

                    require "conn.php";

                    $query = "SELECT * From tblAccounts";
                    $queryRun = mysqli_query($conn, $query);

                    if(mysqli_num_rows($queryRun) > 0) {

                        foreach ( $queryRun as $account ) {

                            ?>

                                <tr>
                                    <td><?php echo $account['ID'];  ?></td>
                                    <td><?php echo $account['firstName'];  ?></td>
                                    <td><?php echo $account['lastName'];  ?></td>
                                    <td><?php echo $account['birthday'];  ?></td>
                                    <td><?php echo $account['gender'];  ?></td>
                                    <td><?php echo $account['age'];  ?></td>
                                    <td><?php echo $account['email'];  ?></td>

                                    <form action="functions.php" method="post">
                                        <td> <button class="bg-dark rounded border border-light" value="<?php echo $account['ID']; ?>" name="view" id="view"><i class="bi bi-eye text-light"></i></button> <button class="bg-primary rounded border border-light" value="<?php echo $account['ID']; ?>"  name="update" id="update"><i class="bi bi-pencil-square text-light"></i></button> <button class="bg-danger rounded border border-light" value="<?php echo $account['ID']; ?>"  name="delete" id="delete"><i class="bi bi-trash text-light"></i></button> </td>
                                    </form>

                                </tr>

                            <?php

                        }

                    }
                    else {
                        echo "<tr><td colspan='8'> NO DATA FOUND  </td></tr>";
                    }

                ?>

            </table>
        </div>
    </div>

</body>

</html>