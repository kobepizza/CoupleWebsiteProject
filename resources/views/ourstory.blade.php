@extends('layouts.master')
@section('content')

    {{-- HERO SECTION --}}
    <div class="w-full h-screen overflow-hidden relative flex items-center justify-center text-center">
        <div class="absolute inset-0">
            <img src="{{ asset('Images/storyHomepage.png') }}" alt="Top Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="text-container relative z-10 px-4 max-w-2xl">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-4 drop-shadow-md">
                Our Story
            </h1>

            <p class="text-xl md:text-2xl font-medium text-white mb-10 drop-shadow-sm">
                Every love story is beautiful, but ours is my favorite.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="#read"
                    class="w-full sm:w-auto bg-white text-rose-900 px-8 py-3 rounded-full font-bold shadow-lg hover:bg-gray-100 hover:scale-105 transition-all duration-300">
                    Read our Story
                </a>

                <a href="{{ url('/services') }}"
                    class="w-full sm:w-auto bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-rose-900 transition-all duration-300">
                    See the Gallery
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <a href="#read" class="text-white opacity-80 hover:opacity-100 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 13l5 5 5-5M7 6l5 5 5-5" />
                </svg>
            </a>
        </div>
    </div>

    {{-- LIVE COUNTER SECTION --}}
    <section id="read" class="py-20 bg-gradient-to-b from-rose-50 to-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-rose-500 mb-3">Our story so far</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Counting Every Moment</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">
                A small reminder that every day with you becomes part of something beautiful.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-3xl shadow-md p-8">
                    <h3 class="text-lg text-gray-500 mb-2">Days</h3>
                    <p id="daysCounter" class="text-4xl font-extrabold text-rose-600">0</p>
                </div>

                <div class="bg-white rounded-3xl shadow-md p-8">
                    <h3 class="text-lg text-gray-500 mb-2">Hours</h3>
                    <p id="hoursCounter" class="text-4xl font-extrabold text-rose-600">0</p>
                </div>

                <div class="bg-white rounded-3xl shadow-md p-8">
                    <h3 class="text-lg text-gray-500 mb-2">Minutes</h3>
                    <p id="minutesCounter" class="text-4xl font-extrabold text-rose-600">0</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SCROLL STORY SECTION --}}
   @if(session('success'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('success') }}
    </div>
@endif
<section class="py-16 bg-rose-50">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow-lg text-center">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Add a New Memory 💞
        </h2>

        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Title -->
            <input 
                type="text" 
                name="title" 
                placeholder="Story Title"
                class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-400 outline-none"
                required
            >

            <!-- Content -->
            <textarea 
                name="content" 
                placeholder="Write your story..."
                rows="4"
                class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-400 outline-none"
                required
            ></textarea>

            <!-- File -->
           <input type="file" name="image" id="imageInput" class="w-full">

            <img id="previewImage" class="hidden mt-4 w-full h-48 object-cover rounded-xl">

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-rose-500 text-white py-3 rounded-xl font-bold 
                       hover:bg-rose-600 transition-all duration-300 shadow-md hover:scale-105"
            >
                Add Story 💞
            </button>

        </form>
    </div>
</section>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
    {{-- INTERACTIVE MEMORY REVEAL --}}
   <section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto relative border-l-2 border-rose-300">

        @foreach($stories as $story)
        <div class="mb-10 ml-6 relative">

            <!-- Dot -->
            <div class="absolute -left-3 top-2 w-6 h-6 bg-rose-500 rounded-full border-4 border-white"></div>

            <div class="bg-white p-5 rounded-2xl shadow-md">

                <h3 class="text-xl font-bold text-gray-800">
                    {{ $story->title }}
                </h3>

                <p class="text-gray-600 mt-2">
                    {{ Str::limit($story->content, 100) }}
                </p>

                <button onclick="openStoryModal(
                    '{{ $story->image ? asset('storage/'.$story->image) : '' }}',
                    '{{ addslashes($story->title) }}',
                    `{{ addslashes($story->content) }}`
                )"
                class="text-rose-500 mt-3 inline-block">
                    Read More →
                </button>

            </div>
        </div>
        @endforeach

    </div>
