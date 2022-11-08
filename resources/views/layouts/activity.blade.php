
<div class="content-product">
    <h1 id="product" class="content-product__title">Kegiatan Kami</h1>
    <div class="content-product__card-container" style="padding:3rem">
        @foreach ($activity as $activityData)
            <div class="content-product__card" style="">
                <a href="#"><div class="content-product__card__image">
                    <img src="{{asset('storage/'.$activityData->image)}}" alt="">
                </div></a>
                <div class="content-product__card__text">
                    <h4><a href="#"> {{ $activityData->name }} </a></h4>
                    <p><a href="#"> {{ $activityData->description }} </a></p>
                </div>
            </div>   
        @endforeach
    </div>      
    {{ $activity->Links() }}
      
</div>