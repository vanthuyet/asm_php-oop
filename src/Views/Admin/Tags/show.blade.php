@extends('layouts.master')

@section('title')

Chi tiết tag {{ $tag['name'] }}
    
@endsection

@section('content')

   
    
    <table class="table table-success">
        <thead>
            <tr>
                <th class="table-primary">Trường </th>
                <th class="table-primary">Giá trị</th>
            
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tag as $field => $value)
                <tr>
                    <td class="table-info">{{ $field }}</td>
                    
                    <td class="table-info">{{ $value }}</td>
                    
                    
                    
                    
                </tr>
                
        </tbody>
        @endforeach

        <a href="{{ url("admin/tags")}}" class="btn btn-primary mb-2">Quay lại</a>
    </table>
@endsection


