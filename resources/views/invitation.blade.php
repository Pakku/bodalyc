@extends('layouts.invitation')

@section('content')
<div class="opacity-layer">
</div>
<div class="container">
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
@endsection
