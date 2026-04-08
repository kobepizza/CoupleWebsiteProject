<div class="relative -mt-1">
    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0L1440 0V120C1440 120 1080 40 720 40C360 40 0 120 0 120V0Z" fill="#DB6D7F"/> 
        </svg>
</div>
<footer class="bg-rose-50/30 py-12 border-t border-rose-100">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <div class="flex items-center justify-center space-x-4 mb-4">
            <div class="h-px w-12 bg-rose-100"></div>
            <span class="text-xl">💞</span>
            <div class="h-px w-12 bg-rose-100"></div>
        </div>

        <p class="text-gray-600 font-medium tracking-wide">
            Made with love for my favorite person.
        </p>
        
        <div class="mt-4 flex flex-wrap justify-center gap-x-8 gap-y-2 text-sm font-bold text-rose-500/80">
            <a href="{{ route('home') }}" class="hover:text-rose-600 transition">Home</a>
            <a href="{{ route('gallery') }}" class="hover:text-rose-600 transition">Gallery</a>
             <a href="{{ route('ourStory') }}" class="hover:text-rose-600 transition">Our Story</a>
              <a href="{{ route('songs.index') }}" class="hover:text-rose-600 transition">Our Song</a>
            <a href="{{ route('bucketlist') }}" class="hover:text-rose-600 transition">Bucket List</a>
        </div>

        <p class="mt-6 text-[10px] text-gray-400 uppercase tracking-[0.2em]">
            © {{ date('Y') }} — [Bryan] & [Kaye]
        </p>
    </div>
</footer>