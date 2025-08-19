{{-- resources/views/website/contact.blade.php --}}
@extends('website.layout')

@section('title', 'Contact | MyWebsite')

@section('content')
<div class="container">
    <h2 class="mb-4">Contact Us</h2>
    <form>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>
        <button class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection
