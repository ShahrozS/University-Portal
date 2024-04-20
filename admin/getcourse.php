<?php



require '../connection.php';

$sql = "select * from course";

$result = mysqli_query($link,$sql);
$output  = "";
if(mysqli_num_rows($result)>0){

    $output .= "<thead>
                <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Instructor ID</th>

                </tr>
        
                    </thead>
                    <tbody>
                    
                    ";

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["id"]}</td> <td>{$row["name"]}</td> <td>{$row["instructor_id"]}</td>";
        $output .="<td>
        <a href='editcourse.php?id={$row["id"]} ' class='btn btn-success btn-sm'>Edit</a>
        
        <form action='deletecourse.php' method='POST' class='d-inline'>
        <button type='submit' name='delete_course' value='{$row['id']}' class='btn btn-danger btn-sm'>Delete</button>
    </form>
        </td>";

        $output.="</tr>";
    }

    echo $output;

}


?>