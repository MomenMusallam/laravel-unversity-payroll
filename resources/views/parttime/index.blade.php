@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>

    </ol>
@endsection

@section('dashboard')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">



            </div>
            <div class="row">


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="info-box bg-gradient-success">
                        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Worked Hours</span>
                            <span class="info-box-number">{{$user->hours_amounts}} H</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $user->avrg *100}}%"></div>
                            </div>
                            <span class="progress-description">
                  YOU Done {{$user->avrg *100}}% Hours
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            @if($parttime->payment_method == 'transfer')

                                <h3>Bank Transfare</h3>

                            @else
                                <h3>Cheques</h3>
                            @endif


                            <p>Payment Method</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        {{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            @if($parttime->tax != '')
                            <h3>{{$parttime->tax}}%</h3>
                            @else
                                <h3>NO TAX </h3>
                            @endif

                            <p>TAX</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$user->total}}$</h3>

                            <p>Total income</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="{{ asset('assets/img/user1-128x128.jpg') }}" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{ $user->name}}</h3>
                            <h5 class="widget-user-desc">Part Time Employee</h5>
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Job Number <span class="float-right badge bg-primary">{{$user->id}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Specialization <span class="float-right badge bg-info">{{$parttime->specialization}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Phone<span class="float-right badge bg-success">{{$user->phone}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Max Hours/month <span class="float-right badge bg-danger">{{$parttime->total_hours}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable ui-sortable">


                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">January 2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="12/26/2021" class="day old weekend">26</td><td data-action="selectDay" data-day="12/27/2021" class="day old">27</td><td data-action="selectDay" data-day="12/28/2021" class="day old">28</td><td data-action="selectDay" data-day="12/29/2021" class="day old">29</td><td data-action="selectDay" data-day="12/30/2021" class="day old">30</td><td data-action="selectDay" data-day="12/31/2021" class="day old">31</td><td data-action="selectDay" data-day="01/01/2022" class="day weekend">1</td></tr><tr><td data-action="selectDay" data-day="01/02/2022" class="day weekend">2</td><td data-action="selectDay" data-day="01/03/2022" class="day">3</td><td data-action="selectDay" data-day="01/04/2022" class="day">4</td><td data-action="selectDay" data-day="01/05/2022" class="day">5</td><td data-action="selectDay" data-day="01/06/2022" class="day">6</td><td data-action="selectDay" data-day="01/07/2022" class="day">7</td><td data-action="selectDay" data-day="01/08/2022" class="day weekend">8</td></tr><tr><td data-action="selectDay" data-day="01/09/2022" class="day weekend">9</td><td data-action="selectDay" data-day="01/10/2022" class="day">10</td><td data-action="selectDay" data-day="01/11/2022" class="day">11</td><td data-action="selectDay" data-day="01/12/2022" class="day">12</td><td data-action="selectDay" data-day="01/13/2022" class="day">13</td><td data-action="selectDay" data-day="01/14/2022" class="day">14</td><td data-action="selectDay" data-day="01/15/2022" class="day weekend">15</td></tr><tr><td data-action="selectDay" data-day="01/16/2022" class="day weekend">16</td><td data-action="selectDay" data-day="01/17/2022" class="day active today">17</td><td data-action="selectDay" data-day="01/18/2022" class="day">18</td><td data-action="selectDay" data-day="01/19/2022" class="day">19</td><td data-action="selectDay" data-day="01/20/2022" class="day">20</td><td data-action="selectDay" data-day="01/21/2022" class="day">21</td><td data-action="selectDay" data-day="01/22/2022" class="day weekend">22</td></tr><tr><td data-action="selectDay" data-day="01/23/2022" class="day weekend">23</td><td data-action="selectDay" data-day="01/24/2022" class="day">24</td><td data-action="selectDay" data-day="01/25/2022" class="day">25</td><td data-action="selectDay" data-day="01/26/2022" class="day">26</td><td data-action="selectDay" data-day="01/27/2022" class="day">27</td><td data-action="selectDay" data-day="01/28/2022" class="day">28</td><td data-action="selectDay" data-day="01/29/2022" class="day weekend">29</td></tr><tr><td data-action="selectDay" data-day="01/30/2022" class="day weekend">30</td><td data-action="selectDay" data-day="01/31/2022" class="day">31</td><td data-action="selectDay" data-day="02/01/2022" class="day new">1</td><td data-action="selectDay" data-day="02/02/2022" class="day new">2</td><td data-action="selectDay" data-day="02/03/2022" class="day new">3</td><td data-action="selectDay" data-day="02/04/2022" class="day new">4</td><td data-action="selectDay" data-day="02/05/2022" class="day new weekend">5</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month active">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year active">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
