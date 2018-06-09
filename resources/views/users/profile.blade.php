@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">
                <img src="{{ asset('images/users/no-profilepic.png') }}" class="profile-image" alt="プロフィール写真" width="100px">

                @if($user->id === Auth::user()->id)
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
                </section>
            </div>

        </div>
    </div>
@endsection