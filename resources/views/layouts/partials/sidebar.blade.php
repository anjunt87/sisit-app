<!-- Enhanced Sidebar -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex align-items-center" id="brandLink">
        <img src="{{ asset('storage/img/logo-niis-putih.png') }}" alt="Logo NIIS"
            class="brand-image img-circle elevation-3" id="brandImage" style="">
        <span class="brand-text font-weight-light brand-small">
            SISTEM INFORMASI ISLAM TERPADU<br>
            <strong class="brand-subtitle">NIIS</strong>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Professional Sidebar Menu -->
        <nav class="mt-2">
            @php
                use App\Services\MenuService;
                $menuGroups = MenuService::getMenusGrouped();
            @endphp

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @foreach ($menuGroups as $group)
                    @php
                        $menu = $group['menu'];
                        $children = $group['children'];
                        $hasChild = count($children) > 0;
                        $isActive =
                            request()->is(ltrim($menu->url, '/')) ||
                            collect($children)
                                ->pluck('url')
                                ->contains(request()->path());
                    @endphp

                    <li class="nav-item {{ $hasChild ? '' : '' }} {{ $isActive ? 'menu-open' : '' }}">
                        <a href="{{ $hasChild ? '#' : (is_string($menu->url) ? url($menu->url) : '#') }}"
                            class="nav-link {{ $isActive ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu->icon }}"></i>
                            <p>
                                {{ $menu->label }}
                                @if ($hasChild)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if ($hasChild)
                            <ul class="nav nav-treeview">
                                @foreach ($children as $child)
                                    <li class="nav-item">
                                        <a href="{{ url((string) $child->url) }}"
                                            class="nav-link {{ request()->is(ltrim($child->url, '/')) ? 'active' : '' }}">
                                            <i class="{{ $child->icon }}"></i>
                                            <p>{{ $child->label }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

                <li class="nav-item mt-lg-4">
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>

                    <button type="button" id="logout-button" class="nav-link btn btn-link text-left text-danger w-100">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </button>
                </li>
            </ul>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
