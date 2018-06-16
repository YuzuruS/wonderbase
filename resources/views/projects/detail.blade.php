@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <h4>{{$project->title}}</h4>
                    @empty($alreadyEntried[0])
                        {!! link_to('/projects/entry/'.$project->id, 'エントリー', ['class' => 'btn btn-default']) !!}
                    @else
                        エントリーずみ
                        @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
