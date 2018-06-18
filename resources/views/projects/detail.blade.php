@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <h4>{{$project->title}}</h4>

                    @empty($alreadyEntried[0])
                        @if($projectUserId != $authUserId)

                        {!! link_to('/projects/entry/'.$project->id, 'エントリー', ['class' => 'btn btn-default']) !!}
                        @else

                            作成者はエントリーできませんよ
                        @endif

                    @else

                            エントリーずみ
                        @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
