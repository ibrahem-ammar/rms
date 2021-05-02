@extends('layouts.app')

@section('title') @lang('site.users') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('site.users')</a></li>
<li class="breadcrumb-item active">@lang('site.add_user')</li>
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
                                <label for="name">@lang('site.user_name')</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="@lang('site.user_name')">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone_number">@lang('site.phone_number')</label>
                                <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="@lang('site.phone_number')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_number">@lang('site.id_number')</label>
                                <input type="text" id="id_number" name="id_number" class="form-control" placeholder="@lang('site.id_number')">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="job">@lang('site.job')</label>
                                <input type="text" id="job" name="job" class="form-control" placeholder="@lang('site.job')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">@lang('site.email')</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">@lang('site.password')</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="@lang('site.password')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="working_at">@lang('site.working_at')</label>
                                <select id="working_at" class="form-control custom-select" name="working_at">
                                    <option selected disabled hidden>@lang('site.choose')</option>
                                    <option>On Hold</option>
                                    <option>Canceled</option>
                                    <option>Success</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="section_id">@lang('site.section_id')</label>
                                <select id="section_id" class="form-control custom-select" name="section_id" disabled>
                                    <option selected disabled hidden>@lang('site.choose')</option>
                                    <option>On Hold</option>
                                    <option>Canceled</option>
                                    <option>Success</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="permissions">@lang('site.permissions')</label>
                                <select id="permissions" class="form-control custom-select" name="permissions">
                                    <option selected disabled hidden>@lang('site.permissions')</option>
                                    <option>On Hold</option>
                                    <option>Canceled</option>
                                    <option>Success</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="roles">@lang('site.roles')</label>
                                <select id="roles" class="form-control custom-select" name="roles">
                                    <option selected disabled hidden>@lang('site.roles')</option>
                                    <option>On Hold</option>
                                    <option>Canceled</option>
                                    <option>Success</option>
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
