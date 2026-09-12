<style>

/* Login page checkbox fix */

.login-remember input[type="checkbox"]{

    width:18px !important;

    height:18px;

    margin:0;

    padding:0;

    cursor:pointer;

}



.login-remember label{

    display:flex;

    align-items:center;

    gap:10px;

    font-size:14px;

    cursor:pointer;

}



.password-box{

    display:flex;

    flex-direction:column;

}



.password-toggle{

    margin-top:8px;

    cursor:pointer;

    color:#1d3557;

    font-size:13px;

}


</style>


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


<h2 style="text-align:center;">
🎓 Campus Event Management System
</h2>


<p style="
text-align:center;
color:#777;
margin-bottom:25px;
">

Secure Login Portal

</p>


<h2>
Login
</h2>



<?php

show_message();

?>





<form method="POST"

action="index.php?page=auth&action=login">





<div class="field">


<label>
Email
</label>


<input

type="email"

name="email"

value="<?= $_COOKIE['remember_email'] ?? ''; ?>"

placeholder="Enter your email"

required>


</div>








<div class="field">

<label>
Password
</label>


<div class="password-box">

<input

type="password"

name="password"

id="password"

placeholder="Enter password"

required>


<span 
class="password-toggle"
onclick="togglePassword('password')">

👁 Show Password

</span>


</div>


</div>







<div class="field login-remember">


<label>

<input

type="checkbox"

name="remember"

value="yes"

<?php

if(isset($_COOKIE['remember_email']))
{

echo "checked";

}

?>

>

<span>
 Remember Me
</span>

</label>


</div>




<button

type="submit"

class="btn-primary full-button">


Login


</button>




</form>



<p style="margin-top:20px;text-align:center;">


Don't have an account?


<a href="index.php?page=auth&action=register"

style="color:#007bff;">


Register


</a>



</p>



</div>


</div>



<?php

require_once "views/partials/footer.php";

?>