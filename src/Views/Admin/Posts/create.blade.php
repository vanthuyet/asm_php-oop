@extends('layouts.master')

@section('title')
    Thêm mới bài viết
    
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

    <form action="{{ url('admin/posts/store') }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Overview</label>
            <input type="text" class="form-control" id="overview" placeholder="Enter overview" name="overview">
        </div>
        <div class="mb-3 mt-3 ">
            <label for="Tag" class="form-label">Tag</label>
            <select class="form-select" name="tag[]" id="tag" multiple>
                @foreach ($tags as $tag)             
                <option value="{{ $tag['id']}}">{{ $tag['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3 ">
            <label for="auth" class="form-label">Tác giả</label>
            <select class="form-select" name="auth" id="auth">
                @foreach ($auths as $auth)             
                <option value="{{ $auth['id']}}">{{ $auth['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="avatar" class="form-label">Image</label>
            <input type="file" class="form-control" id="img" placeholder="Enter Image" name="img">
        </div>
        <div class="mb-3 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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



