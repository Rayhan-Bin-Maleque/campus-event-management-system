<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">



<div class="topbar">

<div>

<h1>
Digital Event Ticket
</h1>


<p>
Your official event participation ticket
</p>


</div>



<a

href="index.php?page=student&action=my_events"

class="btn-secondary">

Back

</a>


</div>








<div class="box">



<?php if(isset($ticket) && $ticket): ?>



<div class="ticket-card">



<div class="ticket-header">


<h2>
Campus Event Management
</h2>



<h3>
EVENT PASS
</h3>


</div>





<hr>





<div class="ticket-details">



<div>

<strong>
Student Name
</strong>

<p>
<?= e($ticket['full_name']); ?>
</p>

</div>





<div>

<strong>
Email
</strong>

<p>
<?= e($ticket['email']); ?>
</p>

</div>





<div>

<strong>
Event Name
</strong>

<p>
<?= e($ticket['event_name']); ?>
</p>

</div>





<div>

<strong>
Date
</strong>

<p>
<?= e($ticket['event_date']); ?>
</p>

</div>





<div>

<strong>
Venue
</strong>

<p>
<?= e($ticket['venue']); ?>
</p>

</div>



</div>







<hr>





<div class="ticket-code">


<strong>
Ticket Code
</strong>


<p>
<?= e($ticket['ticket_code']); ?>
</p>


</div>








<div class="qr-section">


<h3>
QR Code
</h3>


<div class="qr-box">


<?= e($ticket['qr_code']); ?>


</div>


</div>






<button

onclick="window.print()"

class="btn-primary">


Print Ticket


</button>





</div>






<?php else: ?>



<div class="empty-box">


<h2>
Ticket Not Found
</h2>


<p>
Your ticket has not been generated yet.
Please complete registration and payment first.
</p>



<a

href="index.php?page=student&action=my_events"

class="btn-primary">


Go To My Events


</a>



</div>




<?php endif; ?>







</div>



</div>









<style>


.ticket-card{

width:420px;

margin:auto;

background:white;

border-radius:15px;

padding:30px;

box-shadow:0 5px 20px rgba(0,0,0,.15);

text-align:center;

}



.ticket-header h2{

color:#16345c;

}



.ticket-header h3{

letter-spacing:3px;

}





.ticket-details{

text-align:left;

}



.ticket-details div{

margin:15px 0;

}



.ticket-details strong{

color:#16345c;

}



.ticket-details p{

margin:5px 0;

}




.ticket-code{

margin-top:20px;

}




.qr-section{

margin-top:20px;

}



.qr-box{

border:2px dashed #16345c;

padding:20px;

margin:15px auto;

font-weight:bold;

}





.empty-box{

text-align:center;

padding:40px;

}





@media print{


.topbar,

.btn-primary,

.btn-secondary,

footer{

display:none;

}



.ticket-card{

box-shadow:none;

}



}


</style>






<?php

require_once "views/partials/footer.php";

?>