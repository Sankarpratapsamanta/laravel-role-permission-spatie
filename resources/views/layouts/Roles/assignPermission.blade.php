@extends('layouts.pannel')

@section('content')

<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Assign  Permission To {{strtoupper($role->name)}}
    </h2>
</div>
<br>



<!--  -->

<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <input type="text" value="/roles/{{@$role->id}}/assign-permission"> -->
                        <form class="form-control" role="form" method="POST" action="/roles/{{@$role->id}}/assign-permission" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                            @forelse($permissions as $permission) 
                            <h6 class="text-muted">{{$permission->name}} </h6>
                            @foreach($permission->permission as $item)
                                <!-- <input type="text" value="{{$item->name}}"> -->
                                <div class="form-group mb-5">
                                    <input type="checkbox" name="permission[]" value="{{$item->id}}" id="permission-{{$item->id}}" @if($role->hasPermissionTo($item->id)) checked @endif >
                                    <label for="permission-{{$item->id}}" class="text-muted">{{$item->name}} </label>
                                </div> 

                            @endforeach
                                
                                @empty
                                <p>No Permissions Added Yet !</p>
                            @endforelse
                    
                            

                        
                            <div class="form-group mb-5">
                                <div>
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect waves-light mb-0">
                                        Assign
                                    </button>
                                    <a href="{{url('/roles')}}" class="btn btn-raised btn-danger waves-effect waves-light mb-0">
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
</div> 


@endsection