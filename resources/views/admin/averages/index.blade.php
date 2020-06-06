@extends('layouts.admin')

@section('content')
   
        <h1>
            All ِRestaurant's Average :{{ $allAvgs }}
        </h1>
       
        <div>
                {{-- Group By: {{ $a }} --}}
                <h3>Your Feedbacks</h3>
                @if(count($grouped) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ِRestaurant ID</th>
                            <th>ِAverage</th>
                            
                        </tr>
                        @foreach($grouped as $g)
                            <tr>
                               
                                <td>{{$g->rid}}  </td>
                                <td>{{ $g->avg  }} </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>You have no Feedbacks</p>
                @endif
               
            </div>
            

           
     
@endsection
