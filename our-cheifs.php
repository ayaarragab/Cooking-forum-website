<?php
ob_start();
include("includes/header.php");?>
<div class="container team">
  <h1>Our staff of chefs</h1>
<style>
table {
  border-collapse: collapse;
  width: 70%;
  margin-bottom: 20px;
}

th, td {
  text-align: center;
  padding: 27px;
}

th {
  background-color: #fb5d33 ;
  color: white;
}

tr:nth-child(odd) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
</style>
    <table>
        <thead>
            <tr>
            <th>Name</th>
                <th>ID</th>
                <th>Nationalitiy</th>
                <th>Qualification</th>
                <th>About her/him</th>

            </tr>
        </thead>
        <tbody>
            <?php

            // select all data from the "mytable" table
            $stmt = $conn->query("SELECT * FROM cheifs");

            // loop through the result set and print each row
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nationalitiy']."</td>";
                echo "<td>".$row['qualification']."</td>";
                echo "<td>".$row['about_you']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <button class="submit"><a href="index.php">Back home</a></button>

</div>
<?php include("includes/footer.php");
 ob_end_flush(); ?>
