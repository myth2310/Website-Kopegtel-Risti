<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kopegtel Risti</title>
    <link rel="icon" href="/img/logo/logo_head.png">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.navbar')

    <main>
        <div class="frame1">
            <div class="content-header">
                <div class="content-header__text">
                    <div class="text_welcome">
                        <h1>Tentang KOPEGTEL RISTI</h1>
                        <p>KOPEGTEL RISTI merupakan Koperasi Pegawai Telkom Divisi Riset Teknologi Informasi yang bertujuan untuk memajukan kesejahteraan anggota secara khusus, serta masyarakat secara umum. Selain itu, KOPEGTEL RisTI ikut serta dalam membangun tatanan perekonomian nasional dengan tujuan mewujudkan masyarakat yang maju, adil dan makmur berlandaskan Pancasila dan Undang Undang Dasar 1945 </p>
                    </div>
                </div>
                            
                <div class="content-header__image">
                    <img src="/img/icon/about.png" alt="" srcset="">
                </div>
                
            </div>
            </div>

            <div class="content-about-center">
                <div class="content-about-center-text">
                    <h1>Susunan Pengurus KOPEGTEL RISTI <br>2022-2024</h1>
                </div>

                <div class="content-about-center-body">
                    <div class="content-about-center__card-container">

                        @include('layouts.member')

                    </div>
                </div>
            </div>

            
    </main>
    
    @include('layouts.footer')

        
</body>
</html>