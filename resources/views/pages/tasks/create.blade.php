@extends('layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="  {{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/classic.date.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/themes/rtl.css') }}">

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action=" {{route('tasks.store')}} " method="post" id="submit">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- select the section of the task -->

                            <div class="form-group">
                                <label for="section">@lang('site.task_section')</label>
                                <select class="form-control select2" name="section" id="section" data-select="#section_id">
                                    <option value="" selected disabled hidden>@lang('site.choose')</option>
                                    <option value="user">@lang('site.user')</option>
                                    <option value="department">@lang('site.department')</option>
                                    <option value="administration">@lang('site.administration')</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the owner of the task -->

                            <div class="form-group">
                                <label for="section_id">@lang('site.choose') -</label>
                                <select class="form-control select2" name="section_id" id="section_id" required disabled>
                                    <option value="" selected disabled hidden>@lang('site.select_section')</option>


                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
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

                        <div class="col-md-6 col-sm-12">
                            <!-- select the type of the task -->

                            <div class="form-group">
                                <label for="type_id">@lang('site.type')</label>
                                <select class="form-control type" name="type_id" id="type_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_type')</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the status of the task -->

                            <div class="form-group">
                                <label for="status_id">@lang('site.status')</label>
                                <select class="form-control status" name="status_id" id="status_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_status')</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the start date of the task -->

                            <div class="form-groub">
                                <label for="start_date">@lang('site.start_date')</label>
                                <input type="text" name="start_date"
                                style="cursor: pointer;" id="start_date"
                                placeholder="@lang('site.start_date')"
                                class="form-control pickadate" readable>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the deadline of the task -->

                            <div class="form-groub">
                                <label for="deadline">@lang('site.deadline')</label>
                                <input type="text" name="deadline"
                                style="cursor: pointer;" id="deadline"
                                placeholder="@lang('site.deadline')"
                                class="form-control pickadate" readable>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <!-- select the working hours of the task -->

                            <div class="form-groub">
                                <label for="working_hours">@lang('site.working_hours')</label>
                                <select class="form-control" name="working_hours" id="working_hours">
                                    <option value="" selected disabled hidden>@lang('site.working_hours')</option>
                                    @for ($i = 1; $i < 8; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the benefit administration of the task -->

                            <div class="form-group">
                                <label for="benefit_administration_id">@lang('site.benefitadministration')</label>
                                <select class="form-control benefitadministration" name="benefit_administration_id" id="benefit_administration_id" required>
                                    <option value="" selected disabled hidden>@lang('site.benefitadministration')</option>


                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!-- select the user of the task -->

                            <div class="form-group">
                                <label for="user_id">@lang('site.user')</label>
                                <select class="form-control user" name="user_id" id="user_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_user')</option>


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

<script src=" {{ asset('adminlte/plugins/select2/js/select2.full.min.js') }} "></script>
<script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/picker.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/picker.date.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pickadate.js-3.6.2/lib/translations/ar.js') }}"></script>
<script src=" {{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }} "></script>

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
                var section = $(this).val();
                var labelText = '';
                var searchUrl = '';

                if (section == 'administration') {
                    labelText = "{{ trans('site.select_administration') }}";
                    searchUrl = "{{ route('administrations.search') }}";
                }
                if (section == 'department') {
                    labelText = "{{ trans('site.select_department') }}";
                    searchUrl = "{{ route('departments.search') }}";
                }
                if (section == 'user') {
                    labelText = "{{ trans('site.select_user') }}";
                    searchUrl = "{{ route('users.search') }}";
                }
				var taskOwnerElement= $($(this).data('select'));
                taskOwnerElement.siblings()[0].innerHTML = labelText;
                taskOwnerElement.removeAttr('disabled');

                taskOwnerElement.select2({
                dir: "ltr",

                theme: 'bootstrap4',

                ajax: {
                    url: searchUrl,
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
                            results: $.map(response,function (sectionData) {
                                return {
                                    text: sectionData.name,
                                    id: sectionData.id,
                                }
                            })
                        };
                    },
                    cache: true,
                },

            });

			});

            $('.benefitadministration').select2({
                dir: "ltr",

                theme: 'bootstrap4',

                ajax: {
                    url: "{{ route('administrations.search') }}",
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
                            results: $.map(response,function (administration) {
                                return {
                                    text: administration.name,
                                    id: administration.id,
                                }
                            })
                        };
                    },
                    cache: true,
                },

            });

            $('.user').select2({
                dir: "ltr",

                theme: 'bootstrap4',

                ajax: {
                    url: "{{ route('users.search') }}",
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
                            results: $.map(response,function (user) {
                                return {
                                    text: user.name,
                                    id: user.id,
                                }
                            })
                        };
                    },
                    cache: true,
                },

            });


        });
    </script>
@endpush
