<div class="content-activity">
    <h1 id="activity" class="content-activity__title">Kegiatan Kami</h1>
    <div class="content-activity__card-container">
        @foreach ($activity as $activityData)
            <div class="content-activity__card" style="flex-wrap: wrap;">
                <a href="#"><div class="content-activity__card__image">
                    <img src="{{asset('storage/'.$activityData->image)}}" alt="">
                </div></a>
                <div class="content-activity__card__text">
                    <h4><a href="#"> {{ $activityData->name }} </a></h4>
                    <p><a href="#"> {{ $activityData->description }} </a></p>
                </div>
            </div>   
        @endforeach             
    </div>
</div>
