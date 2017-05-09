<?php

$config = [
    "ip" => "localhost",
    "port" => 3306,
    "login" => "root",
    "password" => "",
    "database" => "dogs",
];


$mySqlRes = mysqli_connect($config['ip'], $config['login'], $config['password']);

mysqli_select_db($mySqlRes, "dogs");



$res = mysqli_query($mySqlRes, "select * from dogs");

$dogsArray = [];
while ($row = mysqli_fetch_assoc($res)) {

        $dogsArray[$row['id']] = ["id" => $row['id'], "full name" => $row['full name'], "name" => $row['name'],  "breed" => $row['breed'],
            "pedigree number" => $row['pedigree number'], "hallmark number"=> $row['hallmark number']
            , "chip number"=> $row['chip number'] ,
            "date of the last vaccination against rabies"=> $row['date of the last vaccination against rabies'], "active"=> $row['active'] ];
}

echo PHP_EOL;

if (isset($_POST['a'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $j = $_POST['j'];
    $query = "'".$a."' , '". $b."' , '" .$c."' , '" .$d."' ,'" .$e."' ,'" .$f."' ,'". $j."'";
    print_r($query);
    mysqli_query($mySqlRes," INSERT INTO `dogs` (`id`, `full name`, `name`, `breed`, `pedigree number`, `hallmark number`, `chip number`, `date of the last vaccination against rabies`) 
    VALUES (NULL,  $query);");
}

if (isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($mySqlRes,"
UPDATE dogs
SET active = 0
WHERE id = $delete_id;");

}



?>


<html>
  <head>
      <title>Dogies</title>
      <style>

          body{
              background: url("dogs.jpg") no-repeat;
              background-size: contain;
              background-position: bottom;
          }
          h1{
              text-align: center;
              color: saddlebrown;
          }
          #panel{
              display: none;
              width: 500px;
          }

          table, td, th {
              border: 1px solid #ddd;

          }

          table {
              border-collapse: collapse;
              width: 100%;
          }

          th, td {
              padding: 5px;
          }
          #flip{
              text-decoration: none;
              background: #faff23;
              padding: 8px;
              display: block;
              width: 180px;
              color: black;
              border-radius: 20px;
              text-align: center;
              margin-top: 10px;
              opacity: 0.8;


          }
          #flip:hover{
              background: #ffcc29;
          }
      </style>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>
          $(document).ready(function(){
              $("#flip").click(function(){
                  $("#panel").slideToggle("slow");
              });
          });
      </script>
  </head>
  <meta charset="utf-8">
 <body>
 <h1>My dogs</h1>
  <table>

      <tr>
          <?php foreach ($dogsArray as  $k => $value ){?>

              <?php
           if ($k == 1 ){


              foreach ($value as $key => $item) { ?>
             <th> <?= $key ?> </th>
              <?php } }  ?>

      </tr>

      <tr>

              <?php foreach ($value as  $item) { ?>
                  <td> <?= $item ?> </td>
              <?php }  ?>
          <td><a href=<?="'?delete=".$value['id']."'"   ?> id="delete"> Delete</a></td>
              <?php }  ?>

      </tr>



  </table>

 <a id="flip" href="#"><h2>Insert new dog</h2></a>
<form method="post" id="panel">
    <input type="text" name="a" placeholder="full name" style=" width: 500px" required>
    <input type="text" name="b" placeholder="name" style=" width: 500px" required>
    <input type="text" name="c" placeholder="breed" style=" width: 500px" required>
    <input type="text" name="d" placeholder="pedigree number" style=" width: 500px" required>
    <input type="text" name="e" placeholder="hallmark number" style=" width: 500px" required>
    <input type="text" name="f" placeholder="chip number" style=" width: 500px" required>
    <input type="text" name="j" placeholder="date of the last vaccination against rabie 2017-05-01" style=" width: 500px" required>

    <input type="submit">
</form>

 </body>
</html>



