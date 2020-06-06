@extends('layouts.manager')

@section('content')
        
        <h1>
             Average  Today : {{ $feedback }}
        </h1>
        {{-- <h1>
            All Time Average :{{ $avgStar }}
        </h1> --}}
        {{-- <h1>
            Feedback Count :{{ $countF }}
        </h1> --}}

        <h1>
            All ِRestaurant's Average :{{ $allAvgs }}
        </h1>
        {{-- <hr/>
        <div>
             @if(count($feedback) > 0)
             <table class="table table-striped">
                 <tr>
                    
                     <th> Today's Average</th>
                     
                 </tr>
                 @foreach($feedback as $g)
                     <tr>
                        
                         
                         <td>{{ $g->avgToday }} </td>
                     </tr>
                 @endforeach
             </table>
         @else
             <p>You have no Average Today</p>
         @endif
        </div> --}}
        <hr/>
        <div class="row">
            <div class="col-lg-4">
        <div class="card">
             @if(count($avgStar) > 0)
             <table class="table table-striped">
                 <tr>
                    
                     <th> All Time Average</th>
                     
                 </tr>
                 @foreach($avgStar as $g)
                     <tr>
                        
                         
                         <td>{{ $g->avgAll }} </td>
                     </tr>
                 @endforeach
             </table>
         @else
             <p>You have no Average</p>
         @endif
        </div>
            </div>
        <hr/>
        <div class="col-lg-4">
        <div class="card">
             @if(count($countF) > 0)
             <table class="table table-striped">
                 <tr>
                    
                     <th>Count Feedbacks</th>
                     
                 </tr>
                 @foreach($countF as $g)
                     <tr>
                        
                         
                         <td>{{ $g->count  }} </td>
                     </tr>
                 @endforeach
             </table>
         @else
             <p>You have no feedback Count </p>
         @endif
        </div>
        </div>
     
        {{-- <div>
            <h3>Your Feedbacks</h3>
              
               
            </div> --}}
            <hr/>
            <div class="col-lg-4">
           <div class="card">
                @if(count($serviceAverage) > 0)
                <table class="table table-striped">
                    <tr>
                       
                        <th>Service Average</th>
                        
                    </tr>
                    @foreach($serviceAverage as $g)
                        <tr>
                           
                            
                            <td>{{ $g->avg_service  }} </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no Average</p>
            @endif
           </div>
           <hr/>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-4">
           <div class="card">
                @if(count($foodAverage) > 0)
                <table class="table table-striped">
                    <tr>
                       
                        <th>Food  Average</th>
                        
                    </tr>
                    @foreach($foodAverage as $g)
                        <tr>
                           
                            
                            <td>{{ $g->avg_food  }} </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no Food Average</p>
            @endif
           </div>
                </div>
           <hr/>
           <div class="col-lg-4">
           <div class="card">
                @if(count($sanitationAverage) > 0)
                <table class="table table-striped">
                    <tr>
                       
                        <th>Sanitation  Average</th>
                        
                    </tr>
                    @foreach($sanitationAverage as $g)
                        <tr>
                           
                            
                            <td>{{ $g->avg_sanitation  }} </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no music Average</p>
            @endif
           </div>
           </div>
           <hr/>
           <div class="col-lg-4">
           <div class="card">
                @if(count($musicAverage) > 0)
                <table class="table table-striped">
                    <tr>
                       
                        <th>Music  Average</th>
                        
                    </tr>
                    @foreach($musicAverage as $g)
                        <tr>
                           
                            
                            <td>{{ $g->avg_music  }} </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no sanitation Average</p>
            @endif
           </div>
           </div>
        </div>
           <hr/>
        <div class="row">
                <div class="col-lg-12">
           <div class="card" style="padding: 1rem">
           <div>
                Total Tokens: <b style="color:rgba(255, 255, 255, 0.7) !important">{{$allTokensPerBranch}}</b>
            </div>
            <hr/>
            <div>
                    Used Tokens: <b style="color:rgba(255, 255, 255, 0.7) !important">{{$UsedTokenCount}}</b>
            </div>
            <hr/>
            <div>
                    Unused Tokens: <b style="color:rgba(255, 255, 255, 0.7) !important">{{$UnusedTokenCount}}</b>
            </div>
           </div>
                </div>
        </div>
            <hr/>
        <div class="row">
            <div class = "col-lg-4">
           <div class="card">
               {{-- Group By: {{ $a }} --}}
               <h3>Your Feedbacks</h3>
               @if(count($a) > 0)
                   <table class="table table-striped">
                       <tr>
                           <th>Month</th>
                           <th>Year</th>
                           <th>ِAverage</th>
                       </tr>
                       @foreach($a as $feedbacka)
                           <tr>
                               <td>{{ $feedbacka->month  }} </td>
                               <td>{{$feedbacka->year}}  </td>
                               <td>{{$feedbacka->avg}}</td>
                           </tr>
                       @endforeach
                   </table>
               @else
                   <p>You have no Feedbacks</p>
               @endif
              
           </div>
            </div>
           <hr/>
           <div class = "col-lg-4">
           <div class="card">
               {{-- {{$byweek}} --}}
               @if(count($byweek) > 0)
               <table class="table table-striped">
                    <tr>
                            
                            <th>Week</th>
                            <th>Year</th>
                            <th>ِAverage</th> 
                                  
                    </tr>
                        @foreach($byweek as $feedbacka)
                            <tr>
                                    <td>{{$feedbacka->week  }} </td>
                                    <td>{{$feedbacka->year}}  </td>
                                    <td>{{$feedbacka->avg}}</td>
                                
                            </tr>
                        @endforeach
               </table>
           @else
               <p>You have no Feedbacks</p>
           @endif

           </div>
           </div>
           <hr/>
           <div class = "col-lg-4">
           <div class="card">
                <h3>Quarter Feedbacks</h3>
                {{-- {{$byquarter}} --}}
                @if(count($byquarter) > 0)
                <table class="table table-striped">
                     <tr>
                             
                             <th>Quarter</th>
                             <th>Year</th>
                             <th>ِAverage</th> 
                                   
                     </tr>
                         @foreach($byquarter as $feedbacka)
                             <tr>
                                     <td>{{$feedbacka->quarter  }} </td>
                                     <td>{{$feedbacka->year}}  </td>
                                     <td>{{$feedbacka->avg}}</td>
                                 
                             </tr>
                         @endforeach
                </table>
            @else
                <p>You have no Feedbacks</p>
            @endif
 
            </div>
           </div>
        </div>
            <hr/>
            
            {{-- {{$allFeedbackJson}} --}}
        {!! $chart->html() !!}
        </div>
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
@endsection
