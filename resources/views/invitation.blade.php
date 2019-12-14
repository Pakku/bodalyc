@extends('layouts.invitation')

@section('title', __('bodalyc.invitation.title', ['name' => $invitation->name]))

@section('content')
<div class="opacity-layer">
</div>
<div class="container @if ($errors->any()) d-none @endif" id="step1">
    <div class="quote">
        "Esta parte de mi vida, este pequeño momento, lo llamo felicidad"
    </div>
    <div class="introduction">
        <div class="first-part">{{$invitation->name}}</div>
        <div class="second-part">{{$invitation->text}}</div>
    </div>
    <div class="row big-name">
        <div class="col-md-12">
            <div class="names-wrapper">
                <div class="ampersand">
                    &
                </div>
                <div class="names">
                    Lucía <br />
                    Carlos
                </div>
            </div>
        </div>
    </div>
    <div class="after-wrapper">
        <div class="date">
            29 de Febrero, 2020
        </div>
        <div class="more-information">
            <button class="button js-register">Más información</button>
        </div>
    </div>
</div>
<div class="container @if (!$errors->any()) d-none @endif" id="step2">

    <div class="row justify-content-center">
        <div class="col-md-6 ">
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
                    Hemos preparado esta web como un punto de información sobre la boda para nuestros seres queridos, por favor regístrate para poder acceder.
                    <form method="POST" action="{{ route('register') }}" class="text-center">
                        @csrf
                        <input type="hidden" name="invitation_id" value="{{$invitation->id}}" />
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                                <small class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <small class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña" name="password" required autocomplete="new-password">

                            @error('password')
                                <small class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirmation">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="password-confirmation" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-pink">Enviar</button><br />
                        <small><a href="/">Ya estoy registrado</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
