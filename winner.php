<?php 
      include("includes/header.php");?>
<div class="container winner">
  <h1 class="winners-h1">The winners!</h1>
<?php
      // Query the database for winners of the prize
      $stmt = $conn->prepare("SELECT * FROM `winners` ");
     
      // Get the prize ID from the session
       
      $stmt->execute();

      // Fetch the winners from the database
      $winners = $stmt->fetchAll();

      // Check if there are any winners
      if (count($winners) > 0) {
        // Output the winners in a table
        echo "<table>";
        echo "  <thead>
        <tr>
          <th>Username</th>
          <th>User ID</th>
          <th>Prize</th>
          <th>Photo of the prize</th>
        </tr>
      </thead>";
        foreach($winners as $winner) {
          echo "<tr>";
          echo "<td>" . $winner['username'] . "</td>";
          echo "<td>" . $winner['id_user'] . "</td>";
          echo "<td>" . $winner['prize'] . "</td>";
          echo "<td><img src='photos/" . $winner['prize'] . ".jpeg'></td>";
          echo "</tr>";
        } echo "</table>";
        echo "<style>
        table {
          border-collapse: collapse;
          width: 100%;
          max-width: 800px;
          margin: 0 auto;
          font-family: Arial, sans-serif;
          text-align: center;
        }
      
        th {
          background-color: #f3814c;
          color: white;
          font-weight: bold;
          padding: 10px;
          text-transform: uppercase;
        }
      
        td {
          border: 1px solid #ddd;
          padding: 8px;
        }
      
        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
      
        img {
          max-width: 100%;
          height: auto;
        }
      </style>";

      } else {
        // Output a message if there are no winners
        echo "No winners yet";
      }

      // Close the database connection
      $conn=null;?>
</div>

     <?php include("includes/footer.php");
    
    ?>