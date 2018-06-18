@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">

                <form action="{{ url('projects/edit/complete')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="center-block">
                            <h4>タイトル</h4>
                            {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>概要</h4>
                            {!! Form::textarea('summary', $project->summary, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>カテゴリ</h4>
                            {!! Form::text('category', $project->category, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>募集職種</h4>
                            {!! Form::text('occupation', $project->occupation, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>本文</h4>
                            {!! Form::textarea('description', $project->description, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>公開設定</h4>
                            {!! Form::select('is_published', [0 => '非公開', 1 => '公開'], $project->is_published, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            {!! Form::hidden('id', $project->id, ['class' => 'form-control']) !!}
                            {!! Form::submit('変更を保存', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection