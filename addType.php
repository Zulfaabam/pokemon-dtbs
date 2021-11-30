<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        table {table-layout: fixed; max-width: 100%; border-collapse: collapse; margin: .25rem auto .5rem auto;}
        td {padding: 1rem;}
        tr td:nth-child(1) {font-weight: bold;}
    </style>
</head>
<body>
    <a href="index.php" class="btn btn-secondary ml-3 mt-3">🔙 Home</a>
    <br>
    <h2 class="text-center mb-4">Add Type</h2>
    <form action="addType.php" method="post" name="form1">
        <table>
            <tr>
                <td>Type ID: </td>
                <td><input type="number" name="typeId" class="form-control"></td>
            </tr>
            <tr>
                <td>Type Name: </td>
                <td><input type="text" name="name" class="form-control"></td>
            </tr>
            <tr>
                <td>Type Strength: </td>
                <td><input type="text" name="strength" class="form-control"></td>
            </tr>
            <tr>
                <td>Type Weakness: </td>
                <td><input type="text" name="weakness" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>

    <?php
        // Check If form submitted, insert form data into users table. 
        if(isset($_POST['submit'])) {
            $typeId = $_POST['typeId'];
            $name = $_POST['name'];
            $strength = $_POST['strength'];
            $weakness = $_POST['weakness'];

            // include database connection file 
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($link, "INSERT INTO type (type_id, type_name, type_strength, type_weakness) VALUES('$typeId','$name','$strength','$weakness')");

            // Show message when user added
            echo "Berhasil  menambahkan  Type  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
        }
    ?>
</body>
</html>