<script src="/dist/assets/extensions/jquery/jquery.min.js"></script>
<script src="/dist/assets/js/bootstrap.js"></script>
<script src="/dist/assets/js/app.js"></script>
<script src="/dist/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
@if (request()->is('author/dashboard'))
    <script src="/dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="/dist/assets/js/pages/dashboard.js"></script>
@endif
{{-- @if (request()->is('author/show-data-pasien') or request()->is('author/obat')) --}}
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
{{-- <script src="/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.js"></script>
    <script src="/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script> --}}
<script src="/dist/assets/js/pages/datatables.js"></script> // tidak penting
{{-- @endif --}}
<script src="/dist/assets/extensions/toastify-js/src/toastify.js"></script>
@if (request()->is('author/show-data-pasien') or
    request()->is('author/tambah-anamnesa') or
    request()->is('author/tambah-anamnesa/*'))
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endif
