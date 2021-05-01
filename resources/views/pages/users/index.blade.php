@extends('layouts.app')

@section('styles')
    <link rel="shortcut icon" href="{{ asset('/vendor/laratrust/img/logo.png') }}">
  <link href="{{ asset(mix('laratrust.css', 'vendor/laratrust')) }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> --}}
@endsection

@section('title') @lang('site.users') @endsection

@section('links')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('site.users')</a></li>
<li class="breadcrumb-item active">@lang('site.show')</li>
@endsection


@section('content')
{{-- <div class="row">
    <div class="col-8"> --}}

        {{-- {{$dataTable->table()}} --}}

        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              {{-- <div
                class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-4"
              > --}}
                {{-- <span class="text-gray-700">Users</span> --}}
                <div class="flex mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg ">
                  <table class="min-w-full">
                    <thead>
                      <tr>
                        <th class="th">Id</th>
                        <th class="th">Name</th>
                        <th class="th"># Roles</th>
                        {{-- @if(config('laratrust.panel.assign_permissions_to_user'))<th class="th"># Permissions</th>@endif --}}
                        <th class="th"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      @foreach ($users as $user)
                      <tr>
                        <td class="td text-sm leading-5 text-gray-900">
                          {{$user->getKey()}}
                        </td>
                        <td class="td text-sm leading-5 text-gray-900">
                          {{$user->name ?? 'The model doesn\'t have a `name` attribute'}}
                        </td>
                        <td class="td text-sm leading-5 text-gray-900">
                          {{$user->roles_count}}
                        </td>
                        @if(config('laratrust.panel.assign_permissions_to_user'))
                        <td class="td text-sm leading-5 text-gray-900">
                          {{$user->permissions_count}}
                        </td>
                        @endif
                        <td class="flex justify-end px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                          <a
                            href="{{route('users.edit', ['user' => $user->id])}}"
                            class="text-blue-600 hover:text-blue-900"
                          >Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                  {{ $users->appends(['model' => $modelKey])->links('laratrust::panel.pagination') }}


              </div>
            </div>
          </div>

    {{-- </div>
</div> --}}

@endsection

@section('scripts')
    {{-- <script src=" {{ asset('/vendor/datatables/buttons.server-side.js') }} "></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

    {{$dataTable->scripts()}}
    <script>
        // $('#user-table').DataTable( {
        //     buttons: [
        //         'copy', 'excel', 'pdf'
        //     ]
        // } );
    </script> --}}
@endsection
