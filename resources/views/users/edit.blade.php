@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="text-center">
                <img src="{{ asset('images/users/no-profilepic.png') }}" class="profile-image" alt="プロフィール写真" width="100px">

                <form action="{{ url('users/edit/complete')}}" method="POST">
                    {{csrf_field()}}

                    @include('users.form_edit')

                </form>

            </div>
        </div>
    </div>
@endsection