<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<div class="topbar">


<div>

<h1>
Payment Management
</h1>


<p>
Verify, manage and export student payments
</p>


</div>





<div>


<a

href="index.php?page=staff&action=dashboard"

class="btn-secondary">

Back

</a>





<a

href="index.php?page=staff&action=export_payment_csv"

class="btn-success">

Export Payment CSV

</a>



</div>




</div>









<div class="box">


<h2>
Student Payment List
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
Event
</th>


<th>
Amount
</th>


<th>
Payment Method
</th>


<th>
Transaction ID
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





<?php if(mysqli_num_rows($payments)>0): ?>



<?php while($payment=mysqli_fetch_assoc($payments)): ?>



<tr>





<td>

<?= e($payment['full_name']); ?>

</td>






<td>

<?= e($payment['email']); ?>

</td>






<td>

<?= e($payment['event_name']); ?>

</td>






<td>

৳ <?= e($payment['amount']); ?>

</td>






<td>

<?= e($payment['payment_method']); ?>

</td>






<td>

<?= e($payment['transaction_id']); ?>

</td>







<td>





<?php if($payment['payment_status']=="paid"): ?>


<span class="status approved">

Paid

</span>




<?php elseif($payment['payment_status']=="rejected"): ?>


<span class="status rejected">

Rejected

</span>




<?php else: ?>


<span class="status">

Pending

</span>




<?php endif; ?>





</td>









<td>





<?php if($payment['payment_status']=="pending"): ?>




<a

class="small-btn btn-success"

href="index.php?page=staff&action=payment_status&id=<?= $payment['id']; ?>&status=paid">


Approve


</a>








<a

class="small-btn btn-danger"

href="index.php?page=staff&action=payment_status&id=<?= $payment['id']; ?>&status=rejected">


Reject


</a>





<?php else: ?>



<span>

Completed

</span>



<?php endif; ?>





</td>







</tr>





<?php endwhile; ?>






<?php else: ?>



<tr>


<td colspan="8">


No payment records found


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