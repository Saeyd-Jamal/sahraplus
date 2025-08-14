<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="overflow: visible">
        <a href="{{ route('dashboard.home') }}" class="app-brand-link">
            <span class="app-brand-logo demo" style="overflow: visible">
                <img src=" {{ asset('imgs/logo-brand.png') }}" alt="Logo" width="60">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bold">{{ $title }}</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="align-middle ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="align-middle ti ti-x d-block d-xl-none ti-md"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="py-1 menu-inner">
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Apps &amp; Pages">العامة</span>
        </li>
        <!-- Page -->
        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ route('dashboard.home') }}" class="menu-link">
                <i class="fa-solid fa-house me-2"></i>
                <div data-i18n="home">الرئيسية</div>
            </a>
        </li>
        @can('view', 'App\\Models\Media')
            <li
                class="menu-item {{ request()->is('dashboard/media') || request()->is('dashboard/media/*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.media.index') }}" class="menu-link">
                    <i class="fa-solid fa-images me-2"></i>
                    <div data-i18n="media">مكتبة الوسائط</div>
                </a>
            </li>
        @endcan
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Apps &amp; Pages">الوسائط</span>
        </li>
        @can('view', 'App\\Models\Genre')
            <li
                class="menu-item {{ request()->is('dashboard/genres') || request()->is('dashboard/genres/*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.genres.index') }}" class="menu-link">
                    <i class="icon ph ph-folders me-2" data-bs-toggle="tooltip" data-bs-placement="right"
                        aria-label="الأنواع" data-bs-original-title="الأنواع"></i>
                    <div data-i18n="genres">التصنيفات</div>
                </a>
            </li>
        @endcan
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Apps &amp; Pages">الإعدادات</span>
        </li>
        @can('view', 'App\\Models\User')
            <li class="menu-item  {{ request()->is('dashboard/users') || request()->is('dashboard/users/*') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="icon ph ph-users me-2" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="المستخدمين"
                        data-bs-original-title="المستخدمين"></i>
                    <div data-i18n="Dashboards">المستخدمين</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('dashboard.users.index',['user_type'=>'admin']) }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                            <div data-i18n="Analytics">الأدمن</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dashboard.users.index',['user_type'=>'user']) }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                            <div data-i18n="CRM">المستخدمين</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dashboard.users.index',['user_type'=>'vendor']) }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                            <div data-i18n="eCommerce">المزودين</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        {{-- <li class="menu-item">
            <a href="page-2.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <i class="fa-solid fa-house me-2"></i>
                <div data-i18n="Page 2">Page 2</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                        <div data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="dashboards-crm.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                        <div data-i18n="CRM">CRM</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-ecommerce-dashboard.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                        <div data-i18n="eCommerce">eCommerce</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-logistics-dashboard.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-truck"></i>
                        <div data-i18n="Logistics">Logistics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-academy-dashboard.html" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-book"></i>
                        <div data-i18n="Academy">Academy</div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
    <div class="my-3 text-center text-white text-body">
        ©
        2025
        , تم الإنشاء ❤️ بواسطة <a href="https://saeyd-jamal.github.io/Portfolio/" target="_blank" class="footer-link">م
            . السيد الاخرسي</a>
    </div>
</aside>
