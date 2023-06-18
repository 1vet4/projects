<?php

include_once("connection.php");

if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
}

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
    $sql="SELECT * FROM review WHERE title LIKE '%$str%' OR type LIKE '%$str%' OR address LIKE '%$str%' OR description LIKE '%$str%'";
    $result=mysqli_query($link,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            echo '<table>
            <tr>
            <th> Title </th>
            <th> Type</th>
            <th> Address</th>
            </tr>';
            while($row=mysqli_fetch_array($result)){
            echo '
                <tr> 
                    <td>' .$row['title'].' </td>
                    <td>' .$row['type'].' </td>
                    <td>' .$row['address'].' </td>
                
                </tr>';
               
        };
        echo ' </table>';
       
    }
} else {
    echo 'No reviews matching you search';
}
}
?>