@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">

                <form action="{{ url('projects/form/complete')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="center-block">
                            <h4>タイトル</h4>
                            {!! Form::text('title', null, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>概要</h4>
                            {!! Form::textarea('summary', null, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>カテゴリ</h4>
                            {!! Form::text('category', null, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>募集職種</h4>
                            {!! Form::text('occupation', null, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>本文</h4>
                            {!! Form::textarea('description', null, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            {!! Form::submit('変更を保存', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection