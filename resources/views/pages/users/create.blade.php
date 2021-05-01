@extends('layouts.app')

@section('title') @lang('site.users') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('site.users')</a></li>
<li class="breadcrumb-item active">@lang('site.add_user')</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@lang('site.add_user')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="user_name">@lang('site.user_name')</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="@lang('site.user_name')">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone_number">@lang('site.phone_number')</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="@lang('site.phone_number')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">@lang('site.email_address')</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('site.email_address')">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">@lang('site.password')</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="@lang('site.password')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_number">@lang('site.id_number')</label>
                                    <input type="text" class="form-control" id="id_number" name="id_number" placeholder="@lang('site.id_number')">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="job">@lang('site.job')</label>
                                    <input type="text" class="form-control" id="job" name="job" placeholder="@lang('site.job')">
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
