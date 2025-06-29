<style>
    /* Existing brand styles... */
    .brand-small {
        font-size: 0.6rem;
        letter-spacing: 0.5px;
        line-height: 1.2;
        display: inline-block;
    }

    .brand-subtitle {
        display: block;
        font-weight: bold;
        font-size: 0.65rem;
        text-align: center;
        margin-top: 2px;
    }

    /* Updated menu indentation styles */
    /* Level 1: default .nav-link padding */
    .nav-sidebar .nav-treeview>.nav-item>.nav-link {
        padding-left: 1.5rem;
    }

    /* Level 2 */
    .nav-sidebar .nav-treeview .nav-treeview>.nav-item>.nav-link {
        padding-left: 2.5rem;
    }

    /* Level 3 */
    .nav-sidebar .nav-treeview .nav-treeview .nav-treeview>.nav-item>.nav-link {
        padding-left: 3.5rem;
    }

    /* Level 4 */
    .nav-sidebar .nav-treeview .nav-treeview .nav-treeview .nav-treeview>.nav-item>.nav-link {
        padding-left: 4.5rem;
    }

    /* Adjust font sizes for nested levels */
    .nav-sidebar .nav-treeview .nav-item {
        font-size: 0.95rem;
    }

    .nav-sidebar .nav-treeview .nav-treeview .nav-item {
        font-size: 0.9rem;
    }
</style>

{{-- @php
    use App\Services\MenuService;

    $user = auth()->user();
    $role = $user->role->name ?? '';
    $unit = $user->unit->name ?? '';
    $menus = MenuService::getMenusByRole($user->role_id) ?? [];
    //     $menus = MenuService::getMenusByRole($role);
@endphp --}}

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex align-items-center">
        <img src="{{ asset('storage/img/logo-niis-putih.png') }}" alt="Logo NIIS"
            class="brand-image img-circle elevation-3" style="opacity: .8; width: 1.5rem; height: 1.5rem;">
        <span class="brand-text font-weight-light ml-2 brand-small">
            SISTEM INFORMASI ISLAM TERPADU<br>
            <strong class="brand-subtitle">NIIS</strong>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            {{-- <div class="info">
                <a href="#" class="d-block">{{ $user->name ?? 'Anonim' }}</a>
                <small class="text-muted">{{ $role }} - </small>
                <small class="text-muted">{{ $unit }}</small>
            </div> --}}
        </div>

        <!-- Dynamic Menu -->
        <!-- ...existing code... -->

        {{-- @php
            function isMenuActive($menu)
            {
                if (isset($menu['route']) && request()->routeIs($menu['route'])) {
                    return true;
                }

                if (isset($menu['children'])) {
                    foreach ($menu['children'] as $child) {
                        if (isMenuActive($child)) {
                            return true;
                        }
                    }
                }

                return false;
            }
        @endphp

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($menus as $menu)
                    @if (isset($menu['children']))
                        <li class="nav-item has-treeview {{ isMenuActive($menu) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ isMenuActive($menu) ? 'active bg-success' : '' }}">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>{{ $menu['title'] }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($menu['children'] as $child)
                                    @if (isset($child['children']))
                                        <li class="nav-item has-treeview {{ isMenuActive($child) ? 'menu-open' : '' }}">
                                            <a href="#"
                                                class="nav-link {{ isMenuActive($child) ? 'active bg-success' : '' }}">
                                                <i class="nav-icon {{ $child['icon'] }}"></i>
                                                <p>{{ $child['title'] }} <i class="right fas fa-angle-left"></i></p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @foreach ($child['children'] as $grandchild)
                                                    @if (isset($grandchild['children']))
                                                        <li
                                                            class="nav-item has-treeview {{ isMenuActive($grandchild) ? 'menu-open' : '' }}">
                                                            <a href="#"
                                                                class="nav-link {{ isMenuActive($grandchild) ? 'active bg-success' : '' }}">
                                                                <i
                                                                    class="nav-icon {{ $grandchild['icon'] ?? 'fas fa-circle' }}"></i>
                                                                <p>{{ $grandchild['title'] }} <i
                                                                        class="right fas fa-angle-left"></i></p>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                @foreach ($grandchild['children'] as $greatgrandchild)
                                                                    <li class="nav-item">
                                                                        <a href="{{ isset($greatgrandchild['route']) ? route($greatgrandchild['route']) : '#' }}"
                                                                            class="nav-link {{ isset($greatgrandchild['route']) && request()->routeIs($greatgrandchild['route']) ? 'active bg-success' : '' }}">
                                                                            <i
                                                                                class="nav-icon {{ $greatgrandchild['icon'] ?? 'fas fa-dot-circle' }}"></i>
                                                                            <p>{{ $greatgrandchild['title'] }}</p>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li class="nav-item">
                                                            <a href="{{ isset($grandchild['route']) ? route($grandchild['route']) : '#' }}"
                                                                class="nav-link {{ isset($grandchild['route']) && request()->routeIs($grandchild['route']) ? 'active bg-success' : '' }}">
                                                                <i
                                                                    class="nav-icon {{ $grandchild['icon'] ?? 'fas fa-circle' }}"></i>
                                                                <p>{{ $grandchild['title'] }}</p>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ isset($child['route']) ? route($child['route']) : '#' }}"
                                                class="nav-link {{ isset($child['route']) && request()->routeIs($child['route']) ? 'active bg-success' : '' }}">
                                                <i class="nav-icon {{ $child['icon'] }}"></i>
                                                <p>{{ $child['title'] }}</p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route($menu['route']) }}"
                                class="nav-link {{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>{{ $menu['title'] }}</p>
                            </a>
                        </li>
                    @endif
                @endforeach --}}


        <!-- Logout button -->
        <li class="nav-item mt-3">
            <a href="#" class="nav-link" id="logout-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
