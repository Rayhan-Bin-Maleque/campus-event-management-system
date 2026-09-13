<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<div class="topbar">


<div>

<h1>
Organizer Dashboard
</h1>


<p>
Manage your events, statistics and finances
</p>


</div>



<div>


<a 

href="index.php?page=organizer&action=add_event"

class="btn-primary">


+ Create Event


</a>


</div>


</div>









<!-- =====================================
     STATISTICS
===================================== -->


<div class="stats">



<div class="stat">


<h3>

<?= mysqli_num_rows($events); ?>

</h3>


<p>
My Events
</p>


</div>







<div class="stat">


<h3>

<?php

$total=0;


mysqli_data_seek($finance,0);


while($f=mysqli_fetch_assoc($finance))
{

$total += $f['total_expense'];

}


?>

<?= $total; ?>


</h3>


<p>
Total Expense
</p>


</div>







<div class="stat">


<h3>
0
</h3>


<p>
Participants
</p>


</div>







<div class="stat">


<h3>
0
</h3>


<p>
Revenue
</p>


</div>



</div>









<!-- =====================================
     SEARCH EVENTS
===================================== -->


<div class="box">


<h2>
My Events
</h2>



<div class="search-box">


<input

type="text"

id="organizerEventSearch"

placeholder="Search event name or category..."

>


</div>


</div>









<!-- =====================================
     EVENT TABLE
===================================== -->


<div class="box">



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
Seats
</th>


<th>
Price
</th>


<th>
Status
</th>


<th>
Action
</th>


</tr>


</thead>







<tbody id="organizerEventTable">



<?php


mysqli_data_seek($events,0);


while($event=mysqli_fetch_assoc($events)):


?>



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

<?= e($event['registration_fee']); ?>

</td>





<td>


<span class="status <?= $event['status']; ?>">


<?= e($event['status']); ?>


</span>


</td>








<td>



<a

class="small-btn btn-success"

href="index.php?page=organizer&action=statistics&id=<?= $event['id']; ?>">


Stats


</a>







<a

class="small-btn btn-warning"

href="index.php?page=organizer&action=finance&id=<?= $event['id']; ?>">


Finance


</a>







<a

class="small-btn btn-primary"

href="index.php?page=organizer&action=edit_event&id=<?= $event['id']; ?>">


Edit


</a>







<a

class="small-btn btn-danger"

href="index.php?page=organizer&action=delete_event&id=<?= $event['id']; ?>"

onclick="return confirmDelete();">


Delete


</a>




</td>



</tr>




<?php endwhile; ?>



</tbody>



</table>



</div>


</div>









<!-- =====================================
     ORGANIZER TOOLS
===================================== -->


<div class="box">


<h2>
Organizer Tools
</h2>



<div class="feature-container">



<a 

class="btn-primary"

href="index.php?page=organizer&action=performance">


Performance Report


</a>






<a 

class="btn-primary"

href="index.php?page=organizer&action=finance">


Budget & Expense Tracking


</a>



</div>


</div>







</div>








<script>



document.addEventListener("DOMContentLoaded", function(){

ajaxSearch(

"organizerEventSearch",

"search_events",

"organizerEventTable"

);

});


</script>








<?php

require_once "views/partials/footer.php";

?>