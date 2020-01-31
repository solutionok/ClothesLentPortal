<link rel="stylesheet" type="text/css" id="theme" href="{!! asset('admin-interface/css/theme-default.css') !!}"/>
<noscript id="deferred-styles">
    <link rel="stylesheet" type="text/css" href="{!! asset('admin-interface/css/fontawesome/font-awesome.min.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('admin-interface/css/dropzone/dropzone.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('admin-interface/css/fullcalendar/fullcalendar.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('admin-interface/css/summernote/summernote.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,500,600,700&subset=latin,latin-ext"/>
</noscript>
<script>
    var loadDeferredStyles = function(){
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
    webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
    else window.addEventListener('load', loadDeferredStyles);
</script>
<link rel="stylesheet" href="{!!asset('css')!!}/sweetalert.css">
@yield('css')