@extends('layouts.master')

@section('title')
    Cập nhật bài viết
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

    <form action="{{ url("admin/posts/{$post['id']}/update") }}" class="row g-3 " method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $post['name'] }}">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Overview</label>
            <input type="text" class="form-control" name="overview" value="{{ $post['overview'] }}" id="overview">
        </div>
        <div class="col-md-6 ">
            <label for="auth" class="form-label">Tác giả</label>
            <select class="form-select" name="auth" id="auth">
                @foreach ($auths as $auth)
                    <option @if ($auth['id'] == $post['auth_id']) selected @endif 
                    value="{{ $auth['id'] }}">
                        {{ $auth['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="auth" class="form-label">Tag</label>
            <select class="form-select" name="tag[]" id="tag" multiple>
                @foreach ($tags as $t)
                    @php
                        $s = '';
                        foreach ($tagP as $tag) {
                            if ($t['id'] === $tag['id_tag']) {
                                $s = 'selected';
                            }
                        }
                    @endphp
                    <option value="{{ $t['id'] }}" {{ $s }}>{{ $t['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="avatar" class="form-label">Image</label>
            <input type="file" class="form-control" id="img" placeholder="Enter Image" name="img_thumbnail">
            <img src="{{ asset($post['img_thumbnail']) }}" alt="" width="100px">
        </div>

        <div class="col-12">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control"  id="content" name="content" rows="3">{{ $post['content'] }}</textarea>
        </div>


        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </div>
    </form>
@endsection

@section('area')
    <script>
        tinymce.init({
            selector: 'textarea#content',
            height: 500,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endsection
