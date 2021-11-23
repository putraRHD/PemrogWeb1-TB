<?php  

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    
    $sql = "SELECT * FROM contactus";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 