<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if(isset($_POST['update']))
    {
        $eggGroupsId = $_POST['eggGroupsId'];
        $eggGroups = $_POST['eggGroups'];
        $eggCycles = $_POST['eggCycles'];
        // update data
        $result = mysqli_query($link, "UPDATE breeding SET egg_groups='$eggGroups', egg_cycles='$eggCycles' WHERE egg_groups_id=$eggGroupsId");
        // Redirect to homepage to display updated data in list
        header("Location: index.php");
    }
    // Display selected coffee based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($link, "SELECT * FROM breeding WHERE egg_groups_id=$id");
    while($breeding = mysqli_fetch_array($result))
    {
        $eggGroups = $breeding['egg_groups'];
        $eggCycles = $breeding['egg_cycles'];
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Breeding</title>
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
        <h2 class="text-center">Edit Breeding</h2>
            <form name="updateBreeding" method="post" action="editbreeding.php">
                <table border="0">

                <tr>
                    <td>Egg Groups:</td>
                    <td><input type="text" name="eggGroups" value=<?php echo $eggGroups;?> class="form-control"></td>
                </tr>
                <tr>
                    <td>Egg Cycles:</td>
                    <td><input type="text" name="eggCycles" value=<?php echo $eggCycles;?> class="form-control"></td>
                </tr>
                    <tr>
                        <td><input type="hidden" name="eggGroupsId" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
            
    </body>
</html>
