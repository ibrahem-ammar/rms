@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action=" {{route('branches.store')}} " method="post" id="submit">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <!-- name of branch -->
                            <div class="form-group">
                                <label for="name">@lang('site.branch_name')</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" @error('name')aria-invalid="true"@enderror  placeholder="@lang('site.branch_name')" required>
                                                                
                            </div>
                        </div>

                        <div class="col-6">
                            <!-- select the manager of the branch -->

                            <div class="form-group">
                                <label for="user_id">@lang('site.select_branch_manager')</label>
                                <select class="form-control select2" name="user_id" id="user_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_branch_manager')</option>
                                
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @empty
                                        <option value="">@lang('site.no_users')</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- select the public administration of the branch -->

                            <div class="form-group">
                                <label for="publicadministration_id">@lang('site.select_publicadministration')</label>
                                <select class="form-control select2" name="publicadministration_id" id="publicadministration_id" required>
                                    <option value="" selected disabled hidden>@lang('site.select_publicadministration')</option>
                                
                                    @forelse ($publicadministrations as $publicadministration)
                                        <option value="{{ $publicadministration->id }}">{{ $publicadministration->name }}</option>
                                    @empty
                                        <option value="">@lang('site.no_publicadministrations')</option>
                                    @endforelse
                                </select>
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
                <form action="{{route('branches.index')}}" method="get" id="cancel" class="d-none">
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
            $('.select2').select2({
                dir: "ltr",
                theme: 'bootstrap4',
            });
            $(document).on('click','.cancel',function(){
                Swal.fire({
                title: "{{ trans('site.are_you_sure') }}",
                text: "{{ trans('site.unable_to_revert') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "{{ trans('site.cancel') }}",
                confirmButtonText: "{{ trans('site.confirm') }}"
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#cancel').submit();
                }
            })
            });

            
            $(document).on('click','.add',function(){
                Swal.fire({
                title: "{{ trans('site.are_you_sure') }}",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                cancelButtonText: "{{ trans('site.cancel') }}",
                confirmButtonText: "{{ trans('site.confirm') }}"
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#submit').submit();
                }
            })
            });
            
        });
    </script>
@endpush