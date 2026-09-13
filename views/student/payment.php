<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">


<div class="topbar">

<div>

<h1>
Event Payment
</h1>

<p>
Complete your event registration payment
</p>

</div>


<a href="index.php?page=student&action=dashboard"
class="btn-secondary">

Back

</a>


</div>





<div class="box">


<h2>
Payment Details
</h2>





<form method="POST"
action="index.php?page=student&action=payment"
onsubmit="return confirmPayment();">





<div class="field">


<label>
Select Event
</label>


<select name="event_id"
id="eventSelect"
required
onchange="loadFee()">


<option value="">

Select Event

</option>



<?php while($event=mysqli_fetch_assoc($events)): ?>


<option 

value="<?= $event['id']; ?>"

data-fee="<?= $event['registration_fee']; ?>"

>


<?= e($event['event_name']); ?>


<?php if(isset($event['event_category'])): ?>

- <?= e($event['event_category']); ?>

<?php endif; ?>


</option>


<?php endwhile; ?>


</select>


</div>





<div class="field">


<label>
Payment Amount
</label>


<input

type="number"

id="amount"

name="amount"

readonly

required

>


</div>






<div class="field">


<label>
Payment Method
</label>



<label>

<input

type="radio"

name="payment_method"

value="online"

onclick="checkMethod()"

required>

Online Payment

</label>



<br>


<label>

<input

type="radio"

name="payment_method"

value="offline"

onclick="checkMethod()"

>

Offline Payment

</label>



</div>







<div class="field">


<label>

Transaction ID

</label>


<input

type="text"

name="transaction_id"

id="transaction"

placeholder="Enter transaction ID">


</div>






<button

class="btn-primary"

type="submit">


Submit Payment


</button>






</form>


</div>





<div class="box">


<h2>
Payment Instructions
</h2>


<p>

<b>Online Payment:</b><br>

Complete payment and enter transaction ID.

</p>


<p>

<b>Offline Payment:</b><br>

Pay at organizer office.

</p>


</div>



</div>







<script>


function loadFee()

{

let select=document.getElementById("eventSelect");

let fee=
select.options[select.selectedIndex].dataset.fee;


document.getElementById("amount").value=fee;


}





function checkMethod()

{

let method=
document.querySelector(
'input[name="payment_method"]:checked'
).value;


let transaction=
document.getElementById("transaction");


if(method=="online")

{

transaction.required=true;

transaction.placeholder=
"Enter online transaction ID";

}

else

{

transaction.required=false;

transaction.value="";

transaction.placeholder=
"Not required for offline payment";

}


}







function confirmPayment()

{


let method =
document.querySelector(
'input[name="payment_method"]:checked'
).value;


let amount =
document.getElementById("amount").value;



if(method=="online")

{

return confirm(

"Confirm Online Payment\n\nAmount: ৳ "
+amount+
"\n\nTransaction ID required."

);

}


else

{


return confirm(

"Confirm Offline Payment\n\nAmount: ৳ "
+amount+
"\n\nPay at organizer office."

);


}



}


</script>




<?php

require_once "views/partials/footer.php";

?>