@extends("layouts.master")
@section('content')

<div class="min-h-screen bg-gradient-to-tr from-[#E0F2FE] via-[#EDE9FE] to-[#FCE7F3] selection:bg-purple-300">

    {{-- HERO --}}
    <section class="relative pt-40 md:pt-48 pb-10 text-center bg-gradient-to-b from-rose-100/50 to-transparent">
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-4 italic">
            Our Memories
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto px-6">
            Every picture holds a moment, every moment tells our story 💞
        </p>
    </section>

    {{-- FLOATING UPLOAD BUTTON (FAB) --}}
    <div class="fixed bottom-8 right-8 z-[60]">
        <button onclick="toggleUploadForm()" class="bg-rose-500 hover:bg-rose-600 text-white w-16 h-16 rounded-full shadow-2xl flex items-center justify-center transition-transform hover:scale-110 active:scale-95 group">
            <span class="text-4xl transition-transform group-hover:rotate-90">+</span>
        </button>
    </div>

    {{-- UPLOAD MODAL --}}
    <div id="upload-modal" class="fixed inset-0 z-[70] hidden flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
        <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-2xl relative">
            <button onclick="toggleUploadForm()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">New Memory 📸</h2>
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="border-2 border-dashed border-rose-200 rounded-xl p-4 text-center hover:border-rose-400 transition">
                    <input type="file" name="image" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                </div>
                <input type="text" name="title" placeholder="Memory Title 💞" class="w-full border border-gray-200 focus:border-rose-400 focus:ring-1 focus:ring-rose-400 rounded-xl px-4 py-3 outline-none">
                <textarea name="description" placeholder="Short description..." class="w-full border border-gray-200 focus:border-rose-400 focus:ring-1 focus:ring-rose-400 rounded-xl px-4 py-3 outline-none h-24"></textarea>
                <button class="w-full bg-rose-500 text-white py-3 rounded-xl font-bold shadow-lg shadow-rose-200 hover:bg-rose-600 transition">
                    Upload Memory 📸
                </button>
            </form>
        </div>
    </div>

    {{-- CAROUSEL 1 (Draggable Right) --}}
    <section class="py-10 overflow-hidden cursor-grab active:cursor-grabbing">
        <div class="relative flex overflow-hidden">
            <div id="track-right" class="flex gap-4 w-max transition-transform duration-75">
                @foreach($memories->concat($memories)->concat($memories) as $memory)
                    <img src="{{ $memory->image_url }}"
                         class="h-32 md:h-56 rounded-xl shadow-md pointer-events-none select-none"
                         data-src="{{ $memory->image_url }}"
                         data-title="{{ $memory->title }}"
                         data-desc="{{ $memory->description }}">
                @endforeach
            </div>
        </div>
    </section>

    {{-- MEMORY GRID (Polaroid Style) --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6 columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            @foreach($memories as $memory)
            <div class="break-inside-avoid group relative bg-white p-3 pb-12 shadow-lg rotate-{{ rand(-2, 2) }} hover:rotate-0 transition-transform duration-300 mb-6 border border-gray-100">
                <img src="{{ $memory->image_url }}" 
                     class="w-full h-auto cursor-pointer object-cover grayscale-[10%] group-hover:grayscale-0 transition-all" 
                     onclick="openLightbox('{{ $memory->image_url }}', '{{ $memory->title }}', '{{ $memory->description }}')">
                
                <div class="absolute bottom-3 left-0 right-0 text-center">
                    <p class="text-gray-700 text-2xl" style="font-family: 'Indie Flower', cursive;">
                        {{ $memory->title }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- SURPRISE BUTTON --}}
    <section class="py-20 text-center">
        <div class="bg-rose-50/50 backdrop-blur-md max-w-sm mx-auto py-10 rounded-3xl shadow-inner border border-rose-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Surprise Memory 💞</h2>
            <button onclick="randomMemory()" class="bg-rose-500 text-white px-8 py-3 rounded-full font-bold hover:bg-rose-600 transition shadow-lg">
                Show Random Memory 🎲
            </button>
        </div>
    </section>

    {{-- CAROUSEL 2 (Draggable Left) --}}
    <section class="py-10 overflow-hidden cursor-grab active:cursor-grabbing">
        <div class="relative flex overflow-hidden">
            <div id="track-left" class="flex gap-4 w-max transition-transform duration-75">
                @foreach($memories->concat($memories)->concat($memories) as $memory)
                    <img src="{{ $memory->image_url }}"
                         class="h-32 md:h-56 rounded-xl shadow-md pointer-events-none select-none"
                         data-src="{{ $memory->image_url }}"
                         data-title="{{ $memory->title }}"
                         data-desc="{{ $memory->description }}">
                @endforeach
            </div>
        </div>
    </section>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="fixed inset-0 bg-black/95 z-[100] hidden flex flex-col items-center justify-center p-4 backdrop-blur-md">
        <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-4xl">&times;</button>
        <img id="lightbox-img" class="max-w-full max-h-[70vh] rounded-xl shadow-2xl mb-6 border-4 border-white/10">
        <div class="text-center text-white max-w-xl">
            <h3 id="lightbox-title" class="text-3xl font-bold mb-2"></h3>
            <p id="lightbox-desc" class="text-rose-100 text-lg"></p>
        </div>
    </div>
</div>

<script>
// MODAL TOGGLE
function toggleUploadForm() {
    const modal = document.getElementById('upload-modal');
    modal.classList.toggle('hidden');
    document.body.style.overflow = modal.classList.contains('hidden') ? 'auto' : 'hidden';
}

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
    if(images.length > 0) {
        const random = images[Math.floor(Math.random() * images.length)];
        openLightbox(random.src, random.parentElement.querySelector('p').innerText, '');
    }
}

