<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<div class="topbar">


<div>

<h1>
My Events
</h1>


<p>
Manage your registered events and payments
</p>


</div>



<a

href="index.php?page=student&action=dashboard"

class="btn-secondary">

Back

</a>


</div>









<div class="box">


<h2>
Registered Events
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
Registration Status
</th>


<th>
Payment Status
</th>


<th>
Payment
</th>


<th>
Ticket
</th>


<th>
Action
</th>


</tr>


</thead>









<tbody>





<?php if(mysqli_num_rows($my_events)>0): ?>



<?php while($event=mysqli_fetch_assoc($my_events)): ?>



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

<?= e($event['registration_status']); ?>

</td>







<td>


<?php


$payment_query = mysqli_query(

$conn,

"

SELECT payment_status

FROM payments

WHERE student_id='".$_SESSION['user']['id']."'

AND event_id='".$event['id']."'

ORDER BY id DESC

LIMIT 1

"

);



if(mysqli_num_rows($payment_query)>0)

{


$payment=mysqli_fetch_assoc($payment_query);



if($payment['payment_status']=="paid")

{


echo '<span style="color:green;">Paid</span>';


}

else

{


echo '<span style="color:orange;">Pending</span>';


}



}

else

{


echo '<span style="color:red;">Not Paid</span>';


}



?>


</td>









<td>


<?php


$pay_check=mysqli_query(

$conn,

"

SELECT payment_status

FROM payments

WHERE student_id='".$_SESSION['user']['id']."'

AND event_id='".$event['id']."'

ORDER BY id DESC

LIMIT 1

"

);



$show_pay=true;



if(mysqli_num_rows($pay_check)>0)

{


$p=mysqli_fetch_assoc($pay_check);



if($p['payment_status']=="paid")

{

$show_pay=false;

}


}




if($show_pay)

{


?>


<a

class="small-btn btn-primary"

href="index.php?page=student&action=payment&event_id=<?= $event['id']; ?>">


Pay Now


</a>


<?php


}

else

{


echo '<span style="color:green;">Completed</span>';


}



?>


</td>









<td>


<a

class="small-btn btn-primary"

href="index.php?page=student&action=ticket&id=<?= $event['registration_id']; ?>">


View Ticket


</a>


</td>









<td>


<a

class="small-btn btn-danger"

href="index.php?page=student&action=cancel&id=<?= $event['registration_id']; ?>">


Cancel


</a>


</td>







</tr>






<?php endwhile; ?>






<?php else: ?>


<tr>

<td colspan="8">

No registered events found

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