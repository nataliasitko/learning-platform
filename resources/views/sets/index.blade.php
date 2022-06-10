@extends('layouts.app')

@section('content')

    <script>
        // function showTag(str) {
        //     if (str == "") {
        //         document.getElementById("txtHint").innerHTML = "";
        //         return;
        //     } else{
        //         var xmlhttp = new XMLHttpRequest();
        //         xmlhttp.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 document.getElementById("txtHint").innerHTML = this.responseText;
        //             }
        //         };
        //         xmlhttp.open("GET","getTag.php?q="+str,true);
        //         xmlhttp.send();
        //     }
        // }
        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("demo").innerHTML = this.responseText;
            }
            xhttp.open("GET", "ajax_info.txt", true);
            xhttp.send();
        }
    </script>

    <div class="mb-3 pt-5">
        <form>
            <select name="users" onchange="showTag(this.value)">
                <option value="" class="text-md block rounded-lg w-full bg-white border-gray-100
         placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">Select a tag:</option>
                <option value="1" class="text-md block rounded-lg w-full bg-white border-gray-100
         placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">1</option>
                <option value="2" class="text-md block rounded-lg w-full bg-white border-gray-100
         placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">2</option>
                <option value="3" class="text-md block rounded-lg w-full bg-white border-gray-100
         placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">3</option>
                <option value="4" class="text-md block rounded-lg w-full bg-white border-gray-100
         placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">4</option>
            </select>
        </form>
    </div>


        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-cols-3 gap-5 lg:gap-8 pt-19">

            @if (count($sets) == 0)
                {{--    Dodaj nowy zestaw--}}
                <div class="p-8 text-6xl bg-gray-200 border-2 rounded-xl">
                    <div class="text-center title-font text-lg font-medium text-gray-600 mb-3">
                        <form action="{{route('sets.name')}}">
                            <input type="submit" value="Create " class=" pt-8 object-center hover:scale-105 drop-shadow-md  shadow-cla-blue rounded-lg"/>
                        </form>
                    </div>
                </div>
            @endif

            @if (count($sets) > 0)
                    {{--    Dodaj nowy zestaw--}}
                    <div class="p-8 text-6xl bg-gray-200 border-2 rounded-xl">
                        <div class="text-center title-font text-lg font-medium text-gray-600 mb-3">
                            <form action="{{route('sets.name')}}">
                                <input type="submit" value="Create " class=" pt-8 object-center hover:scale-105 drop-shadow-md  shadow-cla-blue rounded-lg"/>
                            </form>
                        </div>
                    </div>


                @foreach ($sets as $set)
                        <div class="py-8 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
{{--                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="hidden sm:inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">--}}
{{--                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>--}}
{{--                                </button>--}}
{{--                                <!-- Dropdown menu -->--}}
{{--                                <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">--}}
{{--                                    <ul class="py-1" aria-labelledby="dropdownButton">--}}
{{--                                        <li>--}}
{{--                                            --}}
{{--                                        </li>--}}

{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                            <div class="flex flex-col items-center pb-10">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$set->name}}</h5>
                                <span class="p-4 text-sm text-gray-500 dark:text-gray-400">{{$set->description}}</span>
                                <span class="p-4 text-sm text-gray-500 dark:text-gray-400">{!! $set->note !!}</span>
                                <div class="flex mt-4 space-x-3 lg:mt-6">
{{--                                    <a class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white from-pink-400 to-red-400 bg-gradient-to-r hover:from-pink-500 hover:to-red-500 hover:bg-gradient-to-r rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{route('sets.show'), $set->id}}">Show</a>--}}
                                    <div class="inline-flex items-center py-2 mb-1 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                                        <form action="sets/{{ $set->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button>Delete Note</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                    <div class="flex flex-col max-w-screen-xl  text-xl rounded-xl overflow-hidden shadow-xl">--}}
{{--                        <div class="p-6 md:items-center md:flex-row text-xl border-1 rounded-xl shadow-gray-800 shadow-cla-blue h-full w-full rounded-xl shadow-cla-violate overflow-auto from-pink-200 to-red-200 bg-gradient-to-r  ">--}}
{{--    --}}{{--                           <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}
{{--    --}}{{--                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}
{{--    --}}{{--                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="https://images.unsplash.com/photo-1618172193622-ae2d025f4032?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80" alt="blog">--}}

{{--                            <div class="p-6">--}}
{{--                                <h2 class=" text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>--}}
{{--                                <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{$set->name}}</h1>--}}
{{--                                <p class="leading-relaxed mb-3">{{$set->description}}</p>--}}
{{--                            </div>--}}
{{--                            <div class="pr-2">--}}
{{--                                <button class="hover:scale-105 drop-shadow-md  shadow-cla-blue rounded-lg">Learn more</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                @endforeach

            @endif



        </div>
    <div class="p-8">
        {{ $sets->links() }}
    </div>
@endsection
