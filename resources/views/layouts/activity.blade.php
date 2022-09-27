{{-- <div class="content-activity">
    <h1 id="activity" class="content-activity__title">Kegiatan Kami</h1>
    <div class="content-activity__card-container" style="padding:3rem>
        @foreach ($activity as $activityData)
            <div class="content-activity__card" style="">
                <a href="{{ route ('activity.show', $activityData->activity_id) }}"><div class="content-activity__card__image">
                    <img src="{{asset('storage/'.$activityData->image)}}" alt="">
                </div></a>
                <div class="content-activity__card__text">
                    <h4><a href="#"> {{ $activityData->name }} </a></h4>
                    <p><a href="#"> {{ $activityData->description }} </a></p>
                </div>
            </div>   
        @endforeach
    </div>
    {{ $activity->Links() }} 
</div> --}}

<div class="content-activity">
    <h1 id="activity" class="content-activity__title">Kegiatan Kami</h1>
    <div class="content-activity__card-container" style="padding:3rem">
        @foreach ($activity as $activityData)
            <div class="content-activity__card" style="">
                <a href="{{route('activity.show', $activityData->$activity_id)}}"><div class="content-activity__card__image">
                    <img src="{{asset('storage/'.$activityData->image)}}" alt="">
                </div></a>
                <div class="content-activity__card__text">
                    <h4><a href="#"> {{ $activityData->name }} </a></h4>
                    <p><a href="#"> {{ $activityData->description }} </a></p>
                </div>
            </div>   
        @endforeach
    </div>      
    {{ $activity->Links() }}
      
</div>