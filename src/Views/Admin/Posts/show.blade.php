@extends('layouts.master')

@section('title')

Chi tiết bài viết: {{ $post['name'] }}
    
@endsection

@section('content')


    
    <table class="table table-success ">
        <thead>
            <tr>
                <th class="table-primary">Trường </th>
                <th class="">Giá trị</th>
            
                
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $field => $item)
                <tr>
                    <td class="table-info">{{$field }}</td>
                    
                    {{-- @if(str_starts_with($field, 'img_'))
                        <td class="table-info">

                            <img width="50px" src="{{ asset($item)}}" alt="">
                        </td>
                    @else 
                    <td style="max-width:950px"></td>
                        
                    @endif --}}
                   @php
                        showValue($field,'id',$item);
                        showValue($field,'name',$item);
                        showValue($field,'overview',$item);
                        showValue($field,'created_at',$item);
                        showValue($field,'updated_at',$item);
                        showValue($field,'content',$item);
                        showValue($field,'auth_id',$item);


                        if(str_starts_with($field, 'active')) {
                        if($item == 1){
                            echo "<td class='table-info'>ON </td>";
                        }else{
                            echo "<td class='table-info'>ON </td>";
                        }
                    }

                     


                        if(str_starts_with($field, 'img_')) {
                        echo "<td class='table-info'>
                       <img width='50px' src='" . asset($item) . "' alt=''/>
                       </td>";
                    }
                   @endphp

                    
                    
                
                    
                </tr>

                
                @endforeach 
        </tbody>
       
    </table>
@endsection


