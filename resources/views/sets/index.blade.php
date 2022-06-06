@extends('layouts.app')

@section('content')

    <div class="container mx-auto md:px-6 lg:px-8">


        <form>
            <div class="flex py-6">
                <div @click.away="open = false" id="dropdown-button" data-dropdown-toggle="dropdown"  class="relative flex-shrink-0 w-1/5 z-9 py-0.5 px-0.5 text-sm font-medium text-center text-gray-900 rounded-lg" x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-3 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Search by tag</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-58 z-30">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
                            <form method="GET" action="{{route('admin.index')}}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Edit Profile') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                        {{--                            TODO add edit profile route--}}
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                        @if(Auth::user()->name == 'Admin')
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-700">
                                <form method="GET" action="{{route('admin.index')}}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Admin Panel') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>


{{--                <div class="relative w-full">--}}
{{--                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required>--}}
{{--                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-pink-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>--}}
{{--                </div>--}}
            </div>
        </form>


        <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 grid-cols-3 gap-5 lg:gap-8 pt-19">

            @if (count($sets) == 0)
                {{--    Dodaj nowy zestaw--}}
                <div class="flex p-6 text-6xl bg-gray-100 border-2 border-gray-300 rounded-xl">
                    <div class="p-6">
                        <h2 class=" text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>
                        <h1 class="title-font text-lg font-medium text-gray-600 mb-3">The Catalyzer</h1>
                        <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                        <div class="flex flex-wrap ">
                            <button class="hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">Learn more</button>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($sets) > 0)
                    {{--    Dodaj nowy zestaw--}}
                    <div class="p-8 text-6xl bg-gray-100 border-1 rounded-xl">
                        <div class="text-center title-font text-lg font-medium text-gray-600 mb-3">
                            <form action="{{route('sets.create')}}">
                                <input type="submit" value="Create " class=" pt-8 object-center hover:scale-105 drop-shadow-md  shadow-cla-blue rounded-lg"/>
                            </form>
                        </div>
                    </div>


                @foreach ($sets as $set)
                    <div class="flex flex-col max-w-screen-xl  text-xl rounded-xl overflow-hidden shadow-lg">
                        <div class="p-6 md:items-center md:flex-row text-xl border-1 rounded-xl shadow-cla-blue overflow-hidden h-full w-full rounded-xl shadow-cla-violate bg-gradient-to-r from-pink-100 to-red-100 overflow-hidden">
    {{--                           <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}
    {{--                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}
    {{--                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}

                            <div class="p-6">
                                <h2 class=" text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>
                                <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{$set->name}}</h1>
                                <p class="leading-relaxed mb-3">{{$set->description}}</p>
                            </div>
                            <div class="pr-2">
                                <button class="hover:scale-105 drop-shadow-md  shadow-cla-blue rounded-lg">Learn more</button>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif

        </div>


        <div class="flex pt-20 pb-10 items-center justify-center">
            <div class="flex select-none space-x-1 text-gray-700">
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> Previous </a>
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> 1 </a>
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> 2 </a>
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> 3 </a>
                <span class="rounded-md px-4 py-2"> ... </span>
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> 10 </a>
                <a href="#" class="rounded-md bg-gray-200 px-4 py-2 transition duration-300 hover:bg-gray-400"> Next </a>
            </div>
        </div>



    </div>



@endsection
