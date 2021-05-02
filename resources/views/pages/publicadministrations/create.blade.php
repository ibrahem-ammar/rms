@extends('layouts.app')

@section('title') @lang('site.publicadministration') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('publicadministrations.index') }}">@lang('site.publicadministration')</a></li>
<li class="breadcrumb-item active">@lang('site.add')</li>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="">
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

                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('site.cancel')</a>
                            <input type="submit" value="@lang('site.submit')" class="btn btn-success float-right ml-2">
                        </div>
                    </div>
                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
@endsection
