<?php $blog->updateVisitorList($_GET['blogId']); ?>
<style type="text/css">
.blog .pull-right{
	margin-left:15px;
	
}
.blog .pull-right a{
	font-weight:bold;
	text-decoration:none;
	color:#000;
	font-size:13px;
}

@media (min-width:992px){
.fixed {
	position:fixed;
	top:0;
	z-index:999;
}

}
@media (max-width:768px){
	#slidebox{
	display:none;
}	
}
.stButton .stFb, .stButton .stTwbutton, .stButton .stMainServices{
	height:22px !important;
}
.stButton .stButton_gradient{
	height:22px !important;
}

.image_float{
	padding: 15px;
	border-radius: 0px;
	box-shadow: 0px 0px 20px #F1F1F1 inset;
	transition: all 0.2s ease-in-out 0s;
	margin-right: 10px;
	margin-top:6px;
}

@media(max-width:550px){
	.pull-left{
		text-align:center;
		float:none;
		width:100%;
	}
	.pull-left img{
		display:inline-block;
		width:100% !important;
	}	
}
</style>
<div class="row">
<div class="col-md-12">
<div class="welcome">

  <div class="wel_bdy">
  <?php
  	$groupRow= $blog->getById($_GET["blogId"]);
        $row = $cities->getById($groupRow["categories"]);
        $com_row = $comment->getByListingId($groupRow["id"]);
        $com_total = $conn->numRows($com_row);
 ?>
   
   
   
 <ol class="breadcrumb">
  <li><a href="http://www.wikimarried.com/">Home</a></li>
  <li><a href="<?php echo $row['category_title']; ?>.html"><?php echo $row["title"]; ?></a></li>
  <li class="active"><?php echo $groupRow["blog_title"]; ?></li>
</ol>


  
 <h1 class="main-heading" style="padding:0;">  <?php echo $groupRow['blog_title']; ?>   </h1>

 <style type="text/css">
 	.scroll{
		max-height:270px;
		overflow:scroll;
	}
 </style>
 <div id="contentad383923"></div>
