<?php
include './connection.php';
$cod=$_GET['cod'];
$chk_code=mysqli_query($dbcon,"select * from cit_data where bar_code='$cod'");
if(mysqli_num_rows($chk_code)>0)
{
    echo"1";
}
else
{
    echo"2";
}
?>