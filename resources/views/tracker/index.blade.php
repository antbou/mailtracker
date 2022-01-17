@extends('layouts/layout')

@section('content')
<div class="flex flex-col justify-center h-full">
    <!-- Table -->
    <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Mail tracking</h2>
        </header>
        <div class="p-3">
            <div class="overflow-x-auto">
                @include('components.tracker._container')
            </div>
        </div>
    </div>
</div>

@endsection
