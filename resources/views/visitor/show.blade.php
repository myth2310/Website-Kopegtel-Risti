<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Detail Kopegtel Risti</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.navbar') 

    <main class="content-activity-detail">
           @foreach ($activity as @activityData)
                <div class="content-activity-detail__card__image" >
                        <img src="{{asset('storage/'.$activityData->image)}}" alt="">
                </div></a>
                {{-- <div class="content-activity-detail__card__text">
                        <h4>{{ $activityData->name }}</h4>
                </div> --}}
                <div class="content-activity-detail-paragraph">
                    <h1>{{ $activityData->name }}</h1>
                    <p>{{ $activityData->description }}</p>
                </div>   
                
            @endforeach
        
        {{-- <div class="content-activity-detail__card__image">
            <img src="src/images/kegiatan/parcel.png" alt="">
        </div>
        <div class="content-activity-detail__card__text">
            <div class="content-activity-detail-date">
                <p>31 Mei 2022</p>
            </div>
            <div class="content-activity-detail-paragraph">
                <h1>Pembagian Parcel</h1>
                <p>Pembagian Parcel dilaksanakan dalam rangka Bulan Suci Ramadhan. Ketua KOPEGTEL RisTI memberikan parcel kepada beberapa Karyawan Telkom di Bandung. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa.
                    <br>
                    <br>
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div> --}}
    </main>
    
    @include('layouts.footer')

        
</body>
</html>