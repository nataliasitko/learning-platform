@extends('layouts.app')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Search</h3>
                </div>
            <div class="panel-body">
        <div class="form-group">
            <input type="text" class="form-controller" id="search" name="search"/>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Note</th>
        </tr>
        </thead>
    <tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
