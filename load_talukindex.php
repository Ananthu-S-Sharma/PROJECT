<?php
include 'connection.php';
$st=$_GET['st'];
$d=$_GET['d'];
$sel_district=mysqli_query($dbcon,"select * from tal_info where s_id='$st' and d_id='$d'");
if(mysqli_num_rows($sel_district)>0)
{
    ?>
<select name="talk" class="form-control" required="required" onchange="load_vil(this.value,'<?php echo $st ?>','<?php echo $d ?>');load_hostlk(this.value,'<?php echo $st ?>','<?php echo $d ?>')">
<option value="">Choose One</option>
<?php
while($r_district=mysqli_fetch_row($sel_district))
{
    ?>
<option value="<?php echo $r_district[0] ?>"><?php echo $r_district[3] ?></option>
<?php
}
?>
</select>
<?php
}
else{
    ?>
<select name="talk" class="form-control" required="required">
<option value="">Choose One</option>
  </select>
<?php
}
?>