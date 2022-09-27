<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Pegawai Telkom</title>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
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
                    <h2>Selamat Datang di KOPEGTEL RISTI</h2>
                    <h1>Digitalisasi Koperasi dalam menghadapi "Next Normal Era"</h1>
                    <p>KOPEGTEL RISTI merupakan koperasi pegawai Telkom Indonesia yang blablablablbala. Cari Tau Lebih Lanjut Digitalisasi Koperasi dalam menghadapi “Next Normal Era”</p>
                </div>
                
                <div class="button-contact">
                    <h4><a href="#contact" class="button-primary">HUBUNGI KAMI</a></h4>
                </div>
            </div>
{{-- <div class="content-header__image">
    <img src="/img/icon/home.png" alt="" srcset="">
</div> --}}

            @include('layouts.slider')

        </div>
        </div>

        <div class="frame-partner">
            <div class="frame-partner-title">
                <p>Patrner Kami</p>
            </div>

            <div class="frame-partner-image">
                <img src="/img/partner/telkom.png" alt="">
            </div>
        </div>

        <div class="frame2">
        <div class="content-about">
            <div class="content-about-text">
                <h1 id="about" class="content-about-text__title">Tentang KOPEGTEL RISTI</h1>
                <p class="content-about-text__content">
                    KOPEGTEL RISTI merupakan Koperasi Pegawai Telkom Divisi Riset Teknologi Informasi yang bertujuan untuk memajukan kesejahteraan anggota secara khusus, serta masyarakat secara umum. Selain itu, KOPEGTEL RisTI ikut serta dalam membangun tatanan perekonomian nasional dengan tujuan mewujudkan masyarakat yang maju, adil dan makmur berlandaskan Pancasila dan Undang Undang Dasar 1945. 
                </p>
            </div>
        </div>
        </div>
        
        {{-- @include('layouts.product') --}}

        {{-- @include('layouts.activity') --}}

        @include('layouts.contactForm')

        </div>
        
    </main>
    
    @include('layouts.footer')

        
</body>
</html>