<?php



require '../connection.php';

$sql = "select * from student_course";

$result = mysqli_query($link,$sql);
$output  = "";
if(mysqli_num_rows($result)>0){

    $output .= "<thead>
                <tr>
                <th>ID</th>
                
                <th>Roll Number</th>
                
                <th>Course ID</th>
                <th>Action</th>
                </tr>
        
                    </thead>
                    <tbody>
                    
                    ";

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["id"]}</td> <td>{$row["uid"]}</td> <td>{$row["cid"]}</td>";
        $output .="<td>
        
        <form action='deleteregister.php' method='POST' class='d-inline'>
        <button type='submit' name='delete_register' value='{$row['id']}' class='btn btn-danger btn-sm'>Delete</button>
    </form>
        </td>";

        $output.="</tr>";
    }

    echo $output;

}


