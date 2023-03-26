<section class="bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Silder -->
        <div class="imageCaurosel">
        <!-- Slide -->
            <div>
                <a target="_blank" href="https://www.ebnshop.com">
                    <img class="w-full block lg:h-[32rem] object-contain" src="https://www.fixez.com/media/banners/s23-now-available-web_2_.webp" alt="">
                </a>
            </div>
            <div>
                <a target="_blank" href="https://www.ebnshop.com">
                    <img class="w-full block lg:h-[32rem] object-contain" src="https://www.fixez.com/media/banners/CLONE-DZ03-FACE-ID-TAG-ON-web.webp" alt="">
                </a>
            </div>
            <div>
                <a target="_blank" href="https://www.ebnshop.com">
                    <img class="w-full block lg:h-[32rem] object-contain" src="https://www.fixez.com/media/banners/do-you-know-vividfx-incell-comes-with-Damage-4.webp" alt="">
                </a>
            </div>
        </div>
    </div>
</section>







@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        (function(){
            $('.imageCaurosel').slick({
                ots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
            });
        })()
    </script>
@endpush