// DRAGGABLE CAROUSEL LOGIC
function initDraggableCarousel(trackId, autoSpeed) {
    const track = document.getElementById(trackId);
    if (!track) return;

    let isDown = false;
    let startX;
    let scrollLeft;
    let x = 0; 

    // Click handler for children
    track.parentElement.addEventListener('click', (e) => {
        if (Math.abs(startX - (e.pageX || e.changedTouches?.[0]?.pageX)) < 5) {
            const target = e.target.closest('img');
            if (target) {
                openLightbox(target.dataset.src, target.dataset.title, target.dataset.desc);
            }
        }
    });

    const startAction = (e) => {
        isDown = true;
        startX = (e.pageX || e.touches[0].pageX) - track.offsetLeft;
        scrollLeft = x;
    };

    const stopAction = () => isDown = false;

    const moveAction = (e) => {
        if (!isDown) return;
        const currentX = (e.pageX || e.touches[0].pageX) - track.offsetLeft;
        const walk = (currentX - startX) * 1.5;
        x = scrollLeft + walk;
    };

    // Listeners
    track.parentElement.addEventListener('mousedown', startAction);
    window.addEventListener('mouseup', stopAction);
    track.parentElement.addEventListener('mousemove', moveAction);
    
    track.parentElement.addEventListener('touchstart', startAction);
    track.parentElement.addEventListener('touchend', stopAction);
    track.parentElement.addEventListener('touchmove', moveAction);

    function animate() {
        if (!isDown) {
            x += autoSpeed;
        }

        const singleSetWidth = track.scrollWidth / 3;
        if (x > 0) x = -singleSetWidth;
        if (x < -singleSetWidth) x = 0;

        track.style.transform = `translateX(${x}px)`;
        requestAnimationFrame(animate);
    }
    animate();
}

// Initialize
initDraggableCarousel('track-right', 0.5);
initDraggableCarousel('track-left', -0.5);
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Caveat:wght@400;700&display=swap');

#track-right, #track-left {
    will-change: transform;
    user-select: none;
}

.cursor-grab { cursor: grab; }
.cursor-grabbing { cursor: grabbing; }
</style>
@endsection