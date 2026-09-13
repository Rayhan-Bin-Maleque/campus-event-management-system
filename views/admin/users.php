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
User Management
</h1>


<p>
Manage all system users
</p>


</div>


<div>


<a href="index.php?page=admin&action=add_user"

class="btn-primary">

+ Add User

</a>


</div>


</div>









<!-- =====================================
     SEARCH
     AJAX
===================================== -->


<div class="box">


<h2>
Search Users
</h2>



<div class="search-box">


<input

type="text"

id="userSearch"

placeholder="Search by name or email..."

>


</div>


</div>









<!-- =====================================
     USER TABLE
===================================== -->


<div class="box">


<h2>
All Users
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
Phone
</th>


<th>
Role
</th>


<th>
Status
</th>


<th>
Action
</th>


</tr>


</thead>







<tbody id="userTable">


<?php while($user=mysqli_fetch_assoc($users)): ?>



<tr>


<td>

<?= e($user['full_name']); ?>

</td>




<td>

<?= e($user['email']); ?>

</td>




<td>

<?= e($user['phone']); ?>

</td>




<td>

<span class="status approved">

<?= e($user['role']); ?>

</span>

</td>




<td>


<span class="status <?= $user['status']; ?>">


<?= e($user['status']); ?>


</span>


</td>






<td>



<a

href="index.php?page=admin&action=delete_user&id=<?= $user['id']; ?>"

onclick="return confirmDelete();"

class="small-btn btn-danger">


Delete


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

    "userSearch",

    "search_users",

    "userTable"

);


</script>






<?php

require_once "views/partials/footer.php";

?>