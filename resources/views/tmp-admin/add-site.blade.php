@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add New Site UI</h1>

            <form action="/admin/add/site" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" value="1.0.0" name="version" placeholder="Ui Version">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="ui">
                </div>
                <div class="form-group">
                    <select name="site" id="" class="form-group">
                        @foreach(\Site::getAll() as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
