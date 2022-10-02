<!doctype html>
<html lang="ja">
@include('admin.parts.head')
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
@include('admin.parts.header')

@yield('content')

@include('admin.parts.footer')
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
@yield('include-bottom')
        </div>
    </div>
</div>

</body>
</html>
