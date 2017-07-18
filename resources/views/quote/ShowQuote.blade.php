@extends('app')

@section('title')
MetroGistics :: Get a Quote!
@endsection

@section('javascript')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
    <script src="/js/main.js"></script>
    <link href="/js/select2-3.4.8/select2.css" rel="stylesheet"/>
    <link href="/js/select2-3.4.8/select2bootstrap.css" rel="stylesheet"/>
    <script src="/js/select2-3.4.8/select2.js"></script>
    <script src="/js/quoteform.js"></script>
    <script type="text/javascript">
	$(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
	});
    </script>
@endsection

@section('content')
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

                                                    <h1>Thank you</h1>
                                                    <p>Our sales team will be submitting a quote to the email address, {!! $data->EmailAddress !!}.  If you would like to speak with a transportation specialist, please call <strong>877-571-6235</strong>.</p>

							<a href="http://www.metrogistics.com" class="btn btn-success">Home</a>
                                            </div>


                                        </div>

                                    </div>

                                </div>


                                <hr />


                            </div>

                            <div id="GetAQuoteBox" class="col-xs-12 col-md-5">

                                <div>
                                    <p>
                                        <h1>Information</h1>
                                        If you have any questions, please call or email us at sales@metrogistics.com.<br /><br />
                                        Rates posted are for typical passenger vehicles, light duty trucks, and SUVs. Additional fees may apply for inoperable or over-sized units and/or moves that are in difficult locations, low volume shipping lanes and lanes that involve tolls. These rates include any and all fuel surcharges.
                                    </p>
                                    <br />
                                    <br />
                                    <div class="well">
                                        MetroGistics<br />
                                        <strong>877-571-6235</strong><br />
                                        sales@metrogistics.com<br />
                                        <strong>Fax:</strong> 314-735-4341<br />
                                        <strong>Hours:</strong> 7AM to 9PM CT<br />
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
