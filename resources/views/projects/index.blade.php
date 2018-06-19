@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    @foreach($projects as $project)
                        <h3>{!! link_to('/projects/'.$project->id, $project->title) !!}</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
