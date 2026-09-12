<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">





<div class="topbar">


<div>

<h1>
Attendance History
</h1>


<p>
View attendance records and export report
</p>


</div>



<a

href="index.php?page=staff&action=events"

class="btn-secondary">

Back

</a>



</div>









<div class="box">


<h2>
Attendance Report
</h2>





<div style="margin-bottom:20px;">


<a

class="btn-primary"

href="index.php?page=staff&action=export_csv&id=<?= $_GET['id']; ?>">


Export CSV


</a>



</div>









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
Event
</th>


<th>
Attendance Status
</th>


<th>
Attendance Date
</th>


</tr>


</thead>










<tbody>




<?php if(mysqli_num_rows($history)>0): ?>





<?php while($row=mysqli_fetch_assoc($history)): ?>



<tr>



<td>

<?= e($row['full_name']); ?>

</td>





<td>

<?= e($row['email']); ?>

</td>





<td>

<?= e($row['event_name']); ?>

</td>





<td>



<?php if($row['attendance_status']=="present"): ?>



<span class="status approved">

Present

</span>



<?php else: ?>



<span class="status">

Absent

</span>



<?php endif; ?>



</td>







<td>

<?= e($row['attendance_date']); ?>

</td>





</tr>





<?php endwhile; ?>






<?php else: ?>


<tr>

<td colspan="5">

No attendance records found

</td>

</tr>


<?php endif; ?>





</tbody>


</table>


</div>







</div>






</div>









<?php

require_once "views/partials/footer.php";

?>