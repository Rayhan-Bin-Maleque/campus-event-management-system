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
Approved Events
</h1>


<p>
Select an event to manage student attendance
</p>


</div>



<a

href="index.php?page=staff&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     SEARCH
===================================== -->


<div class="box">


<h2>
Search Events
</h2>



<input

type="text"

id="staffEventSearch"

placeholder="Search event name or category..."


>


</div>









<!-- =====================================
     EVENT TABLE
===================================== -->


<div class="box">


<h2>
Approved Event List
</h2>





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
Capacity
</th>


<th>
Attendance Management
</th>


</tr>


</thead>








<tbody id="staffEventTable">



<?php if(mysqli_num_rows($events)>0): ?>



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

<?= e($event['capacity']); ?>

</td>








<td>



<a

class="small-btn btn-primary"

href="index.php?page=staff&action=create_attendance&id=<?= $event['id']; ?>">


Load Students


</a>







<a

class="small-btn btn-success"

href="index.php?page=staff&action=summary&id=<?= $event['id']; ?>">


Summary


</a>







<a

class="small-btn btn-primary"

href="index.php?page=staff&action=students&id=<?= $event['id']; ?>">


Student List


</a>







<a

class="small-btn btn-secondary"

href="index.php?page=staff&action=history&id=<?= $event['id']; ?>">


History


</a>








<a

class="small-btn btn-success"

href="index.php?page=staff&action=export_csv&id=<?= $event['id']; ?>">


Export CSV


</a>





</td>





</tr>





<?php endwhile; ?>





<?php else: ?>


<tr>

<td colspan="6">

No approved events available

</td>

</tr>


<?php endif; ?>






</tbody>


</table>


</div>


</div>








</div>







<script>


ajaxSearch(

    "staffEventSearch",

    "search_events",

    "staffEventTable"

);



</script>








<?php

require_once "views/partials/footer.php";

?>