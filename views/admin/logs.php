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
Activity Logs
</h1>


<p>
Monitor user activities based on role
</p>


</div>


</div>









<!-- =====================================
     SEARCH
     AJAX
===================================== -->


<div class="box">


<h2>
Search Activity
</h2>



<div class="search-box">


<input

type="text"

id="logSearch"

placeholder="Search by name, email or action..."

>


</div>


</div>









<!-- =====================================
     LOG TABLE
===================================== -->


<div class="box">


<h2>
User Activity History
</h2>





<div class="table-container">


<table>



<thead>


<tr>


<th>
User
</th>


<th>
Email
</th>


<th>
Role
</th>


<th>
Action
</th>


<th>
IP Address
</th>


<th>
Date
</th>


</tr>


</thead>







<tbody id="logTable">



<?php while($log=mysqli_fetch_assoc($logs)): ?>



<tr>



<td>

<?= e($log['full_name']); ?>

</td>





<td>

<?= e($log['email']); ?>

</td>





<td>


<span class="status approved">

<?= e($log['role']); ?>

</span>


</td>





<td>

<?= e($log['action']); ?>

</td>





<td>

<?= e($log['ip_address']); ?>

</td>





<td>

<?= e($log['created_at']); ?>

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

    "logSearch",

    "search_logs",

    "logTable"

);



</script>






<?php

require_once "views/partials/footer.php";

?>