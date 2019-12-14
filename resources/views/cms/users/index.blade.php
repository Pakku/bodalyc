@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('bodalyc.management.users.index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('bodalyc.management.users.name') }}</th>
                                <th>{{ __('bodalyc.management.users.invitation') }}</th>
                                <th>{{ __('bodalyc.management.actions.edit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td class="link-wrapper">
                                        @if ($user->comesFromInvitation())
                                            <a href="{{route('invitations.edit', $user->invitation)}}" target="_blank" class="link">{{$user->invitation->name}}</a>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary btn-sm" href="{{route('users.edit', $user)}}"><i class="far fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
