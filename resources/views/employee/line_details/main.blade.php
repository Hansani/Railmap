@extends('layouts.dashboard')

@section('navbar_items')
    @include('employee.line_details.partials.navbar_item')
@endsection

@section('body_content')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" form="add_form">
    </div>
    <div class="form-group">
        <label for="distance">Distance</label>
        <input type="text" class="form-control" id="distance" name="distance" form="add_form">
    </div>
    <div class="form-group">
        <form role="form" method="post" action="{{url('/submit-line-details')}}" id="add_form">
            <input type="submit" class="btn btn-default" name="Add" value="Add">
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr class="success">
                    <th>Line NO</th>
                    <th>Name</th>
                    <th>Distance</th>
                    <th> Remove</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form role="form" method="post" action="{{url('/delete-line-details')}}" id="add_form">
                            <input type="hidden" id="line_no" name="line_no">
                            <input type="submit" class="btn btn-default" name="Remove" value="Remove">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection