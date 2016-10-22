@extends('dashboard.app')

@section('content')
    @if($group->count() > 0)
        group
    @endif
@endsection