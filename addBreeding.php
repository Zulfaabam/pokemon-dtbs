<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Breeding</title>
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
    <h2 class="text-center mb-4">Add Breeding</h2>
    <form action="addBreeding.php" method="post" name="form1">
        <table>
            <tr>
                <td>Egg Groups ID: </td>
                <td><input type="text" name="eggGroupsId" class="form-control"></td>
            </tr>
            <tr>
                <td>Egg Groups: </td>
                <td><input type="text" name="eggGroups" class="form-control"></td>
            </tr>
            <tr>
                <td>Egg Cycles: </td>
                <td><input type="text" name="eggCycles" class="form-control"></td>
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
            $eggGroupsId = $_POST['eggGroupsId'];
            $eggGroups = $_POST['eggGroups'];
            $eggCycles = $_POST['eggCycles'];

            // include database connection file 
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($link, "INSERT INTO breeding (egg_groups_id, egg_groups, egg_cycles) VALUES('$eggGroupsId','$eggGroups','$eggCycles')");

            // Show message when user added
            echo "Berhasil  menambahkan  Breeding  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
        }
    ?>
</body>
</html>