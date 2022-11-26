<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 229px;">
        <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 229px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="{{ request()->is('d/dashboard') ? 'active' : '' }}">
                        <a href="/">
                            <img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img">
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/img/icons/product.svg') }}" alt="img">
                            <span>Menu</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.tambah-pasien') }}"
                                    class="{{ request()->is('d/tambah-pasien') ? 'active' : '' }}">Tambah pasien</a>
                            </li>
                            @if (auth()->user()->role == 90)
                                <li><a href="{{ route('admin.tambah-anamnesa') }}"
                                        class="{{ request()->is('d/tambah-anamnesa') ? 'active' : '' }}">Tambah
                                        Anamnesa</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="">
                            <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                            <span> Data Pasien</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a href="{{ route('admin.data-pasien') }}"
                                    class="{{ request()->is('d/show-data-pasien') ? 'active' : '' }}">Data Pasien</a>
                            </li>
                            <li><a href="{{ route('admin.data-anamnesa') }}"
                                    class="{{ request()->is('d/show-data-anamnesa') ? 'active' : '' }}">Data Anamnesa
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="">
                            <img src="{{ asset('assets/img/icons/medkit.svg') }}" alt="img">
                            <span>Persediaan Obat</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a href="{{ route('admin.obat.index') }}/#"
                                    class="{{ request()->is('d/show-data-pasien') ? 'active' : '' }}">Data Obat</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="slimScrollBar"
            style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 43.4474px;">
        </div>
        <div class="slimScrollRail"
            style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
    </div>
</div>
