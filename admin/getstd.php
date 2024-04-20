<?php



require '../connection.php';

$sql = "select * from user where role = 'student'";

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
        <a href='student-edit.php/?id={$row["id"]} ' class='btn btn-success btn-sm'>Edit</a>
        
        <a href='student-delete.php?id={$row["id"]} ' class='btn btn-danger btn-sm'>Delete</a>
        </td>";

        $output.="</tr>";
    }

}


?>