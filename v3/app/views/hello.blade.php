@extends('layouts.master')

@section('sidebar')
    

   <div class="sidebar-logo">
    	<a href="index.html" id="logo-big"><h1>otterbach</h1><h2>/ send it</h2></a>
    </div><!-- End .sidebar-logo -->
    
    <!-- ********** -->
    <!-- NEW MODULE -->
    <!-- ********** -->
            
     
    
   
@stop

@section('content')
 <div id="main">
        
       

			<header id="header-main">
            	<div class="header-main-top">
                	<div class="pull-left">
                    
                    	<!-- * This is the responsive logo * --> 
                                   
                    	<a href="index.html" id="logo-small"><h4>karma</h4><h5>/webapp</h5></a>
                    </div>
                    <div class="pull-right">
                    
                    	<!-- * This is the trigger that will show/hide the menu * -->
                        <!-- * if the layout is in responsive mode              * -->
                        
						<a href="#" id="responsive-menu-trigger">
                        	<i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- End #header-main-top --> 
                <div class="header-main-bottom">
                	<div class="pull-left">
                    	<ul class="breadcrumb">
                            <li><a href="#">Bread</a></li>
                            <li class="active">Crumb</li>
                        </ul><!-- End .breadcrumb -->
                    </div>
                    <div class="pull-right">
                    	<p>Version 3.0.1</p>
                    </div> 
                </div><!-- End #header-main-bottom -->            
            </header><!-- End #header-main --> 
        
            <div id="content" class="clearfix">

            <!-- ********************************************
                 * HEADER SEC:                              *
                 *                                          *   
                 * the part which contains the page title,  *
                 * buttons and dropdowns.                   *
                 ******************************************** -->
                
                <header id="header-sec"> 
                	<div class="inner-padding">      
                        <div class="pull-left">
                            <h2>Files</h2>                 
                        </div>
                       
                    </div><!-- End .inner-padding --> 
            	</header><!-- End #header-sec --> 

                <!-- ********************************************
                     * WINDOW:                                  *
                     *                                          *
                     * the part which contains the main content *
                     ******************************************** -->
                                     
                <div class="window">
                    <div class="actionbar">
                        <div class="pull-left">
                            <a class="btn" href="#" id="lockscreen-button-trigger">
                             	<i class="fa fa-lock"></i> 
                        	</a>
                            <p>Lorem ipsum dolor</p>
                        </div> 
                        <div class="pull-right">
                        	<p>Luctus do ipsium</p>
                            <a href="#" class="btn">
                                <i class="fa fa-star"></i>
                            </a>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-caret-down"></i>
                                </a>                                  
                                <ul role="menu" class="dropdown-menu pull-center ext-dropdown-icons-vertical">
                                    <li>
                                        <a href="#"><i class="fa fa-comments"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-rss"></i></a>
                                    </li>
                                    <li class="disabled">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-file"></i></a>
                                    </li>
                                </ul>
							</div><!-- End .dropdown -->                                                    
                        </div>    
                    </div><!-- End .actionbar -->
                   
                    <div class="toolbar toolbar-inline-top">
                        <div class="pull-left">
                            <a class="btn btn-default" href="#">
                                <i class="fa fa-plus"></i>
                            </a>
                            <form class="input-group width-200">
                                <input type="text" name="" class="form-control" placeholder="Search..."/>
                                <div class="input-group-btn">
                                    <a href="#" class="clear-input"><i class="fa fa-times-circle"></i></a>
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form> 
                        </div>
                        <div class="pull-right">
                            <div class="dropdown">
                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                                    Menu <i class="fa fa-caret-down"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#"><i class="fa fa-comments"></i> Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-rss"></i> RSS feed</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-search"></i> Search</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#"><i class="fa fa-upload"></i> Upload</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-cogs"></i> Settings</a>
                                    </li>                                
                                </ul>
                            </div><!-- End .dropdown -->
                            <div class="btn-group">
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-th"></i>
                                </a>
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-list"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- End .toolbar -->
                    <div class="clear"></div>              
      				<div class="inner-padding">
                        <div class="subheading">
                            <h3>File blocks</h3>
                            <p>Big minimalistic file blocks.</p>
                        </div>
 <div id="drop-target">Drop your files or folders (Chrome >= 21) here</div>
                        <div id="uploader">
	<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>

