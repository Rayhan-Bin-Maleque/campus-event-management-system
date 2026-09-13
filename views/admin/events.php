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
Event Approval
</h1>


<p>
Approve or reject organizer events
</p>


</div>


</div>









<!-- =====================================
     SEARCH
     AJAX
===================================== -->


<div class="box">


<h2>
Search Events
</h2>



<div class="search-box">


<input

type="text"

id="eventSearch"

placeholder="Search by event name or category..."

>


</div>


</div>









<!-- =====================================
     EVENT TABLE
===================================== -->


<div class="box">


<h2>
Pending Events
</h2>





<div class="table-container">


<table>



<thead>


<tr>


<th>
Event Name
</th>


<th>
Organizer
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







<tbody id="eventTable">



<?php while($event=mysqli_fetch_assoc($events)): ?>



<tr>



<td>

<?= e($event['event_name']); ?>

</td>





<td>

<?= e($event['organizer_name']); ?>

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

<?= e($event['registration_fee']); ?>

</td>






<td>



<a

class="small-btn btn-success"

href="index.php?page=admin&action=event_status&id=<?= $event['id']; ?>&status=approved">


Approve


</a>





<a

class="small-btn btn-danger"

href="index.php?page=admin&action=event_status&id=<?= $event['id']; ?>&status=rejected">


Reject


</a>



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

    "eventSearch",

    "search_events",

    "eventTable"

);



</script>






<?php

require_once "views/partials/footer.php";

?>