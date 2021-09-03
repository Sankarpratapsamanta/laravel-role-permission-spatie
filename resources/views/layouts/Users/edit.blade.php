@extends('layouts.pannel')

@section('content')


<div>
<h2 class="intro-y text-lg font-medium mt-10">
    Edit User
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
                            
                        
                        <form class="form-horizontal" role="form" method="POST" action="/users/{{@$user->id}}" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        @method('PATCH')
                      
                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Name </h6>
                                    <input type="text" value="{{@$user->name}}" name="name" class="form-control" required>
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Email</h6>
                                    <input type="email" value="{{@$user->email}}" name="email" class="form-control" required>
                                </div>


                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Roles</h6>
                                    <select name="role_id" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{@$role->id}}" @if(@$role->id === @$user->role_id) selected @endif>
                                            {{strtoupper(@$role->name)}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-5">
                                    <div>
                                        <button type="submit" class="btn btn-raised btn-primary waves-effect waves-light mb-0">
                                            Update
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