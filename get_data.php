<?php
include 'connection.php';
$d=$_GET['d'];
$sel_hid=mysqli_query($dbcon,"SELECT distinct `h_id` FROM `new_patient` WHERE `deses`='$d' order by `deses`");
if(mysqli_num_rows($sel_hid)>0)
{
    ?>
<table class="table table-bordered table-condensed table-hover table-responsive">
    <tr>
        <td>#</td>
        <td>Hospital</td>
        <td>Total</td>
        <td>Death</td>
        <td>Time</td>
    </tr>
    <?php
    $i=1;
    while($r_hid=mysqli_fetch_row($sel_hid))
    {
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php 
        $sel_hn=mysqli_query($dbcon,"select * from org_data where unme='$r_hid[0]'");
        $r_hn=mysqli_fetch_row($sel_hn);
        echo $r_hn[1] ?></td>
        <td>
          <?php 
        $sel_ds=mysqli_query($dbcon,"select * from new_patient where h_id='$r_hid[0]' and deses='$d'");
        $tc=mysqli_num_rows($sel_ds);
        echo $tc ?>
        </td>
        <td>
          <?php 
        $sel_ds=mysqli_query($dbcon,"select * from death_certificate where trtmnt_by='$r_hid[0]' and dses='$d'");
        $td=mysqli_num_rows($sel_ds);
        echo $td ?>
        </td>
        <td>
          <?php 
        $sel_ds=mysqli_query($dbcon,"select sum(durtion) from death_certificate where trtmnt_by='$r_hid[0]' and dses='$d'");
        $dt=mysqli_fetch_row($sel_ds);
        echo $dt[0] ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
include("chart/fusioncharts.php");
$columnChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", '{  
                "chart":{  
                  "caption":"Harry\'s SuperMart",
                  "subCaption":"Top 5 stores in last month by revenue",
                  "numberPrefix":"$",
                  "theme":"ocean"
                },
                "data":[  
                  {  
                     "label":"Bakersfield Central",
                     "value":"880000"
                  },
                  {  
                     "label":"Garden Groove harbour",
                     "value":"730000"
                  },
                  {  
                     "label":"Los Angeles Topanga",
                     "value":"590000"
                  },
                  {  
                     "label":"Compton-Rancho Dom",
                     "value":"520000"
                  },
                  {  
                     "label":"Daly City Serramonte",
                     "value":"330000"
                  }
                ]
            }');
// Render the chart
$columnChart->render();
?>

<?php
}
?>