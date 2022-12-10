<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ request()->is('author/dashboard') ? 'active' : '' }}">
            <a href="{{ route('author.') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <ul class="submenu active">
            <li class="sidebar-title">Pasien</li>
            <li class="submenu-item {{ request()->is('author/show-data-pasien') ? 'active' : '' }}">
                <a href="{{ route('author.data-pasien') }}" class="sidebar-link">Data Pasien</a>
            </li>
            <li class="submenu-item {{ request()->is('author/tambah-pasien') ? 'active' : '' }}">
                <a href="{{ route('author.tambah-pasien') }}">Tambah Pasien</a>
            </li>
        </ul>
        <ul class="submenu active">
            <li class="sidebar-title">Anamnesa</li>

            <li class="submenu-item {{ request()->is('author/show-data-anamnesa') ? 'active' : '' }}">
                <a href="{{ route('author.data-anamnesa') }}">Data Anamnesa</a>
            </li>
            <li class="submenu-item {{ request()->is('author/tambah-anamnesa') ? 'active' : '' }}">
                <a href="{{ route('author.tambah-anamnesa') }}">Tambah Anamnesa</a>
            </li>
        </ul>
        <ul class="submenu active">
            <li class="sidebar-title">Data Obat</li>

            <li class="submenu-item {{ request()->is('author/obat') ? 'active' : '' }}">
                <a href="{{ route('author.obat.index') }}/#">Data Obat</a>
            </li>
        </ul>
        <li class="sidebar-item">
            <form action="{{ route('author.logout') }}" method="post" class="">
                @csrf
                <button class="sidebar-link btn btn-outline-info">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 92">
                        <path
                            d="M46 47.5c-2.2 0-4-1.8-4-4V9c0-2.2 1.8-4 4-4s4 1.8 4 4v34.5c0 2.2-1.7 4-4 4zm38 1.3c0-14.6-8.1-27.7-21.1-34.2-2-1-4.4-.2-5.4 1.8s-.2 4.4 1.8 5.4C69.6 26.9 76 37.3 76 48.8 76 65.5 62.5 79 46 79S16 65.5 16 48.8c0-11.6 6.4-21.9 16.7-27.1 2-1 2.8-3.4 1.8-5.4-1-2-3.4-2.8-5.4-1.8C16.1 21.1 8 34.2 8 48.8 8 69.9 25 87 46 87s38-17.1 38-38.2z" />
                    </svg>
                    <span>logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>
