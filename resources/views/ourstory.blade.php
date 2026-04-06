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

    {{-- SCROLL STORY SECTION / ADD MEMORY --}}
    <section class="py-16 bg-gradient-to-br from-blue-50 via-white to-rose-100">
        <div class="max-w-xl mx-auto px-6 text-center">

            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold animate-bounce">
                    {{ session('success') }}
                </div>
            @endif

            <button onclick="toggleAddForm()" id="toggleBtn"
                class="mb-8 bg-white text-rose-500 border-2 border-rose-500 px-8 py-3 rounded-full font-bold hover:bg-rose-500 hover:text-white transition-all duration-300 shadow-md">
                + Add a New Memory 💞
            </button>

            <div id="addMemoryForm" class="hidden bg-white p-8 rounded-3xl shadow-xl text-left animate-fadeIn">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    Capture a Moment ✨
                </h2>

                <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <input type="text" name="title" placeholder="Story Title"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-400 outline-none"
                        required>

                    <textarea name="content" placeholder="Write your story..." rows="4"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-400 outline-none"
                        required></textarea>

                    <div class="space-y-2">
                        <label class="text-xs text-gray-400 uppercase tracking-wider ml-1">Optional Photo</label>
                        <input type="file" name="image" id="imageInput"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                    </div>

                    <img id="previewImage" class="hidden mt-4 w-full h-48 object-cover rounded-xl shadow-inner">

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 bg-rose-500 text-white py-3 rounded-xl font-bold hover:bg-rose-600 transition-all duration-300 shadow-md hover:scale-105">
                            Save Memory
                        </button>
                        <button type="button" onclick="toggleAddForm()"
                            class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold hover:bg-gray-200 transition-all">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- INTERACTIVE MEMORY REVEAL --}}
    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto relative border-l-2 border-rose-300">
            @foreach($stories as $story)
                <div class="mb-10 ml-6 relative">
                    <div class="absolute -left-3 top-2 w-6 h-6 bg-rose-500 rounded-full border-4 border-white"></div>
                    <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-50">
                        <h3 class="text-xl font-bold text-gray-800">{{ $story->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ Str::limit($story->content, 100) }}</p>

                        <div class="flex items-center justify-between mt-4">
                            <button onclick="openStoryModal(
                                        '{{ $story->image ? asset('storage/' . $story->image) : '' }}',
                                        '{{ addslashes($story->title) }}',
                                        `{{ addslashes($story->content) }}`
                                    )" class="text-rose-500 font-medium hover:underline">
                                Read More →
                            </button>

                            <div class="flex gap-4">
                                <form action="{{ route('story.delete', $story->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this memory? 💔')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 text-sm hover:text-red-600 transition-colors">🗑 Delete</button>
                                </form>

                                <button
                                    onclick="editStory({{ $story->id }}, '{{ addslashes($story->title) }}', `{{ addslashes($story->content) }}`)"
                                    class="text-blue-400 text-sm hover:text-blue-600 transition-colors">✏️ Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- RANDOM MEMORY BUTTON --}}
    <section class="py-20 bg-gradient-to-t from-rose-50 to-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-rose-500 mb-3">Surprise moment</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Random Memory</h2>
            <button onclick="showRandomMemory()"
                class="bg-rose-500 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 hover:bg-rose-600 transition-all duration-300">
                Show Random Memory
            </button>

            <div id="randomMemoryBox"
                class="hidden mt-10 bg-white rounded-3xl p-8 shadow-md border border-rose-100 animate-fadeIn max-w-2xl mx-auto">
                {{-- Add this img tag --}}
                <img id="randomMemoryImg" class="hidden w-full h-64 object-cover rounded-2xl mb-6 shadow-sm">

                <h3 id="randomMemoryTitle" class="text-2xl font-bold text-gray-800 mb-4"></h3>
                <p id="randomMemoryText" class="text-gray-600 text-lg leading-8"></p>
            </div>
        </div>
    </section>

    {{-- MODALS --}}
    <div id="storyModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-[100] p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-8 relative animate-fadeIn">
            <button onclick="closeStoryModal()" class="absolute top-4 right-5 text-2xl hover:text-rose-500">&times;</button>
            <img id="modalImg" class="w-full h-64 object-cover rounded-2xl mb-6 shadow-md">
            <h3 id="modalTitle" class="text-2xl font-bold mb-3 text-gray-800"></h3>
            <p id="modalText" class="text-gray-600 leading-7"></p>
        </div>
    </div>

    <div id="editModal" class="hidden fixed inset-0 bg-black/70 items-center justify-center z-[200] p-4">
        <form id="editForm" method="POST" class="bg-white p-8 rounded-3xl w-full max-w-md space-y-4 animate-fadeIn">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-bold text-center">Edit Memory ✨</h2>
            <input type="text" name="title" id="editTitle"
                class="w-full border border-gray-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" required>
            <textarea name="content" id="editContent"
                class="w-full border border-gray-200 p-3 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" rows="4"
                required></textarea>
            <div class="flex gap-3">
                <button type="button" onclick="closeEditModal()"
                    class="w-1/2 bg-gray-100 py-3 rounded-xl font-bold">Cancel</button>
                <button type="submit" class="w-1/2 bg-blue-500 text-white py-3 rounded-xl font-bold shadow-md">Save
                    Changes</button>
            </div>
        </form>
    </div>

    <script>
        // Prevent form resubmission on refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // ===== LIVE COUNTER =====
            const startDate = new Date('2025-04-08T00:00:00');

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
        });

        // ===== TOGGLE ADD FORM =====
        function toggleAddForm() {
            const form = document.getElementById('addMemoryForm');
            const btn = document.getElementById('toggleBtn');
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                btn.classList.add('hidden');
            } else {
                form.classList.add('hidden');
                btn.classList.remove('hidden');
            }
        }

        // ===== IMAGE PREVIEW =====
        document.getElementById('imageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('previewImage');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });

        // ===== MODAL LOGIC =====
        function openStoryModal(img, title, text) {
            const modalImg = document.getElementById('modalImg');
            if (img) {
                modalImg.src = img;
                modalImg.classList.remove('hidden');
            } else {
                modalImg.classList.add('hidden');
            }
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

        function editStory(id, title, content) {
            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.getElementById('editTitle').value = title;
            document.getElementById('editContent').value = content;
            document.getElementById('editForm').action = `/story/${id}`;
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function showRandomMemory() {
            // 1. Convert your PHP $stories collection into a JS array
            const memories = @json($stories);

            // 2. Check if there are any memories saved
            if (memories.length === 0) {
                document.getElementById('randomMemoryTitle').textContent = "No memories yet 💔";
                document.getElementById('randomMemoryText').textContent = "Start adding some memories above to see them here!";
            } else {
                // 3. Pick a random index
                const random = memories[Math.floor(Math.random() * memories.length)];

                const imgElement = document.getElementById('randomMemoryImg');
                if (random.image) {
                    imgElement.src = `/storage/${random.image}`;
                    imgElement.classList.remove('hidden');
                } else {
                    imgElement.classList.add('hidden');
                }
                // 4. Update the UI with the dynamic data from your database
                document.getElementById('randomMemoryTitle').textContent = random.title;
                document.getElementById('randomMemoryText').textContent = random.content;
            }

            // 5. Reveal the box
            document.getElementById('randomMemoryBox').classList.remove('hidden');

            // Optional: Scroll to the box smoothly so the user sees it
            document.getElementById('randomMemoryBox').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    </script>

@endsection

<style>
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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