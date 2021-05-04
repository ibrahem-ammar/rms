@extends('layouts.app')

@section('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action=" {{route('tasks.store')}} " method="post" id="submit">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-6">
                            <!-- select the administration of the task -->

                            <div class="form-group">
                                <label for="section">@lang('site.section')</label>
                                <select class="form-control select2" name="section" id="section" data-select="#section_id">
                                    <option value="" selected disabled hidden>@lang('site.select_section')</option>
                                    <option value="user">@lang('site.user')</option>
                                    <option value="department">@lang('site.department')</option>
                                    <option value="administration">@lang('site.administration')</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <!-- select the department of the task -->

                            <div class="form-group">
                                <label for="section_id">@lang('site.department')</label>
                                <select class="form-control select2" name="section_id" id="section_id" required disabled>
                                    <option value="" selected disabled hidden>@lang('site.select_section')</option>

                                    {{-- @forelse ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @empty
                                        <option value="">@lang('site.no_departments')</option>
                                    @endforelse
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-6">
                            <!-- select the user of the task -->

                            <div class="form-group">
                                <label for="user_id">@lang('site.user')</label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_user')</option>

                                    {{-- @forelse ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @empty
                                        <option value="">@lang('site.no_users')</option>
                                    @endforelse
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-6">
                            <!-- name of task -->
                            <div class="form-group">
                                <label for="name">@lang('site.task_name')</label>
                                <input type="text" class="form-control
                                @error('name') is-invalid @enderror"
                                id="name" name="name"
                                @error('name')aria-invalid="true"@enderror
                                placeholder="@lang('site.task_name')" required>

                            </div>
                        </div>

                        <div class="col-6">
                            <!-- select the type of the task -->

                            <div class="form-group">
                                <label for="type_id">@lang('site.type')</label>
                                <select class="form-control type" name="type_id" id="type_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_type')</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <!-- select the status of the task -->

                            <div class="form-group">
                                <label for="status_id">@lang('site.status')</label>
                                <select class="form-control status" name="status_id" id="status_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_status')</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- add note to the task -->

                            <div class="form-group">
                                <label for="note">@lang('site.note')</label>
                                <textarea class="form-control"
                                    rows="3" placeholder="@lang('site.add') ..."
                                    id="note" name="note">{{ old('note') }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="col-6">
                            <!-- select the public administration of the task -->

                            <div class="form-groub">
                                <label for="start_date">@lang('site.start_date')</label>
                                <input type="text" name="start_date" style="cursor: pointer;" id="start_date" class="form-control pickadate" readable>
                            </div>
                        </div> --}}

                        {{-- <div class="col-6">
                            <!-- select the public administration of the departmet -->

                            <div class="form-group">
                                <label for="administration_id">@lang('site.select_administration')</label>
                                <select class="form-control select2" name="administration_id" id="administration_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_administration')</option>

                                    @forelse ($administrations as $administration)
                                        <option value="{{ $administration->id }}">{{ $administration->name }}</option>
                                    @empty
                                        <option value="">@lang('site.no_administrations')</option>
                                    @endforelse
                                </select>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary cancel">@lang('site.cancel')</button>
                            <button type="button" class="btn btn-success float-right ml-2 add">@lang('site.submit')</button>
                        </div>
                    </div>
                </form>
                {{--  cancel button --}}
                <form action="{{route('tasks.index')}}" method="get" id="cancel" class="d-none">
                @csrf
                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
@endsection



@push('scripts')
   <script>
        $(document).ready(function() {
            var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
            $('.status').select2({
                dir: "ltr",

                theme: 'bootstrap4',

                ajax: {
                    url: "{{ route('statuses.search') }}",
                    type: "post",
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },

                    processResults: function (response) {
                        return {
                            results: $.map(response,function (taskStatus) {
                                return {
                                    text: taskStatus.status,
                                    id: taskStatus.id,
                                }
                            })
                        };
                    },
                    cache: true,
                },

            });

            $('.type').select2({
                dir: "ltr",

                theme: 'bootstrap4',

                ajax: {
                    url: "{{ route('types.search') }}",
                    type: "post",
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },

                    processResults: function (response) {
                        return {
                            results: $.map(response,function (tasktype) {
                                return {
                                    text: tasktype.type,
                                    id: tasktype.id,
                                }
                            })
                        };
                    },
                    cache: true,
                },

            });

            function formAlert(form,type,title,message,confirmColor,cancelColor) {
                Swal.fire({
                    title: title,
                    text: message,
                    icon: type,
                    showCancelButton: true,
                    confirmButtonColor: confirmColor,
                    cancelButtonColor: cancelColor,
                    cancelButtonText: "{{ trans('site.cancel') }}",
                    confirmButtonText: "{{ trans('site.confirm') }}"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(form).submit();
                    }
                });
            }

            $(document).on('click','.cancel',function(){
                formAlert('#submit','question',"{{ trans('site.are_you_sure') }}","{{ trans('site.unable_to_revert') }}",'#d33','#28a745');

            });

            $(document).on('click','.add',function(){
                formAlert('#submit','question',"{{ trans('site.are_you_sure') }}","",'#d33','#28a745');
            });

            $('.pickadate').pickadate({
                format : 'yyyy-mm-dd',
                selectMonth : true ,
                seletYear : true ,
                clear : 'Clear' ,
                closeOnSelect : true
            });

            $(document).on('change','#section',function () {
				$($(this).data('select')).removeAttr('disabled');
			});

        });
    </script>
@endpush
