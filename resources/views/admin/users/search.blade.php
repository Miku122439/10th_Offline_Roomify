@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content2')

<style>

.button-inactivate{
            padding: 10px 20px;
            font-size: 12px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            width: 100px;
            height: 50px;
        }

.button-activate {
    padding: 10px 20px;
    font-size: 14px;
    color: white;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width:  100px;
    height: 50px;
}

.table {
    border: 1px solid #000;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.table th, .table td {
    border: none;
}

.table th
{
    font-size: 20px;
}

</style>
<h3 class="text-center">
    Users list
</h3>
<div>
    <form action="{{route('admin.search')}}" class="w-25 mb-3">
        <input type="search" name="search" class="form-control" placeholder="Search...." style="border: 1px solid #ccc;">
    </form>
</div>
@if($users->isNotEmpty())
<table class="table">
    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach($users as $index => $user)
        <tr class="{{ $index % 2 == 0 ? 'table-warning' : '' }}">
        <td scope="row"> 
            @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-md">
            @else
            <i class="fa-solid fa-circle-user d-block icon-md ms-2"></i>
            @endif
        </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email}}</td>
        @if($user->trashed())
                <td class="">
                    <i class="fa-solid fa-circle text-danger"></i> &nbsp; Deactivate
                </td>
                <td class="text-center">
                    <button class="button-activate" data-bs-toggle="modal" data-bs-target="#activate-user-{{ $user->id }}">Activate</button>
                </td>
            @else
                <td class="">
                    <i class="fa-solid fa-circle text-success"></i> &nbsp; Activate
                </td>
                <td class="text-center">
                    <button class="button-inactivate" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">Deactivate</button>
                </td>
            @endif
            {{-- include a model herre --}}
            @include('admin.users.modal.status')
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <div>
        Not found User. 
    </div>
@endif
@endsection