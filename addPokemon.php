<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pokemon</title>
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
    <h2 class="text-center mb-4">Add Pokemon</h2>
    <form action="addPokemon.php" method="post" name="form1">
        <table>
            <tr>
                <td>Pokemon ID: </td>
                <td><input type="number" name="pokeId" class="form-control"></td>
            </tr>
            <tr>
                <td>Pokemon Name: </td>
                <td><input type="text" name="name" class="form-control"></td>
            </tr>
            <tr>
                <td>Pokemon Species: </td>
                <td><input type="text" name="species" class="form-control"></td>
            </tr>
            <tr>
                <td>Pokemon Type ID: </td>
                <td><input type="number" name="typeId" class="form-control"></td>
            </tr>
            <tr>
                <td>Pokemon Breeding ID: </td>
                <td><input type="text" name="breedingId" class="form-control"></td>
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
            $pokeId = $_POST['pokeId'];
            $name = $_POST['name'];
            $species = $_POST['species'];
            $typeId = $_POST['typeId'];
            $breedingId = $_POST['breedingId'];

            // include database connection file 
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($link, "INSERT INTO pokemon (pokemon_id, pokemon_name, pokemon_species, type_id, egg_groups_id) VALUES('$pokeId','$name','$species','$typeId','$breedingId')");

            // Show message when user added
            echo "Berhasil  menambahkan  pokemon  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
        }
    ?>
</body>
</html>