@extends('layouts.master')
@section('content')


    <!-- Full page image background -->
   <div class="w-full h-screen overflow-hidden relative flex items-center justify-center">
        <img src="Images/Homepage.JPG" alt="Top Background" class="absolute inset-0 w-full h-full object-cover">
        
       

        <div class="text-container relative z-10 px-6"> 
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Welcome to Our Journey</h1>
            <p class="text-base md:text-xl text-white mb-8 max-w-2xl mx-auto">
                They say life is a series of moments, but the best ones are the ones we share. From our first date to this very second, we’ve been building a life full of laughter, support, and endless adventures.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button class="w-full sm:w-auto bg-white text-emerald-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Read our Story
                </button>
                <button class="w-full sm:w-auto bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-pink-500 transition">
                    See the Gallery
                </button>
            </div>
        </div>
    </div>


    <!-- Bottom half - Color -->
    <div class="bg-[#E06B80]">
      <div class="py-5">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-7 md:px-12 py-10 gap-10">
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Our First Adventure</h2>
                    <p class="text-lg text-emerald-50 mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet porttitor urna, non faucibus risus. Integer dolor lectus, convallis ut scelerisque eget.
                    </p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <button class="bg-white text-emerald-900 px-6 py-2 rounded-lg font-medium shadow-md">Learn More</button>
                        <button class="bg-transparent border-2 border-white text-white px-6 py-2 rounded-lg">Contact</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="Images/image2.JPG" alt="Memory" class="w-full h-auto rounded-2xl shadow-2xl object-cover">
                </div>
            </div>
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row-reverse items-center justify-between px-6 md:px-12 py-10 gap-10">
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Building Memories</h2>
                    <p class="text-lg text-emerald-50 mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet porttitor urna, non faucibus risus. Integer dolor lectus.
                    </p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <button class="bg-white text-emerald-900 px-6 py-2 rounded-lg font-medium shadow-md">Learn More</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="Images/image.JPG" alt="Memory" class="w-full h-auto rounded-2xl shadow-2xl object-cover">
                </div>
            </div>

            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-7 md:px-12 py-10 gap-10">
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Our First Adventure</h2>
                    <p class="text-lg text-emerald-50 mb-8 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet porttitor urna, non faucibus risus. Integer dolor lectus, convallis ut scelerisque eget.
                    </p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <button class="bg-white text-emerald-900 px-6 py-2 rounded-lg font-medium shadow-md">Learn More</button>
                        <button class="bg-transparent border-2 border-white text-white px-6 py-2 rounded-lg">Contact</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="Images/image2.JPG" alt="Memory" class="w-full h-auto rounded-2xl shadow-2xl object-cover">
                </div>
            </div>

      
        <!--collage section-->

           <div class="max-w-4xl mx-auto px-6 text-center mt-20">
                <h2 class="text-4xl font-bold text-white mb-6">Our Little Moments</h2>
                <p class="text-xl text-emerald-100">Every photo tells a story we never want to forget.</p>
            </div>

            <div class="hidden md:block relative w-full max-w-6xl mx-auto h-[800px] mt-10">
                <div class="absolute top-[5%] left-[50%] w-[20%] z-20 hover:z-50 transition-all hover:scale-110">
                    <img src="Images/image.JPG" class="w-full rounded-lg shadow-xl border-4 border-white rotate-[-3deg]">
                </div>
                <div class="absolute top-[10%] left-[15%] w-[25%] z-30 transition-all hover:scale-110">
                    <img src="Images/image2.JPG" class="w-full rounded-lg shadow-xl border-4 border-white rotate-[2deg]">
                </div>
                <div class="absolute top-[30%] left-[40%] w-[25%] z-40 transition-all hover:scale-110">
                    <img src="Images/image3.JPG" class="w-full rounded-lg shadow-2xl border-4 border-white">
                </div>
                <div class="absolute bottom-[10%] left-[10%] w-[22%] z-10 hover:z-50 transition-all hover:scale-110">
                    <img src="Images/image4.JPG" class="w-full rounded-lg shadow-lg border-4 border-white rotate-[-5deg]">
                </div>
                <div class="absolute bottom-[5%] left-[65%] w-[28%] z-10 transition-all hover:scale-110">
                    <img src="Images/image.JPG" class="w-full rounded-lg shadow-lg border-4 border-white rotate-[4deg]">
                </div>
            </div>

            <div class="md:hidden grid grid-cols-2 gap-4 px-6 mt-10">
                <img src="Images/image.JPG" class="rounded-lg border-2 border-white shadow-md">
                <img src="Images/image2.JPG" class="rounded-lg border-2 border-white shadow-md">
                <img src="Images/image3.JPG" class="rounded-lg border-2 border-white shadow-md col-span-2">
                <img src="Images/image4.JPG" class="rounded-lg border-2 border-white shadow-md">
                <img src="Images/image.JPG" class="rounded-lg border-2 border-white shadow-md">
            </div>
      </div>
    </div>



    <style>
      .text-container {

    width: 100%;          
    max-width: 900px;   
    display: block;
    text-align: center;
    text-shadow: 0px 0px 1px rgba(0, 0, 0, 0.5); /* Add a subtle shadow for better readability */
  }

  @layer utilities {
    .text-stroke-black {
      -webkit-text-stroke: 1px #000;
    }
  }
    </style>
@endsection