<script type="text/javascript">
    (function(d) {
    //     var params =
    //     {
    //         id: "63922ee5-6a8a-4ee9-ae1c-0253c5934a89",
    //         d: "d2lraW1hcnJpZWQuY29t",
    //         wid: "383923",
    //         cb: (new Date()).getTime()
    //     };
    //     var qs = Object.keys(params).reduce(function(a, k){ a.push(k + '=' + encodeURIComponent(params[k])); return a},[]).join(String.fromCharCode(38));
    //     var s = d.createElement('script'); s.type='text/javascript';s.async=true;
    //     var p = 'https:' == document.location.protocol ? 'https' : 'http';
    //     s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
    //     d.getElementById("contentad383923").appendChild(s);
    // })(document);
</script>
                    
 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Ad 1 -->
<ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-7174312366876715"
    data-ad-slot="9080328381"
    data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

                    
 <div class="row" style="margin-top:10px;">
 
 <div class="col-md-3 col-sm-3">
 <?php if(is_file(CMS_BLOGS_DIR.$groupRow['filename'])){ ?><img src="http://i2.wp.com/wikimarried.com/files/blogs/<?php echo $groupRow['filename']; ?>?resize=250,250" class="img-responsive"   alt="<?php echo $keyword; ?>">

<?php }  ?>
 </div>
 <div class="col-md-9 col-sm-9">
 
 <div class="post-info breadcrumb">
 
 <div class="row">
 	<div class="col-md-4 col-sm-4"><i class="fa fa-user"></i> <?php echo !empty($groupRow["blog_author"]) ? $groupRow["blog_author"] : "wiki married"; ?> </div>
    
    <div class="col-md-4 col-sm-4">
    <i class="fa fa-tags"></i> <a href="<?php echo $row['category_title']; ?>.html"><?php echo $row["title"]; ?></a> 
    </div>
    
    <div class="col-md-4 col-sm-4">
    <i class="fa fa-comments"></i> <a href="http://<?php echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?>#disqus_thread" class="comment"></a> 
    </div>
    
 </div>




 </div>
 
 


<p> &mdash; <?php $date =  date_create($groupRow['blog_published_Date']);
echo date_format($date, 'l, F jS, Y '); ?> </p>
<p>
	 <span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<g:plusone></g:plusone> 
</p>

 </div>
 
</div>
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-gt-c+2u-36-31"
     data-ad-client="ca-pub-7174312366876715"
     data-ad-slot="5315066782"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- link ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7174312366876715"
     data-ad-slot="9401821144"
     data-ad-format="link"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
 

 
               
    
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b974740f-22e4-4913-b15c-54e83626cc47", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
 
 
      
 





    <div class="wel_bdy_txt" style="padding-top:5px;">

<div class="clearfix"></div>
   
  <style type="text/css">
  .main-img{
	  margin-top:5px;
	  margin-right:10px;
	 }
	 @media(max-width:768px){
		.main-img{
			margin-top:0px;
		}

		.adsc{
			display:block;
			
			margin-right:10px;
		}
	 }
  
  </style>  
   
  <?php //print_r($_GET);
  
			$pagename = "index.php?blogId=". cleanQuery($_GET['blogId']) ."&";
			include("includes/pagination.php");
			
		
	?>
    
         

<div class="conte">


           
           
         <?php if(!empty($groupRow["networth"]) || !empty($groupRow["married"]) || !empty($groupRow["height"]) || ($groupRow["date_of_birth"]!="0000-00-00")){ ?>  
           <div class="pull-left" style="width:300px; margin-right:15px; font-size:15px;" id="quick-info">
           <style type="text/css">
		   	#quick-info table tr td:first-child{
				font-weight:bold;
				width:145px;
			}
			#quick-info table tr td:first-child i{
				color:#FA5742;
				font-size:16px;
			}
			#quick-info table{
				border:1px solid #E8E7E7; 
				margin-top:10px;
				margin-bottom:0px;
			}
		   </style>
           		<table class="table table-striped">
                
                <?php
					function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}


				 ?>
                	
                    <?php if(!empty($groupRow["date_of_birth"]) && ($groupRow["date_of_birth"]!="0000-00-00")){ ?>
                    <tr>
                    	<td><i class="fa fa-calendar"></i> Date of Birth :</td><td> <?php $dates =  date_create($groupRow['date_of_birth']);
echo date_format($dates, 'M jS, Y '); ?></td>
                        </tr>
                        <?php } ?>
                       <?php if(!empty($groupRow["date_of_birth"]) && ($groupRow["date_of_birth"]!="0000-00-00")){ ?>
                        <tr>
                        <td><i class="fa fa-info-circle"></i> Age :</td><td><?php  echo ageCalculator($groupRow["date_of_birth"]); ?> Years old</td>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($groupRow["networth"])){ ?>
                        <tr>
                        <td><i class="fa fa-tags"></i> Net Worth :</td><td><?php echo $groupRow["networth"]; ?> </td>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($groupRow["married"])){ ?>
                        <tr>
                        <td><i class="fa fa-book"></i> Married :</td><td><?php echo $groupRow["married"]; ?></td>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($groupRow["height"])){ ?>
                        <tr>
                        <td><i class="fa fa-check-square"></i> Height :</td><td><?php echo $groupRow["height"]; ?></td>
                          </tr>
                        <?php } ?>
                  
                </table>
           </div>

    <?php 
	}
	

	
	

		 
	
			echo $groupRow['blog_description'];
			
			?>
 </div>
 
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad5 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7174312366876715"
     data-ad-slot="1927395272"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-7174312366876715"
     data-ad-slot="7615934363"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
 <div class="clearfix"></div>
 
 <div id="contentad351258"></div>
<script type="text/javascript">
//   (function(d) {
//       var params =
//       {
//           id: "f41f250f-c995-4bb9-a159-db0bb7778281",
//           d:  "d2lraW1hcnJpZWQuY29t",
//           wid: "351258",
//           cb: (new Date()).getTime()
//       };
//       var qs = Object.keys(params).reduce(function(a,k){a.push(k+'='+encodeURIComponent(params[k]));return a},[]).join(String.fromCharCode(38));
//       var s = d.createElement('script');s.type='text/javascript';s.async=true;
//       var p = 'https:' == document.location.protocol ? 'https' : 'http';
//       s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
//       d.getElementById("contentad351258").appendChild(s);
//   })(document);
</script>
 
  </div><div class="clear"></div>
</div>


<div class="clearfix"></div>




</div><div class="clearfix"></div>
</div>
</div><div class="clearfix"></div>
