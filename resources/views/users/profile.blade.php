@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">
                <img src="{{ asset('images/users/no-profilepic.png') }}" class="profile-image" alt="プロフィール写真" width="100px">

                @if($user->id == Auth::user()->id)
                    <div>
                        {!! link_to('users/edit', 'プロフィールを編集する') !!}
                    </div>
                @endif

                <h4>{{$user->name}}</h4>
            </div>

            <div class="text-center">
                <section id="self-introduction">
                    @isset($user->self_introduction)
                        <h4>自己紹介</h4>
                        <p>{{$user->self_introduction}}</p>
                    @endisset
                    @isset($user->gender)
                        <h4>性別</h4>
                        <p>{{$user->gender}}</p>
                    @endisset
                    @isset($user->birthday)
                        <h4>生年月日</h4>
                        <p>{{$user->birthday}}</p>
                    @endisset

                    {{--募集したプロジェクトを表示--}}
                        <h4>募集したプロジェクト</h4>
                        @isset($authProjects)
                            @foreach($authProjects as $authProject)
                                {!! link_to('projects/'.$authProject->id, $authProject->title) !!}
                            @endforeach
                        @endisset

                        {{--応募したプロジェクトを表示--}}
                        <h4>応募したプロジェクト</h4>
                        @isset($entriedProjects)
                            @foreach($entriedProjects as $entriedProject)
                                {!! link_to('projects/'.$entriedProject->id, $entriedProject->title) !!}
                            @endforeach
                        @endisset

                </section>
            </div>

        </div>
    </div>
@endsection