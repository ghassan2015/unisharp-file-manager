<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'File Manager') }}</title>
    {{-- Styles package --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
   {{--end Style package--}}
    {{-- Models--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{--end Model--}}

    {{--bootstrap ar--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    {{--end bootstrap en --}}

    {{--bootstrap en--}}

    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">--}}

    {{--end bootstrap en --}}
</head>
<body>

<button type="button" class="btn btn-primary show" data-toggle="modal" data-target="#myModal">{{trans('file-manger.media')}}</button>

<div class="modal fade " id="myModal" style="height: 120%">
<div class="modal-dialog modal-xl modal-y2">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">{{trans('file-manger.title')}}</h4>
{{--            <a type="button" class="close" data-dismiss="modal">&times;</a>--}}
            <div class="close" data-dismiss="modal"><a href="" style="text-decoration: none;">X</a></div>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="height: 130%">
            <div class="col-md-12" id="fm-main-block" style="height: 130%">

            <div id="fm"></div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('file-manger.close')}}<span style="padding-left: 4px"><i class="fa fa-times" aria-hidden="true"></i></span>
            </button>
        </div>

    </div>
</div>
</div>

<div class="container">
    <textarea name="editor"></textarea>
</div>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.config.extraPlugins = 'youtube';
    CKEDITOR.config.youtube_width = '640';
    CKEDITOR. config.youtube_height = '480';
    CKEDITOR. config.youtube_responsive = true;
    CKEDITOR.config.youtube_autoplay = true;

    CKEDITOR.config.extraPlugins = 'embedbase';
    CKEDITOR.config.extraPlugins = 'embed';
    CKEDITOR.config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
    CKEDITOR.config.language = 'ar';

    CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: 'laravel-filemanager'});
</script>

<!-- File manager -->
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
    $('.show').on('click',function () {
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementsByClassName('fm-body').setAttribute('style', 'height:' +700 + 'px');

            fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });
    });

</script>
</body>
</html>
