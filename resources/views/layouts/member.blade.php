@foreach ($member as $memberData)
<div class="card-profile">
  <img src="{{asset('storage/image/pengurus/'.$memberData->image)}}" alt="Pengurus" style="width:100%">
  <div class="desc-profile">
    <h2>{{ $memberData->name }}</h2>
    <p class="title-profile">{{ $memberData->position }}</p>
  </div>
</div>  
@endforeach    





