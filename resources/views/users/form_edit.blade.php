<div class="form-group">
    <div class="center-block">
        <h4>名前</h4>
        {!! Form::text('name', $authUser->name, ['placeholder' => '（例）小貫将太', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="center-block">
        <h4>自己紹介</h4>
        {!! Form::textarea('self_introduction', $authUser->self_introduction, ['placeholder' => '（例）中央大学経済学部5年生です。趣味でWebアプリを開発しています。ex-Loco Partners, Inc. Software Engineer', 'class' => 'form-control']) !!}
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
        <h4>居住地</h4>
        {!! Form::select('livein', $prefectures, $authUser->livein, ['class' => 'form-control']) !!}
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
        {!! Form::submit('変更を保存', ['class' => 'btn btn-primary']) !!}
    </div>
</div>