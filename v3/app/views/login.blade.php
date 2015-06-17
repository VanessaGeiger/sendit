<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8 no-js">      <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9 no-js">           <![endif]-->
<!--[if gt IE 9]>  <html class="no-js">                       <![endif]-->
<!--[if !IE]><!--> <html class="no-js">                       <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Karma - Responsive minimalistic bootstrapped admin theme.</title>

    <!-- // IOS webapp icons // -->
    
    <meta name="apple-mobile-web-app-title" content="Karma Webapp">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/mobile/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/mobile/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/mobile/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/mobile/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/mobile/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/mobile/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" href="images/mobile/apple-touch-icon.png" />
    <link rel="shortcut icon" href="images/favicons/favicon.ico" />
    
    <!-- // IOS webapp splash screens // -->
    
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)"
          href="/images/mobile/apple-touch-startup-image-1536x2008.png"/>
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"
          href="/images/mobile/apple-touch-startup-image-1496x2048.png"/>     
 	<link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)"
          href="/images/mobile/apple-touch-startup-image-768x1004.png"/>
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)"
          href="/images/mobile/apple-touch-startup-image-748x1024.png"/>
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" 
          href="/images/mobile/apple-touch-startup-image-640x1096.png"/>    
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"
          href="/images/mobile/apple-touch-startup-image-640x920.png"/>    
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)"
          href="/images/mobile/apple-touch-startup-image-320x460.png"/>    
    
    <!-- // Windows 8 tile // -->
    
    <meta name="application-name" content="Karma Webapp">
    <meta name="msapplication-TileColor" content="#333333" />
	<meta name="msapplication-TileImage" content="images/mobile/windows8-icon.png" />

    <!-- // Handheld devices misc // -->
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="true"/>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
    
    <!-- // Stylesheets // -->
    
    <link rel="stylesheet" href="bootstrap/core/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-custom.css"/>
    <link rel="stylesheet" href="css/bootstrap-extended.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/light-theme.css"/>
    
    <!-- // Helpers // -->
    
    <script src="js/plugins/modernizr.min.js"></script> 
    <script src="js/plugins/mobiledevices.js"></script>
    
    <!-- // jQuery core // -->
    
    <script src="js/libs/jquery-1.11.0.min.js"></script>
    <script src="js/libs/jquery-ui-1.10.4.min.js"></script>
    
    <!-- // Bootstrap // -->
    
    <script src="bootstrap/core/dist/js/bootstrap.min.js"></script>

    <!-- // Custom/premium plugins // -->

    <script src="js/plugins/showpassword.1.0.min.js"></script>
    <script src="js/plugins/nanogress.1.0.min.js"></script>
    <script src="js/plugins/powerwizard.1.0.min.js"></script>
    
    <!-- // Third-party plugins // -->
    
    <script src="js/plugins/jquery.pwstrength.min.js"></script>

    <!-- // Custom //-->
    
    <script src="js/plugins/login.js"></script>    
     
</head>
<body> 
  {{ Form::open(array('url' => 'login')) }}		
<div id="container-login" class="clearfix"> 
    	
		<h1>Login</h1>
    	@if ($errors->first('email') || $errors->first('password'))
		<div class="alert alert-block alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Notice:</h4>
          	 {{ $errors->first('email') }}
			 {{ $errors->first('password') }}
        </div>   
		@endif
		

        <div id="login-box">  
       		<div class="login-box-inner clearfix">
                <header id="login-header">
                    <img src="http://download.otterbach.de/sendit20/grafiken/ott-logo.png" />
                </header>
                <div class="spacer-40"></div>
              
            	
                	<div class="row">  
                        <div class="col-lg-12">	
               				{{ Form::label('email', 'E-Mail-Addresse') }}
                        </div>
					</div>                                          
                	<div class="row">  
                        <div class="col-lg-12">	
                    		{{ Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder' => 'name@otterbach.de')) }}
                        </div>
					</div>
                    <div class="spacer-10"></div>
                	<div class="row">  
                        <div class="col-lg-12">	
                        	<label for="fc-id-2">Passwort:</label>
                            <a href="#" id="showpassword-trigger" class="underline">Passwort anzeigen</a>
                        </div>
					</div>	
                	<div class="row">  
                        <div class="col-lg-12">	
                    		
                    		{{ Form::password('password', array('id'=>'password', 'class'=>'form-control','placeholder' => 'Passwort')) }}
                        </div>
					</div>	
                    <div class="spacer-10"></div>	
                    <div class="row">
                    	<div class="col-lg-12">
                            <div class="pull-left">
                                <label>{{ Form::checkbox('remember', 1) }}<span></span> Merken?</label>
                            </div>
                            <div class="pull-right">
                                <a href="forgot.html" class="underline">Passwort vergessen</a>
                            </div>
                        </div>
                    </div>                    
                    <div class="spacer-15"></div>
   
                    <div class="row">
						<div class="col-lg-12">
								{{ Form::submit('Anmelden!',array('class' => 'btn btn-block btn-primary openbutton')) }}
                        </div>
                    </div> 
                                       
                
               
            </div>
        </div>
        <footer id="login-footer">
            <strong>Copyright © {{ date("Y",time()) }} otterbach.de</strong>
            <div class="spacer-5"></div>
            <small>Sollten Sie Probleme bei der Anmeldung haben, wenden Sie sich vertrauensvoll an...</small>
        </footer>
    </div>
  {{ Form::close() }}
</body>
</html>