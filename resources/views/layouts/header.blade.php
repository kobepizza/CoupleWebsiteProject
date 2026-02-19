
    @if (request()->routeIs('home'))
        <header class="absolute top-0 left-0 w-full z-50 bg-transparent p-5">  
    @else
        <header class="top-0 left-0 w-full z-50 bg-transparent p-5">
    @endif
        <div class="w-full px-4 flex items-center justify-between">
            <div class="logo -5">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('Images/cropped_more1.png') }}" alt="Logo" class="h-10 " >
                </a>
            </div>
        
            <nav>
                <ul class="flex space-x-6 ">
                    <li class="px-4"><a href="{{ url('/') }}" class="text-gray-700 hover:text-white">Home</a></li>
                    <li class="px-4"><a href="{{ url('/about') }}" class="text-gray-700 hover:text-white">Our Story</a></li>
                    <li class="px-4"><a href="{{ url('/services') }}" class="text-gray-700 hover:text-white">Gallery</a></li>
                    <li class="px-4"><a href="{{ url('/contact') }}" class="text-gray-700 hover:text-white">Timeline</a></li>
                </ul>
            </nav>
        </div>
    </header>
