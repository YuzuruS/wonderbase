@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">

                <form action="{{ url('users/user_information/complete')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="center-block">
                            <h4>会員の種類</h4>
                            {{Form::radio('user_type', 1, true)}}
                            {{Form::label('個人')}}
                            {{Form::radio('user_type', 2)}}
                            {{Form::label('法人')}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>氏名</h4>
                            {!! Form::text('last_name', $authUser->last_name, ['placeholder' => '小貫', 'class' => 'form-control']) !!}
                            {!! Form::text('first_name', $authUser->first_name, ['placeholder' => '将太', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>ふりがな</h4>
                            {!! Form::text('last_name_kana', $authUser->last_name_kana, ['placeholder' => 'おぬき', 'class' => 'form-control']) !!}
                            {!! Form::text('first_name_kana', $authUser->first_name_kana, ['placeholder' => 'しょうた', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>住所</h4>
                            {!! Form::text('address', $authUser->address, ['placeholder' => '神奈川県横浜市鶴見区矢向6-1-12', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>生年月日</h4>
                            {!! Form::date('birthday', $authUser->birthday, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            <h4>性別</h4>
                            {{Form::radio('gender', 1, true)}}
                            {{Form::label('男性')}}
                            {{Form::radio('gender', 2)}}
                            {{Form::label('女性')}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="center-block">
                            {!! Form::hidden('id', $authUser->id, ['class' => 'form-control']) !!}
                            {!! Form::submit('変更を保存', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection