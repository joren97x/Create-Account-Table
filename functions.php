<?php

    require "conn.php";

    if(isset($_POST['sub'])) {
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $age = computeAge($birthday);
        $email = $_POST['email'];

        $query = "INSERT INTO tblAccounts (firstName, lastName, birthday, gender, age, email)
                VALUES ('$firstName','$lastName', '$birthday', '$gender','$age', '$email')";

        $queryRun = mysqli_query($conn, $query);
            header("location: index.php");

    }

    if(isset($_POST['view'])) {

        $accountID = $_POST['view'];
        header("Location: view.php?ID= $accountID");

    }

    if(isset($_POST['update'])) {

        $accountID = $_POST['update'];
        header("Location: update.php?ID= $accountID");

    }

    if(isset($_POST['delete'])) {

        $accountID = $_POST['delete'];
        header("Location: delete.php?ID= $accountID");
        
    }

    if(isset($_POST['upd'])) {

        $accountID = $_POST['accountID'];

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $age = computeAge($birthday);
        $email = $_POST['email'];

        $query = "UPDATE tblAccounts SET firstName = '$firstName', lastname = '$lastName', birthday = '$birthday', gender = '$gender', age = '$age', email ='$email'
             WHERE id='$accountID'";
        $queryRun = mysqli_query($conn, $query);
            header("Location: index.php");
        

    }

    if (isset($_POST['delete'])) {

        $accountID = $_POST['delete'];

        $query = "DELETE From tblAccounts WHERE id= '$accountID'";
        $queryRun = mysqli_query($conn, $query);
        header("Location: index.php");

    }

    function computeAge ($birthday) {
        $date = new DateTime($birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

?>