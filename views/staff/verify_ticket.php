<?php

require_once "views/partials/header.php";

show_message();

?>


<div class="dashboard">



<!-- =====================================
     TOP BAR
===================================== -->


<div class="topbar">


<div>

<h1>
QR Ticket Verification
</h1>


<p>
Verify student ticket and mark attendance
</p>


</div>



<a

href="index.php?page=staff&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     VERIFICATION FORM
===================================== -->


<div class="box">


<h2>
Enter Ticket Code
</h2>





<form method="POST"

action="index.php?page=staff&action=verify_ticket">





<div class="field">


<label>
Ticket Code
</label>


<input

type="text"

name="ticket_code"

placeholder="Enter ticket code"

required>


</div>







<button

type="submit"

class="btn-primary">


Verify Ticket


</button>






</form>


</div>









<!-- =====================================
     RESULT DISPLAY
===================================== -->


<?php if(isset($ticket) && $ticket): ?>



<div class="box">


<h2>
Student Information
</h2>





<div class="information">



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
Event Date
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







<div>


<strong>
Ticket Code
</strong>


<p>

<?= e($ticket['ticket_code']); ?>

</p>


</div>



</div>







<br>





<a

class="btn-primary full-button"

href="index.php?page=staff&action=mark_attended&id=<?= $ticket['student_id']; ?>">


Mark Attendance


</a>



</div>



<?php endif; ?>







</div>







<?php

require_once "views/partials/footer.php";

?>
