@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>

            </div>
            <h4 class="page-title">Form elements</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Input Types</h4>

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <form>
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <small class="text-muted">We'll never share your email with anyone
                                    else.
                                </small>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleSelect1">Example select</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleSelect2">Example multiple select</label>
                                <select multiple="" class="form-control" id="exampleSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleTextarea">Example textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Example Readonly</label>
                                <input class="form-control" type="text" placeholder="Readonly input here…" readonly="">
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div><!-- end col -->

                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6 m-t-sm-40">
                        <form>
                            <fieldset disabled="">
                                <div class="form-group">
                                    <label for="disabledTextInput">Disabled input</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                </div>
                                <div class="form-group">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </fieldset>

                            <fieldset>
                                <label>Example Control sizing</label>
                                <input class="form-control form-control-lg m-b-20" type="text" placeholder=".form-control-lg">
                                <input class="form-control m-b-20" type="text" placeholder="Default input">
                                <input class="form-control form-control-sm m-b-20" type="text" placeholder=".form-control-sm">

                                <div class="row">
                                    <div class="col-xs-2">
                                        <input type="text" class="form-control" placeholder=".col-xs-2">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder=".col-xs-4">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group has-success">
                                    <label class="form-control-label" for="inputSuccess1">Input with
                                        success</label>
                                    <input type="text" class="form-control form-control-success" id="inputSuccess1">
                                </div>
                                <div class="form-group has-warning">
                                    <label class="form-control-label" for="inputWarning1">Input with
                                        warning</label>
                                    <input type="text" class="form-control form-control-warning" id="inputWarning1">
                                </div>
                                <div class="form-group has-danger">
                                    <label class="form-control-label" for="inputDanger1">Input with
                                        danger</label>
                                    <input type="text" class="form-control form-control-danger" id="inputDanger1">
                                </div>
                            </fieldset>
                        </form>
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
