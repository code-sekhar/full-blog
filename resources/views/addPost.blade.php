@extends('layout.dashboardlayout')
@section('title','Dashboard Page')
@section('content')
    <div class="content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="main-header" style="margin-top: 0px;">
                    <h4>POST</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Input Types</h5>
                        </div>
                        <!-- end of modal -->

                        <div class="card-block">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-control-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="form-control-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1" class="form-control-label">Example select</label>
                                    <select class="form-control " id="exampleSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect2" class="form-control-label">Example multiple select</label>
                                    <select multiple class="form-control multiple-select" id="exampleSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea" class="form-control-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="4"></textarea>
                                </div>
                                <fieldset class="form-group">
                                    <label class="form-control-label">Radio buttons</label>
                                    <div class="form-check">
                                        <label for="optionsRadios1" class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Option one is this and that&mdash;be sure to include why it's great
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label for="optionsRadios2" class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Option two can be something else and selecting it will deselect option one
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label for="optionsRadios3" class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                                            Option three is disabled
                                        </label>
                                    </div>
                                </fieldset>
                                <div class="form-check">
                                    <label for="chkme" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="chkme">
                                        Check me out
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="">
                                        Option one is this and that&mdash;be sure to include why it's great
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                        Option two is disabled
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
