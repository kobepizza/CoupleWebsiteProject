@extends("layouts.master")
@section('content')

{{-- HERO --}}
<section class="relative pt-40 md:pt-48 text-center bg-gradient-to-b from-rose-50 to-white">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-4">
        Our Memories
    </h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Every picture holds a moment, every moment tells our story 💞
    </p>
</section>
{{-- UPLOAD FORM --}}
<section class="py-10 bg-white text-center">
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input type="file" name="image" required class="block mx-auto">

        <input type="text" name="title" placeholder="Memory Title 💞" class="border px-4 py-2 rounded w-64">

        <input type="text" name="description" placeholder="Short description..." class="border px-4 py-2 rounded w-64">

        <br>

        <button class="bg-rose-500 text-white px-6 py-2 rounded-full">
            Upload Memory 📸
        </button>
    </form>
</section>

{{-- CAROUSEL 1 --}}
<section class="py-10 bg-white overflow-hidden">
    <div class="relative w-full overflow-hidden">
        <div id="carousel-track" class="flex gap-4 w-max">
            
            @foreach($memories as $memory)
                <img src="{{ $memory->image_url }}"
                     class="h-32 md:h-56 rounded-xl"
                     data-title="{{ $memory->title }}"
                     data-desc="{{ $memory->description }}">
            @endforeach

        </div>
    </div>
</section>

{{-- MEMORY GRID --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6 columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">

        {{-- ITEM --}}
         @foreach($memories as $memory)
        <div class="break-inside-avoid group relative">
            <img src="{{ $memory->image_url }}"
                 class="rounded-2xl w-full cursor-pointer"
                 onclick="openLightbox(
                    '{{ $memory->image_url }}',
                    '{{ $memory->title }}',
                    '{{ $memory->description }}'
                 )">

            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-2xl flex items-center justify-center">
                <p class="text-white text-lg font-semibold">{{ $memory->title }}</p>
            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- RANDOM BUTTON --}}
<section class="py-20 text-center bg-rose-50">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Surprise Memory 💞</h2>
    <button onclick="randomMemory()" class="bg-rose-500 text-white px-8 py-3 rounded-full font-bold hover:bg-rose-600 transition">
        Show Random Memory 🎲
    </button>
</section>

{{-- CAROUSEL 2 --}}
{{-- CAROUSEL 2 --}}
<section class="py-10 bg-white overflow-hidden">
    <div class="relative w-full overflow-hidden">
        <div id="carousel-track1" class="flex gap-4 w-max">
            
            @foreach($memories as $memory)
                <img src="{{ $memory->image_url }}"
                     class="h-32 md:h-56 rounded-xl"
                     data-title="{{ $memory->title }}"
                     data-desc="{{ $memory->description }}">
            @endforeach

        </div>
    </div>
</section>

{{-- LIGHTBOX --}}
<div id="lightbox" class="fixed inset-0 bg-black/90 z-[100] hidden flex flex-col items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-4xl">&times;</button>

    <img id="lightbox-img" class="max-w-full max-h-[70vh] rounded-xl shadow-2xl mb-6">

    <div class="text-center text-white max-w-xl">
        <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
        <p id="lightbox-desc" class="text-gray-300"></p>
    </div>
</div>

{{-- SCRIPT --}}
<script>

// LIGHTBOX
function openLightbox(src, title = '', desc = '') {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-title').textContent = title;
    document.getElementById('lightbox-desc').textContent = desc;
    document.getElementById('lightbox').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// RANDOM MEMORY
function randomMemory() {
    const images = document.querySelectorAll('.break-inside-avoid img');
    const random = images[Math.floor(Math.random() * images.length)];
    random.click();
}

// CAROUSEL
function createInfiniteCarousel(trackId, speed) {
    const track = document.getElementById(trackId);
    let isPaused = false;

    track.innerHTML += track.innerHTML;

    const images = track.querySelectorAll('img');
    images.forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', () => {
            openLightbox(img.src, img.dataset.title || '', img.dataset.desc || '');
        });
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

createInfiniteCarousel("carousel-track", 0.2);
createInfiniteCarousel("carousel-track1", -0.2);

</script>

<style>
#carousel-track img, #carousel-track1 img {
    transition: transform 0.3s ease;
}

#carousel-track img:hover, #carousel-track1 img:hover {
    transform: scale(1.05);
}
</style>

@endsection