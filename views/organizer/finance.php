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
Event Budget & Expense Tracking
</h1>


<p>
Manage event financial performance
</p>


</div>



<a

href="index.php?page=organizer&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     FINANCIAL REPORT
===================================== -->


<div class="box">


<h2>
Financial Report
</h2>





<div class="table-container">


<table>


<thead>


<tr>


<th>
Event Name
</th>


<th>
Estimated Budget
</th>


<th>
Total Expense
</th>


<th>
Revenue
</th>


<th>
Profit
</th>


<th>
Action
</th>


</tr>


</thead>







<tbody>



<?php if(mysqli_num_rows($finance)>0): ?>



<?php while($row=mysqli_fetch_assoc($finance)): ?>



<tr>



<td>

<?= e($row['event_name']); ?>

</td>







<td>

৳ <?= number_format($row['estimated_budget'],2); ?>

</td>







<td>

৳ <?= number_format($row['total_expense'],2); ?>

</td>







<td>


<?php


$revenue = event_revenue(

    $conn,

    $row['event_id']

);



$totalRevenue =

$revenue['revenue'] ?? 0;



echo "৳ ".number_format($totalRevenue,2);



?>


</td>









<td>



<?php


$profit =

$row['estimated_budget']

-

$row['total_expense'];



echo "৳ ".number_format($profit,2);



?>


</td>









<td>



<a

href="index.php?page=organizer&action=finance&id=<?= $row['event_id']; ?>"

class="small-btn btn-primary">


Update Expense


</a>



</td>





</tr>



<?php endwhile; ?>



<?php else: ?>


<tr>


<td colspan="6">

No financial record found

</td>


</tr>



<?php endif; ?>



</tbody>



</table>


</div>


</div>









<!-- =====================================
     ADD / UPDATE EXPENSE
===================================== -->


<div class="box">


<h2>
Add / Update Expense
</h2>








<form method="POST"

action="index.php?page=organizer&action=finance">







<!-- EVENT SELECT -->


<div class="field">


<label>
Select Event
</label>





<select name="event_id" required>



<option value="">

Select Event

</option>







<?php while($event=mysqli_fetch_assoc($events)): ?>



<option

value="<?= $event['id']; ?>"


<?php

if(

isset($_GET['id'])

&&

$_GET['id']==$event['id']

)

{

echo "selected";

}

?>


>


<?= e($event['event_name']); ?>


</option>





<?php endwhile; ?>






</select>



</div>









<!-- ESTIMATED BUDGET -->


<div class="field">


<label>
Estimated Budget
</label>



<input


type="number"


name="estimated_budget"


step="0.01"


placeholder="Enter estimated budget"


required>



</div>









<!-- TOTAL EXPENSE -->


<div class="field">


<label>
Total Expense
</label>



<input


type="number"


name="expense"


step="0.01"


placeholder="Enter total expense amount"


required>



</div>









<!-- EXPENSE DETAILS -->


<div class="field">


<label>
Expense Details
</label>



<textarea


name="expense_details"


placeholder="Example: Food, Decoration, Equipment">


</textarea>



</div>









<button

class="btn-primary"

type="submit">


Save Expense


</button>







</form>



</div>








</div>









<?php

require_once "views/partials/footer.php";

?>