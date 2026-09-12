<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<!-- =====================================
     TOP BAR
===================================== -->


<div class="topbar">


<div>

<h1>
Attendance Summary
</h1>


<p>
Event attendance performance report
</p>


</div>



<a

href="index.php?page=staff&action=events"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     SUMMARY CARDS
===================================== -->


<div class="stats">



<div class="stat">


<h3>

<?= $summary['total_students'] ?? 0; ?>

</h3>


<p>
Total Students
</p>


</div>







<div class="stat">


<h3>

<?= $summary['present_students'] ?? 0; ?>

</h3>


<p>
Present Students
</p>


</div>







<div class="stat">


<h3>


<?php


$total =
$summary['total_students'] ?? 0;


$present =
$summary['present_students'] ?? 0;



if($total > 0)
{

    echo round(
        ($present/$total)*100,
        2
    );

}
else
{

    echo 0;

}


?>%


</h3>


<p>
Attendance Rate
</p>


</div>







<div class="stat">


<h3>

<?=

$total - $present

?>

</h3>


<p>
Absent Students
</p>


</div>



</div>









<!-- =====================================
     REPORT TABLE
===================================== -->


<div class="box">


<h2>
Attendance Report
</h2>





<div class="table-container">


<table>



<thead>


<tr>


<th>
Category
</th>


<th>
Value
</th>


</tr>


</thead>







<tbody>



<tr>


<td>
Total Registered Students
</td>


<td>

<?= $summary['total_students'] ?? 0; ?>

</td>


</tr>







<tr>


<td>
Students Attended
</td>


<td>

<?= $summary['present_students'] ?? 0; ?>

</td>


</tr>







<tr>


<td>
Students Not Attended
</td>


<td>

<?= $total - $present; ?>

</td>


</tr>







<tr>


<td>
Attendance Percentage
</td>


<td>


<?=

$total > 0 ?

round(
($present/$total)*100,
2
)

:

0

?>%


</td>


</tr>



</tbody>



</table>


</div>


</div>







<!-- =====================================
     VISUAL STATUS
===================================== -->


<div class="box">


<h2>
Attendance Status
</h2>



<div class="information">



<div>


<strong>
Excellent Attendance
</strong>


<p>
Above 80% attendance rate
</p>


</div>







<div>


<strong>
Average Attendance
</strong>


<p>
Between 50% - 80%
</p>


</div>







<div>


<strong>
Low Attendance
</strong>


<p>
Below 50%
</p>


</div>



</div>


</div>







</div>







<?php

require_once "views/partials/footer.php";

?>