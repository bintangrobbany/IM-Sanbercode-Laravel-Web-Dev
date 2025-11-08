<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                @auth
                    {{-- JIKA SUDAH LOGIN: Tampilkan dropdown profil dan logout --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{asset('template/src/assets/images/profile/user-1.jpg')}}" alt="" width="35"
                                height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <div class="text-center my-2 px-3">
                                    <p class="mb-0 fs-4 fw-semibold">{{ Auth::user()->name }}</p>
                                    <p class="mb-0 fs-2 text-muted">{{ Auth::user()->email }}</p>
                                </div>

                                {{-- Link ke halaman profil yang sudah kita buat --}}
                                <a href="{{ route('profile.edit') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>

                                {{-- Form untuk Logout (wajib menggunakan form POST) --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    {{-- JIKA BELUM LOGIN: Tampilkan tombol Login dan Register --}}
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>
</header>