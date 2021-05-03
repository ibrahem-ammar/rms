@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.publicadministration_name')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($publicadministrations as $publicadministration)
                        <tr>
                            <td>{{ $publicadministration->name }}</td>
                            <td>
                                <div class="d-flex">
                                    @if ((auth()->user()->owns($publicadministration) OR auth()->user()->hasPermission('publicadministrations_update_all')) )
                                    <a href="{{ route('publicadministrations.edit',['publicadministration'=>$publicadministration->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if ((auth()->user()->owns($publicadministration) OR auth()->user()->hasPermission('publicadministrations_show_all')) )
                                    <a href="{{ route('publicadministrations.show',['publicadministration'=>$publicadministration->id]) }}" class="btn btn-secondary btn-sm mx-2"><i class="fas fa-eye"></i></a>
                                    @endif

                                    @if ((auth()->user()->owns($publicadministration) OR auth()->user()->hasPermission('publicadministrations_delete_all')) )
                                    <form action="{{ route('publicadministrations.destroy',['publicadministration'=>$publicadministration->id]) }}" method="post">
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
                {!! $publicadministrations->links() !!}
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
