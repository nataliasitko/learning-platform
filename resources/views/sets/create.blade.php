@extends('sets.name')

@section('create')

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

{{--    <!-- create set -->--}}
{{--    <div class="max-w-2xl mx-auto">--}}
{{--        <div class="relative text-gray-700 grid grid-cols-2">--}}
{{--            <label>--}}
{{--                <input class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border border-gray-200 rounded-l-lg focus:shadow-outline" type="text" placeholder="Term..."/>--}}
{{--            </label>--}}
{{--            <label>--}}
{{--                <input class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border border-gray-200 rounded-r-lg focus:shadow-outline" type="text" placeholder="Definition..."/>--}}
{{--            </label>--}}
{{--            <button class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-indigo-600 rounded-r-lg hover:bg-indigo-500 focus:bg-indigo-700">Add</button>--}}
{{--            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Next</a>--}}
{{--        </div>--}}

{{--    </div>--}}

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

    <div class="row" x-data="handler()">
        <div class="col">
            <table class="table table-bordered align-items-center table-sm">
                <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Term</th>
                    <th>Definition</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <template x-for="(field, index) in fields" :key="index">
                    <tr>
                        <td x-text="index + 1"></td>
                        <td><input x-model="field.txt1" type="text" name="txt1[]" class="form-control"></td>
                        <td><input x-model="field.txt2" type="text" name="txt2[]" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index)">&times;</button></td>
                    </tr>
                </template>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><button type="button" class="btn btn-info" @click="addNewField()">+ One more</button></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
