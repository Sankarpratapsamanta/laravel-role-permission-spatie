@extends('layouts.pannel')

@section('content')

<h2 class="intro-y text-lg   font-medium mt-10">
    Users List
</h2>

<br>
<!-- @if(auth()->user()->can('user_create')) -->
<!-- <div class="w-full sm:w-auto flex  mt-4 sm:mt-0">
    <button class="btn btn-primary shadow-md mr-2"> <a href="/users/create">Create New Users</a> </button>
</div> -->
<!-- @endif -->
<div class="w-full sm:w-auto flex  mt-4 sm:mt-0">
    <button class="btn btn-primary shadow-md mr-2"> <a href="/users/create">Create New Users</a> </button>
</div>
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                
                <th class="whitespace-nowrap">Name</th>
                <th class="text-center whitespace-nowrap">Email</th>
                <th class="text-center whitespace-nowrap">Role</th>

                
                <th class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
            <tr class="intro-x">
                
                <td>{{@$item->name}}</td>
                <td class="text-center">{{@$item->email}}</td>
                <td class="text-center">{{strtoupper(@$item->roles[0]->name)}}</td>
                
                <!--  <td class="w-40">
                    <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                </td>-->
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center text-theme-10 mr-3" href="/users/{{@$item->id}}/edit"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <div>
                            <a class="flex items-center text-theme-6" href="/users/{{@$item->id}}"
                                onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{@$item->id}}').submit();">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>

                            <form id="delete-form-{{@$item->id}}" action="/users/{{@$item->id}}" method="POST" style="display: none;">
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