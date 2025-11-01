<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{asset('template/src/assets/images/logos/logo-light.svg')}}" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">FORM</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/register" aria-expanded="false">
                        <span>
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Form Input</span>
                    </a>
                </li>

                <!-- =================================== -->
                <!-- ==       MENU BARU DITAMBAHKAN     == -->
                <!-- =================================== -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">Manajemen Data</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/category" aria-expanded="false">
                        <span>
                            {{-- Saya pilihkan ikon yang cocok untuk kategori --}}
                            <iconify-icon icon="solar:folder-with-files-bold-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <!-- =================================== -->
                <!-- ==         AKHIR MENU BARU         == -->
                <!-- =================================== -->
                
            </ul> {{-- Tag <ul> penutup yang hilang saya tambahkan juga --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>