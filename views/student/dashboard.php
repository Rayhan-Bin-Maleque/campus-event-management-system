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
Student Dashboard
</h1>


<p>
Explore events, register and manage your activities
</p>


</div>


</div>






<!-- =====================================
     STAT CARDS
===================================== -->


<div class="stats">



<div class="stat">


<h3>

<?= isset($events) ? mysqli_num_rows($events) : 0; ?>

</h3>


<p>
Available Events
</p>


</div>






<div class="stat">


<h3>

<?= isset($my_events) ? mysqli_num_rows($my_events) : 0; ?>

</h3>


<p>
My Events
</p>


</div>







<div class="stat">


<h3>

<?= isset($payments) ? mysqli_num_rows($payments) : 0; ?>

</h3>


<p>
Payments
</p>


</div>







<div class="stat">


<h3>

<?= isset($attendance) ? mysqli_num_rows($attendance) : 0; ?>

</h3>


<p>
Attendance
</p>


</div>



</div>









<!-- =====================================
     AVAILABLE EVENTS
===================================== -->


<div class="box">


<h2>
Available Events
</h2>





<div class="search-box">


<input

type="text"

id="availableEventSearch"

placeholder="Search event name or category..."

>


</div>







<div class="table-container">


<table>



<thead>


<tr>


<th>
Event Name
</th>


<th>
Category
</th>


<th>
Date
</th>


<th>
Venue
</th>


<th>
Fee
</th>


<th>
Action
</th>


</tr>


</thead>







<tbody id="availableEventTable">



<?php if(isset($events) && mysqli_num_rows($events)>0): ?>



<?php while($event=mysqli_fetch_assoc($events)): ?>



<tr>



<td>

<?= e($event['event_name']); ?>

</td>





<td>

<?= e($event['event_category']); ?>

</td>





<td>

<?= e($event['event_date']); ?>

</td>





<td>

<?= e($event['venue']); ?>

</td>





<td>

৳ <?= e($event['registration_fee']); ?>

</td>





<td>



<a

class="small-btn btn-primary"

href="index.php?page=student&action=register&id=<?= $event['id']; ?>">


Register


</a>



</td>



</tr>



<?php endwhile; ?>



<?php else: ?>


<tr>

<td colspan="6">

No available events found

</td>

</tr>


<?php endif; ?>



</tbody>


</table>


</div>


</div>









<!-- =====================================
     QUICK LINKS
===================================== -->


<div class="box">


<h2>
Student Services
</h2>





<div class="feature-container">



<a

class="btn-primary"

href="index.php?page=student&action=my_events">


My Events


</a>







<a

class="btn-primary"

href="index.php?page=student&action=attendance">


My Attendance


</a>







<a

class="btn-primary"

href="index.php?page=student&action=recommend">


Recommended Events


</a>



</div>


</div>






</div>







<script>

document.addEventListener("DOMContentLoaded", function(){


    ajaxSearch(

        "availableEventSearch",

        "search_events",

        "availableEventTable"

    );


});


</script>






<?php

require_once "views/partials/footer.php";

?>