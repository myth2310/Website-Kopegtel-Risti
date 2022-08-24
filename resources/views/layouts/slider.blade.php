<!-- Slideshow container -->
<div class="content-header__image">
    @if ($total_banner > 0)
        @foreach ($banner as $res)                  
                <div class="mySlides fade">               
                    <img 
                        style="width: 456px"
                        src="{{asset('storage/'.$res->image)}}"
                    >      
                </div>            
        @endforeach          
    @else
        <img 
            src="/img/icon/home.png" 
            style="width:456px"
        >  
    @endif
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 4000); // Change image every 2 seconds
    }
</script>