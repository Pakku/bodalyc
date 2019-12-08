@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('bodalyc.management.invitations.create') }}</div>

                <div class="card-body">
                    <form action="{{ route('invitations.store') }}" method="post">
                        @csrf
                        <div class="form-group field text">
                            <label for="name">{{ __('bodalyc.management.invitations.name') }}</label>
                            <input type="text" id="name" name="name" placeholder="{{ __('bodalyc.management.invitations.name') }}" required="required" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="text">{{ __('bodalyc.management.invitations.text') }}</label>
                            <input type="text" id="text" name="text" placeholder="{{ __('bodalyc.management.invitations.text') }}" required="required" class="form-control" value="{{ __('bodalyc.management.invitations.defaultText') }}" />
                        </div>
                        <button class="btn btn-primary">{{ __('bodalyc.management.invitations.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
