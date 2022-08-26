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
<div class="content-header__image">
    <img src="/img/icon/home.png" alt="" srcset="">
</div>

            {{-- @include('layouts.slider') --}}

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
        
        <div class="content-product">
            <h1 id="product" class="content-product__title">Produk Kami</h1>
            <div class="content-product__card-container">
                @foreach ($product as $productData)
                    <div class="content-product__card">
                        <a href="#"><div class="content-product__card__image">
                            <img src="{{asset('storage/'.$productData->image)}}" alt="">
                        </div></a>
                        <div class="content-product__card__text">
                            <h4><a href="#"> {{ $productData->name }} </a></h4>
                            <p><a href="#"> {{ $productData->description }} </a></p>
                        </div>
                    </div>   
                @endforeach             
            </div>
        </div>

        <div class="content-activity">
            <h1 id="activity" class="content-activity__title">Kegiatan Kami</h1>
                <div class="content-activity__card-container">
                    <div class="content-activity__card">
                        <div class="content-activity__card__image">
                            <img src="/img/kegiatan/parcel.png" alt="">
                        </div>
                        <div class="content-activity__card__text">
                            <p>31 Mei 2022</p>
                            <a class="activity-card-text-title" href="activity-detail.html"><h4>Pembagian Parcel</h4></a>
                            <p>Pembagian Parcel dilaksanakan dalam rangka Bulan Suci Ramadhan. Ketua KOPEGTEL RisTI memberikan parcel ...</p>
                        </div>
                    </div>

                    <div class="content-activity__card">
                        <div class="content-activity__card__image">
                            <img src="/img/kegiatan/rapat.png" alt="">
                        </div>
                        <div class="content-activity__card__text">
                            <p>31 Mei 2022</p>
                            <a class="activity-card-text-title" href="#"><h4>Rapat Anggota Tahunan</h4></a>
                            <p>Rapat Anggota Tahunan merupakan agenda KOPEGTEL RisTI yang bertujuan untuk melakukan evaluasi tahunan serta ...</p>
                        </div>
                    </div>

                    <div class="content-activity__card">
                        <div class="content-activity__card__image">
                            <img src="/img/kegiatan/sosialisasi.png" alt="">
                        </div>
                        <div class="content-activity__card__text">
                            <p>31 Mei 2022</p>
                            <a class="activity-card-text-title" href="#"><h4>Sosialisasi Pajak dan Rekonsiliasi</h4></a>
                            <p>Sosialisasi pajak dan rekonsiliasi merupakan kegiatan memberikan informasi kepada anggota mengenai ...</p>
                        </div>
                    </div>
                    
            </div>
        </div>


        <div class="content-contact">
            <div class="content-contact__alltext">
                <h1 id="contact" class="content-contact__title">Hubungi Kami</h1>
                <p>Hubungi kami untuk informasi lebih lengkap
                melalui kolom formulir di bawah ini</p>
            </div>
            <div class="content-contact__box">
                <div>
                    <form class="content-contact-form">
                    <div class="elem-group">
                      <label for="name">NamA</label>
                      <input type="text" id="name" name="visitor_name" placeholder="Kopegtel Risti" pattern=[A-Z\sa-z]{3,20} required>
                    </div>
                    <div class="elem-group">
                      <label for="email">E-mail</label>
                      <input type="email" id="email" name="visitor_email" placeholder="kopegtelristi@gmail.com" required>
                    </div>
                    <div class="elem-group">
                      <label for="title">Subjek</label>
                      <input type="text" id="title" name="email_title" required placeholder="Subjek" pattern=[A-Za-z0-9\s]{8,60}>
                    </div>
                    <div class="elem-group">
                      <label for="message">Pesan</label>
                      <textarea id="message" name="visitor_message" placeholder="Tulis pesanmu disini.." required></textarea>
                    </div>
                    </form>
                </div>
                <div class="button-message">
                    <h4 class="button-primary"><a href="#">Kirim Pesan</a></h4>
                </div>
            </div>
        </div>

        </div>
        
    </main>
    
    @include('layouts.footer')

        
</body>
</html>