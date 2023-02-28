<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopegtel Risti</title>
    <link rel="icon" href="/img/logo/logo_head.png">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6385cb861b929e0012813f5f&product=sticky-share-buttons&source=platform" async="async"></script>
</head>

<body>
    @include('layouts.navbar')

    <main>

      <div class="artikel">
        
        <div class="artikel-image">
          <img src="{{asset('storage/image/kegiatan/'.$artikel_detail->image)}}" alt="Artikel">
          <p><i class="fa-solid fa-calendar-days" style="margin-right:1%;"></i> {{\Carbon\Carbon::parse($artikel_detail->date)->format('l, d F Y')}}</p>  
          <h2>{{$artikel_detail->name}}</h2>
        </div>
        <div class="description">
         <article>
          {!! $artikel_detail->description !!}
         </article>
        </div>
       
         
      </div>
          


            
    </main>
    
    @include('layouts.footer')

        
</body>
</html>