@extends('layouts.master')

@section('title')
    Danh sách Tác giả
@endsection

@section('content')
    <h2>Welcome to admin</h2>


    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách Tag</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a href="{{ url('admin/authors/create') }}" class="btn  btn-primary mb-2">Thêm Tác giả</a>

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-warning">
                            {{ $_SESSION['msg'] }}
                            @php
                                unset($_SESSION['status']);
                                unset($_SESSION['msg']);
                            @endphp
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-success mt-2">
                            <thead>
                                <tr>
                                    <th class="table-primary">ID</th>
                                    <th class="table-primary">NAME</th>
                                    <th class="table-primary">CREATED AT</th>
                                    <th class="table-primary">UPDATED AT</th>
                                    <th class="table-primary">ACTION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($auths as $auth)
                                    <tr>
                                        <td class="table-info"><?= $auth['id'] ?></td>
                                        <td class="table-info"><?= $auth['name'] ?></td>
                                        <td class="table-info"><?= $auth['created_at'] ?></td>
                                        <td class="table-info"><?= $auth['updated_at'] ?></td>
                                        <td class="table-info">

                                            <a class="btn btn-warning" type="submit"
                                                href="{{ url('admin/authors/' . $auth['id'] . '/edit') }}">Edit</a>

                                            <a class="btn btn-success" type="submit"
                                                href="{{ url('admin/authors/' . $auth['id'] . '/show') }}">Show</a>

                                            <a onclick="return confirm('Chắc muốn xóa không?')" class="btn btn-danger "
                                                type="submit"
                                                href="{{ url('admin/authors/' . $auth['id'] . '/delete') }}">Delete</a>

                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
