@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($invitation))
                        {{ __('bodalyc.management.invitations.edit') }}
                    @else
                        {{ __('bodalyc.management.invitations.create') }}
                    @endif
                </div>

                <div class="card-body">
                    @if (isset($invitation))
                    <small>Última modificación por {{$invitation->user->name}} en {{$invitation->updated_at}}</small>
                    <div class="link-wrapper">
                        <div class="comment">{{ __('bodalyc.management.invitations.link') }}: </div>
                        <a href="{{$invitation->getLink()}}" class="link" target="_blank">{{$invitation->getLink()}}</a>
                        <button class="btn btn-info btn-sm js-copy-link"><i class="far fa-copy"></i></button>
                    </div>
                    @endif
                    <form method="post"
                        @if (isset($invitation)) 
                            action="{{ route('invitations.update', $invitation) }}"
                        @else
                            action="{{ route('invitations.store') }}" 
                        @endif  
                    >
                        @csrf
                        @if (isset($invitation))
                            @method('PUT')
                            <div class="form-group field text">
                                <label for="identifier">{{ __('bodalyc.management.invitations.identifier') }}</label>
                                @error('identifier')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" id="identifier" name="identifier" placeholder="{{ __('bodalyc.management.invitations.identifier') }}"  required="required" class="form-control" 
                                    @if (old('identifier'))
                                        value="{{old('identifier')}}"
                                    @else 
                                        value="{{$invitation->identifier}}"
                                    @endif
                                />
                            </div>
                        @endif
                        <div class="form-group field text">
                            <label for="name">{{ __('bodalyc.management.invitations.name') }}</label>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" id="name" name="name" placeholder="{{ __('bodalyc.management.invitations.name') }}" required="required" class="form-control" 
                                @if (old('name'))
                                    value="{{old('name')}}"
                                @elseif (isset($invitation)) 
                                    value="{{$invitation->name}}" 
                                @endif 
                            />
                        </div>
                        <div class="form-group">
                            <label for="text">{{ __('bodalyc.management.invitations.text') }}</label>
                            @error('text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" id="text" name="text" placeholder="{{ __('bodalyc.management.invitations.text') }}" required="required" class="form-control" 
                                @if (old('text'))
                                    value="{{old('text')}}"
                                @elseif (isset($invitation)) 
                                    value="{{$invitation->text}}"
                                @else
                                    value="{{ __('bodalyc.management.invitations.defaultText') }}"
                                @endif  
                            />
                        </div>
                        <a href="{{route('invitations.index')}}" class="btn btn-secondary">
                            {{ __('bodalyc.management.actions.back') }}
                        </a>
                        <button class="btn btn-primary">
                            @if (isset($invitation))
                                {{ __('bodalyc.management.invitations.edit') }}
                            @else
                                {{ __('bodalyc.management.invitations.create') }}
                            @endif
                        </button>
                    </form>

                    @if (isset($invitation))
                    <form method="post" class="js-confirm mt-5" data-message="{{ __('bodalyc.management.invitations.confirmDelete') }}" action="{{ route('invitations.destroy', $invitation) }}" 
                    >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            {{ __('bodalyc.management.invitations.delete') }}
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
