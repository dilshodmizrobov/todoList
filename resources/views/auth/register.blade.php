@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-auto">
                <h2 class="text-center mt-5 mb-3">Регистрация</h2>

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Имя</label>

                        <input  type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Электронный адрес</label>

                        <input  type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Пароль</label>

                        <input type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Повторите пароль</label>

                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-block">
                            Зарегистрироваться
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
