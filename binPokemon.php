<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $pokemonDel = mysqli_query($link, "SELECT * FROM pokemon WHERE is_delete=1 ORDER BY pokemon_id DESC");
?>

<html>
    <head>
        <title>Deleted Pokemon list</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{ font: 14px sans-serif; }
            table {table-layout: fixed; max-width: 100%; border-collapse: collapse; border: 1px solid black; margin: .25rem auto .5rem auto;}
            th { padding: 1rem; }
            td {padding: 1.5rem 1rem;}
            h3 {text-align: center;}
            div {width: fit-content; }
        </style>
    </head>

    <body>
        <a href="index.php" class="btn btn-dark ml-3 mt-3">🔙 Home</a>
        <br/><br/>

            <h3>Deleted Pokemon List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>Pokemon ID</th>
                    <th>Pokemon Name</th>
                    <th>
                        Pokemon Species
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
                <?php
                    while($item = mysqli_fetch_array($pokemonDel)) {
                    echo "<tr>";
                    echo "<td>".$item['pokemon_id']."</td>";
                    echo "<td>".$item['pokemon_name']."</td>";
                    echo "<td>".$item['pokemon_species']."</td>";
                    echo "<td><a href='restorePokemon.php?id=$item[pokemon_id]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
    </body>
</html>
