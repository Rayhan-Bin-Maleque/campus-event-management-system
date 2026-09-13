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
My Attendance
</h1>


<p>
View your event participation history
</p>


</div>



<a

href="index.php?page=student&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     SEARCH
     AJAX
===================================== -->


<div class="box">


<h2>
Search Attendance
</h2>



<input

type="text"

id="attendanceSearch"

placeholder="Search by event name..."

>



</div>









<!-- =====================================
     ATTENDANCE TABLE
===================================== -->


<div class="box">


<h2>
Attendance History
</h2>





<div class="table-container">


<table>



<thead>


<tr>


<th>
Event Name
</th>


<th>
Date
</th>


<th>
Venue
</th>


<th>
Attendance Status
</th>


<th>
Attendance Date
</th>


</tr>


</thead>







<tbody id="attendanceTable">



<?php while($row=mysqli_fetch_assoc($attendance)): ?>



<tr>



<td>

<?= e($row['event_name']); ?>

</td>





<td>

<?= e($row['event_date']); ?>

</td>





<td>

<?= e($row['venue']); ?>

</td>





<td>


<span class="status <?= strtolower(str_replace(' ','-',$row['attendance_status'])); ?>">


<?= e($row['attendance_status']); ?>


</span>


</td>





<td>

<?= e($row['attendance_date']); ?>

</td>



</tr>



<?php endwhile; ?>



</tbody>


</table>


</div>


</div>







</div>







<script>


document.addEventListener("DOMContentLoaded", function(){


    ajaxSearch(

        "attendanceSearch",

        "search_attendance",

        "attendanceTable"

    );


});


</script>







<?php

require_once "views/partials/footer.php";

?>