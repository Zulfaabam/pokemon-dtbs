<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if(isset($_POST['update']))
    {
        $pokeId = $_POST['pokeId'];
        $name = $_POST['name'];
        $species = $_POST['species'];
        // update data
        $result = mysqli_query($link, "UPDATE pokemon SET
        pokemon_name='$name', pokemon_species='$species' WHERE pokemon_id=$pokeId");
        // Redirect to homepage to display updated data in list
        header("Location: index.php");
    }
    // Display selected coffee based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($link, "SELECT * FROM pokemon WHERE pokemon_id=$id");
    while($pokemon = mysqli_fetch_array($result))
    {
        $name = $pokemon['pokemon_name'];
        $species = $pokemon['pokemon_species'];
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pokemon</title>
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
        <h2 class="text-center">Edit Pokemon</h2>
            <form name="updatePokemon" method="post" action="editPokemon.php">
                <table border="0">

                <tr>
                    <td>Pokemon Name:</td>
                    <td><input type="text" name="name" value=<?php echo $name;?> class="form-control"></td>
                </tr>
                <tr>
                    <td>Pokemon Species:</td>
                    <td><input type="text" name="species" value=<?php echo $species;?> class="form-control"></td>
                </tr>
                    <tr>
                        <td><input type="hidden" name="pokeId" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
    </body>
</html>
