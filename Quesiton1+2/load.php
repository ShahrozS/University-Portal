

<?php


$link = mysqli_connect("localhost","root","","user1");


if(!$link){
    die("Failed to conenct!");

}


$sql = "Select * from user1";

$output = "";
if($result = mysqli_query($link,$sql)){

    if(mysqli_num_rows($result) > 0){
$output =  "<table>
                <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role<th>
                </tr> ";

        
        while($row = mysqli_fetch_assoc($result)){

            $output .= "<tr><td>{$row["id"]}</td>
                            <td>{$row["username"]}</td>
                            <td>{$row["password"]}</td>
                            <td>{$row["role"]}</td> </tr>";



        }

       $output .= '</table>';

       echo $output;
    }
}






?>