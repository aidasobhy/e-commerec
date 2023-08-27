@extends('layouts.app')
@section('slider')
    <div id="displayTop" class="displaytopthree">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12">
                    <div class="nov-row-wrap row">
                        @isset($sliders)
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>
                        <div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
                             data-effect="random" data-slices="15" data-animspeed="500" data-pausetime="10000"
                             data-startslide="0" data-directionnav="false" data-controlnav="true"
                             data-controlnavthumbs="false" data-pauseonhover="true" data-manualadvance="false"
                             data-randomstart="false">
                            <div class="nov_preload">
                                <div class="process-loading active">
                                    <div class="loader">
                                    </div>
                                </div>
                            </div>
                            <div class="nivoSlider">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
