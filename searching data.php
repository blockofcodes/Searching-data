
<?php
$host ="localhost";
$dbusername="db_username";
$dbpassword="password";
$dbname="dbname";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
    die ("connection failed:" . $conn->connect_error);
}

if(isset($_POST['search']))
{
    $id=$_POST['id'];

    $sql = "SELECT School,firstname,ID, lastname,username,Grade FROM studentdata where firstname LIKE '%{$id}%' OR lastname LIKE '%{$id}%' OR username LIKE '%{$id}%'";
    $result = $conn->query($sql);

    echo "<center><table><tr><th>School Name</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Grade</th><th>Action</th></tr>";
    // output data of each rowd  Displaying table on website
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["School"].
            "<td>". $row["ID"].
            "<td>"   . $row["firstname"].
            "<td>" . $row["lastname"] .
            "<td>". $row["username"] .
            "<td>".$row["Grade"]. "</td></tr>"  ;

    }
    echo "</table></center>";
} else
{
    echo " DATA DIDNT MATCH IN OUR DATABASE";
}


$conn->close();
?>