<head>
  <title>Feedback Display</title>
  <link rel="stylesheet" href="style.css">
</head>

<?php
$conn = new mysqli("localhost","root","","restaurant");
$result = $conn->query("SELECT * FROM feedback ORDER BY submitted_at DESC");

echo "<h2>Customer Feedback</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Name</th>
        <th>Order No</th>
        <th>Rating</th>
        <th>Comments</th>
      </tr>";

while($row = $result->fetch_assoc()){
 echo "<tr>";
 echo "<td>".$row['name']."</td>";
 echo "<td>".$row['order_number']."</td>";

 // Star rating
 echo "<td>";
 for($i=1; $i<=5; $i++){
   echo ($i <= $row['rating']) ? "★" : "☆";
 }
 echo "</td>";

 echo "<td>".$row['comments']."</td>";
 echo "</tr>";
}
echo "</table>";
?>
