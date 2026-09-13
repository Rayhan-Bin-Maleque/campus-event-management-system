<?php

require_once "views/partials/header.php";

?>


<div class="dashboard">





<div class="topbar">


<div>

<h1>
Edit Event
</h1>


<p>
Update your event information
</p>


</div>



<a

href="index.php?page=organizer&action=dashboard"

class="btn-secondary">


Back


</a>


</div>









<div class="box">


<h2>
Event Details
</h2>






<form method="POST">





<div class="field">


<label>
Event Name
</label>


<input

type="text"

name="event_name"

value="<?= e($event['event_name']); ?>"

required>


</div>







<div class="field">


<label>
Event Category
</label>


<input

type="text"

name="event_category"

value="<?= e($event['event_category']); ?>"

required>


</div>







<div class="field">


<label>
Description
</label>


<textarea

name="description"

rows="5"

required><?= e($event['description']); ?></textarea>


</div>







<div class="field">


<label>
Event Date
</label>


<input

type="date"

name="event_date"

value="<?= e($event['event_date']); ?>"

required>


</div>







<div class="field">


<label>
Venue
</label>


<input

type="text"

name="venue"

value="<?= e($event['venue']); ?>"

required>


</div>







<div class="field">


<label>
Seat Capacity
</label>


<input

type="number"

name="capacity"

value="<?= e($event['capacity']); ?>"

required>


</div>







<div class="field">


<label>
Registration Price
</label>


<input

type="number"

name="registration_fee"

value="<?= e($event['registration_fee']); ?>"

required>


</div>







<button

type="submit"

class="btn-primary">


Update Event


</button>





</form>





</div>






</div>








<?php

require_once "views/partials/footer.php";

?>