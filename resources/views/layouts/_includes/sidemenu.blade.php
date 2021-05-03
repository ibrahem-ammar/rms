<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
    <img src=" {{ asset('adminlte/dist/img/AdminLTELogo.png') }} " alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'reports-system') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item {{active(['users.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['users.*'])}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('site.users')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link {{active(['users.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{active(['users.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            
            <!-- check if the user has the permission to see or create publicadministrations -->
            @if (auth()->user()->hasPermission(['publicadministrations_create','publicadministrations_read']))
            <li class="nav-item {{active(['publicadministrations.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['publicadministrations.*'])}}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>
                        @lang('site.publicadministrations')
                        <i class="left fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!-- check if the user has the permission to add publicadministrations -->
                    @if (auth()->user()->hasPermission('publicadministrations_create'))
                    <li class="nav-item">
                        <a href="{{ route('publicadministrations.create') }}" class="nav-link {{active(['publicadministrations.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    @endif
                    <!-- check if the user has the permission to see publicadministrations -->
                    @if (auth()->user()->hasPermission('publicadministrations_read')) 
                    <li class="nav-item">
                        <a href="{{ route('publicadministrations.index') }}" class="nav-link {{active(['publicadministrations.index'])}}">
                            <i class="fas fa-eye nav-icon"></i>
                            <p>@lang('site.show')</p>
                        </a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif
            

            <li class="nav-item {{active(['branches.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['branches.*'])}}">
                <i class="nav-icon fas fa-code-branch"></i>
                <p>
                    @lang('site.branches')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('branches.create') }}" class="nav-link {{active(['branches.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('branches.index') }}" class="nav-link {{active(['branches.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{active(['administrations.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['administrations.*'])}}">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                    @lang('site.administrations')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('administrations.create') }}" class="nav-link {{active(['administrations.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('administrations.index') }}" class="nav-link {{active(['administrations.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{active(['departments.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['departments.*'])}}">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                    @lang('site.departments')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('departments.create') }}" class="nav-link {{active(['departments.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('departments.index') }}" class="nav-link {{active(['departments.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{active(['tasks.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['tasks.*'])}}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    @lang('site.tasks')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tasks.create') }}" class="nav-link {{active(['tasks.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}" class="nav-link {{active(['tasks.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{active(['reports.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['reports.*'])}}">
                <i class="nav-icon fa fa-file"></i>
                <p>
                    @lang('site.reports')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('reports.create') }}" class="nav-link {{active(['reports.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}" class="nav-link {{active(['reports.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{active(['permissions.*'],'menu-open')}}">
                <a href="#" class="nav-link {{active(['permissions.*'])}}">
                <i class="nav-icon fas fa-user-lock"></i>
                <p>
                    @lang('site.permissions')
                    <i class="left fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('permissions.create') }}" class="nav-link {{active(['permissions.create'])}}">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>@lang('site.add')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link {{active(['permissions.index'])}}">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>@lang('site.show')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('logs') }}" class="nav-link {{active(['logs'])}}">
                    <i class="nav-icon fa fa-history"></i>
                    <p>@lang('site.logs')</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
