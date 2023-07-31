@extends('layouts.admin')
 @section('content')
     <div class="app-content content">
         <div class="content-wrapper">
             <div class="content-header row">
             </div>
             <div class="content-body">
                 <div id="crypto-stats-3" class="row">
                     <div class="col-xl-3 col-12">
                         <div class="card crypto-card-3 pull-up">
                             <div class="card-content">
                                 <div class="card-body pb-0">
                                     <div class="row">
                                         <div class="col-2">
                                             <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                         </div>
                                         <div class="col-6 pl-2">
                                             <h4>{{__('Admin\dashboard.Total Sales')}}</h4>
                                         </div>
                                         <div class="col-4 text-right">
                                             <h6>$9,980</h6>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <canvas id="btc-chartjs" class="height-75"></canvas>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-3 col-12">
                         <div class="card crypto-card-3 pull-up">
                             <div class="card-content">
                                 <div class="card-body pb-0">
                                     <div class="row">
                                         <div class="col-2">
                                             <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                         </div>
                                         <div class="col-6 pl-2">
                                             <h4>{{__('Admin\dashboard.Total Orders')}}</h4>
                                         </div>
                                         <div class="col-4 text-right">
                                             <h6>$944</h6>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <canvas id="eth-chartjs" class="height-75"></canvas>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-3 col-12">
                         <div class="card crypto-card-3 pull-up">
                             <div class="card-content">
                                 <div class="card-body pb-0">
                                     <div class="row">
                                         <div class="col-2">
                                             <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                         </div>
                                         <div class="col-7 pl-2">
                                             <h4>{{__('Admin\dashboard.Total Products')}}</h4>
                                         </div>
                                         <div class="col-3 text-right">
                                             <h6>200</h6>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <canvas id="xrp-chartjs" class="height-75"></canvas>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-3 col-12">
                         <div class="card crypto-card-3 pull-up">
                             <div class="card-content">
                                 <div class="card-body pb-0">
                                     <div class="row">
                                         <div class="col-2">
                                             <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                         </div>
                                         <div class="col-6 pl-2">
                                             <h4>{{__('Admin\dashboard.Total Customers')}}</h4>
                                         </div>
                                         <div class="col-4 text-right">
                                             <h6>2000</h6>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-12">
                                         <canvas id="xrp-chartjs" class="height-75"></canvas>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Candlestick Multi Level Control Chart -->

                 <!-- Sell Orders & Buy Order -->
                 <div class="row match-height">
                     <div class="col-12 col-xl-8">
                         <div class="card">
                             <div class="card-header">
                                 <h4 class="card-title">{{__('Admin\dashboard.latest orders')}}</h4>
                                 <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                             </div>
                             <div class="card-content">
                                 <div class="table-responsive">
                                     <table class="table table-de mb-0">
                                         <thead>
                                         <tr>
                                             <th>{{__('Admin\dashboard.order number')}}</th>
                                             <th>{{__('Admin\dashboard.customer')}}</th>
                                             <th>{{__('Admin\dashboard.the price')}}</th>
                                             <th>{{__('Admin\dashboard.Order status')}}</th>
                                             <th>{{__('Admin\dashboard.Total')}}</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr class="bg-success bg-lighten-5">
                                             <td>108010</td>
                                             <td>Aida Sobhy</td>
                                             <td>$4762.53</td>
                                             <td>completed</td>
                                             <td>$4762.53</td>
                                         </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-xl-4">
                         <div class="card">
                             <div class="card-header">
                                 <h4 class="card-title">{{__('Admin\dashboard.Latest reviews')}}</h4>
                             </div>
                             <div class="card-content">
                                 <div class="table-responsive">
                                     <table class="table table-de mb-0">
                                         <thead>
                                         <tr>
                                             <th>{{__('Admin\dashboard.customer')}}</th>
                                             <th>{{__('Admin\dashboard.product')}}</th>
                                             <th>{{__('Admin\dashboard.Evaluation')}}</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr>
                                             <td>Aida Sobhy</td>
                                             <td>Labtop</td>
                                             <td>5</td>
                                         </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--/ Sell Orders & Buy Order -->
                 <!-- Active Orders -->

                 <!-- Active Orders -->
             </div>
         </div>
     </div>
 @stop
