<?php
/**
 * Created by PhpStorm.
 */
include "najaveniHeader.php";
include "connection.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
</head>
<body>
<div class="container" style="margin:30 auto;background-color:whitesmoke;border-radius:4px;padding-left: 40px;
    padding-right: 40px;">
    <table border="3"  width="100%" cellspacing="7" >
        <th>ИД</th>  <th>ИМЕ</th>   <th>ЕМАИЛ</th>  <th>КОРИСНИЧКО ИМЕ</th>  <th> ТИП НА КОРИСНИК </th>
    <?php

    $result = mysqli_query($conn,"SELECT id, ime, email, username, tip_korisnik FROM korisnici WHERE tip_korisnik='корисник'") or die("Error");


    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"] ."</td><td>".$row["ime"]."</td><td>".$row["email"]."</td><td>".$row["username"] ."</td><td>".$row["tip_korisnik"] ."</td></tr>";
        }
    } else {
        echo "0 results";
    }


    ?>
    </table>
</div>


</body>
</html>


