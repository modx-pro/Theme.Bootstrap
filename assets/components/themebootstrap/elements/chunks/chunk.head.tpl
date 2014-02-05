<meta charset="[[++modx_charset]]">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<base href="[[++site_url]]" />
<title>[[*longtitle:default=`[[*pagetitle]]`]] - [[++site_name]]</title>

<!-- You can add theme from bootswatch.com: just add it into &cssSources=``.
For example: [[++assets_url]]components/themebootstrap/css/cerulean/bootstrap-theme.min.css-->
[[MinifyX?
	&minifyCss=`1`
	&registerCss=`1`
	&cssSources=`
		[[++assets_url]]components/themebootstrap/css/bootstrap.min.css,
		[[++assets_url]]components/themebootstrap/css/add.css
	`
	&minifyJs=`1`
	&registerJs=`1`
	&jsSources=`
		[[++assets_url]]components/themebootstrap/js/bootstrap.min.js
	`
]]

<script src="[[++assets_url]]components/themebootstrap/js/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
