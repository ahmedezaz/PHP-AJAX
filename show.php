<?php

$conn = mysqli_connect('localhost', 'root', '', 'ajaxphp') or die("CONNECTION ERRO");

$sql = "SELECT * FROM details";

$result = mysqli_query($conn, $sql) or die("SQL ERROR");

if(mysqli_num_rows($result) > 0){

    $output = '<table>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Delete</th>
                <th>EDIT</th>

                </tr>
    ';

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>

                    <td>{$row["id"]} </td>
                    <td>{$row["name"]} </td>
                    <td>{$row["age"]} </td>
                    <td><button class='delete-btn' data-id='{$row["id"]}'>DELETE</button></td>
                    <td><button class='edit-btn' data-edid='{$row["id"]}'>EDIT</button></td>


        
                    </tr>";
    }

    $output .= '</table>';
    mysqli_close($conn);

    echo $output;

}else {
        echo "ERROR";
}


?>
