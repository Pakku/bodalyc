@extends('layouts.invitation')

@section('title', config('app.name', 'Laravel'))

@section('content')
<div class="opacity-layer">
</div>
<div class="container" id="step2">

    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-header">
                    <div class="row big-name">
                        <div class="col-md-12">
                            <div class="names-wrapper">
                                <div class="ampersand">
                                    &amp;
                                </div>
                                <div class="names">
                                    Lucía <br>
                                    Carlos
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('guestlogin') }}" class="text-center">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <small class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña" name="password" required autocomplete="current-password">

                            @error('password')
                                <small class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-pink">Entrar</button><br />
                        @if (Route::has('password.request'))
                            <small class="d-block mt-3"><a href="{{ route('password.request') }}">
                                {{ __('auth.forgot') }}
                            </a></small>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
