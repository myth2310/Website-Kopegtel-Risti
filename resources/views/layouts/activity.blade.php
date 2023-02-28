<div class="content-activity">
    <h1 id="activity" class="title-activity">Kegiatan Kami</h1>
    <div class="content-activity__card-container" style="padding:3rem">
        @foreach ($activity as $activityData)
            <div class="content-activity__card" style="">
                <a href="/Artikel/{{$activityData->slug}}">
                {{-- <a href="{{route('activity.show', $activityData->$activity_id)}}"> --}}
                    <div class="content-activity__card__image"> 
                    <img src="{{asset('storage/image/kegiatan/'.$activityData->image)}}" alt="">
                </div></a>
                <div class="content-activity__card__text">
                <p>{{\Carbon\Carbon::parse($activityData->date)->format('l, d F Y')}}</p> 
                    <h4><a href="#"> {{ $activityData->name }} </a></h4>
                    <p><a href="/Artikel/{{$activityData->slug}}"> {{ $activityData->except }} </a></p>
                </div>
            </div>   
        @endforeach
    </div>      
    {{-- {{ $activity->Links() }} --}}
      
</div>