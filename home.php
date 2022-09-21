<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Using PHP</title>
    <style>
        body  {
            background-color: LightGray;
        }
        .print {
            height: max-content;
            margin: 50px auto;
            width: 30%;

        }

        .frm {
            display: block;
            height: max-content;
            margin: 50px auto;
            width: 30%;
            padding: 10px;
            box-shadow: 5px 10px 18px #888888;
            overflow: hidden;

        }

        label {
            font-size: 20px;
            display: block;
            padding-top: 5px;
            margin-top: 10px;

        }

        .gender {
            font-size: 20px;
        }

        .frm input[type="text"],
        input[type="email"] {
            width: 50%;
            margin: auto;

            font-size: 20px;

            padding: 10px;

        }

        .frm input[type="submit"] {
            width: 40%;
            margin: auto;
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            padding: 10px;
            background-color: #333;
        }

        .frm input[type="submit"]:hover {
            background-color: black;
        }

        .frm input[type="radio"] {
            display: inline;
            width: 30px;
            padding: 30px;
            font-size: 40px;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    $fname = $lname = $email = $gender = "";
    $fnameErr = $lnameErr = $emailErr = $genderErr = $websiteErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
        } else {
            $fname = $_POST["fname"];
        }
        if (empty($_POST['lname'])) {
            $lnameErr = "Last Name is required";
        } else {
            $lname = $_POST["lname"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = $_POST["gender"];
        }
        if ($fname != "" && $lname != "" && $email != "" && $gender != "") {
            echo '<script type="text/JavaScript">
	alert("Form Submitted Successfully!!!");
	</script>';
        }
    }



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "avinash";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO form(fname, lname, email, gender) VALUES ('$fname', '$lname', '$email', '$gender')";

    if (mysqli_query($conn, $sql)) {
        echo '<script> alert("Details successfully inserted in Database") </script>';
    } else {
        echo '<script> alert("Database Insertion error") </script>';
    }
    ?>
    <b><br><h1 style="text-align:center;">PHP Form Validation</h1><br></b>
    <div class="display">

        <form class="frm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname"><span class="error"> * <?php echo $fnameErr; ?></span>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname"><span class="error"> * <?php echo $lnameErr; ?></span>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><span class="error"> * <?php echo $emailErr; ?></span>

            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" id="" value="male"><span class="gender">Male</span>
            <input type="radio" name="gender" id="" value="female"><span class="gender">Female</span><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="print">
        <?php
        echo "<h2>Your Input:</h2>";
        echo $fname;
        echo "<br>";
        echo $lname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $gender;
        ?>
    </div>
</body>

</html>