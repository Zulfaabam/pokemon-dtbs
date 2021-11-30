<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if(isset($_POST['update']))
    {
        $typeId = $_POST['typeId'];
        $name = $_POST['name'];
        $strength = $_POST['strength'];
        $weakness = $_POST['weakness'];
        // update data
        $result = mysqli_query($link, "UPDATE type SET
        type_name='$name', type_strength='$strength', type_weakness = '$weakness' WHERE type_id=$typeId");
        // Redirect to homepage to display updated data in list
        header("Location: index.php");
    }
    // Display selected coffee based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($link, "SELECT * FROM type WHERE type_id=$id");
    while($type = mysqli_fetch_array($result))
    {
        $name = $type['type_name'];
        $strength = $type['type_strength'];
        $weakness = $type['type_weakness'];
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Type</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{ font: 14px sans-serif; }
            table {table-layout: fixed; max-width: 100%; border-collapse: collapse; margin: .25rem auto .5rem auto;}
            td {padding: 1rem;}
            tr td:nth-child(1) {font-weight: bold;}
        </style>
    </head>

    <body>
        <a href="index.php" class="btn btn-dark ml-3 mt-3">🔙 Home</a>
        <h2 class="text-center">Edit Type</h2>
            <form name="updateType" method="post" action="editType.php">
                <table border="0">

                <tr>
                    <td>Type Name:</td>
                    <td><input type="text" name="name" value=<?php echo $name;?> class="form-control"></td>
                </tr>
                <tr>
                    <td>Type Strength:</td>
                    <td><input type="text" name="strength" value=<?php echo $strength;?> class="form-control"></td>
                </tr>
                <tr>
                    <td>Type Weakness:</td>
                    <td><input type="text" name="weakness" value=<?php echo $weakness;?> class="form-control"></td>
                </tr>
                    <tr>
                        <td><input type="hidden" name="typeId" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
    </body>
</html>
