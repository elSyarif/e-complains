@if ($model->mark == 0)
<span class="badge badge-info mt-15 mr-10">New</span>
@elseif ($model->mark == 1)
<span class="badge badge-primary mt-15 mr-10">Procces</span>
@elseif($model->mark == 2)
<span class="badge badge-danger mt-15 mr-10">Not Good</span>
@elseif($model->mark == 3)
<span class="badge badge-indigo mt-15 mr-10">approval</span>
@elseif($model->mark == 4)
<span class="badge badge-indigo mt-15 mr-10">Closed</span>
@endif
