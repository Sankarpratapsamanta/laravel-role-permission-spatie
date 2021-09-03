@extends('layouts.pannel')

@section('content')


<div>
<h2 class="intro-y text-lg font-medium mt-10">
    Create  User
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
                            
                        
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Name </h6>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Email</h6>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Password</h6>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Confirm-Password</h6>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group mb-5">
                                    <h6 class="text-muted">Roles</h6>
                                    <select name="role_id" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{@$role->id}}">{{strtoupper($role->name)}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <div>
                                        <button type="submit" class="btn btn-raised btn-primary waves-effect waves-light mb-0">
                                            Submit
                                        </button>
                                        <a href="/users" class="btn btn-raised btn-danger waves-effect waves-light mb-0">
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