@foreach ($member as $memberData)
    <div class="content-about-center__card">
        <div class="content-about-center__card__image">
            <img src="{{asset('storage/'.$memberData->image)}}" alt="">
        </div>
        <div class="content-about-center__card__text">
            <h4> {{ $memberData->name }} </h4>
            <p> {{ $memberData->position }} </p>
        </div>
    </div> 
@endforeach    
