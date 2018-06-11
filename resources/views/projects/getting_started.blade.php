@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <h1 style="color: #d62728; font-size: 96px;">Wonderbase</h1>
                    <h4>あなたのプロジェクトをサポートしてくれる仲間を募集しよう。</h4>
                        {!! link_to('/projects/form', 'プロジェクトを掲載', ['class' => 'btn btn-primary']) !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
