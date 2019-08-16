<?php  
$servername="localhost";
$user="root";
$password="";
$dbname = "stud";

$conn = new mysqli($servername, $user, $password,$dbname);

if ($conn -> connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no= $_POST["no"];
  $name = $_POST["name"];
  $m1 = $_POST["m1"];
  $m2 = $_POST["m2"];
  $avg =($m1+$m2)/2;
  }

$sql = "INSERT INTO st (rollno,name,mark1,mark2,average)
              VALUES ('$no','$name','$m1','$m2','$avg')";

if ($conn->query($sql) === TRUE) {
    echo "<br/><br/>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
