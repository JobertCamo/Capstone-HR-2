@props(['job'])
@php
use Carbon\Carbon;
    $date = $job->created_at;
    $date = Carbon::parse($date);
@endphp
<a @click="details = true" wire:click='update({{ $job->id }})'>
    <div class="cursor-pointer mt-6 flex flex-col p-4 space-y-2 bg-gray-400 rounded-lg card sm:p-3 md:p-4 lg:p-5 sm:text-sm md:text-base lg:text-lg relative">
        <x-mini-button white solid solid class=" absolute top-2 right-2 w-7 h-7">
            <x-icon name="bookmark" />
        </x-mini-button>
        <h1 class="text-lg font-semibold jobtype sm:text-base md:text-lg lg:text-xl">{{ $job->title }}</h1>
        <span class="text-gray-700 dept sm:text-sm md:text-base">{{ $job->location }}</span>
        <p class="text-sm text-gray-600 smoldesc sm:text-xs md:text-sm lg:text-base mb-6">
            {{ Str::limit($job->description, 200) }}
        </p>
        <div class="flex justify-between items-center">
                <div class="flex flex-wrap items-center space-x-4 space-y-1">
                    @foreach ($job->tags as $tag)
                    <div class=" lg:px-5 lg:py-1 px-2 bg-black/10 hover:bg-gray-500  rounded-xl font-bold transition-colors duration-300">
                        <p wire:click='viewTag({{ $tag->id }})' class="text-black lg:text-sm text-[12px]">{{ $tag->name }}</p>
                    </div>
                    @endforeach
                </div>
            <time class="text-gray-500 time text-[12px] md:text-sm lg:text-xs">Posted {{ $date->diffForHumans() }}</time>
        </div>
    </div>
</a>