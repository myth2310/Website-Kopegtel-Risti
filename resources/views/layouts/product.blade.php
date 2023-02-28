<div class="content-product">
    <h1 id="product" class="title-product">Produk Kami</h1>
    <div class="content-product__card-container" style="padding:3rem">
        @foreach ($product as $productData)
            <div class="content-product__card" style="">
                <a href="#"><div class="content-product__card__image">
                    <img src="{{asset('storage/image/product/'.$productData->image)}}" alt="">
                </div></a>
                <div class="content-product__card__text">
                    <h4><a href="#"> {{ $productData->name }} </a></h4>
                    <p><a href="#"> {{ $productData->description }} </a></p>
                </div>
            </div>   
        @endforeach
    </div>      

    {{-- Pagination --}}
    
    {{-- {{ $product->Links() }} --}}
      
</div>