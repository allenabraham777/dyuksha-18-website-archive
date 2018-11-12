<html>
<head>
<title>List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/ncnssce.css">
    <link rel="icon shortcut" href="images/ncnssce.png" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ncnssce.js"></script>
</head>
<body>
<?php
 include("connect2.php");
?>

<?php
   $q = "select * from dconfrence_attendee";
   $q2 = "select * from dconfrence";
   $res = mysqli_query($con,$q);
   $res2 = mysqli_query($con,$q2);
?>

   <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">College</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Pincode</th>
      <th scope="col">Price</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>

  <?php
      while($row = mysqli_fetch_array($res)){
            echo "<tr>";  
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
            echo "<td>$row[6]</td>";
            echo "<td>$row[7]</td>";
            echo "<td>$row[8]</td>";
            echo "<td>$row[9]</td>";
            echo "</tr>";
   }
   ?>
  </tbody>
</table>

 </br>
 </br>

  <table class="table table-striped">
   <thead>
    <tr>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">4</th>
      <th scope="col">Number</th>
      <th scope="col">6</th>
      <th scope="col">7</th>
      <th scope="col">8</th>
      <th scope="col">9</th>
      <th scope="col">10</th>
      <th scope="col">11</th>
      <th scope="col">Email</th>
      <th scope="col">13</th>
      <th scope="col">14</th>
      <th scope="col">15</th>
      <th scope="col">Designation</th>
      <th scope="col">17</th>
      <th scope="col">18</th>
      <th scope="col">19</th>
      <th scope="col">College</th>
      <th scope="col">21</th>
      <th scope="col">22</th>
      <th scope="col">23</th>
      <th scope="col">Phone Number</th>
      <th scope="col">25</th>
      <th scope="col">26/th>
      <th scope="col">27</th>
      <th scope="col">28</th>
      <th scope="col">29</th>
      <th scope="col">30</th>
      <th scope="col">31</th>
            
    </tr>
  </thead>
  <tbody>
   <?php
   while($row = mysqli_fetch_array($res2)){
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
    echo "<td>$row[5]</td>";
    echo "<td>$row[6]</td>";
    echo "<td>$row[7]</td>";
    echo "<td>$row[8]</td>";
    echo "<td>$row[9]</td>";
    echo "<td>$row[10]</td>";
    echo "<td>$row[11]</td>";
    echo "<td>$row[12]</td>";
    echo "<td>$row[13]</td>";
    echo "<td>$row[14]</td>";
    echo "<td>$row[15]</td>";
    echo "<td>$row[16]</td>";
    echo "<td>$row[17]</td>";
    echo "<td>$row[18]</td>";
    echo "<td>$row[19]</td>";
    echo "<td>$row[20]</td>";
    echo "<td>$row[21]</td>";
    echo "<td>$row[22]</td>";
    echo "<td>$row[23]</td>";
    echo "<td>$row[24]</td>";
    echo "<td>$row[25]</td>";
    echo "<td>$row[26]</td>";
    echo "<td>$row[27]</td>";
    echo "<td>$row[28]</td>";
    echo "<td>$row[29]</td>";
    echo "<td>$row[30]</td>";
    echo "<td>$row[31]</td>";
    echo "<td>$row[32]</td>";
    echo "</tr>";
   }

   ?>
   
   </table>

</body>
</html>