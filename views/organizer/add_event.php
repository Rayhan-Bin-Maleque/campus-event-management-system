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
Create New Event
</h1>


<p>
Add event details for admin approval
</p>


</div>


</div>









<!-- =====================================
     EVENT FORM
===================================== -->


<div class="box">


<form method="POST"

action="index.php?page=organizer&action=add_event"

onsubmit="return validateForm('eventForm')"

id="eventForm">








<div class="field">


<label>
Event Name
</label>


<input

type="text"

name="event_name"

placeholder="Enter event name"

required>


</div>









<div class="field">


<label>
Event Category
</label>


<select name="event_category" required>


<option value="">
Select Category
</option>


<option value="Workshop">
Workshop
</option>


<option value="Seminar">
Seminar
</option>


<option value="Sports">
Sports
</option>


<option value="Cultural">
Cultural
</option>


<option value="Competition">
Competition
</option>


</select>


</div>









<div class="field">


<label>
Description
</label>


<textarea

name="description"

placeholder="Describe your event"

required></textarea>


</div>









<div class="information">



<div class="field">


<label>
Event Date
</label>


<input

type="date"

name="event_date"

required>


</div>






<div class="field">


<label>
Venue
</label>


<input

type="text"

name="venue"

placeholder="Event venue"

required>


</div>



</div>









<div class="information">



<div class="field">


<label>
Capacity
</label>


<input

type="number"

name="capacity"

placeholder="Maximum participants"

required>


</div>






<div class="field">


<label>
Registration Fee
</label>


<input

type="number"

name="registration_fee"

placeholder="0"

step="0.01"

required>


</div>



</div>









<button

type="submit"

class="btn-primary">


Create Event


</button>






<a

href="index.php?page=organizer&action=dashboard"

class="btn-secondary">


Cancel


</a>







</form>


</div>







</div>







<?php

require_once "views/partials/footer.php";

?>