@extends('layouts.app')

@section('content')
<div class="w-full">
    <x-top-banner />
    {{-- Welcome + News --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4 px-4">
        <div class="bg-blue-900 text-white text-center py-6 rounded">
            <h2 class="text-xl font-bold underline mb-2">Welcome to TechConnect</h2>
            <p>Driving Innovation and Collaboration Across Our Technology Teams</p>
        </div>
        <div class="bg-blue-900 text-white text-center py-6 rounded">
            <h2 class="text-xl font-bold underline mb-2">News & Updates</h2>
            <p>Upcoming tech meeting on April 20</p>
        </div>
    </div>

    {{-- Quick Links --}}
    <div class="px-4 mt-8">
        <h2 class="text-xl font-bold mb-4">Quick Links:</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Tools & Resources</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Events & Updates</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Engineering Blogs/Articles</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Team & Org Structure</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Projects and Capabilities</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Feedback & Contribution</a>
            <a href="#" class="block bg-blue-700 text-white text-center py-6 rounded-xl hover:bg-blue-800 transition">Innovation Hub</a>
        </div>
    </div>

    {{-- Footer --}}
    <div class="mt-12 bg-blue-900 text-white px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div class="mb-4 md:mb-0">
                <img src="{{ asset('images/dtdc-logo.png') }}" alt="DTDC Logo" class="h-8 mb-2">
                <p>Email: customersupport@dtdc.com</p>
                <p>Phone: +91 - 9606 911 811</p>
            </div>
            <div class="flex flex-col md:flex-row gap-6 text-sm mt-4 md:mt-0">
                <a href="#" class="underline hover:text-gray-300">Company</a>
                <a href="#" class="underline hover:text-gray-300">Ship With Us</a>
                <a href="#" class="underline hover:text-gray-300">Help & Support</a>
                <a href="#" class="underline hover:text-gray-300">Self Services & Portals</a>
            </div>
        </div>
    </div>
</div>
@endsection