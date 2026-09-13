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
Admin Dashboard
</h1>


<p>
Manage users, events and reports
</p>


</div>


</div>









<!-- =====================================
     STATISTICS
===================================== -->


<div class="stats">





<div class="stat">


<h3>

<?= mysqli_num_rows($users); ?>

</h3>


<p>
Total Users
</p>


</div>








<div class="stat">


<h3>

<?= mysqli_num_rows($events); ?>

</h3>


<p>
Total Events
</p>


</div>








<div class="stat">


<h3>
Revenue
</h3>


<p>
Report Available
</p>


</div>





<div class="stat">


<h3>
Logs
</h3>


<p>
Activity Tracking
</p>


</div>





</div>









<!-- =====================================
     ADMIN ACTIONS
===================================== -->


<div class="box">


<h2>
Admin Management
</h2>





<div class="feature-container">





<a

class="btn-primary"

href="index.php?page=admin&action=users">

User Management

</a>







<a

class="btn-primary"

href="index.php?page=admin&action=events">

Event Approval

</a>







<a

class="btn-primary"

href="index.php?page=admin&action=revenue_csv">

Revenue Report

</a>







<a

class="btn-primary"

href="index.php?page=admin&action=logs">

Activity Logs

</a>





</div>


</div>









<!-- =====================================
     RECENT USERS
===================================== -->


<div class="box">


<h2>
Users
</h2>





<div class="table-container">


<table>


<thead>


<tr>


<th>
Name
</th>


<th>
Email
</th>


<th>
Role
</th>


</tr>


</thead>






<tbody>



<?php while($user=mysqli_fetch_assoc($users)): ?>


<tr>


<td>

<?= e($user['full_name']); ?>

</td>



<td>

<?= e($user['email']); ?>

</td>



<td>

<?= e($user['role']); ?>

</td>



</tr>



<?php endwhile; ?>



</tbody>


</table>


</div>


</div>









<!-- =====================================
     EVENTS
===================================== -->


<div class="box">


<h2>
Events
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