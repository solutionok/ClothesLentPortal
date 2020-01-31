<audio id="audio-alert" src="{!! asset('admin-interface/audio/alert.mp3') !!}" preload="auto"></audio>
<audio id="audio-fail" src="{!! asset('admin-interface/audio/fail.mp3') !!}" preload="auto"></audio>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/jquery/jquery-ui.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/bootstrap/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/icheck/icheck.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/morris/raphael-min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/morris/morris.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/rickshaw/d3.v3.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/rickshaw/rickshaw.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/bootstrap/bootstrap-datepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/owl/owl.carousel.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/moment.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admin-interface/js/plugins.js') !!}"></script>        
<script type="text/javascript" src="{!! asset('admin-interface/js/actions.js') !!}"></script>
<script src="{!!asset('js')!!}/sweetalert.min.js"></script>
<script type="text/javascript">
	@if(Session::has('session_header'))
		$(document).ready(function(){
			swal("{!! Session::get('session_header') !!}", "{!! Session::get('session_content') !!}", "{!! Session::get('session_boolean') !!}");
		});
	@endif
</script>
@yield('js')