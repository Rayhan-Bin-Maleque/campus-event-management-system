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
Event Statistics
</h1>


<p>
Analyze your event performance
</p>


</div>



<a

href="index.php?page=organizer&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     STATISTICS CARDS
===================================== -->


<div class="stats">



<div class="stat">


<h3>

<?= $registration['total'] ?? 0; ?>

</h3>


<p>
Total Participants
</p>


</div>








<div class="stat">


<h3>

<?= $revenue['revenue'] ?? 0; ?>

</h3>


<p>
Total Revenue
</p>


</div>








<div class="stat">


<h3>

<?= $attendance['total_students'] ?? 0; ?>

</h3>


<p>
Registered Students
</p>


</div>








<div class="stat">


<h3>

<?= $attendance['present_students'] ?? 0; ?>

</h3>


<p>
Attended Students
</p>


</div>



</div>









<!-- =====================================
     PERFORMANCE OVERVIEW
===================================== -->


<div class="box">


<h2>
Performance Overview
</h2>



<div class="information">



<div>


<strong>
Registration Performance
</strong>


<p>

<?= $registration['total'] ?? 0; ?>

students registered

</p>


</div>






<div>


<strong>
Revenue Performance
</strong>


<p>

৳ <?= $revenue['revenue'] ?? 0; ?>

generated

</p>


</div>







<div>


<strong>
Attendance Performance
</strong>


<p>

<?= $attendance['present_students'] ?? 0; ?>

students attended

</p>


</div>







<div>


<strong>
Attendance Rate
</strong>


<p>


<?php


$total =
$attendance['total_students'] ?? 0;


$present =
$attendance['present_students'] ?? 0;



if($total>0)
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


?> %


</p>


</div>





</div>


</div>









<!-- =====================================
     REPORT SUMMARY
===================================== -->


<div class="box">


<h2>
Event Performance Report
</h2>



<table>



<tr>


<th>
Metric
</th>


<th>
Result
</th>


</tr>





<tr>


<td>
Participants
</td>


<td>

<?= $registration['total'] ?? 0; ?>

</td>


</tr>






<tr>


<td>
Revenue
</td>


<td>

৳ <?= $revenue['revenue'] ?? 0; ?>

</td>


</tr>







<tr>


<td>
Attendance
</td>


<td>

<?= $attendance['present_students'] ?? 0; ?>

/

<?= $attendance['total_students'] ?? 0; ?>


</td>


</tr>





</table>


</div>







</div>






<?php

require_once "views/partials/footer.php";

?>