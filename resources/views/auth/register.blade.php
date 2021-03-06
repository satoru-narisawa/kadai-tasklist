@extends("layouts.app")

@section("content")
    <div class="text-center">
        <h1>アカウント登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(["route"=>"signup.post"]) !!} <!-- フォームを設置し、アクション先（ルーティング）をsignup.post(名前付きルート)に指定　未指定のためpostになる-->
                <div class="form-group">
                    {!! Form::label("name","名前") !!}
                    {!! Form::text("name",old("name"),["class"=>"form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("email","メールアドレス") !!}
                    {!! Form::email("email",old("email"),["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("password","パスワード") !!}
                    {!! Form::password("password",["class"=>"form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("password_confirmation","確認のためパスワードをもう一度入力してください") !!}
                    {!! Form::password("password_confirmation",["class"=>"form-control"]) !!}
                </div>
                
                {!! Form::submit("アカウント登録",["class" => "btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection