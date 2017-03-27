@extends('layouts.dashboard')

@section('navbar_items')
    @include('administrator.view_progress.reservation_progress.partials.navbar_item')
@endsection

@section('body_content')
    <form role="form" method="get" action="{{url('/view-stations')}}">
        <table class="table table-bordered">
            <thead>
                <th width="35%">Month</th>
                <th width="50%">Reservation Progress</th>
            </thead>
            <tbody>
            <tr>
                <td style="width: 35%">January</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">February</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">March</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">April</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">May</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">June</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">July</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">August</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">September</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">October</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">November</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 35%">December</td>
                <td>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
@endsection