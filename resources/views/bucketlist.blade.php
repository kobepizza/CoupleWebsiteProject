@extends('layouts.master')
@section('content')

    {{-- HERO --}}
    <section class="pt-40 md:pt-48 pb-20 bg-gradient-to-b from-sky-100 via-rose-50 to-white text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-4 drop-shadow-sm">
            Our Bucket List
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto px-6">
            Little dreams, big adventures, and everything we want to experience together.
        </p>
    </section>

    {{-- SUMMARY --}}
    <section class="pb-10 bg-white">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="bg-rose-50 p-6 rounded-3xl shadow-sm border border-rose-100 transform hover:scale-105 transition">
                <h2 class="text-3xl font-black text-rose-600">{{ $buckets->count() }}</h2>
                <p class="text-gray-500 font-medium uppercase text-xs tracking-widest">Total Dreams</p>
            </div>

            <div class="bg-green-50 p-6 rounded-3xl shadow-sm border border-green-100 transform hover:scale-105 transition">
                <h2 class="text-3xl font-black text-green-600">{{ $buckets->where('status', 'done')->count() }}</h2>
                <p class="text-gray-500 font-medium uppercase text-xs tracking-widest">Completed</p>
            </div>

            <div class="bg-blue-50 p-6 rounded-3xl shadow-sm border border-blue-100 transform hover:scale-105 transition">
                <h2 class="text-3xl font-black text-blue-600">{{ $buckets->where('status', 'progress')->count() }}</h2>
                <p class="text-gray-500 font-medium uppercase text-xs tracking-widest">In Progress</p>
            </div>
        </div>
    </section>

    {{-- CATEGORY FILTER --}}
    <section class="py-6 bg-white sticky top-0 z-40">
        <div class="max-w-5xl mx-auto px-6 flex flex-wrap justify-center gap-3">
            <button class="filter-btn active px-6 py-2 rounded-full bg-rose-500 text-white font-bold shadow-md transition" data-filter="all">All</button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-bold hover:bg-rose-100 transition" data-filter="travel">Travel</button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-bold hover:bg-rose-100 transition" data-filter="food">Food</button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-bold hover:bg-rose-100 transition" data-filter="dates">Dates</button>
            <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-600 font-bold hover:bg-rose-100 transition" data-filter="dreams">Dreams</button>
        </div>
    </section>

    {{-- FORMS --}}
    <section class="py-10 bg-rose-50/50">
        <div class="max-w-5xl mx-auto px-6 flex flex-col md:flex-row justify-center items-center gap-4">
            <button onclick="toggleForm('addDreamForm')" class="bg-white text-rose-500 border-2 border-rose-500 px-8 py-3 rounded-full font-bold hover:bg-rose-500 hover:text-white transition-all shadow-md">
                + New Bucket List Item ✨
            </button>
            <button onclick="toggleForm('addJourneyForm')" class="bg-white text-blue-500 border-2 border-blue-500 px-8 py-3 rounded-full font-bold hover:bg-blue-500 hover:text-white transition-all shadow-md">
                + New Journey Memory 💞
            </button>
        </div>

        <div id="addDreamForm" class="hidden max-w-3xl mx-auto mt-8 bg-white p-8 rounded-3xl shadow-xl animate-fadeIn">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Add New Dream ✨</h2>
            <form method="POST" action="/bucket" class="space-y-4">
                @csrf
                <input name="title" placeholder="What's the dream?" class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-rose-300 outline-none" required>
                <textarea name="description" placeholder="A little detail about it..." class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-rose-300 outline-none"></textarea>
                <div class="grid grid-cols-2 gap-4">
                    <select name="category" class="border rounded-xl p-3 outline-none">
                        <option value="travel">Travel ✈️</option>
                        <option value="food">Food 🍕</option>
                        <option value="dates">Dates 🌹</option>
                        <option value="dreams">Dreams 💭</option>
                    </select>
                    <select name="status" class="border rounded-xl p-3 outline-none">
                        <option value="planned">Planned</option>
                        <option value="progress">In Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <button class="w-full bg-rose-500 text-white py-3 rounded-xl font-bold hover:bg-rose-600 transition shadow-lg">Add Dream 💞</button>
            </form>
        </div>

        <div id="addJourneyForm" class="hidden max-w-3xl mx-auto mt-8 bg-white p-8 rounded-3xl shadow-xl animate-fadeIn">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Mark Our Journey 💞</h2>
            <form method="POST" action="/journey" class="space-y-4">
                @csrf
                <input name="title" placeholder="Event Title" class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-300 outline-none" required>
                <textarea name="description" placeholder="What happened?" class="w-full border p-3 rounded-xl focus:ring-2 focus:ring-blue-300 outline-none"></textarea>
                <div class="grid grid-cols-2 gap-4">
                    <input name="date_label" placeholder="e.g. Jan 2024" class="w-full border p-3 rounded-xl outline-none">
                    <select name="color" class="border rounded-xl p-3 outline-none">
                        <option value="rose">Pink Accent</option>
                        <option value="green">Green Accent</option>
                        <option value="yellow">Yellow Accent</option>
                        <option value="blue">Blue Accent</option>
                    </select>
                </div>
                <button class="w-full bg-blue-500 text-white py-3 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg">Save Memory</button>
            </form>
        </div>
    </section>

    {{-- BUCKET LIST CARDS --}}
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($buckets as $bucket)
            <div class="bucket-card bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group" data-category="{{ $bucket->category }}">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400">{{ $bucket->category }}</span>
                    <span class="text-xs px-3 py-1 rounded-full font-bold 
                        @if($bucket->status == 'done') bg-green-100 text-green-700 
                        @elseif($bucket->status == 'progress') bg-blue-100 text-blue-700 
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ ucfirst($bucket->status) }}
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-rose-500 transition-colors">{{ $bucket->title }}</h3>
                <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ $bucket->description }}</p>

                <div class="pt-4 border-t border-gray-50 flex gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button onclick="editBucket({{ $bucket->id }}, @js($bucket->title), @js($bucket->description), @js($bucket->category), @js($bucket->status))"
                        class="text-blue-500 text-xs font-bold hover:underline">✏️ EDIT</button>

                    <form method="POST" action="/bucket/{{ $bucket->id }}" onsubmit="return confirm('Remove this dream? 🥺')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 text-xs font-bold hover:underline">🗑 DELETE</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 text-gray-400 italic">No dreams yet...</div>
            @endforelse
        </div>
    </section>

    {{-- TIMELINE --}}
    <section class="py-20 bg-gradient-to-b from-white to-rose-50 overflow-hidden">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-800">Our Journey 💞</h2>
                <div class="w-20 h-1 bg-rose-300 mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-rose-200 h-full"></div>
                @foreach($journeys as $index => $journey)
                    <div class="mb-16 flex justify-between items-center w-full {{ $index % 2 == 0 ? 'flex-row' : 'flex-row-reverse' }}">
                        <div class="w-5/12 {{ $index % 2 == 0 ? 'text-right' : 'text-left' }} bg-white p-6 rounded-3xl shadow-sm border border-gray-50 hover:shadow-md transition group">
                            <span class="text-rose-400 font-bold text-sm">{{ $journey->date_label }}</span>
                            <h3 class="text-xl font-bold text-gray-800 mt-1">{{ $journey->title }}</h3>
                            <p class="text-gray-600 mt-2 text-sm">{{ $journey->description }}</p>

                            {{-- Journey Actions --}}
                            <div class="mt-4 flex gap-3 opacity-0 group-hover:opacity-100 transition-opacity {{ $index % 2 == 0 ? 'justify-end' : 'justify-start' }}">
                                <button onclick="editJourney({{ $journey->id }}, @js($journey->title), @js($journey->description), @js($journey->date_label), @js($journey->color))" 
                                        class="text-blue-400 text-xs font-bold uppercase hover:underline">Edit</button>
                                <form action="/journey/{{ $journey->id }}" method="POST" onsubmit="return confirm('Delete this memory?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-300 text-xs font-bold uppercase hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="w-2/12 flex justify-center relative z-10">
                            @php
                                $colorMap = [
                                    'rose' => 'bg-rose-500',
                                    'green' => 'bg-green-500',
                                    'yellow' => 'bg-yellow-500',
                                    'blue' => 'bg-blue-500',
                                ];
                                $dotColor = $colorMap[$journey->color] ?? 'bg-gray-500';
                            @endphp

                            <div class="w-8 h-8 {{ $dotColor }} rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="w-5/12"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- RANDOM PICK --}}
    <section class="py-20 bg-rose-50 text-center">
        <div class="max-w-xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Can't Decide?</h2>
            <button onclick="pickRandom()" class="bg-rose-500 text-white px-10 py-4 rounded-full font-bold shadow-xl hover:bg-rose-600 transition-all">
                Pick One For Us 🎲
            </button>
            <div id="randomResultBox" class="hidden mt-10 bg-white p-8 rounded-3xl shadow-2xl border-2 border-rose-200 animate-fadeIn">
                <p class="text-rose-500 text-xs font-black uppercase tracking-widest mb-2">Destiny Picks:</p>
                <h3 id="randomResult" class="text-2xl font-black text-gray-800"></h3>
            </div>
        </div>
    </section>

    {{-- BUCKET EDIT MODAL --}}
    <div id="editModal" class="hidden fixed inset-0 bg-black/60 items-center justify-center z-[9999] p-4 backdrop-blur-sm">
        <div class="bg-white p-8 rounded-3xl w-full max-w-md shadow-2xl animate-fadeIn">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Dream ✨</h2>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <input id="editTitle" name="title" class="w-full border p-3 rounded-xl outline-none focus:ring-2 focus:ring-rose-300" required />
                <textarea id="editDescription" name="description" class="w-full border p-3 rounded-xl outline-none focus:ring-2 focus:ring-rose-300" rows="3"></textarea>
                <div class="grid grid-cols-2 gap-4">
                    <select id="editCategory" name="category" class="border p-3 rounded-xl outline-none">
                        <option value="travel">Travel</option>
                        <option value="food">Food</option>
                        <option value="dates">Dates</option>
                        <option value="dreams">Dreams</option>
                    </select>
                    <select id="editStatus" name="status" class="border p-3 rounded-xl outline-none">
                        <option value="planned">Planned</option>
                        <option value="progress">In Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-rose-500 text-white py-3 rounded-xl font-bold hover:bg-rose-600">Save Changes</button>
                    <button type="button" onclick="closeEditModal()" class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    {{-- JOURNEY EDIT MODAL --}}
    <div id="editJourneyModal" class="hidden fixed inset-0 bg-black/60 items-center justify-center z-[9999] p-4 backdrop-blur-sm">
        <div class="bg-white p-8 rounded-3xl w-full max-w-md shadow-2xl animate-fadeIn">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Journey 💞</h2>
            <form id="editJourneyForm" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <input id="ejTitle" name="title" class="w-full border p-3 rounded-xl outline-none focus:ring-2 focus:ring-blue-300" required />
                <textarea id="ejDescription" name="description" class="w-full border p-3 rounded-xl outline-none focus:ring-2 focus:ring-blue-300" rows="3"></textarea>
                <div class="grid grid-cols-2 gap-4">
                    <input id="ejDate" name="date_label" class="w-full border p-3 rounded-xl outline-none">
                    <select id="ejColor" name="color" class="border p-3 rounded-xl outline-none">
                        <option value="rose">Pink</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                        <option value="blue">Blue</option>
                    </select>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-blue-500 text-white py-3 rounded-xl font-bold hover:bg-blue-600">Update Journey</button>
                    <button type="button" onclick="closeEditJourneyModal()" class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // FORM TOGGLE
        function toggleForm(formId) {
            const form = document.getElementById(formId);
            const otherId = formId === 'addDreamForm' ? 'addJourneyForm' : 'addDreamForm';
            document.getElementById(otherId).classList.add('hidden');
            form.classList.toggle('hidden');
            if(!form.classList.contains('hidden')) form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // FILTER
        const buttons = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.bucket-card');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('bg-rose-500', 'text-white'));
                btn.classList.add('bg-rose-500', 'text-white');
                const filter = btn.dataset.filter;
                cards.forEach(card => card.style.display = (filter === 'all' || card.dataset.category === filter) ? 'block' : 'none');
            });
        });

        // RANDOM
        function pickRandom() {
        // 1. Get all cards
        const allCards = Array.from(document.querySelectorAll('.bucket-card'));

        // 2. Filter: Only pick cards that are:
        //    - Currently visible (based on your category filter)
        //    - NOT marked as "Done" (because we want to pick a future adventure!)
        const eligibleCards = allCards.filter(card => {
            const isVisible = window.getComputedStyle(card).display !== 'none';
            const statusText = card.querySelector('.rounded-full').textContent.trim().toLowerCase();
            return isVisible && statusText !== 'done';
        });

        // 3. Handle empty state
        const resultBox = document.getElementById('randomResultBox');
        const resultText = document.getElementById('randomResult');

        if (eligibleCards.length === 0) {
            resultText.textContent = "No pending dreams found in this category! 🌹";
            resultBox.classList.remove('hidden');
        } else {
            // 4. Pick a random one
            const randomCard = eligibleCards[Math.floor(Math.random() * eligibleCards.length)];
            const title = randomCard.querySelector('h3').textContent;

            // 5. Show result with a little "loading" feel
            resultBox.classList.add('hidden'); // Reset animation
            setTimeout(() => {
                resultText.textContent = title;
                resultBox.classList.remove('hidden');
                resultBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 50);
        }
    }

        // BUCKET MODAL LOGIC
        function editBucket(id, title, description, category, status) {
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description || '';
            document.getElementById('editCategory').value = category;
            document.getElementById('editStatus').value = status;
            document.getElementById('editForm').action = `/bucket/${id}`;

            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // JOURNEY MODAL LOGIC
        function editJourney(id, title, description, date, color) {
            document.getElementById('ejTitle').value = title;
            document.getElementById('ejDescription').value = description || '';
            document.getElementById('ejDate').value = date || '';
            document.getElementById('ejColor').value = color;
            document.getElementById('editJourneyForm').action = `/journey/${id}`;

            const modal = document.getElementById('editJourneyModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeEditJourneyModal() {
            const modal = document.getElementById('editJourneyModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }
    </script>

    <style>
        .animate-fadeIn { animation: fadeIn 0.4s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
@endsection