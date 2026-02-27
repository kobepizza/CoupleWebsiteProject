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

        <div class="w-full md:w-1/2 mx-auto text-center flex flex-col items-center mb-25">
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
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-[100] hidden flex items-center justify-center p-4">
        <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-4xl">&times;</button>
        <img id="lightbox-img" src="" class="max-w-full max-h-full rounded-lg shadow-2xl">
    </div>

 <script>
// Function to open Lightbox
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    lightboxImg.src = src;
    lightbox.classList.remove('hidden');
    // Stop body scroll when open
    document.body.style.overflow = 'hidden';
}

// Function to close Lightbox
function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('hidden');
    // Restore scroll
    document.body.style.overflow = 'auto';
}

// Update your existing createInfiniteCarousel function
function createInfiniteCarousel(trackId, speed) {
    const track = document.getElementById(trackId);
    let isPaused = false;

    track.innerHTML += track.innerHTML;

    // ADD THIS: Make images clickable
    const images = track.querySelectorAll('img');
    images.forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', () => openLightbox(img.src));
    });

    track.addEventListener('mouseenter', () => isPaused = true);
    track.addEventListener('mouseleave', () => isPaused = false);

    let position = 0;
    const singleWidth = track.scrollWidth / 2;

    function animate() {
        if (!isPaused) {
            position -= speed;
            if (speed > 0 && position <= -singleWidth) position = 0;
            if (speed < 0 && position >= 0) position = -singleWidth;
            track.style.transform = `translateX(${position}px)`;
        }
        requestAnimationFrame(animate);
    }
    animate();
}

// Re-initialize (keep your existing calls)
createInfiniteCarousel("carousel-track", 0.2);
createInfiniteCarousel("carousel-track1", -0.2);
</script>


<style>
    #carousel-track img, #carousel-track1 img {
    transition: transform 0.3s ease;
    cursor: pointer;
}

#carousel-track img:hover, #carousel-track1 img:hover {
    transform: scale(1.05); /* Slight zoom when hovered */
    z-index: 50;
}
</style>

@endsection