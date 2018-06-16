@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <div>
                    {{$project->title}}
                    {{$project->summary}}
                    </div>
                    <form action="{{ url('projects/entry/complete')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <div class="center-block">
                                <h4>プロジェクトオーナーにメッセージ</h4>
                                {!! Form::text('message', '', ['placeholder' => '副業がしたいです！', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="center-block">
                                {!! Form::hidden('id', $project->id, ['class' => 'form-control']) !!}
                                {!! Form::submit('エントリーを完了', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
