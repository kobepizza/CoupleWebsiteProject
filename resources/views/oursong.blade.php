@extends('layouts.master')
@section('content')

{{-- HERO / NOW PLAYING --}}
<section class="pt-40 md:pt-48 pb-20 bg-gradient-to-b from-indigo-100 via-rose-50 to-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <div class="inline-block p-1 px-4 bg-indigo-500 text-white rounded-full text-xs font-bold tracking-widest uppercase mb-6 animate-pulse">
            Currently on Repeat 🎧
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-gray-800 mb-6 tracking-tight">
            The Soundtrack <br><span class="text-indigo-600">of Us</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-xl mx-auto leading-relaxed">
            Every memory has a melody. These are the songs that define our journey.
        </p>
    </div>
</section>

{{-- ADD SONG TOGGLE --}}
<section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 text-green-600 rounded-2xl font-bold animate-bounce">
                {{ session('success') }}
            </div>
        @endif

        <button onclick="toggleSongForm()" id="songToggleBtn"
            class="bg-indigo-600 text-white px-10 py-4 rounded-full font-bold shadow-xl hover:bg-indigo-700 hover:scale-105 transition-all duration-300">
            + Add to the Playlist 🎶
        </button>

        {{-- Added enctype for file uploads --}}
        <div id="addSongForm" class="hidden mt-10 max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-2xl border border-indigo-50 animate-fadeIn text-left">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">New Track 🎵</h2>
            <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Song Title</label>
                    <input type="text" name="title" placeholder="e.g., Lover" 
                        class="w-full border border-gray-100 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 outline-none transition" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Artist</label>
                    <input type="text" name="artist" placeholder="e.g., Taylor Swift" 
                        class="w-full border border-gray-100 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 outline-none transition" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Why this song?</label>
                    <textarea name="description" placeholder="Does it remind you of a specific date or feeling?" rows="3"
                        class="w-full border border-gray-100 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-400 outline-none transition"></textarea>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Upload MP3 (Optional)</label>
                    <input type="file" name="mp3_file" accept="audio/*"
                        class="w-full border border-gray-100 bg-gray-50 rounded-xl px-4 py-2 text-sm outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 bg-indigo-600 text-white py-3 rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition">
                        Save to Playlist
                    </button>
                    <button type="button" onclick="toggleSongForm()" class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold hover:bg-gray-200 transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- SONGS GRID --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
            @forelse($songs as $song)
                <div class="group relative bg-gray-50 rounded-3xl p-6 transition-all duration-500 hover:bg-white hover:shadow-2xl border border-transparent hover:border-indigo-100">
                    
                    {{-- Vinyl Record Animation --}}
                    <div class="relative w-32 h-32 mx-auto mb-6">
                        <div class="absolute inset-0 bg-gray-800 rounded-full shadow-lg group-hover:rotate-180 transition-transform duration-[3000ms] ease-linear"></div>
                        <div class="absolute inset-2 border-2 border-gray-700 rounded-full"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-10 h-10 bg-indigo-500 rounded-full border-4 border-gray-800"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-black text-gray-800 group-hover:text-indigo-600 transition-colors uppercase tracking-tight">
                            {{ $song->title }}
                        </h3>
                        <p class="text-indigo-400 font-bold text-sm mb-4">
                            {{ $song->artist }}
                        </p>
                        <div class="w-8 h-1 bg-indigo-100 mx-auto mb-4 group-hover:w-24 transition-all duration-500"></div>
                        
                        <p class="text-gray-500 text-sm italic leading-relaxed mb-4">
                            "{{ $song->description ?? 'No description added yet.' }}"
                        </p>

                        {{-- Audio Player --}}
                        @if($song->file_path)
                            <div class="mt-4 px-2">
                                <audio controls class="w-full h-8 accent-indigo-500">
                                    <source src="{{ asset('storage/' . $song->file_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 flex justify-center gap-6 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button onclick="editSong({{ $song->id }}, @json($song->title), @json($song->artist), @json($song->description))" 
                            class="text-indigo-500 text-xs font-black tracking-widest hover:underline uppercase">Edit</button>
                        
                        <form action="{{ route('songs.delete', $song->id) }}" method="POST" onsubmit="return confirm('Remove this song from our history?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-rose-400 text-xs font-black tracking-widest hover:underline uppercase">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-6xl mb-4">📻</p>
                    <p class="text-gray-400 italic">Silence... let's add some music!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- EDIT MODAL --}}
<div id="editSongModal" class="hidden fixed inset-0 bg-gray-900/80 items-center justify-center z-[100] p-4 backdrop-blur-md">
    <div class="bg-white p-8 rounded-3xl w-full max-w-md shadow-2xl animate-fadeIn">
        <h2 class="text-2xl font-black text-gray-800 mb-6 text-center italic">Remix the Track ✨</h2>
        <form id="editSongForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input id="editSongTitle" name="title" class="w-full border border-gray-100 bg-gray-50 p-4 rounded-xl outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Song Title" required />
            <input id="editSongArtist" name="artist" class="w-full border border-gray-100 bg-gray-50 p-4 rounded-xl outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Artist" required />
            <textarea id="editSongDescription" name="description" class="w-full border border-gray-100 bg-gray-50 p-4 rounded-xl outline-none focus:ring-2 focus:ring-indigo-400" rows="3" placeholder="Why this song?"></textarea>
            
            <div class="flex gap-3 pt-2">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-3 rounded-xl font-bold shadow-lg">Update Song</button>
                <button type="button" onclick="closeSongEditModal()" class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleSongForm() {
        const form = document.getElementById('addSongForm');
        const btn = document.getElementById('songToggleBtn');
        form.classList.toggle('hidden');
        btn.classList.toggle('hidden');
        if(!form.classList.contains('hidden')) {
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function editSong(id, title, artist, description) {
        const modal = document.getElementById('editSongModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.getElementById('editSongTitle').value = title;
        document.getElementById('editSongArtist').value = artist;
        document.getElementById('editSongDescription').value = description;
        
        // Matches the 'songsupdate' route naming convention
        document.getElementById('editSongForm').action = `/songs/${id}`;
        document.body.style.overflow = 'hidden';
    }

    function closeSongEditModal() {
        const modal = document.getElementById('editSongModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>

<style>
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    /* Custom scrollbar for audio if needed */
    audio::-webkit-media-controls-enclosure {
        background-color: #f3f4f6;
    }
</style>

@endsection