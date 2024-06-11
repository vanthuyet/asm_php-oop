@extends('layouts.master')

@section('title')
    Danh sách Tags
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

                    <a href="{{ url('admin/tags/create') }}" class="btn  btn-primary mb-2">Thêm Tag</a>

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
                                    <th class="table-primary">STATUS</th>
                                    <th class="table-primary">CREATE AT</th>
                                    <th class="table-primary">UPDATE AT</th>
                                    <th class="table-primary">ACTION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class="table-info"><?= $tag['id'] ?></td>
                                        <td class="table-info"><?= $tag['name'] ?></td>
                                        <td class="table-info"><?= $tag['active'] == 1 ? 'ON'    : 'OFF' ?></td>
                                        <td class="table-info"><?= $tag['create_at'] ?></td>
                                        <td class="table-info"><?= $tag['update_at'] ?></td>
                                        <td class="table-info">

                                            <a class="btn btn-warning" type="submit"
                                                href="{{ url('admin/tags/' . $tag['id'] . '/edit') }}">Edit</a>

                                            <a class="btn btn-success" type="submit"
                                                href="{{ url('admin/tags/' . $tag['id'] . '/show') }}">Show</a>

                                            <a onclick="return confirm('Chắc muốn xóa không?')" class="btn btn-danger "
                                                type="submit"
                                                href="{{ url('admin/tags/' . $tag['id'] . '/delete') }}">Delete</a>

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
