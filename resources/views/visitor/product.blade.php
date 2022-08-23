<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Kopegtel Risti</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('layouts.navbar')

    <main>
        
        <div class="content-product2">
            <div class="content-product__title2">
                <h1 >Produk Kami</h1>
            </div>
            <div class="content-product__card-container2">
                <div class="content-product__card2">
                    <div class="content-product__card__image2">
                        <img src="src/images/produk/produkhal.png" alt="">
                    </div>
                    <div class="content-product__card__text2">
                    <div class="content-product__card__text2-title">
                        <h4>Nama Produk</h4>
                        <p>22 April 2022</p>
                    </div>
                    <div class="content-product__card__text2-body">
                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rerum non esse, aperiam facere eligendi!</span>
                    </div>
                    </div>
                </div>

                <div class="content-product__card2">
                    <div class="content-product__card__image2">
                        <img src="src/images/produk/produkhal.png" alt="">
                    </div>
                    <div class="content-product__card__text2">
                    <div class="content-product__card__text2-title">
                        <h4>Nama Produk</h4>
                        <p>22 April 2022</p>
                    </div>
                    <div class="content-product__card__text2-body">
                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rerum non esse, aperiam facere eligendi!</span>
                    </div>
                    </div>
                </div>

                <div class="content-product__card2">
                    <div class="content-product__card__image2">
                        <img src="src/images/produk/produkhal.png" alt="">
                    </div>
                    <div class="content-product__card__text2">
                    <div class="content-product__card__text2-title">
                        <h4>Nama Produk</h4>
                        <p>22 April 2022</p>
                    </div>
                    <div class="content-product__card__text2-body">
                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rerum non esse, aperiam facere eligendi!</span>
                    </div>
                    </div>
                </div>

                

                    
            </div>
        </div>
        
    </main>
    
    @include('layouts.footer')

        
</body>
</html>