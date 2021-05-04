@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">

            <div class="card-body p-0">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('site.task_status')</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    
                                    <div class="d-flex">
                                        @if ((auth()->user()->owns($task) OR auth()->user()->hasPermission('tasks_update_all')) )
                                        <a href="{{ route('tasks.edit',['task'=>$task->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if ((auth()->user()->owns($task) OR auth()->user()->hasPermission('tasks_show_all')) )
                                        <a href="{{ route('tasks.show',['task'=>$task->id]) }}" class="btn btn-secondary btn-sm mx-2"><i class="fas fa-eye"></i></a>
                                        @endif

                                        @if ((auth()->user()->owns($task) OR auth()->user()->hasPermission('tasks_delete_all')) )
                                        <form action="{{ route('tasks.destroy',['task'=>$task->id]) }}" method="post">
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-sm deleteConfirm"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">@lang('site.no_tasks')</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $tasks->links() !!}
                    
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
