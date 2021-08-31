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
                <th>DELETE </th>
                </tr>
    ';

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>

                    <td>{$row["id"]} </td>
                    <td>{$row["name"]} </td>
                    <td>{$row["age"]} </td>
        
                    </tr>";
    }

    $output .= '</table>';
    mysqli_close($conn);

    echo $output;

}else {
        echo "ERROR";
}


?>
