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
            <a href="#read" class="w-full sm:w-auto bg-white text-rose-900 px-8 py-3 rounded-full font-bold shadow-lg hover:bg-gray-100 hover:scale-105 transition-all duration-300">
                Read our Story
            </a>

            <a href="{{ url('/services') }}" class="w-full sm:w-auto bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-rose-900 transition-all duration-300">
                See the Gallery
            </a>
        </div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <a href="#read" class="text-white opacity-80 hover:opacity-100 transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 13l5 5 5-5M7 6l5 5 5-5"/>
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
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <p class="text-sm uppercase tracking-[0.3em] text-rose-500 mb-3">Chapters of us</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">A Few Favorite Chapters</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Not just moments, but chapters we keep coming back to.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Chapter 1 --}}
            <div class="group bg-gradient-to-b from-rose-50 to-white rounded-[2rem] p-5 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-rose-100">
                <div class="relative overflow-hidden rounded-[1.5rem] mb-5">
                    <img src="{{ asset('Images/image2.jpg') }}" alt="The Beginning"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-sm font-semibold text-rose-600 shadow">
                        Chapter 1
                    </div>
                </div>

                <div class="px-1">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">The Beginning</h3>
                    <p class="text-gray-600 leading-7 mb-5">
                        The first chapter of everything — where a simple moment slowly turned into something unforgettable.
                    </p>

                    <button type="button"
                        class="chapter-toggle inline-flex items-center gap-2 text-rose-600 font-semibold hover:text-rose-700 transition"
                        data-target="chapter1-content">
                        Read this chapter
                        <span class="text-lg">→</span>
                    </button>

                    <div id="chapter1-content" class="hidden mt-5 pt-5 border-t border-rose-100">
                        <p class="text-gray-600 leading-7">
                            This is where you can write how it all started — the first conversation, the first impression,
                            or that moment when things began to feel different in the best way.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Chapter 2 --}}
            <div class="group bg-gradient-to-b from-amber-50 to-white rounded-[2rem] p-5 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-amber-100 rotate-[-1deg] hover:rotate-0">
                <div class="relative overflow-hidden rounded-[1.5rem] mb-5">
                    <img src="{{ asset('Images/image3.jpg') }}" alt="First Date"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-sm font-semibold text-amber-600 shadow">
                        Chapter 2
                    </div>
                </div>

                <div class="px-1">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Our First Date</h3>
                    <p class="text-gray-600 leading-7 mb-5">
                        A chapter full of nerves, smiles, and that quiet feeling that this might become something special.
                    </p>

                    <button type="button"
                        class="chapter-toggle inline-flex items-center gap-2 text-amber-600 font-semibold hover:text-amber-700 transition"
                        data-target="chapter2-content">
                        Open memory
                        <span class="text-lg">→</span>
                    </button>

                    <div id="chapter2-content" class="hidden mt-5 pt-5 border-t border-amber-100">
                        <p class="text-gray-600 leading-7">
                            Add the story of your first date here — where you went, what you felt, what made it memorable,
                            and maybe even the funny little details that still make you smile.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Chapter 3 --}}
            <div class="group bg-gradient-to-b from-pink-50 to-white rounded-[2rem] p-5 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-pink-100">
                <div class="relative overflow-hidden rounded-[1.5rem] mb-5">
                    <img src="{{ asset('Images/image4.jpg') }}" alt="Favorite Moments"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-sm font-semibold text-pink-600 shadow">
                        Chapter 3
                    </div>
                </div>

                <div class="px-1">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Little Moments, Big Meaning</h3>
                    <p class="text-gray-600 leading-7 mb-5">
                        The random days, quiet memories, and simple moments that somehow became some of the most important.
                    </p>

                    <button type="button"
                        class="chapter-toggle inline-flex items-center gap-2 text-pink-600 font-semibold hover:text-pink-700 transition"
                        data-target="chapter3-content">
                        Reveal chapter
                        <span class="text-lg">→</span>
                    </button>

                    <div id="chapter3-content" class="hidden mt-5 pt-5 border-t border-pink-100">
                        <p class="text-gray-600 leading-7">
                            This chapter is perfect for your favorite shared memories — small adventures, random laughs,
                            comfort days, or anything that felt ordinary then but means a lot now.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- INTERACTIVE MEMORY REVEAL --}}
<section class="py-20 bg-rose-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <p class="text-sm uppercase tracking-[0.3em] text-rose-500 mb-3">Hidden memories</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Click a Heart to Reveal a Memory</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                A playful little section where each heart opens a sweet memory.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Card 1 --}}
            <div class="memory-card bg-white rounded-3xl shadow-md p-8 text-center cursor-pointer hover:shadow-xl transition duration-300" onclick="toggleMemory(this)">
                <div class="text-5xl mb-4">❤️</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Memory One</h3>
                <p class="text-gray-500 memory-preview">Click to reveal</p>

                <div class="memory-content hidden mt-4 border-t pt-4">
                    <img src="{{ asset('Images/memory1.jpg') }}" alt="Memory 1" class="w-full h-52 object-cover rounded-2xl mb-4">
                    <p class="text-gray-600 leading-7">
                        This is where you put a sweet message or story behind this memory.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="memory-card bg-white rounded-3xl shadow-md p-8 text-center cursor-pointer hover:shadow-xl transition duration-300" onclick="toggleMemory(this)">
                <div class="text-5xl mb-4">💖</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Memory Two</h3>
                <p class="text-gray-500 memory-preview">Click to reveal</p>

                <div class="memory-content hidden mt-4 border-t pt-4">
                    <img src="{{ asset('Images/memory2.jpg') }}" alt="Memory 2" class="w-full h-52 object-cover rounded-2xl mb-4">
                    <p class="text-gray-600 leading-7">
                        Maybe this was a funny day, a first trip, or one of those random moments that still makes you smile.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="memory-card bg-white rounded-3xl shadow-md p-8 text-center cursor-pointer hover:shadow-xl transition duration-300" onclick="toggleMemory(this)">
                <div class="text-5xl mb-4">💕</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Memory Three</h3>
                <p class="text-gray-500 memory-preview">Click to reveal</p>

                <div class="memory-content hidden mt-4 border-t pt-4">
                    <img src="{{ asset('Images/memory3.jpg') }}" alt="Memory 3" class="w-full h-52 object-cover rounded-2xl mb-4">
                    <p class="text-gray-600 leading-7">
                        You can add a heartfelt caption here, like why this moment mattered or what you felt at that time.
                    </p>
                </div>
            </div>
        </div>
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

        <button onclick="showRandomMemory()" class="bg-rose-500 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 hover:bg-rose-600 transition-all duration-300">
            Show Random Memory
        </button>

        <div id="randomMemoryBox" class="hidden mt-10 bg-rose-50 rounded-3xl p-8 shadow-md">
            <h3 id="randomMemoryTitle" class="text-2xl font-bold text-gray-800 mb-4"></h3>
            <p id="randomMemoryText" class="text-gray-600 text-lg leading-8"></p>
        </div>
    </div>
</section>

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
</script>

@endsection