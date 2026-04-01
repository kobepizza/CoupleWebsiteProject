@extends('layouts.master')
@section('content')

{{-- HERO --}}

<section class="pt-40 md:pt-48 bg-gradient-to-b from-sky-100 relative via-rose-50 to-white text-center">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-4">
        Our Bucket List
    </h1>
    <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
        Little dreams, big adventures, and everything we want to experience together.
    </p>
</section>

{{-- SUMMARY --}}
<section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        <div class="bg-rose-50 p-6 rounded-2xl shadow">
            <h2 class="text-3xl font-bold text-rose-600">12</h2>
            <p class="text-gray-600">Total Dreams</p>
        </div>

        <div class="bg-green-50 p-6 rounded-2xl shadow">
            <h2 class="text-3xl font-bold text-green-600">4</h2>
            <p class="text-gray-600">Completed</p>
        </div>

        <div class="bg-yellow-50 p-6 rounded-2xl shadow">
            <h2 class="text-3xl font-bold text-yellow-600">3</h2>
            <p class="text-gray-600">In Progress</p>
        </div>
    </div>
</section>

{{-- CATEGORY FILTER --}}
<section class="py-6 bg-white">
    <div class="max-w-5xl mx-auto px-6 flex flex-wrap justify-center gap-3">
        <button class="filter-btn active px-5 py-2 rounded-full bg-rose-500 text-white" data-filter="all">All</button>
        <button class="filter-btn px-5 py-2 rounded-full bg-gray-100" data-filter="travel">Travel</button>
        <button class="filter-btn px-5 py-2 rounded-full bg-gray-100" data-filter="food">Food</button>
        <button class="filter-btn px-5 py-2 rounded-full bg-gray-100" data-filter="dates">Dates</button>
        <button class="filter-btn px-5 py-2 rounded-full bg-gray-100" data-filter="dreams">Dreams</button>
    </div>
</section>

{{-- BUCKET LIST CARDS --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- CARD --}}
        <div class="bucket-card bg-white border rounded-3xl p-6 shadow hover:shadow-xl transition" data-category="travel">
            <h3 class="text-xl font-bold text-gray-800 mb-2">✈ Travel to Japan</h3>
            <p class="text-gray-600 mb-4">Experience Japan together and explore new places.</p>
            <span class="text-sm bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Planned</span>
        </div>

        <div class="bucket-card bg-white border rounded-3xl p-6 shadow hover:shadow-xl transition" data-category="dates">
            <h3 class="text-xl font-bold text-gray-800 mb-2">🌅 Watch Sunrise Together</h3>
            <p class="text-gray-600 mb-4">Wake up early and enjoy a peaceful morning.</p>
            <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">Done</span>
        </div>

        <div class="bucket-card bg-white border rounded-3xl p-6 shadow hover:shadow-xl transition" data-category="food">
            <h3 class="text-xl font-bold text-gray-800 mb-2">🍜 Try Ramen Date</h3>
            <p class="text-gray-600 mb-4">Visit a ramen place we’ve never tried before.</p>
            <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">In Progress</span>
        </div>

        <div class="bucket-card bg-white border rounded-3xl p-6 shadow hover:shadow-xl transition" data-category="dreams">
            <h3 class="text-xl font-bold text-gray-800 mb-2">🏡 Build Our Dream Home</h3>
            <p class="text-gray-600 mb-4">Create a space we can call our own someday.</p>
            <span class="text-sm bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">Dream</span>
        </div>

    </div>
</section>

{{-- TIMELINE --}}
<section class="py-20 bg-gradient-to-b from-white to-rose-50">
    <div class="max-w-5xl mx-auto px-6">

        {{-- TITLE --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-800">Our Journey 💞</h2>
            <p class="text-gray-600 mt-3">Moments we've lived and dreams ahead</p>
        </div>

        <div class="relative">

            {{-- Vertical Line --}}
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-rose-200 h-full"></div>

            {{-- ITEM 1 --}}
            <div class="mb-16 flex justify-between items-center w-full">
                <div class="w-5/12 text-right">
                    <h3 class="text-xl font-bold text-gray-800">First Chat 💬</h3>
                    <p class="text-gray-600">The moment everything started.</p>
                    <span class="text-sm text-rose-500">Jan 2024</span>
                </div>

                <div class="w-2/12 flex justify-center">
                    <div class="w-6 h-6 bg-rose-500 rounded-full border-4 border-white shadow-lg"></div>
                </div>

                <div class="w-5/12"></div>
            </div>

            {{-- ITEM 2 --}}
            <div class="mb-16 flex justify-between items-center w-full">
                <div class="w-5/12"></div>

                <div class="w-2/12 flex justify-center">
                    <div class="w-6 h-6 bg-green-500 rounded-full border-4 border-white shadow-lg"></div>
                </div>

                <div class="w-5/12 text-left">
                    <h3 class="text-xl font-bold text-gray-800">First Date 💞</h3>
                    <p class="text-gray-600">Our first time meeting.</p>
                    <span class="text-sm text-green-500">Feb 2024</span>
                </div>
            </div>

            {{-- ITEM 3 --}}
            <div class="mb-16 flex justify-between items-center w-full">
                <div class="w-5/12 text-right">
                    <h3 class="text-xl font-bold text-gray-800">First Trip 🌄</h3>
                    <p class="text-gray-600">Our first adventure together.</p>
                    <span class="text-sm text-yellow-500">Mar 2024</span>
                </div>

                <div class="w-2/12 flex justify-center">
                    <div class="w-6 h-6 bg-yellow-400 rounded-full border-4 border-white shadow-lg"></div>
                </div>

                <div class="w-5/12"></div>
            </div>

            {{-- ITEM 4 --}}
            <div class="mb-16 flex justify-between items-center w-full">
                <div class="w-5/12"></div>

                <div class="w-2/12 flex justify-center">
                    <div class="w-6 h-6 bg-gray-400 rounded-full border-4 border-white shadow-lg"></div>
                </div>

                <div class="w-5/12 text-left">
                    <h3 class="text-xl font-bold text-gray-800">Future Dream ✨</h3>
                    <p class="text-gray-600">Still waiting to happen...</p>
                    <span class="text-sm text-gray-500">Coming Soon</span>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- RANDOM PICK --}}
<section class="py-20 bg-rose-50 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Can't Decide?</h2>
    <button onclick="pickRandom()" class="bg-rose-500 text-white px-8 py-3 rounded-full font-bold hover:bg-rose-600 transition">
        Pick One For Us 🎲
    </button>

    <div id="randomResult" class="hidden mt-8 text-xl text-gray-700 font-semibold"></div>
</section>

{{-- SCRIPT --}}
<script>
    // FILTER
    const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.bucket-card');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('bg-rose-500', 'text-white'));
            btn.classList.add('bg-rose-500', 'text-white');

            const filter = btn.getAttribute('data-filter');

            cards.forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // RANDOM PICK
    function pickRandom() {
        const visibleCards = Array.from(cards).filter(card => card.style.display !== 'none');
        const random = visibleCards[Math.floor(Math.random() * visibleCards.length)];

        document.getElementById('randomResult').classList.remove('hidden');
        document.getElementById('randomResult').textContent = random.querySelector('h3').textContent;
    }
</script>

@endsection