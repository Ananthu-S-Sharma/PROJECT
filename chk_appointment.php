<?php
include './connection.php';
$doc=$_GET['doc'];
$bc=$_GET['bc'];
$dt=$_GET['dt'];
$sel_h=mysqli_query($dbcon,"select * from doc_data where em='$doc'");
$r_h=mysqli_fetch_row($sel_h);
$hos=$r_h[1];
$chk_token=mysqli_query($dbcon,"select * from appointment where hid='$hos' and dt='$dt' and doc_id='$doc' and bar_code='$bc'");
if(mysqli_num_rows($chk_token)>0)
{
    $r_tok=  mysqli_fetch_row($chk_token);
    $sel_cit=mysqli_query($dbcon,"select * from cit_data where bar_code='$bc'");
    $r_cit=mysqli_fetch_row($sel_cit);
    ?>
Hi Mr./Mrs. <?php echo $r_cit[1] ?>, You are already fix an  Appointment with <?php echo $r_h[2] ?> on <?php echo $dt ?>.
Your TOKEN Number is <?php echo $r_tok[5] ?>. Thanks for Using this Service.
<?php
}
else
{
    echo"ok";
}
?>
    