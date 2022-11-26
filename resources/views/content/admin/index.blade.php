@extends('layout.app')
@section('title', 'Add Product')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $pasiens }}</h4>
                        <h5>Pasien</h5>
                    </div>
                    <div class="dash-imgs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $anamnesa }}</h4>
                        <h5>Data Anamnesa Pasien</h5>
                    </div>
                    <div class="dash-imgs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user-check">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ __($drugs) }}</h4>
                        <h5>Stok Obat</h5>
                    </div>
                    <div class="dash-imgs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medicine-syrup"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 21h8a1 1 0 0 0 1 -1v-10a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v10a1 1 0 0 0 1 1z"></path>
                            <path d="M10 14h4"></path>
                            <path d="M12 12v4"></path>
                            <path d="M10 7v-3a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Kunjungan Pasien Bulanan</div>
                    </div>
                    <div class="card-body  chart-set">
                        <div class="h-250" id="flotBar1" style="padding: 0px; position: relative;"><canvas
                                class="flot-base" width="471" height="250"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 471.5px; height: 250px;"></canvas>
                            <div class="flot-text"
                                style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 15px; text-align: center;">
                                        0</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 63px; text-align: center;">
                                        1</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 110px; text-align: center;">
                                        2</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 157px; text-align: center;">
                                        3</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 205px; text-align: center;">
                                        4</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 252px; text-align: center;">
                                        5</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 300px; text-align: center;">
                                        6</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 347px; text-align: center;">
                                        7</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 394px; text-align: center;">
                                        8</div>
                                    <div
                                        style="position: absolute; max-width: 42px; top: 237px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 442px; text-align: center;">
                                        9</div>
                                </div>
                                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                    <div
                                        style="position: absolute; top: 226px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 7px; text-align: right;">
                                        0</div>
                                    <div
                                        style="position: absolute; top: 181px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 1px; text-align: right;">
                                        10</div>
                                    <div
                                        style="position: absolute; top: 136px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 1px; text-align: right;">
                                        20</div>
                                    <div
                                        style="position: absolute; top: 92px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 1px; text-align: right;">
                                        30</div>
                                    <div
                                        style="position: absolute; top: 47px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 1px; text-align: right;">
                                        40</div>
                                    <div
                                        style="position: absolute; top: 2px; font: 400 10px / 12px nunito, sans-serif; color: rgb(142, 156, 173); left: 1px; text-align: right;">
                                        50</div>
                                </div>
                            </div><canvas class="flot-overlay" width="471" height="250"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 471.5px; height: 250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
