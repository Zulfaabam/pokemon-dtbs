<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $breedingDel = mysqli_query($link, "SELECT * FROM breeding WHERE is_delete=1 ORDER BY egg_groups_id DESC");
?>

<html>
    <head>
        <title>Deleted Breeding list</title>
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

            <h3>Deleted Breeding List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>
                        Egg Groups ID
                    </th>
                    <th>
                        Egg Groups
                    </th>
                    <th>
                        Egg Cycles
                    </th>
                    <th>Aksi</th>
                </tr>
                <?php
                    while($item = mysqli_fetch_array($breedingDel)) {
                    echo "<tr>";
                    echo "<td>".$item['egg_groups_id']."</td>";
                    echo "<td>".$item['egg_groups']."</td>";
                    echo "<td>".$item['egg_cycles']."</td>";
                    echo "<td><a href='restoreBreeding.php?id=$item[egg_groups_id]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
    </body>
</html>
