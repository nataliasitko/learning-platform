@extends('layouts.app')

@section('content')

    <script>
        function handler() {
            return {
                fields: [],
                addNewField() {
                    this.fields.push({
                        txt1: '',
                        txt2: ''
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>

    <div class="min-h-screen font-sans">
        <div class="max-w-md mx-auto py-8">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div class="mt-6">
                        <div class="text-center font-semibold text-black">
                            Let's create a set!
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

                                <div class="form-group py-2 mx-auto max-w-2xl">
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

                                <div class="py-2 mx-auto max-w-2xl" x-data="{ show: true }">
                                    <div class="relative">
                                        <label for="set-description" class="px-1 text-md text-gray-600">Description
                                            <textarea type="text" name="description" id="set-description" rows="6"
                                                      class="form-control text-md block px-3 py-2 rounded-lg w-full
                                                bg-white border-gray-100 placeholder-gray-600 shadow-md
                                                focus:placeholder-gray-500 focus:bg-white
                                                focus:border-gray-600 focus:outline-none"></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-10" x-data="handler()">
                                <div class="col">
                                    <table class="table table-bordered align-items-center table-sm">
                                        <thead class="thead-light">
                                        <tr class="object-center">
                                            <th></th>
                                            <th class="px-16">Term</th>
                                            <th class="px-11">Definition</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <template x-for="(field, index) in fields" :key="index">
                                            <tr>
                                                <td x-text="index + 1"></td>
                                                <td><input x-model="field.txt1" type="text" name="txt1[]" class="form-control text-md block px-3
                                    py-2 rounded-lg w-full bg-white border-gray-100
                                    placeholder-gray-600 shadow-md focus:placeholder-gray-500
                                    focus:bg-white focus:border-gray-600 focus:outline-none"></td>
                                                <td><input x-model="field.txt2" type="text" name="txt2[]" class="form-control text-md block px-3
                                    py-2 rounded-lg w-full bg-white border-gray-100
                                    placeholder-gray-600 shadow-md focus:placeholder-gray-500
                                    focus:bg-white focus:border-gray-600 focus:outline-none"></td>
                                                <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td>
                                            </tr>
                                        </template>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">
                                                <button type="button" class="btn btn-info" @click="addNewField()">+ One more</button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
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
