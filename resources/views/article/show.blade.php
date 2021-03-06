<!DOCTYPE HTML>
<html>
<head>
	<title>Home</title>
	<link href={{ URL::asset('css/bootstrap.css') }} rel='stylesheet' type='text/css' />
	<link href={{ URL::asset('css/style.css') }} rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Blogname Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
	/>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!----webfonts---->
		<link href={{ URL::asset('css/fonts1.css') }} rel='stylesheet' type='text/css'>
		<link href={{ URL::asset('css/fonts2.css') }} rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		  <script src={{ URL::asset('js/jquery.min.js') }}></script>
		<!--end slider -->
		<!--script-->
<script type="text/javascript" src={{ URL::asset('js/move-top.js') }}></script>
<script type="text/javascript" src={{ URL::asset('js/easing.js') }}></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!---->

</head>
<body>
<!---strat-banner---->
<div class="banner">				
	 <div class="header">  
		  <div class="container">
			  <div class="logo">
					<a href="{{ url('/') }}"> <img src={{ URL::asset('images/logo.png') }} title="soup" /></a>
			 </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				  <span class="menu"> </span> 
				   <ul>
						<li class="active"><a href="{{ url('/') }}">HOME</a></li>						
						<li><a href="contact.html">CONTACT</a></li>	
						<li><a href="terms.html">TERMS</a></li>						
						<div class="clearfix"> </div>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
		 </div>
	 </div>
	 <div class="container">
		 <div class="banner-head">
			 <h1>HERE WAS SUPPOSED TO BE A WORD</h1>
			 <h2>TO ASTONISH YOU</h2>
		 </div>
<!--		 <div class="banner-links">
			 <ul>
				 <li class="active"><a href="#">LOREM IPSUM</a></li>
				 <li><a href="#">DOLAR SITE AMET</a></li>
				 <li><a href="#">MORBI IN SEM</a></li>
				 <div class="clearfix"></div>
			 </ul>
		 </div>-->
	 </div>
</div>
<!---//End-banner---->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
					 <div class="content-grid-head">
						 <h3>POST OF THE DAY</h3>
						 <h4>{{ $article->updated_at }}</h4>
						 <div class="clearfix"></div>
					 </div>
					 <div class="content-grid-single" style="word-wrap:break-word; ">
						 <h3>{{ $article->title }}</h3>
                                                 <p><?php $body= nl2br($article->body); echo $body ?></p>
                                                 </br> 
                                                 <div class="tag">
                                                       <img src="/images/tag.png"  title="tag" style="height: 20px; weigth:20px; "/>
                                                 </div>                                            
                                                 <h5 style="display:inline">
                                                    @foreach ($article->hasManyTags as $Tag)
                                                        <u>{{ $Tag->tag_name }}</u>&nbsp;
                                                    @endforeach   
                                                 </h5>
                                                 
                                                 <div id="new">
						 <div class="content-form">
							 <h3>Leave a comment</h3>
							 <form action="{{ url('comment') }}" method="POST">
                                                         {!! csrf_field() !!}
                                                         <input type="hidden" name="article_id" value="{{ $article->id }}">
							 <input type="text" name="nickname"  placeholder="Name" required="required">
							 <input type="text" name="email" placeholder="E-mail" >
							 <input type="text" name="website" placeholder="Website" >
							 <textarea name="content" id="newFormContent" placeholder="Content" required="required"></textarea>
							 <input type="submit" value="SEND"/>
							 </form>
						 </div>
                                                 </div>
                                                 
                                                 <script>
                                                 function reply(a) {
                                                    var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                                                    var textArea = document.getElementById('newFormContent');
                                                    textArea.innerHTML = '@'+nickname+' ';
                                                 }
                                                 </script>

						 <div class="comments">
							 <h3>Comment</h3>
                                                         @foreach ($article->hasManyComments as $comment)
                                                            <div class="comment-grid">
                                                                 <img src={{ URL::asset('images/pic.png') }} alt=""/>
								 <div class="comment-info" style="word-break:break-all">
                                                                 <div data="{{ $comment->nickname }}">
                                                                    <h4 style="font-weight:bold;">{{ $comment->nickname }}</h4>
                                                                 </div>                                                             
								 <p>{{ $comment->content }}</p>
								 <h5>On {{ $comment->created_at }}</h5>
                                                                 <a href="#new" onclick="reply(this);">Reply</a>
								 </div>
                                                                 <div class="clearfix"></div>
                                                            </div>
                                                         @endforeach
                                                         
						
							 
							
<!--							 <div class="pages">
									<ul>
									 <li class="active"><a href="#">1</a></li>
									 <li><a href="#">2</a></li>
									 <li><a href="#">3</a></li>
									 <li><a href="#">4</a></li>
									 <li><a href="#">5</a></li>
									 <li><a href="#">6</a></li>
									 <li><a href="#">Previous</a></li>
									 <li><a href="#">Next</a></li>
									</ul>
							 </div>	-->
						</div>
					  </div>
					 
				 </div>			 			 
			 </div>
			 
			 <div class="col-md-4 content-main-right">
				 <div class="search">
						<h3>SEARCH HERE</h3>
						<form action="{{ url('search') }}" method="POST" style="display: inline;">                                                  
                                                    {{ csrf_field() }}
                                                    <input type="text" value="" name="str" >
                                                    <input type="submit" value="" >
						</form>   
				 </div>
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 <li class="active"><a href="#">Donec quis dui at dolor tempor</a></li>
					 <li><a href="#">Vestibulum commodo felis quis tort</a></li>
					 <li><a href="#">Fusce pellentesque suscipit</a></li>
				 </div>
				 <div class="archives">
					 <h3>ARCHIVES</h3>
					 <li class="active"><a href="#">July 2014</a></li>
					 <li><a href="#">June 2014</a></li>
					 <li><a href="#">May 2014</a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!--fotter-->
<div class="fotter">
	 <div class="container">
		 <div class="col-md-4 fotter-info">
			 <h3>INTEGER VITAE LIBERO</h3>
			 <p>Raesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. </p>
			 <p>Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. Phasellus ultrices nulla quis nibh. Quisque a lectus. </p>
		 </div>
		 <div class="col-md-4 fotter-list">
			 <h3>VESTIBULUM COMMO</h3>
			 <ul>
			 <li><a href="#">Ut alliquam solicitudin</a></li>
			 <li><a href="#">Neque id cursus faucibus</a></li>
			 <li><a href="#">Raesent dapibus neque id cursus</a></li>
			 </ul>
		 </div>
		 <div class="col-md-4 fotter-media">
				<h3>FOLLOW ME ON....</h3>
				 <div class="social-icons">
				 <a href="#"><span class="fb"> </span></a>
				 <a href="#"><span class="twt"> </span></a>
				 <a href="#"><span class="in"> </span></a>				 			 
			    </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>



</body>
</html>