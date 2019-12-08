@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('bodalyc.management.invitations.index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('bodalyc.management.invitations.name') }}</th>
                                <th>{{ __('bodalyc.management.invitations.link') }}</th>
                                <th>{{ __('bodalyc.management.actions.edit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr>
                                    <td>{{$invitation->name}}</td>
                                    <td>
                                        <a href="{{$invitation->getLink()}}" class="link" target="_blank">{{$invitation->getLink()}}</a>
                                        <button class="btn btn-info btn-sm js-copy-link"><i class="far fa-copy"></i></button>
                                    </td>
                                    <td><a class="btn btn-primary btn-sm" href="{{route('invitations.edit', $invitation)}}"><i class="far fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('invitations.create') }}" class="btn btn-primary btn-lg">{{ __('bodalyc.management.invitations.create') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
