@extends('layouts.pannel')

@section('content')

<h2 class="intro-y text-lg   font-medium mt-10">
    Role List
</h2>

<br>
<div class="w-full sm:w-auto flex  mt-4 sm:mt-0">
    <button class="btn btn-primary shadow-md mr-2"> <a href="/roles/create">Create New Role</a> </button>
</div>

<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                
                <th class="whitespace-nowrap">Name</th>
                <th class="text-center whitespace-nowrap">Guard Name</th>
                <th class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr class="intro-x">
                
                <td>{{strtoupper(@$role->name)}}</td>
                <td class="text-center">{{@$role->guard_name}}</td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <button class="btn btn-warning" style="height:44px;">
                            <a class="flex items-center mr-2" href="/roles/{{@$role->id}}/assign-permission"> <i data-feather="key" class="w-4 h-4 mr-1"></i> Assign Permissions </a>
                        </button>
                        <a class="flex items-center text-theme-10 mr-3" href="/roles/{{@$role->id}}/edit"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <div>
                            <a class="flex items-center text-theme-6" href="/roles/{{@$role->id}}"
                                onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{@$role->id}}').submit();">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>

                            <form id="delete-form-{{@$role->id}}" action="/roles/{{@$role->id}}" method="POST" style="display: none;">
                                @method('DELETE')    
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection