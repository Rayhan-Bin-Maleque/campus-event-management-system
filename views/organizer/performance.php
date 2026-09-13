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
Event Performance Report
</h1>


<p>
Analyze overall event success
</p>


</div>



<a

href="index.php?page=organizer&action=dashboard"

class="btn-secondary">


Back


</a>



</div>









<!-- =====================================
     PERFORMANCE TABLE
===================================== -->


<div class="box">


<h2>
My Event Performance
</h2>




<div class="table-container">


<table>



<thead>


<tr>


<th>
Event Name
</th>


<th>
Date
</th>


<th>
Venue
</th>


<th>
Status
</th>


<th>
Participants
</th>


<th>
Performance
</th>


</tr>


</thead>







<tbody>



<?php while($event=mysqli_fetch_assoc($events)): ?>


<tr>



<td>

<?= e($event['event_name']); ?>

</td>





<td>

<?= e($event['event_date']); ?>

</td>





<td>

<?= e($event['venue']); ?>

</td>





<td>


<span class="status <?= $event['status']; ?>">


<?= e($event['status']); ?>


</span>


</td>






<td>


<?php


$count = count_event_participants(

    $conn,

    $event['id']

);



echo $count['total'] ?? 0;



?>


</td>








<td>


<?php


$participants =
$count['total'] ?? 0;



if($participants >= 100)

{

    echo "

    <span class='status approved'>

    Excellent

    </span>

    ";

}


elseif($participants >= 50)

{

    echo "

    <span class='status pending'>

    Good

    </span>

    ";

}


else

{

    echo "

    <span class='status rejected'>

    Low

    </span>

    ";

}



?>


</td>





</tr>



<?php endwhile; ?>



</tbody>



</table>


</div>


</div>









<!-- =====================================
     PERFORMANCE CRITERIA
===================================== -->


<div class="box">


<h2>
Performance Criteria
</h2>




<div class="information">



<div>


<strong>
Excellent
</strong>


<p>
More than 100 participants
</p>


</div>







<div>


<strong>
Good
</strong>


<p>
50 - 100 participants
</p>


</div>







<div>


<strong>
Needs Improvement
</strong>


<p>
Below 50 participants
</p>


</div>







<div>


<strong>
Evaluation Based On
</strong>


<p>
Participation and event success
</p>


</div>



</div>


</div>







</div>







<?php

require_once "views/partials/footer.php";

?>