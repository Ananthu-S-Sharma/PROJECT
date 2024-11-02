<?php
include 'connection.php';
$dep=$_GET['d'];
?>
<?php
$sel_dep=mysqli_query($dbcon,"select * from disease_data where dep='$dep'");
if(mysqli_num_rows($sel_dep)>0)
{
    ?>
<table class="table table-bordered table-hover table-responsive table-striped">
    <tr>
        <td>#</td>
        <td>Disease</td>
       
    </tr>
    <?php
    $i=1;
    while($r_dep=mysqli_fetch_row($sel_dep))
    {
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td>
            <b> <?php echo $r_dep[2] ?></b>
            <p><?php echo $r_dep[3] ?></p>
        </td>
       
    </tr>
    <?php
    $i++;
    }
    ?>
</table>
<?php
}
else
{
    echo"No Data Available";
}
?>