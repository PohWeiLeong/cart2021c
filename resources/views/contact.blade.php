@extends('layout')
@section('content') 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-compact" action="">
            <div class="row paddingBottom20">
                <div class="container col-4">
                    <div class="row">
                        <h6 class="text-center col-12 mb-0">Contact Information</h6>
                        <sub class="text-right text-muted col-12"><a href="#" tabindex="-1"><i class="far fa-edit"></i></a></sub>
                    </div>
                    <div class="dropdown-divider mb-3"></div>
                    <div class="form-group row">
                        <label for="firstName" class="col-4 col-form-label-sm text-right">First Name:</label> 
                        <div class="col-8">
                            <div class="input-group"> 
                                <input id="firstName" name="text" type="text" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row align-items-center">
                        <label for="lastName" class="col-4 col-form-label-sm text-right">Last Name:</label> 
                        <div class="col-8">
                          <div class="input-group"> 
                            <input id="lastName" name="text" type="text" class="form-control form-control-sm" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="position" class="col-4 col-form-label-sm text-right">Position:</label> 
                        <div class="col-8">
                          <div class="input-group"> 
                            <select id="position" class="form-control" disabled>
                                <option></option>
                                <option>Shift Supervisor</option>
                                <option>Airport Manager</option>
                                <option>District Manager</option>
                                <option>Regional Manager</option>
                                <option>Terrirory Performance Manager</option>
                                <option>Ops. Manage</option>
                                <option>Other</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="emailAddress" class="col-4 col-form-label-sm text-right">Email Address:</label> 
                        <div class="col-8">
                          <div class="input-group"> 
                            <input id="emailAddress" name="text" type="email" class="form-control form-control-sm extendable">
                          </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="office" class="col-4 col-form-label-sm text-right">Office:</label> 
                        <div class="col-8">
                          <div class="input-group">
                            <input id="office" name="text" type="number" class="form-control form-control-sm" readonly>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="cell" class="col-4 col-form-label-sm text-right">Cell:</label> 
                        <div class="col-8">
                          <div class="input-group">
                            <input id="cell" name="text" type="number" class="form-control form-control-sm" readonly>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
@endsection 