@extends('app')

@section('title')
MetroGistics :: Get a Quote!
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
    <script src="/js/main.js"></script>
    <link href="/js/select2-3.4.8/select2.css" rel="stylesheet"/>
    <link href="/js/select2-3.4.8/select2bootstrap.css" rel="stylesheet"/>
    <script src="/js/select2-3.4.8/select2.js"></script>
    <script src="/js/quoteform.js"></script>
@endsection

@section('content')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <div class="container">

        @if($errors->has())
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Errors on Submission - Please Correct</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif



        <div ng-controller="QuoteController">

            {!! Form::open(array('action' => array('QuoteController@Quote'), null, 'onsubmit' => 'return test();')) !!}

            <div class="row">
                <br />
                <div class="col-xs-12 col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">MetroGistics - Quotes</h3>
                        </div>
                        <div class="panel-body ">


                            <div class="col-md-7 col-xs-12">

                                <div class="row">
                                    <div class="col-md-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">

                                                @if(Session::has('Error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        <p><strong>Warning:</strong> {!! Session::get('Error') !!}</p>
                                                    </div>
                                                @endif

                                                <div id="errorMessage" style="display: none ;">
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <strong>Warning!</strong> You must select a Move Type...
                                                    </div>
                                                </div>



                                                        <div class="row">

                                                            <div class="col-md-3 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" id="FirstName" name="FirstName" ng-model="FirstName" size="15" class="form-control" required="required" placeholder="First Name" ng-minlength=2 />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input type="text" id="LastName" name="LastName"  ng-model="LastName"  size="30" class="form-control" required="required" placeholder="Last Name"  ng-minlength=2 />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" id="PhoneNumber" name="PhoneNumber"  ng-model="PhoneNumber" size="30" class="form-control" placeholder="XXX-XXX-XXXX" required="required" ng-minlength=10 />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>EXT</label>
                                                                    <input type="text" id="PhoneNumberExt" name="PhoneNumberExt"  ng-model="PhoneNumberExt" size="5" class="form-control" placeholder="XXXXX" ng-minlength=1 />
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Your Email Address</label>
                                                                    <input type="email" id="EmailAddress" name="EmailAddress" ng-model="EmailAddress"  size="60" class="form-control" placeholder="user@domain.com" required="required" />
                                                                    <input type="hidden" id="IPAddress" name="IPAddress" value="<?php echo($_SERVER['REMOTE_ADDR']); ?>" />

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Number of Vehicles to Transport</label>
                                                                    <select id="NumberOfVehicles" ng-model="NumberOfVehicles" name="NumberOfVehicles"class="form-control">
                                                                        <option value="0">  -- SELECT NUMBER OF VEHICLES -- </option>
                                                                        <option value="1">1 Vehicle</option>
                                                                        <option value="2">2 Vehicles</option>
                                                                        <option value="3">3 Vehicles</option>
                                                                        <option value="4">4 Vehicles</option>
                                                                        <option value="5">5 Vehicles</option>
                                                                        <option value="6">6 Vehicles</option>
                                                                        <option value="7">7 Vehicles</option>
                                                                        <option value="8">8 Vehicles</option>
                                                                        <option value="MANY">9+ Vehicles</option>


                                                                    </select>
                                                                    <input type="hidden" id="IPAddress" ng-model="IPAddress" name="IPAddress" value="<?php echo($_SERVER['REMOTE_ADDR']); ?>" />
                                                                </div>
                                                            </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                                <hr />

                                <div class="row">
                                    <div class="col-md-6 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Origin</label>
                                                    <input type="text" id="o" name="o" ng-model="o" style="width: 100%;"  />
                                                    <input type="hidden" id="oAreaId" name="oAreaId" ng-model="oAreaId"  />
                                                    <input type="hidden" id="oAreaName" name="oAreaName" ng-model="oAreaName" />
                                                    <input type="hidden" id="oTerm" name="oTerm" ng-model="oTerm" />
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-md-6 col-xs-12">

                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Destination</label>
                                                    <input type="text" id="d" name="d" ng-model="d" style="width: 100%;" />
                                                    <input type="hidden" id="dAreaId" name="dAreaId" ng-model="dAreaId" />
                                                    <input type="hidden" id="dAreaName" name="dAreaName" ng-model="dAreaName" />
                                                    <input type="hidden" id="dTerm" name="dTerm" ng-model="dTerm" />
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea id="Details" name="Details" ng-model="Details" class="form-control" placeholder="Please share any details about the transportation you are requesting..." rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr />


                                <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        {!! Form::submit('Quote It', array( 'role' => 'button', 'class' => 'btn btn-success btn-lg')) !!}

                                        <a href="/Quote" class="btn btn-default btn-lg" role="button">Clear Form</a>
                                    </div>

                                </div>

                            </div>

                            <div id="GetAQuoteBox" class="col-xs-12 col-md-5">

                                <div>
                                    <h1>Get a Quote</h1>
                                    <p>
                                        If you have any questions, please call or email us at sales@metrogistics.com.<br /><br />
                                        Rates posted are for typical passenger vehicles, light duty trucks, and SUVs. Additional fees may apply for inoperable or over-sized units and/or moves that are in difficult locations, low volume shipping lanes and lanes that involve tolls. These rates include any and all fuel surcharges.
                                    </p>
                                    <br />
                                    <br />
                                    <div class="well">
                                        MetroGistics<br />
                                        <strong>877-571-6235</strong><br />
                                        sales@metrogistics.com<br />
                                        <strong>Fax:</strong> 314-735-4176<br />
                                        <strong>Hours:</strong> 7:30AM to 9PM CT<br />
                                        7 Days a Week<br />



                                    </div>
                                    <a href="http://www.metrogistics.com" class="btn btn-default btn-lg" role="button">Back</a>
                                    <br />
                                </div>


                            </div>

                        </div>
                        {!! Form::close() !!}
                        <div class="col-xs-12 col-md-12">

                            <!--- <p>This map is for planning purposes only. MetroGistics cannot guarantee mileage accuracy, road and traffic conditions, or local regulations that may affect travel times or routes.</p> -->
                            <!--- <p>If you have more than 1 unit to ship on this load, please call 1-800-755-2324 and ask a customer service representative to assist you with a quote. This quoting engine is for single moves only.</p> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
