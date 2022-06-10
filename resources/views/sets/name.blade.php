@extends('layouts.app')

@section('content')

    <script src="https://cdn.tiny.cloud/1/tbxi4ctcaqb29ew3juifuua30bauk18o3kmnlnzjb6zi7cz9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
            tinymce.init({
            selector: "#set-note",
            plugins: "emoticons",
            toolbar: "emoticons",
                plugins: "save",
                toolbar: "save",
            toolbar_location: "bottom",
            menubar: false,
            toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
        });
    </script>


    <div class="min-h-screen font-sans">
        <div class="max-w-3xl mx-auto py-8">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div class="mt-6">
                        <div class="text-center font-semibold text-black">
                            Let's create a note!
                        </div>


                    <!-- New Set Form -->
                        <form action="{{route('sets.store')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Set Name -->
                            <div class="form-group px-6">
{{--                                <label for="task-name" class="col-sm-3 control-label">name</label>--}}

{{--                                <div class="col-sm-6">--}}
{{--                                    <input type="text" name="name" id="task-name" class="form-control">--}}
{{--                                </div>--}}

                                <div class="form-group py-2 mx-auto max-w-md">
                                    <label for="name" class="px-1 text-md text-gray-600">Name</label>
                                    <input type="text" name="name" id="set-name" class=" form-control text-md block px-3
                                    py-2 rounded-lg w-full bg-white border-gray-100
                                    placeholder-gray-600 shadow-md focus:placeholder-gray-500
                                    focus:bg-white focus:border-gray-600 focus:outline-none">
                                </div>
                            </div>

                            <!-- Set Description -->
                            <div class="form-group px-6">
{{--                                <label for="task-description" class="col-sm-3 control-label">description</label>--}}

{{--                                <div class="col-sm-6">--}}
{{--                                    <input type="text" name="description" id="task-description" class="form-control">--}}
{{--                                </div>--}}

                                <div class="py-2 mx-auto max-w-md" x-data="{ show: true }">
                                    <div class="relative">
                                        <label for="set-description" class="px-1 text-md text-gray-600">Description
                                            <textarea type="text" name="description" id="set-description" rows="4"
                                                      class="form-control text-md block px-3 py-2 rounded-lg w-full
                                                bg-white border-gray-100 placeholder-gray-600 shadow-md
                                                focus:placeholder-gray-500 focus:bg-white
                                                focus:border-gray-600 focus:outline-none"></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>

                                <div class="form-group px-2 max-w-3xl mb-8">
{{--                                    <div class="form-group py-2 px-4 bg-white rounded-b-lg dark:bg-gray-800">--}}
{{--                                        <label for="set-note">--}}
{{--                                        <textarea type="text" id="set-note" rows="8" class="form-control block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Your note..." required></textarea>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
                                    <div class="relative">
                                        <label for="set-note" class="px-1 text-md text-gray-600">Note
                                            <textarea type="text" name="note" id="set-note" rows="4"
                                                      class="form-control text-md block px-3 py-2 rounded-lg w-full
                                                bg-white border-gray-100 placeholder-gray-600 shadow-md
                                                focus:placeholder-gray-500 focus:bg-white
                                                focus:border-gray-600 focus:outline-none"></textarea>
                                        </label>
                                    </div>
                                </div>

                            <!-- Add Task Button -->
                            <div class="form-group px-6">
                                <div class="col-sm-offset-3 col-sm-6">
{{--                                    <button type="submit" class="btn btn-default">--}}
{{--                                        <i class="fa fa-plus"></i> Add Task--}}
{{--                                    </button>--}}
                                    <button class="btn form-group mx-auto max-w-2xl mt-3 text-lg font-semibold
                                            from-pink-400 to-red-400 bg-gradient-to-r w-full text-white rounded-lg
                                            px-6 py-3 block shadow-xl hover:text-white hover:from-pink-500 hover:to-red-500 hover:bg-gradient-to-r"
                                            type="submit">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <div class="p-4 mt-8">
                @include('common.errors')
            </div>
        </div>
    </div>
@endsection
