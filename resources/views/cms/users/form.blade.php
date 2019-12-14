@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('bodalyc.management.users.edit') }}
                </div>

                <div class="card-body">
                    @if ($user->comesFromInvitation())
                    <div class="link-wrapper">
                        <div class="comment">{{ __('bodalyc.management.users.invitation') }}: </div>
                        <a href="{{route('invitations.edit', $user->invitation)}}" class="link" target="_blank">{{$user->invitation->name}}</a>
                    </div>
                    @endif
                    <form method="post" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group field text">
                            <label for="name">{{ __('bodalyc.management.users.name') }}</label>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" id="name" name="name" placeholder="{{ __('bodalyc.management.users.name') }}" required="required" class="form-control" 
                                @if (old('name'))
                                    value="{{old('name')}}"
                                @elseif (isset($user)) 
                                    value="{{$user->name}}" 
                                @endif 
                            />
                        </div>
                        <div class="form-group field text">
                            <label for="email">{{ __('bodalyc.management.users.email') }}</label>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" id="email" name="email" placeholder="{{ __('bodalyc.management.users.email') }}" required="required" class="form-control" 
                                @if (old('email'))
                                    value="{{old('email')}}"
                                @elseif (isset($user)) 
                                    value="{{$user->email}}" 
                                @endif 
                            />
                        </div>
                        <div class="form-group field text">
                            <div class="form-check">
                                <input type="checkbox" id="superadmin" name="superadmin" class="form-check-input" value="1"
                                    @if (old('superadmin'))
                                        checked
                                    @elseif (isset($user) && $user->superadmin) 
                                        checked
                                    @endif 
                                />
                                <label for="superadmin">{{ __('bodalyc.management.users.superadmin') }}</label>
                            </div>
                        </div>
                        <a href="{{route('users.index')}}" class="btn btn-secondary">
                            {{ __('bodalyc.management.actions.back') }}
                        </a>
                        <button class="btn btn-primary">
                            {{ __('bodalyc.management.users.edit') }}
                        </button>
                    </form>

                    <form method="post" class="js-confirm mt-5" data-message="{{ __('bodalyc.management.users.confirmDelete') }}" action="{{ route('users.destroy', $user) }}" 
                    >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            {{ __('bodalyc.management.users.delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
