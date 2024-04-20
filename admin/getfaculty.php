<?php



require '../connection.php';

$sql = "select * from user where role = 'faculty'";

$result = mysqli_query($link,$sql);
$output  = "";
if(mysqli_num_rows($result)>0){

    $output .= "<thead>
                <tr>
                <th>ID</th>
                
                <th>First Name</th>
                
                <th>Last Name</th>
                
                <th>Username</th>
                
                <th>Password</th>
                
                <th>Action</th>
                </tr>
        
                    </thead>
                    <tbody>
                    
                    ";

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["id"]}</td> <td>{$row["firstname"]}</td> <td>{$row["lastname"]}</td> <td>{$row["username"]}</td> <td>{$row["password"]}</td>";
        $output .="<td>
        <a href='editfaculty.php?id={$row["id"]} ' class='btn btn-success btn-sm'>Edit</a>
        
        <form action='deletefaculty.php' method='POST' class='d-inline'>
        <button type='submit' name='delete_faculty' value='{$row['id']}' class='btn btn-danger btn-sm'>Delete</button>
    </form>
        </td>";

        $output.="</tr>";
    }

    echo $output;

}


?>