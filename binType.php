<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $typeDel = mysqli_query($link, "SELECT * FROM type WHERE is_delete=1 ORDER BY type_id DESC");
?>

<html>
    <head>
        <title>Deleted Type list</title>
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

            <h3>Deleted Type List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>
                        Type ID
                    </th>
                    <th>
                        Type Name
                    </th>
                    <th>
                        Type Strength
                    </th>
                    <th>
                        Type Weakness
                    </th>
                    <th>Aksi</th>
                </tr>
                <?php
                    while($item = mysqli_fetch_array($typeDel)) {
                    echo "<tr>";
                    echo "<td>".$item['type_id']."</td>";
                    echo "<td>".$item['type_name']."</td>";
                    echo "<td>".$item['type_strength']."</td>";
                    echo "<td>".$item['type_weakness']."</td>";
                    echo "<td><a href='restoreType.php?id=$item[type_id]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
    </body>
</html>
