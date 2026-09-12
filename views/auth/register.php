<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">


<div class="box"

style="
max-width:500px;
padding:40px;
margin:300px auto;
">



<h2>
Create Account
</h2>




<?php

show_message();

?>






<form method="POST"

action="index.php?page=auth&action=register"

onsubmit="return validateForm('registerForm')"

id="registerForm">







<div class="field">


<label>
Full Name
</label>


<input

type="text"

name="full_name"

placeholder="Enter full name"

required>


</div>










<div class="field">


<label>
Email
</label>


<input

type="email"

name="email"

placeholder="Enter email address"

required>


</div>










<div class="field">


<label>
Phone
</label>


<input

type="text"

name="phone"

placeholder="Enter phone number">


</div>










<div class="field">


<label>
Password
</label>


<input

type="password"

name="password"

id="register_password"

placeholder="Create password"

required>


</div>










<div class="field">


<label>
Account Type
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



</select>



</div>










<button

type="submit"

class="btn-primary full-button">


Register


</button>








</form>









<p style="margin-top:20px;text-align:center;">


Already have an account?


<a href="index.php?page=auth&action=login"

style="color:#007bff;">


Login


</a>



</p>








</div>


</div>





<?php

require_once "views/partials/footer.php";

?>