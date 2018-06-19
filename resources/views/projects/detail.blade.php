@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <h4>{{$project->title}}</h4>

                        @if($projectUserId == $authUserId)
                            {!! link_to('/projects/edit/'.$project->id, '編集', ['class' => 'btn btn-primary']) !!}
                        @endif

                        @empty($alreadyEntried[0])

                            @if($projectUserId != $authUserId)
                                {!! link_to('/projects/entry/'.$project->id, 'エントリー', ['class' => 'btn btn-default']) !!}
                            @else
                                プロジェクトの作成者はエントリーできません。
                            @endif

                        @else
                            あなたはすでにエントリー済みです。
                        @endempty

                </div>
            </div>
        </div>
    </div>
@endsection
