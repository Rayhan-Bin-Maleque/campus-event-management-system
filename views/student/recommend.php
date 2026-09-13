<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">


<div class="topbar">


<div>

<h1>
Recommended Events
</h1>


<p>
Events you may like
</p>


</div>



<a href="index.php?page=student&action=dashboard"

class="btn-secondary">

Back

</a>


</div>






<div class="box">


<h2>
Recommended Events
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
Fee
</th>


<th>
Action
</th>


</tr>


</thead>





<tbody>



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

৳ <?= e($event['registration_fee']); ?>

</td>



<td>


<a

class="small-btn btn-primary"

href="index.php?page=student&action=register_event&id=<?= $event['id']; ?>">

Register

</a>


</td>


</tr>



<?php endwhile; ?>



<?php else: ?>


<tr>

<td colspan="6">

No recommended events available

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