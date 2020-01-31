<noscript id="deferred-styles">
	<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/hover-min.css">
	<link rel="stylesheet" href="{!!asset('css')!!}/sweetalert.css">
	<link rel="stylesheet" href="{!!asset('css')!!}/jquery-ui.multidatespicker.css">
</noscript>
<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/magnific-popup.css">
<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/bootstrap.min.css">
<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery-ui.min.css">

<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/jquery.raty.css">
<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="{!!asset('user-interface')!!}/css/main.css">
<link rel="stylesheet" href="{!!asset('user-interface/css/bootstrap-responsive-tabs.css') !!}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<script>
	var loadDeferredStyles = function() {
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
@yield('css')