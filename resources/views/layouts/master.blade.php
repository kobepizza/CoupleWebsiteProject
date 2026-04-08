<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bryan & Kaye ❤️</title>
         @vite(['resources/css/app.css', 'resources/js/app.js'])
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Funnel+Display:wght@300..800&family=Indie+Flower&display=swap" rel="stylesheet">
                
    </head>

    <body class="antialiased bg-white">
         @include('layouts.header')
         
            @yield('content')

        {{-- GLOBAL MUSIC PLAYER --}}
        @php
            // Fetch all songs with MP3 files
            $playlist = \App\Models\Song::whereNotNull('file_path')->latest()->get();
        @endphp

        @if($playlist->count() > 0)
        <div id="global-music-container" class="fixed bottom-6 left-6 z-[100]">
    <div class="bg-white/80 backdrop-blur-lg p-2 rounded-full shadow-2xl border border-indigo-100 flex items-center w-16 hover:w-80 transition-all duration-500 ease-in-out group overflow-hidden">
        
        <div onclick="toggleGlobalPlay()" class="relative w-12 h-12 flex-shrink-0 cursor-pointer">
            <div id="vinyl-disk" class="absolute inset-0 bg-gray-800 rounded-full border-2 border-gray-700 shadow-inner"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-3 h-3 bg-indigo-500 rounded-full border-2 border-gray-900"></div>
            </div>
        </div>
        
        <div class="opacity-0 group-hover:opacity-100 flex items-center justify-between w-full ml-4 transition-opacity duration-300">
            <div class="flex flex-col min-w-[100px]">
                <p id="track-title" class="text-sm font-bold text-gray-800 truncate w-24"></p>
                <p id="track-artist" class="text-[10px] text-indigo-500 font-medium truncate w-24"></p>
            </div>

            <div class="flex items-center gap-2">
                <button onclick="prevTrack()" class="p-1 text-gray-400 hover:text-indigo-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                    </svg>
                </button>

                <button onclick="toggleGlobalPlay()" id="play-pause-btn" class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 shadow transition">
                    <span id="play-icon" class="text-[10px]">▶</span>
                </button>

                <button onclick="nextTrack()" class="p-1 text-gray-400 hover:text-indigo-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>

                <button onclick="replayTrack()" class="p-1 text-gray-400 hover:text-rose-500 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>
        </div>

        <audio id="global-audio"></audio>
    </div>
</div>
        @endif

        <footer>
            @include('layouts.footer')
        </footer>

        {{-- PERSISTENCE & PLAYER SCRIPT --}}
        <script>
            // Data from Laravel
            const playlist = @json($playlist);
            let currentIndex = parseInt(localStorage.getItem('mi_amore_track_index')) || 0;
            
            const audio = document.getElementById('global-audio');
            const disk = document.getElementById('vinyl-disk');
            const playIcon = document.getElementById('play-icon');
            const titleEl = document.getElementById('track-title');
            const artistEl = document.getElementById('track-artist');

            function loadTrack(index) {
                const track = playlist[index];
                if (!track) return;

                audio.src = `/storage/${track.file_path}`;
                titleEl.textContent = track.title;
                artistEl.textContent = track.artist;
                localStorage.setItem('mi_amore_track_index', index);
            }

            function toggleGlobalPlay() {
                if (audio.paused) {
                    audio.play();
                    updateUI(true);
                } else {
                    audio.pause();
                    updateUI(false);
                }
            }

            function nextTrack() {
                currentIndex = (currentIndex + 1) % playlist.length;
                loadTrack(currentIndex);
                audio.play();
                updateUI(true);
            }

            function prevTrack() {
                currentIndex = (currentIndex - 1 + playlist.length) % playlist.length;
                loadTrack(currentIndex);
                audio.play();
                updateUI(true);
            }

            function replayTrack() {
                audio.currentTime = 0;
                audio.play();
                updateUI(true);
            }

            function updateUI(isPlaying) {
                localStorage.setItem('mi_amore_is_playing', isPlaying);
                if (isPlaying) {
                    disk.classList.add('animate-spin-slow');
                    playIcon.textContent = '||';
                } else {
                    disk.classList.remove('animate-spin-slow');
                    playIcon.textContent = '▶';
                }
            }

            if (audio) {
                // Initialize track
                loadTrack(currentIndex);

                window.addEventListener('load', () => {
                    const savedTime = localStorage.getItem('mi_amore_music_time');
                    const wasPlaying = localStorage.getItem('mi_amore_is_playing') === 'true';

                    if (savedTime) audio.currentTime = savedTime;
                    if (wasPlaying) {
                        audio.play().then(() => updateUI(true)).catch(() => updateUI(false));
                    }
                });

                audio.addEventListener('timeupdate', () => {
                    localStorage.setItem('mi_amore_music_time', audio.currentTime);
                });

                // Auto-play next song
                audio.addEventListener('ended', nextTrack);
            }
        </script>
    </body>

    <style>
    body {
        font-family:"Caveat",'Indie Flower','Funnel Display' ;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .animate-spin-slow {
        animation: spin 4s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Info reveal on hover */
    #global-music-container:hover .max-w-md {
        max-width: 500px;
        margin-left: 0.5rem;
    }
    </style>
</html>