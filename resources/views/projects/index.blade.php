@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    @foreach($projects as $prj)
                    <h3>{{$prj->title}}</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
