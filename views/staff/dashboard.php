<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<div class="topbar">


<div>

<h1>
Staff Dashboard
</h1>


<p>
Manage payments, attendance and student verification
</p>


</div>


</div>









<!-- =====================================
     QUICK STATISTICS
===================================== -->


<div class="stats">



<div class="stat">


<h3>

<?= mysqli_num_rows($events); ?>

</h3>


<p>
Approved Events
</p>


</div>





<div class="stat">


<h3>
0
</h3>


<p>
Total Students
</p>


</div>





<div class="stat">


<h3>
0
</h3>


<p>
Present Today
</p>


</div>





<div class="stat">


<h3>
0%
</h3>


<p>
Attendance Rate
</p>


</div>



</div>









<!-- =====================================
     STAFF ACTIONS
===================================== -->


<div class="box">


<h2>
Staff Management
</h2>




<div class="feature-container">



<a

class="btn-primary"

href="index.php?page=staff&action=events">


Approved Events


</a>






<a

class="btn-primary"

href="index.php?page=staff&action=verify_ticket">


QR Ticket Verification


</a>







<a

class="btn-primary"

href="index.php?page=staff&action=payments">


Payment Management


</a>





</div>


</div>









<!-- =====================================
     EVENT LIST
===================================== -->


<div class="box">


<h2>
Approved Events
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
Status
</th>


<th>
Action
</th>


</tr>


</thead>






<tbody>



<?php while($event=mysqli_fetch_assoc($events)): ?>



<tr>



<td>

<?= e($event['event_name']); ?>

</td>





<td>

<?= e($event['event_date']); ?>

</td>





<td>

<?= e($event['venue']); ?>

</td>





<td>

<span class="status approved">

<?= e($event['status']); ?>

</span>

</td>





<td>


<a

class="small-btn btn-primary"

href="index.php?page=staff&action=students&id=<?= $event['id']; ?>">


Student List


</a>



<a

class="small-btn btn-success"

href="index.php?page=staff&action=summary&id=<?= $event['id']; ?>">


Summary


</a>



</td>



</tr>



<?php endwhile; ?>



</tbody>


</table>


</div>


</div>







</div>







<?php

require_once "views/partials/footer.php";

?>