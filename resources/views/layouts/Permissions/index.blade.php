@extends('layouts.pannel')

@section('content')

<h2 class="intro-y text-lg   font-medium mt-10">
    Permission Group List
</h2>

<br>
<div class="w-full sm:w-auto flex  mt-4 sm:mt-0">
    <button class="btn btn-primary shadow-md mr-2"> <a href="/permissions-group/create">Create New Permission Group</a> </button>
</div>

<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                
                <th class="whitespace-nowrap">Name</th>
                <th class="text-center whitespace-nowrap">Slug</th>
                <th class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissionsGroup as $permission)
            <tr class="intro-x">
                
                <td>{{@$permission->name}}</td>
                <td class="text-center">{{@$permission->slug}}</td>
                
                <!--  <td class="w-40">
                    <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                </td>-->
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <div>
                            <a class="flex items-center text-theme-6" href="/permissions/{{@$permission->id}}"
                                onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{@$permission->id}}').submit();">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>

                            <form id="delete-form-{{@$permission->id}}" action="/permissions/{{@$permission->id}}" method="POST" style="display: none;">
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