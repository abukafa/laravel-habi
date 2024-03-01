@extends('templates.navbar')

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/dark/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <div class="d-flex flex-row-reverse mt-4 mb-2">
                    <div class="col-xl-4 ps-xl-3 col-md-6 col-12">
                        <form action="" method="get" class="d-flex input-group">
                            <select class="form-select form-select col-4" name="semester">
                                <option selected value={{ request('semester') }}>Semester {{ request('semester') }}</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                            <select class="form-select form-select col-8" name="id" onchange="this.form.submit()">
                                <option>{{ $name }}</option>
                                @foreach ($students as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one p-4">
                            <div class="widget-heading mb-0">
                                <h5 class="">Monthly Progress</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="renvenue" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu left" aria-labelledby="renvenue" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Weekly</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Monthly</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Yearly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="mb-4">ICT</h5>
                            </div>
                            <div class="widget-content">
                                <div id="chart-2" class=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value mb-2">Alquran</span>
                                        <span class="w-numeric-title">Adab, Tahsin, Tajwid, Tahfidz</span>
                                    </div>
                                    <div class="w-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Bookmark.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                </div>
                                <div class="w-chart">
                                    <div id="daily-sales"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-three p-4">
                            <div class="widget-heading">
                                <h5 class="">IT Multimedia</h5>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="summary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="summary" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="widget-content">

                                <div class="order-summary">

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        </div>
                                        <div class="w-summary-details">

                                            <div class="w-summary-info">
                                                <h6>{{ $data['ict']['subject'][0] }}</h6>
                                                <p class="summary-count">{{ $data['ict']['value'][0] }}%</p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{ $data['ict']['value'][0] }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                        </div>
                                        <div class="w-summary-details">

                                            <div class="w-summary-info">
                                                <h6>{{ $data['ict']['subject'][1] }}</h6>
                                                <p class="summary-count">{{ $data['ict']['value'][1] }}%</p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{ $data['ict']['value'][1] }}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="summary-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                        </div>
                                        <div class="w-summary-details">

                                            <div class="w-summary-info">
                                                <h6>{{ $data['ict']['subject'][2] }}</h6>
                                                <p class="summary-count">{{ $data['ict']['value'][2] }}%</p>
                                            </div>

                                            <div class="w-summary-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: {{ $data['ict']['value'][2] }}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-one widget">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Smile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                            <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="w-content">
                                        <span class="w-value">Tsaqofah</span>
                                        <span class="w-numeric-title">Personality</span>
                                    </div>
                                </div>
                                <div class="w-chart">
                                    <div id="total-orders"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-one p-4">
                            <div class="widget-heading">
                                <h5 class="">Project & Visits</h5>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="pendingTask" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

                            @foreach ($projects as $item)
                            @if (strpos($item->name, 'Visit') === 0)
                                <div class="transactions-list t-secondary">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>{{ $item->name }}</h4>
                                                <p class="meta-date">{{ $item->item }}</p>
                                            </div>

                                        </div>
                                        <div class="t-rate rate-dec">
                                            <p><span>{{ $item->result }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="transactions-list t-info">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="avatar">
                                                    <span class="avatar-title">{{ app('generateInitials')($item->name) }}</span>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>{{ $item->name }}</h4>
                                                <p class="meta-date">{{ $item->item }}</p>
                                            </div>
                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>{{ $item->result }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-four p-4">

                            <div class="widget-heading">
                                <h5 class="">Histori Penilaian</h5>
                            </div>

                            <div class="widget-content">
                                <div class="mt-container-ra mx-auto">
                                    <div class="timeline-line">

                                        @foreach ($history as $item)
                                            <div class="item-timeline timeline-{{ $item->semester %2 == 0 ? 'warning' : 'primary' }}">
                                                <div class="t-dot" data-original-title="" title="">
                                                </div>
                                                <div class="t-text">
                                                    <p><span>{{ $item->subject }}</span> <br><a href="/data/nilai/{{ $item->serial }}/edit">{{ $item->registered .' - Semester '. $item->semester }}</a></p>
                                                    <span class="badge">{{ $item->count }} Data</span>
                                                    <p class="t-time">{{ $item->serial }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="tm-action-btn">
                                    <a href="/data/nilai"><button class="btn"><span>View All</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                        <div class="widget widget-wallet-one p-4">

                            <div class="wallet-info text-center mb-3">
                                <p class="wallet-title mb-3">Tabungan</p>
                                <p class="total-amount mb-3">Rp {{ number_format($totalSaving, 0, '.', ',') }}</p>
                            </div>

                            <hr>
                            <ul class="list-group list-group-media">
                            @foreach ($savings as $item)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="me-3">
                                            <img alt="avatar" src="{{ file_exists(public_path('storage/profile/' . $item->ids . '.png'))
                                            ? asset('storage/profile/' . $item->ids . '.png')
                                            : asset('/src/assets/img/no.png') }}" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="tx-inverse">{{ $item->name }}</h6>
                                            <p class="mg-b-0">Rp. {{ number_format(($item->credit - $item->debit), 0, '.', ',') }}</p>
                                            <p class="amount"></p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>

                            <a href="/admin/tabungan" class="btn btn-secondary w-100 mt-3">Tabungan</a>

                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing d-none">
                        <div class="widget widget-table-two p-4">

                            <div class="widget-heading">
                                <h5 class="">Sertifikasi</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Peserta</div></th>
                                                <th><div class="th-content">Bidang</div></th>
                                                <th><div class="th-content">Subjek</div></th>
                                                <th><div class="th-content">Predikat</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Luke Ivory</span></div></td>
                                                <td><div class="td-content product-brand text-primary">Headphone</div></td>
                                                <td><div class="product-brand">Headphone</div></td>
                                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                                            </tr>

                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Andy King</span></div></td>
                                                <td><div class="td-content product-brand text-warning">Nike Sport</div></td>
                                                <td><div class="product-brand">Nike Sport</div></td>
                                                <td><div class="td-content"><span class="badge badge-primary">Shipped</span></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Laurie Fox</span></div></td>
                                                <td><div class="td-content product-brand text-danger">Sunglasses</div></td>
                                                <td><div class="product-brand">Sunglasses</div></td>
                                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Ryan Collins</span></div></td>
                                                <td><div class="td-content product-brand text-warning">Sport</div></td>
                                                <td><div class="product-brand">Sport</div></td>
                                                <td><div class="td-content"><span class="badge badge-primary">Shipped</span></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Irene Collins</span></div></td>
                                                <td><div class="td-content product-brand text-primary">Speakers</div></td>
                                                <td><div class="product-brand">Speakers</div></td>
                                                <td><div class="td-content"><span class="badge badge-danger">Pending</span></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content customer-name"><img src="../src/assets/img/no.png" alt="avatar"><span>Sonia Shaw</span></div></td>
                                                <td><div class="td-content product-brand text-danger">Watch</div></td>
                                                <td><div class="product-brand">Watch</div></td>
                                                <td><div class="td-content"><span class="badge badge-success">Paid</span></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing d-none">
                        <div class="widget widget-table-three p-4">

                            <div class="widget-heading">
                                <h5 class="">Index Prestasi</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-scroll">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Peserta</div></th>
                                                <th><div class="th-content">Nilai</div></th>
                                                <th><div class="th-content">Progress</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div class="td-content product-name"><img src="../src/assets/img/no.png" alt="product"><div class="align-self-center"><p class="prd-name">Headphone</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                                <td><div class="td-content">170</div></td>
                                                <td><div class="td-content"><a href="javascript:void(0);" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Direct</a></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content product-name"><img src="../src/assets/img/no.png" alt="product"><div class="align-self-center"><p class="prd-name">Shoes</p><p class="prd-category text-warning">Faishon</p></div></div></td>
                                                <td><div class="td-content">130</div></td>
                                                <td><div class="td-content"><a href="javascript:void(0);" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Google</a></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content product-name"><img src="../src/assets/img/no.png" alt="product"><div class="align-self-center"><p class="prd-name">Watch</p><p class="prd-category text-danger">Accessories</p></div></div></td>
                                                <td><div class="td-content">66</div></td>
                                                <td><div class="td-content"><a href="javascript:void(0);" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-warning feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Ads</a></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content product-name"><img src="../src/assets/img/no.png" alt="product"><div class="align-self-center"><p class="prd-name">Laptop</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                                <td><div class="td-content">35</div></td>
                                                <td><div class="td-content"><a href="javascript:void(0);" class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-info feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Email</a></div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="td-content product-name"><img src="../src/assets/img/no.png" alt="product"><div class="align-self-center"><p class="prd-name">Camera</p><p class="prd-category text-primary">Digital</p></div></div></td>
                                                <td><div class="td-content">30</div></td>
                                                <td><div class="td-content"><a href="javascript:void(0);" class="text-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-secondary feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> Referral</a></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2023</span> Semangkamedia.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Code with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!--  END CONTENT AREA  -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="../src/assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
        var adabData = @json($data['adab'] ?? []);
        var tahfidzhData = @json($data['tahfidzh'] ?? []);
        var bulanData = @json($data['bulan'] ?? []);
        var ictSubjectData = @json($data['ict']['subject'] ?? []);
        var ictValueData = @json($data['ict']['value'] ?? []);
        var quranSubjectData = @json($data['quran']['subject'] ?? []);
        var quranMonth5Data = @json($data['quran']['month_5'] ?? []);
        var quranMonth6Data = @json($data['quran']['month_6'] ?? []);
        var sikapData = @json($data['sikap'] ?? []);
        function averageWithoutNull(...arrays) {
            // Flatten the arrays and filter out null values
            const filteredNumbers = arrays
                .flat()
                .filter(value => value !== null);
            // Calculate the sum of numbers
            const sum = filteredNumbers.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            // Calculate the average
            const average = sum / filteredNumbers.length;
            return average;
        }
    </script>

@endsection