<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	// Setup html5 version
	$("#uploader").pluploadQueue({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : "/upload",
		
		chunk_size : '1mb',
		rename : true,
		dragdrop: true,
		 drop_element : 'drop-target',
        browse_button : 'drop-target',
		filters : {
			// Maximum file size
			max_file_size : '10mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "Zip files", extensions : "zip"}
			]
		},

		// Resize images on clientside if we can
		resize: {
			width : 200, 
			height : 200, 
			quality : 90,
			crop: true // crop to exact dimensions
		},


		// Flash settings
		flash_swf_url : '/plupload/js/Moxie.swf',
	
		// Silverlight settings
		silverlight_xap_url : '/plupload/js/Moxie.xap'
	});
});
</script>

                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="file-block">
                                    <a href="#">
                                        <div class="file-block-icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-block-info">
                                            <h5>vitae consequat</h5>
                                            <small><i class="fa fa-folder"></i>files/doc/ <span class="pull-right">783kb</span></small>
                                        </div>
                                    </a>
                                </div><!-- End .file-block -->
                                <div class="statistic-block">
                                	<header>
                                    	<div class="pull-left">
                                        	Sales
                                        </div>
                                    	<div class="pull-right">
                                        	<a href="#" class="btn"><i class="fa fa-cog"></i></a>
                                        </div>
                                    </header>
                                    <div class="statistic-block-inner">
                                    	<div class="pull-left">
                                            <div class="statistic-block-bigval">$9568</div>
                                            <div class="statistic-block-smalltext pull-right">Total</div>
                                        </div>
                                        <div class="pull-right">
                                        	<span class="label label-success">+ 240%<i class="fa fa-caret-up pull-right"></i></span>
                                        </div>
                                        <span class="line"></span>    
                                        <div class="row">
                                        	<div class="col-sm-4">
                                    			<div class="statistic-block-smallval pull-right">1904</div>
                                        		<div class="statistic-block-smalltext pull-right">Orders</div>
                                            </div>
                                        	<div class="col-sm-4">
                                    			<div class="statistic-block-smallval pull-right">255</div>
                                        		<div class="statistic-block-smalltext pull-right">Sales</div>
                                            </div>
                                        	<div class="col-sm-4">
                                    			<div class="statistic-block-smallval pull-right">2889</div>
                                        		<div class="statistic-block-smalltext pull-right">Clients</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End .statistic-block --> 
                                <div class="project-block">
                                	                                 	<div class="file-block-icon">
                                        <i class="fa fa-file"></i>
                                    </div>

                                    <header>
                                        <h3>Document Xena</h3>
                                        <p class="text-muted">A simple project title</p>
                                    </header>

                                    <ul>
                                    	<li>
                                            <div class="pull-left">
                                            Progress: 
                                            </div>
                                            <div class="pull-right">
                                            45%
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pull-left">
                                            End date:
                                            </div>
                                            <div class="pull-right">
                                            1 Feb
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pull-left">
                                            Developer:
                                            </div>
                                            <div class="pull-right">
                                            Linda
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pull-left">
                                            Design by:
                                            </div>
                                            <div class="pull-right">
                                            Apple
                                            </div>
                                        </li>
                                    </ul>
                                    <footer>

                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                                <span class="sr-only">45% Complete</span>
                                            </div>
                                        </div>
                                          <div class="pull-left">
                                        Status:
                                        </div>
                                        <div class="pull-right">
                                        	<span class="label label-default">Pending</span>
                                        </div>
                               		</footer>
                                </div><!-- End .project-block -->
                            </div>
                        </div>
                    </div><!-- End .inner-padding -->          
                    <div class="spacer-30"></div>
                </div><!-- End .window --> 
                
                <!-- ********************************************
                     * FOOTER MAIN:                             *
                     *                                          *
                     * the part which contains things like      * 
                     * chat, buttons, copyright and             *
                     * dropup menu(s).                          *
                     ******************************************** -->
                    
                <footer id="footer-main" class="footer-sticky">
                    <div class="footer-main-inner">
                        <div class="pull-left">
                            <p>Copyright © 2013 CreativeMilk</p>
                        </div> 
                        <div class="pull-right">    
                            <div class="dropup">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    Menu
                                    <i class="fa fa-caret-up"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu ext-dropdown-icons-right">
                                    <li>
                                        <a href="#"><i class="fa fa-comments"></i> Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-rss"></i>  RSS Feed</a>
                                    </li>
                                    <li class="disabled">
                                        <a href="#"><i class="fa fa-link"></i> Disabled link</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-file"></i> Upload files</a>
                                    </li>                        
                                </ul>             
                            </div><!-- End .dropup -->                             
                            <div class="dropup" id="ext-dropdown-chat">
                                <a class="btn dropdown-toggle ext-dropdown-chat-btn" data-toggle="dropdown" href="#">
                                    <span class="online-dot"></span>
                                    Steven Watson
                                    <i class="fa fa-comments chat-blink-icon"></i>
                                </a>                  
                                <div class="ext-dropdown-chat dropdown-menu pull-right">
                                    <div class="ext-dropdown-chat-inner">
                                        <div class="ext-dropdown-header">
                                            <i class="fa fa-comments"></i>
                                            <h5>Live chat</h5>
                                            <a href="#" class="btn btn-default btn-sm ext-dropdown-chat-info-toggle">
                                                <i class="fa fa-info-circle"></i>
                                            </a>                            
                                        </div>
                                        <div class="ext-dropdown-chat-window scrollbar-y">
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="seperator"><span>11/15/12</span></div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-5.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Martin:</strong>
                                                    <span>17:23</span>
                                                    <p>He, is anybody there...</p>
                                                </div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="seperator"><span>11/17/12</span></div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-1.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Steven:</strong>
                                                    <span>14:24</span>
                                                    <p>It's going to be a long post, so I will split it into 2 parts...</p>
                                                </div>
                                            </div>                                 
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-1.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Steven:</strong>
                                                    <span>13:44</span>
                                                    <p>How long must the blog post be....</p>
                                                </div>
                                            </div>  
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-5.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Martin:</strong>
                                                    <span>13:31</span>
                                                    <p>Great, I will wait, dont forget to add some photo's  <a href="#">here</a>...</p>
                                                </div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-1.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Steven:</strong>
                                                    <span>13:28</span>
                                                    <p>Sure no problem, I am typing the blog as we speak...</p>
                                                </div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-5.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Martin:</strong>
                                                    <span>13:23</span>
                                                    <p>He, can you write a new blog post, I want update the blog...</p>
                                                </div>
                                            </div>
                                            <div class="ext-dropdown-chat-msg">
                                                <div class="ext-dropdown-chat-avatar">
                                                    <img src="images/users/user-1.jpg" alt=""/>
                                                </div>
                                                <div class="ext-dropdown-chat-user">
                                                    <strong>Steven:</strong>
                                                    <span>13:28</span>
                                                    <p>Sure no problem, I am typing the blog as we speak...</p>
                                                </div>
                                            </div>                       
                                        </div>
                                        <div class="ext-dropdown-chat-editor">
                                            <textarea name="" class="form-control" placeholder="Type your message here..."></textarea>
                                        </div>
                                        <div class="ext-dropdown-chat-info">
                                            <h5>Welcome to the chat</h5>
                                            <p>
                                            Vivamus nisl lectus, venenatis eu sagittis id, dignissim quis justo. Etiam viverra vestibulum libero, 
                                            vel vulputate risus pulvinar sit amet. Aenean a sollicitudin ante. Nam nec nisl eu nisl.
                                            </p>
                                            <div class="spacer-15"></div>
                                            <p>
                                            Maecenas in diam tempus velit viverra ultrices non eu urna. Maecenas nibh ante, consectetur non faucibus at, 
                                            suscipit non est. Integer lobortis imperdiet mattis curabitur cursust.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .dropup -->             
                            <a href="#" class="btn" id="toggle-footer">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </div> 
                    </div><!-- End .footer-main-inner -->   
                </footer><!-- End #footer-main --> 
            </div><!-- End #content -->
        </div><!-- End #main --> @stop
