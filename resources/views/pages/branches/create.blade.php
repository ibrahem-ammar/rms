@extends('layouts.app')

@section('title') @lang('site.publicadministration') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('publicadministration.index') }}">@lang('site.publicadministration')</a></li>
<li class="breadcrumb-item active">@lang('site.add')</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@lang('site.add_publicadministration')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('publicadministration.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">@lang('site.administration_name')</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('site.administration_name')">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>@lang('site.select_user')</label>
                                    <select class="form-control" name="user_id">
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option value="">@lang('site.no_users')</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
