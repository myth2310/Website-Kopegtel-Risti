@foreach ($member as $memberData)
<div class="content-about-center__card">
    <div class="content-about-center__card__image">
        <img src="{{asset('storage/'.$memberData->image)}}" alt="">
    </div>
    <div class="content-about-center__card__text">
        <h4><a href="#"> {{ $memberData->name }} </a></h4>
        <p><a href="#"> {{ $memberData->position }} </a></p>
    </div>
</div>
@endforeach    
