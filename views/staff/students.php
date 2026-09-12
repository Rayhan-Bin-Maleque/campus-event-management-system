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
Student Attendance List
</h1>


<p>
Mark student attendance for selected event
</p>


</div>



<a

href="index.php?page=staff&action=events"

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
Search Student
</h2>



<input

type="text"

id="studentSearch"

placeholder="Search by student name or email..."

>


</div>









<!-- =====================================
     STUDENT TABLE
===================================== -->


<div class="box">


<h2>
Registered Students
</h2>





<div class="table-container">


<table>



<thead>


<tr>


<th>
Student Name
</th>


<th>
Email
</th>


<th>
Attendance Status
</th>


<th>
Action
</th>


</tr>


</thead>







<tbody id="studentTable">



<?php while($student=mysqli_fetch_assoc($students)): ?>



<tr>



<td>

<?= e($student['full_name']); ?>

</td>





<td>

<?= e($student['email']); ?>

</td>





<td>



<span class="status 

<?= strtolower(
str_replace(
' ',
'-',
$student['attendance_status']
)
); ?>">


<?= e($student['attendance_status']); ?>


</span>



</td>








<td>



<?php if($student['attendance_status']=="Not Attended"): ?>



<a

class="small-btn btn-success"

href="index.php?page=staff&action=mark_attended&id=<?= $student['attendance_id']; ?>">


Mark Attended


</a>



<?php else: ?>



<span class="status attended">

Completed


</span>



<?php endif; ?>



</td>




</tr>



<?php endwhile; ?>



</tbody>


</table>


</div>


</div>







</div>








<script>


ajaxSearch(

    "studentSearch",

    "search_students",

    "studentTable"

);



</script>







<?php

require_once "views/partials/footer.php";

?>
