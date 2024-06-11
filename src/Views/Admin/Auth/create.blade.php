@extends('layouts.master')

@section('title')
    Thêm mới Tác giả
    
@endsection

@section('content')
    {{-- <h2>Thêm mới Tag</h2> --}}

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

    <form action="{{ url('admin/authors/store') }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Tên tác giả:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name authors" name="name">
        </div>
        {{-- <div class="mb-3 mt-3 ">
            <select class="form-select" name="active" id="active">
                <option value="1" selected>Active</option>
                <option value="0" >Not Active</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
@endsection



