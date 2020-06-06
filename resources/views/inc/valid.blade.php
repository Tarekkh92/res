@extends('layouts.manager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result</div>

                <div class="card-body">
                    <h4 style="color: green">Valid Token</h4>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="jumbotron text-center">
        <h1>Valid Token</h1>
    </div> --}}
    <script>
        setTimeout(function(){window.location='/validate'}, 3000);
</script>
@endsection