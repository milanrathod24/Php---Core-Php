<?php
$conn = new mysqli("localhost","root","","restaurant");

if($conn->connect_error){
 die("Database connection failed");
}

// Sanitize inputs
$name = htmlspecialchars(trim($_POST['name']));
$contact = htmlspecialchars(trim($_POST['contact']));
$order = htmlspecialchars(trim($_POST['order_number']));
$rating = (int)$_POST['rating'];
$comments = htmlspecialchars(trim($_POST['comments']));

// Insert using prepared statement
$stmt = $conn->prepare("INSERT INTO feedback(name,contact,order_number,rating,comments) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssis",$name,$contact,$order,$rating,$comments);
$stmt->execute();

echo "Feedback Submitted Successfully! <br>";
echo "<a href='index.html'>Go Back</a>";
?>
