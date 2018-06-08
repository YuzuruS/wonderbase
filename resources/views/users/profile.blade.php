@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{$user->id}}
            </div>
        </div>
    </div>
@endsection
