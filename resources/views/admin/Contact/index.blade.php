@extends('layouts.app')

@section('title', 'Admin: message')

@section('content2')

<div class="container">
    <h1 class="title">Contact Messages</h1>
    @if($all_contacts->isNotEmpty())
    @foreach( $all_contacts as $contact )
    <a href="{{ route('admin.contact.show', $contact->id) }}" class="text-decoration-none text-dark">
    <div class="card">
    <div class="card-body p-0">
            <div class="row align-items-center border-bottom p-2">
                <div class="col text-center">
                    @if($contact->is_replied)
                        <i class="fa-solid fa-check text-success display-1"></i> 
                        <p>Replied</p>
                    @elseif($contact->is_read)
                        <i class="fa-solid fa-envelope-open text-secondary display-1"></i> 
                    @else
                        <i class="fa-solid fa-envelope text-primary display-1"></i> 
                    @endif
                </div>
                <div class="col text-start">
                    <div class="">From: {{ $contact->name }}</div>
                    <div class="">Email: {{ $contact->email }}</div>
                    <div class="">Message: {{ Str::limit($contact->message, 10, '...') }}</div>
                </div>
                <div class="col">
                    <div>{{ $contact->created_at->diffForHumans() }}</div>
                    <div>{{ $contact->created_at }}</div>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
        <div class="text-center pagenate mt-3">
        {{ $all_contacts->links('pagination::simple-tailwind', ['class' => 'pagination']) }}
        </div>
    @else
    <h3 class="text-center">No message</h3>
    @endif
    </div>
</div>

@endsection