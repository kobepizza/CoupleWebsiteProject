@extends("layouts.master")
@section('content')

        <!--carousel 1-->
     <div class="relative h-40 md:h-80 overflow-hidden w-full">

        <div id="carousel-track" class="flex items-center gap-6 whitespace-nowrap">

            <!-- Just images (NO min-w-full wrappers) -->
            <img src="Images/image.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image2.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image3.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image4.jpg" class="h-32 md:h-56 rounded-lg">

            <!-- Repeat once manually (important for seamless start) -->
            <img src="Images/image.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image2.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image3.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image4.jpg" class="h-32 md:h-56 rounded-lg">

        </div>
    </div>

        <div class="w-full md:w-1/2 mx-auto text-center flex flex-col items-center">
            <h1 class="text-4xl font-bold text-black mb-6">Bottom Section Title</h1>
            <p class="text-xl text-black-100 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nullam sit amet porttitor urna, non faucibus risus. Integer dolor lectus,
                convallis ut scelerisque eget, feugiat a neque. Sed mi ex, maximus eu ornare et,
                efficitur ac massa. Aenean ac lacus ut libero rutrum rutrum sit amet sit amet tellus.
            </p>
            <div class="space-x-4">
                <button class="bg-white text-black-900 px-6 py-2 rounded-lg">
                    Learn More
                </button>
                <button class="bg-transparent border-2 border-white text-black px-6 py-2 rounded-lg">
                    Contact
                </button>
            </div>
        </div>
    <div class="relative h-40 md:h-80 overflow-hidden w-full">

        <div id="carousel-track1" class="flex items-center gap-6 whitespace-nowrap">

            <!-- Just images (NO min-w-full wrappers) -->
            <img src="Images/image.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image2.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image3.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image4.jpg" class="h-32 md:h-56 rounded-lg">

            <!-- Repeat once manually (important for seamless start) -->
            <img src="Images/image.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image2.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image3.jpg" class="h-32 md:h-56 rounded-lg">
            <img src="Images/image4.jpg" class="h-32 md:h-56 rounded-lg">

        </div>
    </div>

 <script>
function createInfiniteCarousel(trackId, speed) {
    const track = document.getElementById(trackId);

    // Clone once (cleaner than triple)
    track.innerHTML += track.innerHTML;

    let position = 0;
    const singleWidth = track.scrollWidth / 2;

    function animate() {
        position -= speed;

        // Moving LEFT
        if (speed > 0 && position <= -singleWidth) {
            position = 0;
        }

        // Moving RIGHT
        if (speed < 0 && position >= 0) {
            position = -singleWidth;
        }

        track.style.transform = `translateX(${position}px)`;
        requestAnimationFrame(animate);
    }

    animate();
}

// Top row → left
createInfiniteCarousel("carousel-track", 0.1);

// Bottom row → right
createInfiniteCarousel("carousel-track1", -0.1);
</script>




@endsection