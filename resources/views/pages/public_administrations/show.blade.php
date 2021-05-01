@extends('layouts.app')

@section('title') @lang('site.publicadministration') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('publicadministration.index') }}">@lang('site.publicadministration')</a></li>
<li class="breadcrumb-item active">@lang('site.show')</li>
@endsection


@section('content')
    <h1>hello</h1>
@endsection
