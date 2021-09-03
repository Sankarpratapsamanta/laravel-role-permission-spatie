@extends('layouts.pannel')

@section('content')


<div>
<h2 class="intro-y text-lg font-medium mt-10">
                  Create  Blog
                </h2>
</div>
<br>
<div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    
                    <!-- <p class="text-muted font-14">Use contextual classes to color table rows or individual cells. </p> -->
                    <div class="row">
                        <div class="col-md-12">
                            
                        
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/blogs') }}" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                      
                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Title </h6>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Description</h6>
                                    <input type="text" name="description" class="form-control" required>
                                </div>

                            
                                <div class="form-group mb-5">
                                    <div>
                                        <button type="submit" class="btn btn-raised btn-primary waves-effect waves-light mb-0">
                                            Submit
                                        </button>
                                        <a href="{{url('/blogs')}}" class="btn btn-raised btn-danger waves-effect waves-light mb-0">
                                        Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
@endsection