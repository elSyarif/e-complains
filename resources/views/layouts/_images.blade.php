@if ($model->images)
<img src="{{asset('storage/'.$model->images)}}" width="70px" />
@endif

{{-- @if($model->avatar)
<img src="{{asset('storage'.$model->avatar)}}" width="70px" />
@else
N/A
@endif --}}
