<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">


<div class="topbar">

<div>

<h1>
Add New User
</h1>

<p>
Create a new system account
</p>

</div>


<a href="index.php?page=admin&action=users"
class="btn-secondary">

Back

</a>


</div>





<div class="box">


<?php

show_message();

?>



<form method="POST"

action="index.php?page=admin&action=add_user">



<div class="field">

<label>
Full Name
</label>


<input

type="text"

name="full_name"

required>

</div>







<div class="field">

<label>
Email
</label>


<input

type="email"

name="email"

required>

</div>







<div class="field">

<label>
Phone
</label>


<input

type="text"

name="phone">

</div>







<div class="field">

<label>
Password
</label>


<input

type="password"

name="password"

required>

</div>







<div class="field">

<label>
Role
</label>



<select name="role" required>


<option value="">
Select Role
</option>


<option value="student">
Student
</option>


<option value="organizer">
Organizer
</option>


<option value="staff">
Staff
</option>


<option value="admin">
Admin
</option>


</select>


</div>







<button

type="submit"

class="btn-primary">

Create User

</button>




</form>



</div>


</div>




<?php

require_once "views/partials/footer.php";

?>