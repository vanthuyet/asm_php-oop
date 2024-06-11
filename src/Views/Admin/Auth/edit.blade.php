@extends('layouts.master')

@section('title')
    Cập nhật Tác giả
    
@endsection

@section('content')
   

    @if (!empty($_SESSION['errors']))
    <div class="alert alert-warning">
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
         @php
             unset($_SESSION['errors']);
         @endphp
    </div>
    @endif

<form action="{{ url("admin/authors/{$auth['id']}/update") }}" enctype="multipart/form-data" method="POST">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $auth['name']}}" name="name">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{ url("admin/authors") }}">Quay lại </a>
</form>
    
@endsection


