<?php
// Create database connection using config file
include_once("config.php");

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Fetch data
$pokemon = mysqli_query($link, "SELECT * FROM pokemon WHERE is_delete=0 ORDER BY pokemon_id ASC");
$type = mysqli_query($link, "SELECT * FROM  type  WHERE is_delete=0 ORDER BY type_id ASC");
$breeding = mysqli_query($link, "SELECT * FROM  breeding  WHERE is_delete=0 ORDER BY egg_groups_id ASC");
$pokemonJoin = mysqli_query($link, "SELECT A.pokemon_id, A.pokemon_name, A.pokemon_species, B.type_name, C.egg_groups from pokemon A INNER JOIN type B ON A.type_id = B.type_id INNER JOIN breeding C ON A.egg_groups_id = C.egg_groups_id WHERE A.is_delete=0");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font: 14px sans-serif;
    }

    table {
        table-layout: fixed;
        max-width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
        margin: .25rem auto .5rem auto;
    }

    th {
        padding: 1rem;
    }

    td {
        padding: 1.5rem 1rem;
    }

    h3 {
        text-align: center;
    }

    div {
        width: fit-content;
    }
    </style>
    <script defer>
    function warning() {
        alert("Apakah Anda yakin ingin menghapus data ini?")
    }
    </script>
</head>

