@extends('layout.dashboardlayout')
@section('title','Dashboard Page')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="main-header" style="margin-top: 0px;">
                    <h4>POST</h4>
                </div>
            </div>
        </div>
        <div class="pt-5">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table m-b-0 photo-table">
                                        <thead>
                                        <tr class="text-uppercase">
                                            <th>Post Image</th>
                                            <th>Project</th>
                                            <th>Completed</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-2.png" alt="User">
                                            </td>
                                            <td>Appestia Project
                                                <p><i class="icofont icofont-clock-time"></i>Created 14.9.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">226,134</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 1 1 4.209902994920235 25.41987555688496 L 15 15" fill="#2196F3"></path><path d="M 4.209902994920235 25.41987555688496 A 15 15 0 0 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>50%</td>
                                            <td>October 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-4.png" alt="User">
                                            </td>
                                            <td>Contract with belife Company
                                                <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path><path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>70%</td>
                                            <td>November 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-1.png" alt="User">
                                            </td>
                                            <td>Web Consultancy project
                                                <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">1,4</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 0 1 29.265847744427305 10.36474508437579 L 15 15" fill="#2196F3"></path><path d="M 29.265847744427305 10.36474508437579 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>40%</td>
                                            <td>September 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-3.png" alt="User">
                                            </td>
                                            <td>Contract with belife Company
                                                <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path><path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>70%</td>
                                            <td>November 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-1.png" alt="User">
                                            </td>
                                            <td>Contract with belife Company
                                                <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path><path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>70%</td>
                                            <td>November 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid img-circle" src="assets/images/avatar-2.png" alt="User">
                                            </td>
                                            <td>Contract with belife Company
                                                <p><i class="icofont icofont-clock-time"></i>Created 20.10.2016</p>
                                            </td>
                                            <td>
                                                <span class="pie" style="display: none;">0.52/1.561</span><svg class="peity" height="30" width="30"><path d="M 15.000000000000002 0 A 15 15 0 0 1 28.00043211809656 22.482564048691025 L 15 15" fill="#2196F3"></path><path d="M 28.00043211809656 22.482564048691025 A 15 15 0 1 1 14.999999999999996 0 L 15 15" fill="#ccc"></path></svg>
                                            </td>
                                            <td>70%</td>
                                            <td>November 21, 2015</td>
                                            <td>
                                                <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" href="#primary" role="button" data-original-title=".btn-primary">Primary
                                                </a>
                                            </td>
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
    </div>
@endsection
