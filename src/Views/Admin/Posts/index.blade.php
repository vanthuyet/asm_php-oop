@extends('layouts.master')

@section('title')
    Danh sách Bài viết
@endsection

@section('content')
   


    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách Bài viết</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a href="{{ url('admin/posts/create') }}" class="btn  btn-primary mb-2">Thêm Bài Viết</a>

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
                                    <th class="table-primary">IMAGE</th>
                                    <th class="table-primary">NAME</th>
                                    <th class="table-primary">OVERVIEW</th>
                                    <th class="table-primary">TÁC GIẢ</th>
                                    <th class="table-primary">TAG</th>
                                    <th class="table-primary">CONTENT</th>
                                    <th class="table-primary">CREATE AT</th>
                                    <th class="table-primary">UPDATE AT</th>
                                    <th class="table-primary">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="table-info"><?= $post['id'] ?></td>
                                        <td class="table-info">
                                            <img src="{{ asset($post['img_thumbnail']) }}" alt="" width="100px">
                                        </td>
                                        <td class="table-info"><?= $post['name'] ?></td>
                                        <td class="table-info"><?= $post['overview'] ?></td>
                                        <td class="table-info"><?= $post['auth_name'] ?></td>
                                        <td class="table-info"><?= $post['tag_names'] ?></td>
                                        <td class="table-info"><?= $post['content'] ?></td>
                                        <td class="table-info"><?= $post['created_at'] ?></td>
                                        <td class="table-info"><?= $post['updated_at'] ?></td>
                                        
                                        <td class="table-info">

                                            <a class="btn btn-warning" type="submit"
                                                href="{{ url('admin/posts/' . $post['id'] . '/edit') }}">Edit</a>

                                            <a class="btn btn-success" type="submit"
                                                href="{{ url('admin/posts/' . $post['id'] . '/show') }}">Show</a>

                                            <a onclick="return confirm('Chắc muốn xóa không?')" class="btn btn-danger mt-1"
                                                type="submit"
                                                href="{{ url('admin/posts/' . $post['id'] . '/delete') }}">Delete</a>

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
