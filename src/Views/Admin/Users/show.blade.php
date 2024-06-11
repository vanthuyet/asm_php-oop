@extends('layouts.master')

@section('title')

Chi tiết người dùng: {{ $user['name'] }}
    
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
            @foreach ($user as $field => $item)
                <tr>
                    <td class="table-info">{{ $field }}</td>
                    @php
                        
                   
                    showValue($field,'id',$item);
                    showValue($field,'name',$item);
                    showValue($field,'email',$item);
                    showValue($field,'avatar',$item);
                    showValue($field,'password',$item);
                    showValue($field,'create_at',$item);
                    showValue($field,'update_at',$item);
                    
                    if(str_starts_with($field, 'role')) {
                        if($item == 1){
                            echo "<td class='table-info'>ON </td>";
                        }else{
                            echo "<td class='table-info'>ON </td>";
                        }
                    }

                    if(str_starts_with($field, 'is_active')) {
                        if($item == 1){
                            echo "<td class='table-info'>ON </td>";
                        }else{
                            echo "<td class='table-info'>ON </td>";
                        }
                    }

                    @endphp
                    
                </tr>
        </tbody>
        @endforeach
    </table>
@endsection