<body>

    <div class="logout-btn ml-3 mt-3">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <h1 class="my-5 text-center">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Pokemon
        Database.</h1>
    <h1 class="mb-4 text-center">Pokemon Database</h1>

    <!-- POKEMON -->
    <div class="d-flex align-items-center mx-auto">
        <h3>Tabel Pokemon</h3>
        <form action="index.php" method="get" class="ml-5 row">
            <!-- <label>Search :</label> -->
            <input type="text" name="searchPokemon" class="form-control form-control-sm col mr-2">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
    <div class="d-flex align-items-center mx-auto ">
        <?php 
            if(isset($_GET['searchPokemon'])){
                $searchPokemon = $_GET['searchPokemon'];
                echo "<b>Search result: ".$searchPokemon."</b>";
            }
        ?>
    </div>
    <div class="mx-auto mb-5">
        <table border="1px">
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
                if(isset($_GET['searchPokemon'])){
                    $searchPokemon = $_GET['searchPokemon'];
                    $pokemon = mysqli_query($link, "SELECT * FROM pokemon WHERE is_delete=0 AND pokemon_name like '%".$searchPokemon."%'");				
                }else{
                    $pokemon = mysqli_query($link, "SELECT * FROM pokemon WHERE is_delete=0 ORDER BY pokemon_id ASC");		
                }
                while($item = mysqli_fetch_array($pokemon)) {
                    echo "<tr>";
                    echo "<td>".$item['pokemon_id']."</td>";
                    echo "<td>".$item['pokemon_name']."</td>";
                    echo "<td>".$item['pokemon_species']."</td>";
                    echo "<td><a href='editPokemon.php?id=$item[pokemon_id]'>Edit</a> | <a href='deletePokemon.php?id=$item[pokemon_id]' onclick='warning()'>Delete</a></td></tr>";
                }
            ?>
        </table>
        <div class="add-btn ml-auto">
            <a href="addPokemon.php" class="btn btn-primary">Tambah Pokemon</a>
            <a href="binPokemon.php" class="btn btn-secondary">Restore Pokemon</a>
        </div>
    </div>

    <!-- TYPE -->
    <div class="d-flex align-items-center mx-auto ">
        <h3>Tabel Type</h3>
        <form action="index.php" method="get" class="ml-5 row">
            <!-- <label>Search :</label> -->
            <input type="text" name="searchType" class="form-control form-control-sm col mr-2">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
    <div class="d-flex align-items-center mx-auto ">
        <?php 
            if(isset($_GET['searchType'])){
                $searchType = $_GET['searchType'];
                echo "<b>Search result: ".$searchType."</b>";
            }
        ?>
    </div>
    <div class="mx-auto mb-5">
        <table border="1px">
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
                if(isset($_GET['searchType'])){
                    $searchType = $_GET['searchType'];
                    $type = mysqli_query($link, "SELECT * FROM type WHERE is_delete=0 AND type_name like '%".$searchType."%'");				
                }else{
                    $type = mysqli_query($link, "SELECT * FROM type WHERE is_delete=0 ORDER BY type_id ASC");		
                }
                while($item = mysqli_fetch_array($type)) {
                    echo "<tr>";
                    echo "<td>".$item['type_id']."</td>";
                    echo "<td>".$item['type_name']."</td>";
                    echo "<td>".$item['type_strength']."</td>";
                    echo "<td>".$item['type_weakness']."</td>";
                    echo "<td><a href='editType.php?id=$item[type_id]'>Edit</a> | <a href='deleteType.php?id=$item[type_id]' onclick='warning()'>Delete</a></td></tr>";
                }
            ?>
        </table>
        <div class="add-btn ml-auto">
            <a href="addType.php" class="btn btn-primary">Tambah Type</a>
            <a href="binType.php" class="btn btn-secondary">Restore Type</a>
        </div>
    </div>

    <!-- BREEDING -->
    <div class="d-flex align-items-center mx-auto ">
        <h3>Tabel Breeding</h3>
        <form action="index.php" method="get" class="ml-5 row">
            <!-- <label>Search :</label> -->
            <input type="text" name="searchBreeding" class="form-control form-control-sm col mr-2">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
    <div class="d-flex align-items-center mx-auto ">
        <?php 
            if(isset($_GET['searchBreeding'])){
                $searchBreeding = $_GET['searchBreeding'];
                echo "<b>Search result: ".$searchBreeding."</b>";
            }
        ?>
    </div>
    <div class="mx-auto mb-5">
        <table border="1px">
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
                if(isset($_GET['searchBreeding'])){
                    $searchBreeding = $_GET['searchBreeding'];
                    $breeding = mysqli_query($link, "SELECT * FROM breeding WHERE is_delete=0 AND egg_groups like '%".$searchBreeding."%'");				
                }else{
                    $breeding = mysqli_query($link, "SELECT * FROM breeding WHERE is_delete=0 ORDER BY egg_groups_id ASC");		
                }
                while($item = mysqli_fetch_array($breeding)) {
                    echo "<tr>";
                    echo "<td>".$item['egg_groups_id']."</td>";
                    echo "<td>".$item['egg_groups']."</td>";
                    echo "<td>".$item['egg_cycles']."</td>";
                    echo "<td><a href='editBreeding.php?id=$item[egg_groups_id]'>Edit</a> | <a href='deleteBreeding.php?id=$item[egg_groups_id]' onclick='warning()'>Delete</a></td></tr>";
                }
            ?>
        </table>
        <div class="add-btn ml-auto">
            <a href="addBreeding.php" class="btn btn-primary">Tambah Breeding</a>
            <a href="binBreeding.php" class="btn btn-secondary">Restore Breeding</a>
        </div>
    </div>

    <h3>Tabel Join</h3>
    <div class="mx-auto mb-5">
        <table border="1px">
            <tr>
                <th>Pokemon Name</th>
                <th>Pokemon Species</th>
                <th>Type</th>
                <th>Egg Groups</th>
                <th>Aksi</th>
            </tr>
            <?php
                while($item = mysqli_fetch_array($pokemonJoin)) { 
                    echo "<tr>";
                    echo "<td>".$item['pokemon_name']."</td>";
                    echo "<td>".$item['pokemon_species']."</td>";
                    echo "<td>".$item['type_name']."</td>"; 
                    echo "<td>".$item['egg_groups']."</td>"; 
                    echo "<td><a href='deleteJoin.php?id=$item[pokemon_id]' onclick='warning()'>Delete</a></td></tr>";
                }   
            ?>
        </table>
    </div>
</body>

</html>