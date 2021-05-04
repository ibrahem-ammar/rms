@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.status_name')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->status }}</td>
                            <td>
                                <div class="d-flex">
                                    @if (auth()->user()->hasPermission('statuses_update'))
                                    <a href="{{ route('statuses.edit',['status'=>$status->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if (auth()->user()->hasPermission('statuses_show'))
                                    <a href="{{ route('statuses.show',['status'=>$status->id]) }}" class="btn btn-secondary btn-sm mx-2"><i class="fas fa-eye"></i></a>
                                    @endif

                                    @if (auth()->user()->hasPermission('statuses_delete'))
                                    <form action="{{ route('statuses.destroy',['status'=>$status->id]) }}" method="post">
                                        @csrf
                                        <button status="button" class="btn btn-danger btn-sm deleteConfirm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $statuses->links() !!}
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
