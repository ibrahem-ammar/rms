@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action=" {{route('statuses.store')}} " method="post" id="submit">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <!-- tasks statuses -->
                            <div class="form-group">
                                <label for="status">@lang('site.task_status')</label>
                                <input status="text" class="form-control 
                                @error('status') is-invalid @enderror " 
                                id="status" name="status" value="{{ old('status') }}" 
                                @error('status')aria-invalid="true"@enderror
                                placeholder="@lang('site.task_status')" required>
                                                                
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
                <form action="{{route('statuses.index')}}" method="get" id="cancel" class="d-none">
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