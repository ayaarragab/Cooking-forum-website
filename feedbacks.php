<?php
include("includes/header.php");
    // Prepare the SQL statement
    $sql = $conn->prepare("SELECT * FROM contactus");
    $sql->execute();
     ?>

<div class="container feedbacks">
    <h2 style="text-align:center">Feedbacks!</h2>
    <div class="hr"></div>
    <br>
  <table border="1">
        <tr>
            <th>user name</th>
            <th>email</th>
            <th>messagge</th>
        </tr>
    <?php
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row["user_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["massage"]."</td></tr>";
    }
    ?>
    </table>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  text-align: center;
  padding: 8px;
}

th {
  background-color: #fb5d33 ;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
</style>
<br>
<button class="submit"><a href="index.php">Back home</a></button>
</div>
    <?php
    include("includes/footer.php") 
    ?>
