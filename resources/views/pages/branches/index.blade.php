@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.branch_name')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $branch->name }}</td>
                            <td>
                                <div class="d-flex">
                                    @if ((auth()->user()->owns($branch) OR auth()->user()->hasPermission('branches_update_all')) )
                                    <a href="{{ route('branches.edit',['branch'=>$branch->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if ((auth()->user()->owns($branch) OR auth()->user()->hasPermission('branches_show_all')) )
                                    <a href="{{ route('branches.show',['branch'=>$branch->id]) }}" class="btn btn-secondary btn-sm mx-2"><i class="fas fa-eye"></i></a>
                                    @endif

                                    @if ((auth()->user()->owns($branch) OR auth()->user()->hasPermission('branches_delete_all')) )
                                    <form action="{{ route('branches.destroy',['branch'=>$branch->id]) }}" method="post">
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm deleteConfirm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $branches->links() !!}
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
