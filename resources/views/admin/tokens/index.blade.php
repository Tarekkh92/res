@extends('layouts.admin')

@section('content')
        <h1>Tokens</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for tokens..">

            <h3>Your Tokens</h3>
                    @if(count($tokens) > 0)
                        <table class="table table-striped" id="myTable">
                            <tr>
                                <th>token ID</th>
                                <th>tokenName</th>
                                <th>created at</th>
                                <th>updated at</th>
                                <th>Used Token</th>
                                <th>Edit Token</th>
                                <th>Restaurant ID</th>
                            </tr>
                            @foreach($tokens as $token)
                                <tr>
                                    <td>{{$token->id}}</td>
                                    <td>{{$token->tokenName}}</td>
                                    <td>{{$token->created_at}}</td>
                                    <td>{{$token->updated_at}}</td>
                                    <td>{{$token->usedToken}}</td>
                                    <td><a href="tokens/{{$token->id}}/edit"><i class="fas fa-pencil-alt icon" aria-hidden="true"></i></a></td>
                                    <td>{{$token->restaurantID}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no Tokens</p>
                    @endif
                    <script>
                            function myFunction() {
                              // Declare variables 
                              var input, filter, table, tr, td, i;
                              input = document.getElementById("myInput");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");
                            
                              // Loop through all table rows, and hide those who don't match the search query
                              for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) {
                                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                  } else {
                                    tr[i].style.display = "none";
                                  }
                                } 
                              }
                            }
                    </script>
            
@endsection
