<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Pegawai Telkom</title>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

</head>
        
    <!-- <nav class="navbar">-->
    <!--<div class="logo-container">-->
    <!--    <a href="index.html"><img src="/img/icon/logo.png" alt=""></a>-->
    <!--</div>-->
    <!--<ul class="nav-items">-->
    <!--    <li class="nav-item"><a class="active" href="/">Beranda</a></li>-->
    <!--    <li class="nav-item"><a href="/Aboutus">Tentang kami</a></li>-->
    <!--    <li class="nav-item"><a href="/Produk">Produk</a></li>-->
    <!--    <li class="nav-item"><a href="/Aktivitas">Kegiatan</a></li>-->
    <!--    <li class="nav-item"><a href="/contact">Hubungi kami</a></li>-->
        
    <!--</ul>-->
    <!--</nav>-->

<body>

    <div class="wrapper">
        <nav class="navbar">
          <div class="container-flex">
            <div class="brand">
                <a href="/"><img src="/img/icon/logo.png" alt=""></a>
             </div>
             <div class="burger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
             </div>
             <div class="bg-sidebar"></div>
             <ul class="sidebar">
                <li><a href="/">Beranda</a></li>
                <li><a href="/Aboutus">Tentang Kami</a></li>
                <li><a href="/Produk">Produk</a></li>
                <li><a href="/Aktivitas">Kegiatan</a></li>
                <li><a href="/contact">Hubungi Kami</a></li>
             </ul>
          </div>
        </nav>
      </div>
     
    
</body>

<script>

    const burger = document.querySelector('.burger')
    const sidebar = document.querySelector('.sidebar')
    const bgSidebar = document.querySelector('.bg-sidebar')
    
    burger.addEventListener('click', function() {
      this.classList.toggle('change')
      sidebar.classList.toggle('change')
      bgSidebar.classList.toggle('change')
    })
    
    bgSidebar.addEventListener('click', function() {
      this.classList.remove('change')
      sidebar.classList.remove('change')
      burger.classList.remove('change')
    })
    
    </script>


</html>


