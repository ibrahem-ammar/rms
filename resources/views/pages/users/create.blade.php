@extends('layouts.app')

@section('sryles')
    <!-- Select2 -->
    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

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
                                <select id="working_at" class="form-control select2" name="working_at">
                                    <option selected disabled hidden>@lang('site.choose')</option>
                                    <option value="publicadministration">@lang('site.publicadministration')</option>
                                    <option value="branch">@lang('site.branch')</option>
                                    <option value="administration">@lang('site.administration')</option>
                                    <option value="department">@lang('site.department')</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="section_id">@lang('site.section_id')</label>
                                <select id="section_id" class="form-control select2" name="section_id" disabled>
                                    <option selected disabled hidden>@lang('site.choose')</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="permissions">@lang('site.permissions')</label>
                                <select id="permissions" class="form-control select2" name="permissions[]" multiple="multiple">
                                    <option selected disabled hidden>@lang('site.permissions')</option>
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">@lang('site.'.$permission->name)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group" id="myModal">
                                <label  for="roles">@lang('site.roles')</label>
                                <select class="form-control select2" id="roles"  name="roles[]" multiple="multiple">
                                    <option disabled hidden>@lang('site.roles')</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">@lang('site.'.$role->name)</option>
                                    @endforeach
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

@section('scriptlinks')
    {{-- <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script> --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                dir: "ltr",
                theme: 'bootstrap4',
            })
        });
    </script>
@endpush