</section>

    {{-- RANDOM MEMORY BUTTON --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-rose-500 mb-3">Surprise moment</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Random Memory</h2>
            <p class="text-gray-600 mb-8">
                Tap the button and let the page surprise you with a random little memory.
            </p>

            <button onclick="showRandomMemory()"
                class="bg-rose-500 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 hover:bg-rose-600 transition-all duration-300">
                Show Random Memory
            </button>

            <div id="randomMemoryBox" class="hidden mt-10 bg-rose-50 rounded-3xl p-8 shadow-md">
                <h3 id="randomMemoryTitle" class="text-2xl font-bold text-gray-800 mb-4"></h3>
                <p id="randomMemoryText" class="text-gray-600 text-lg leading-8"></p>
            </div>
        </div>
    </section>
    <div id="storyModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-[100] p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-8 relative animate-fadeIn">

            <button onclick="closeStoryModal()" class="absolute top-4 right-5 text-2xl">&times;</button>

            <img id="modalImg" class="w-full h-64 object-cover rounded-2xl mb-6">

            <h3 id="modalTitle" class="text-2xl font-bold mb-3"></h3>
            <p id="modalText" class="text-gray-600 leading-7"></p>
        </div>
    </div>
    {{-- SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ===== LIVE COUNTER =====
            // Change this to your anniversary / official date
            const startDate = new Date('2025-04-08T00:00:00');

            const chapterButtons = document.querySelectorAll('.chapter-toggle');

            chapterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);

                    content.classList.toggle('hidden');

                    const label = this.querySelector('span');
                    label.textContent = content.classList.contains('hidden') ? '→' : '↓';
                });
            });


            function updateCounter() {
                const now = new Date();
                const diff = now - startDate;

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor(diff / (1000 * 60));

                document.getElementById('daysCounter').textContent = days.toLocaleString();
                document.getElementById('hoursCounter').textContent = hours.toLocaleString();
                document.getElementById('minutesCounter').textContent = minutes.toLocaleString();
            }

            updateCounter();
            setInterval(updateCounter, 1000);

            // ===== SCROLL REVEAL =====
            const revealElements = document.querySelectorAll('.story-reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }
                });
            }, {
                threshold: 0.2
            });

            revealElements.forEach(el => observer.observe(el));
        });

        // ===== MEMORY TOGGLE =====
        function toggleMemory(card) {
            const content = card.querySelector('.memory-content');
            const preview = card.querySelector('.memory-preview');

            content.classList.toggle('hidden');

            if (content.classList.contains('hidden')) {
                preview.textContent = 'Click to reveal';
            } else {
                preview.textContent = 'Click again to hide';
            }
        }

        // ===== RANDOM MEMORY =====
        function showRandomMemory() {
            const memories = [
                {
                    title: 'Our First Real Conversation',
                    text: 'That simple moment turned into something I never wanted to lose.'
                },
                {
                    title: 'That Day We Couldn’t Stop Laughing',
                    text: 'It wasn’t even a grand moment, but it became one of my favorites because it was with you.'
                },
                {
                    title: 'A Quiet Day That Meant So Much',
                    text: 'No fancy plans, no special event, just the comfort of being together.'
                },
                {
                    title: 'One of My Favorite Memories',
                    text: 'Some moments stay in the heart for a long time, and this is definitely one of them.'
                }
            ];

            const random = memories[Math.floor(Math.random() * memories.length)];

            document.getElementById('randomMemoryTitle').textContent = random.title;
            document.getElementById('randomMemoryText').textContent = random.text;
            document.getElementById('randomMemoryBox').classList.remove('hidden');
        }

        function openStoryModal(img, title, text) {
    document.getElementById('modalImg').src = img;
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalText').textContent = text;

    const modal = document.getElementById('storyModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.style.overflow = 'hidden';
}

        function closeStoryModal() {
            const modal = document.getElementById('storyModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            document.body.style.overflow = 'auto';
        }

        document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('previewImage');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
});

function editStory(id, title, content) {
    document.getElementById('editModal').classList.remove('hidden');

    document.getElementById('editTitle').value = title;
    document.getElementById('editContent').value = content;

    document.getElementById('editForm').action = `/story/${id}`;
}
    </script>

@endsection

<style>
    @keyframes floatUp {
        0% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        100% {
            opacity: 0;
            transform: translateY(-80px) scale(1.5);
        }
    }
</style>