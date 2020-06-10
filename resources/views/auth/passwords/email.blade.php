@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-sm-9 col-md-7 col-lg-5 mx-auto">
            <h2 class="text-center mt-5 mb-3">Восстановление пароля</h2>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Электронный адрес</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
