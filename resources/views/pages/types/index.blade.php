@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.task_type')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->type }}</td>
                            <td>
                                <div class="d-flex">
                                    @if (auth()->user()->hasPermission('types_update')) 
                                    <a href="{{ route('types.edit',['type'=>$type->id]) }}" class="btn btn-primary btn-sm mx-1"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if (auth()->user()->hasPermission('types_show')) 
                                    <a href="{{ route('types.show',['type'=>$type->id]) }}" class="btn btn-secondary btn-sm mx-1"><i class="fas fa-eye"></i></a>
                                    @endif

                                    @if (auth()->user()->hasPermission('types_delete')) 
                                    <form action="{{ route('types.destroy',['type'=>$type->id]) }}" method="post">
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm mx-1 deleteConfirm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $types->links() !!}
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

            $(document).on('click','.delete',function(){
                Swal.fire({
                title: "{{ trans('site.are_you_sure') }}",
                icon: 'danger',
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
