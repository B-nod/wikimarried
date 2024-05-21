<?php
ob_start();
session_start();
//error_reporting(E_ERROR);
error_reporting(E_ALL);
ini_set("display_errors","1");
ini_set("display_startup_errors","1");

include "data/youtubeimagegrabber.php";
include "data/conn.php";
include "data/constants.php";
include "data/adds.php";
include "data/sqlinjection.php";
include "data/groups.php";
include "data/feedbacks.php";
include "data/testimonials.php";
include "data/menu.php";
include "data/metahome.php";
include("data/linkexchange.php");
include("data/blog.php");
include("data/comment.php");
include("data/cities.php");
include("data/galleries.php");
include("data/videos.php");


$conn = new Dbconn();

$groups = new Groups();
$feedbacks = new Feedbacks();
$metahome = new metaHome();
$testimonials = new Testimonials();
$menu = new menu();
$blog = new Blog;
$comment = new Comment;
$cities = new Cities;
$adds = new Adds;
$videos = new Videos;
$exchange = new Exchange();
$galleries = new Galleries;

if (empty($_SERVER['QUERY_STRING']))
	$url = true;
else
	$url = false;

if (isset($_GET['title'])) {

	$title = $_GET['title'];

	if (file_exists("includes/" . $title . ".php")) {
		$_GET['action'] = $title;
		$url = true;
	} else {
		$row = $cities->getByURLName($title);
		$row1 = $blog->getByURLName($title);

		if ($row) {
			$categoryId = $row['id'];
			$_GET['categoryId'] = $row['id'];
			$url = true;
		} else if ($row1) {
			$blogId = $row1['id'];
			$_GET['blogId'] = $row1['id'];
			$url = true;
		} else {
			$row2 = $groups->getByURLName($title);
			if ($row2) {
				if (isset($_GET['action'])) {
					$_GET['id'] = $row2['id'];
					$url = true;
				} else {
					$linkId = $row2['id'];
					$_GET['linkId'] = $row2['id'];
					$url = true;
				}
			}
		}
	}
}

if ($_GET['view'] == 'grid') {
	$_SESSION['style'] = "grid";
} else if (!empty($_SESSION['style']) && !isset($_GET['view'])) {
	$_SESSION['style'] = $_SESSION['style'];
} else {
	$_SESSION['style'] = 'list';
}

//echo $_SESSION['style'];
if ($_GET['title'] == 'manage-video') {
	$title = "Video, Latest Video, Bollywood, Hollywood, Latest Movies, Tailor, Interview, Funny Video";
	$keyword = "Video, Latest Video, Bollywood, Hollywood, Latest Movies, Tailor, Interview, Funny Video";
	$description = "We provide latest video of all Bollywood and Hollywood movies. And also provide funny video, tailor, and interview with celebrities and upcoming movies.";
} else if ($_GET['title'] == 'liveupdate') {
	$title = "Cricket, Latest Cricket Score, Live Cricket Scores, Live Cricket Streaming, Ball by Ball commentary, World Cup Live Streaming";
	$keyword = "Cricket, Latest Cricket Score, Live Cricket Scores, Live Cricket Streaming, Ball by Ball commentary, World Cup Live Streaming";
	$description = "We provide latest cricket score. And also provide cricket live streaming, World Cup Live Streaming, ball by ball commentary, live cricket scores, cricket live streaming.";
} else if (isset($_GET['linkId'])) {
	$title = $groups->getPageTitle($linkId);
	$keyword = $groups->getPageKeyword($linkId);
	$description = $groups->getMetaDescription($linkId);
} else if ($_GET['blogId']) {
	$row = $blog->getById($_GET['blogId']);
	$title = $row['blog_title'];
	if (!empty($row['pageTitle']))
		$title = $row['pageTitle'];
	$keyword = $row['metaKeyword'];
	$description = $row['metaDescription'];
} else if ($_GET['categoryId']) {
	$row = $cities->getById($_GET['categoryId']);
	$title = $row['pagetitle'];
	$keyword = $row['pagekeyword'];
	$description = $row['pagedescription'];
} else if ($_GET['galleryId']) {
	$result = $galleries->getById($_GET['galleryId']);
	$row = $conn->fetchArray($result);
	$title = "Wallpaper .:. " . $row['caption'];
	$keyword = $description = "Wallpaper, " . $row['caption'] . ", Photo";
} elseif (isset($_GET['listingId'])) {
	$row = $galleries->getParentDetailsById($galleryId);
	$title = $row['title'];
	$keyword = $row['keyword'];
	$description = $row['metaDescription'];
} elseif (isset($_GET['videoId'])) {
	$res = $videos->getById($_GET['videoId']);
	$row = $conn->fetchArray($res);
	$title = $row['title'];
	$keyword = $row['title'];
	$description = $row['title'];
} elseif (isset($_GET['action']) == 'submit-article') {
	$title = $keyword = "Submit article, write article free, free article";
	$description = "morearticle offers you to submit your genuine content to our site and earned money online.";
} else {
	$res = $metahome->getById(1);
	$row = $conn->fetchArray($res);
	$title = $row['pageTitle'];
	$keyword = $row['pageKeyword'];
	$description = $row['metaDescription'];
}

function getLink($resources)
{
	if ($resources['linkType'] == "Link") {
		$link = $resources['contents'];
	} else {
		$link = $resources['urlname'] . ".html";
	}
	return $link;
}

//print_r($_GET);
include("includes/testimonialprocess.php");
include("data/mis.func.php");
include("formaturl.php");
include("includes/commentprocessing.php");

function clearfix($lg, $sm)
{
	global $x;
	if ($x % $lg == 0)
		echo "<div class=\"clearfix visible-lg-block\"></div>";
	if ($x % $lg == 0)
		echo "<div class=\"clearfix visible-md-block\"></div>";
	if ($x % $sm == 0)
		echo "<div class=\"clearfix visible-sm-block\"></div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="google-adsense-account" 
content="ca-pub-7174312366876715">

    <meta name="google-site-verification" content="9UXmUZz3xAUvXvVXVQMyQH1R3F00BjaOt0Od8cCKNBg" />
    <meta name="keywords"
          content="<?php echo $keyword; ?> <?php if (isset($_GET['page'])) echo " - Page " . $_GET['page']; ?>"/>
    <meta name="description"
          content="<?php echo $description; ?> <?php if (isset($_GET['page'])) echo " - Page " . $_GET['page']; ?>"/>
    <title><?php if (!empty($title)) echo $title; else echo $groups->getNameByTitle($linkId); ?><?php if (isset($_GET['page'])) echo " - Page " . $_GET['page']; ?></title>

	<?php include("baselocation.php"); ?>

    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:type" content="WebSite"/>
    <meta property="og:url"
          content="https://www.wikimarried.com/<?php echo (count($_GET) == 0) ? "" : $_GET['title'] . ".html"; ?>"/>
    <meta property="og:description" content="<?php echo $description; ?> - wikimarried"/>
	<?php if (isset($_GET['blogId'])) {
		$row = $blog->getById($_GET['blogId']);
		if (is_file(CMS_BLOGS_DIR . $row['filename']) && !empty($row['filename'])) { ?>
            <meta property="og:image"
                  content="https://www.wikimarried.com/<?php echo CMS_BLOGS_DIR . $row['filename']; ?>"/>
		<?php } else { ?>
            <meta property="og:image" content="https://www.wikimarried.com/images/logo.png"/>
		<?php }
	} else { ?>
        <meta property="og:image" content="https://www.wikimarried.com/images/logo.png"/>
	<?php } ?>

    <meta property="og:site_name" content="wikimarried.com"/>

    <link rel="alternate" href="https://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>"
          hreflang="en-us"/>
    <link rel="canonical" href="https://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<div class="container" id="wrapper">
    <header>
        <div class="text-right">
            <div class="row">
                <div class="col-md-5 text-left"><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>"
                                                   class="active"><img src="images/logo-small.png"
                                                                       alt="<?php echo $title; ?>"
                                                                       title="<?php echo $title; ?>"></a></div>
                <div class="col-md-5 col-md-offset-2">
					<?php /*<div class="pull-right">
				<script>
  (function() {
    var cx = '012400019833948564298:gkwnmsllb0k';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
        </div> */ ?>
                </div>
            </div>
        </div>
    </header>
</div>

<nav class="menu">
    <div class="container">
        <div class="yamm clearfix">
            <div id="top_position">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>" class="active"><i
                                        class="fa fa-home"></i></a></li>
						<?php
						$result = $groups->getVisibleByTypeParentId('Header Links', 0);
						while ($row = $conn->fetchArray($result)) {
							$url = null;
							if ($row['linkType'] == 'Link') {
								$url = $row['contents'];
							} else {
								$url = $row['urlname'] . ".html";
							}
							?>
                            <li class="dropdown" style="position:relative;">
                                <a href="<?php echo $url; ?>">
									<?php echo $row['name']; ?>
                                </a>
                            </li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- menu end here -->
</nav>

<script async src="https://cse.google.com/cse.js?cx=e6cda65ab8356540f"></script>
<div class="gcse-search"></div>

<div class="container">
    <section class="containers">
        <div class="row">
            <div class="col-md-8 left">
				<?php
				if ($_GET['action']) {
					include("includes/" . $_GET['action'] . ".php");
				} else if (isset($_GET['linkId'])) {
					include("includes/cmspage.php");
				} else if (isset($_GET['galleryId'])) {
					include("includes/showgallerysingle.php");
				} elseif ($_GET['blogId']) {
					include("includes/blogdetails.php");
				} elseif (isset($_GET['categoryId'])) {
					include("includes/showcategories.php");
				} elseif (isset($_GET['videoId'])) {
					include("includes/showvideogallery.php");
				} else {
					?>
                    <div class="recent clearfix">
                        <h1><span>Recent Update</span></h1>
						<?php
						$pagename = "page/";
						$title = "";
						$sql = "SELECT * FROM blog ORDER BY id DESC";

						$limit = 10;
						include("includes/pagination2.php");
						$return = Pagination($sql, "");

						$arr = explode(" -- ", $return);

						$start = $arr[0];
						$pagelist = $arr[1];

						$sql .= " LIMIT $start, $limit";

						$result = $conn->exec($sql);
						$x = 0;
						while ($r = $conn->fetchArray($result)) {
							$x++;
							$row = $cities->getById($r["categories"]);
							$com_row = $comment->getByListingId($r["id"]);
							$com_total = $conn->numRows($com_row);
							?>
                            <article id="post-<?php echo $r["id"]; ?>" class=" panel to_fade clearfix">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 photo">
                                        <a href="<?php echo $r['urltitle']; ?>.html">  <?php if (is_file(CMS_BLOGS_DIR . $r['filename'])) { ?>
                                                <img src="https://i2.wp.com/www.wikimarried.com/<?php echo CMS_BLOGS_DIR . $r['filename']; ?>?resize=165,175"
                                                     class="img-responsive to_fade wobble-horizontal fadeIn"
                                                     alt="<?php echo $r['blog_title']; ?>"> <?php } else { ?> <img
                                                    src="images/no-image.jpg" class="img-responsive"
                                                    alt="image not available"/> <?php } ?> </a>
                                    </div>
                                    <div class="col-md-9 col-sm-9 descr">
                                        <h2>
                                            <a href="<?php echo $r['urltitle']; ?>.html"> <?php echo $r['blog_title']; ?> </a>
                                        </h2>

                                        <div class="post-info">
                                            <time class="thetime" datetime="<?php echo $r['blog_published_Date']; ?>"><i
                                                        class="fa fa-calendar"></i> <?php $date = date_create($r['blog_published_Date']);
												echo date_format($date, 'l, F jS, Y '); ?></time>
                                            <span><i class="fa fa-tags"></i> <a
                                                        href="<?php echo $row['category_title']; ?>.html"><?php echo $row["title"]; ?></a> </span>
                                        </div>

                                        <p class="short-article"><?php echo getChars(strip_tags($r['blog_description']), 1000, '...'); ?>   </p>
                                    </div>
                                </div>

                            </article>

						<?php
						if ($x == 3) { ?>
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- wiki ad -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-7174312366876715"
                                 data-ad-slot="3295577796"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
						<?php } ?>
						<?php if ($x == 6 || $x == 9) {
						?>
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
							<?php
						}
							?>
						<?php }
						echo $pagelist; ?>
                    </div>
				<?php } ?>
            </div><!-- left bar end -->

            <aside class="col-md-4">
                <div class="right">
                    <h2 style="margin-bottom:10px;">Top Article</h2>
                    <div id="contentad352668"></div>
                     <script type="text/javascript">
                    //     (function (d) {
                    //         var params =
                    //             {
                    //                 id: "a77f209c-a789-4df6-a717-0f98079332f0",
                    //                 d: "d2lraW1hcnJpZWQuY29t",
                    //                 wid: "352668",
                    //                 cb: (new Date()).getTime()
                    //             };
                    //         var qs = Object.keys(params).reduce(function (a, k) {
                    //             a.push(k + '=' + encodeURIComponent(params[k]));
                    //             return a
                    //         }, []).join(String.fromCharCode(38));
                    //         var s = d.createElement('script');
                    //         s.type = 'text/javascript';
                    //         s.async = true;
                    //         var p = 'https:' == document.location.protocol ? 'https' : 'http';
                    //         s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
                    //         d.getElementById("contentad352668").appendChild(s);
                    //     })(document);
                     </script>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Ad 2 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-7174312366876715"
                         data-ad-slot="5273122921"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

                    <div id="contentad445840"></div>
                     <script type="text/javascript">
                    //     (function (d) {
                    //         var params =
                    //             {
                    //                 id: "756e4c90-3f96-47c1-92bb-fbec6c390b7e",
                    //                 d: "d2lraW1hcnJpZWQuY29t",
                    //                 wid: "445840",
                    //                 exitPopMobile: true,
                    //                 cb: (new Date()).getTime()
                    //             };
                    //         var qs = Object.keys(params).reduce(function (a, k) {
                    //             a.push(k + '=' + encodeURIComponent(params[k]));
                    //             return a
                    //         }, []).join(String.fromCharCode(38));
                    //         var s = d.createElement('script');
                    //         s.type = 'text/javascript';
                    //         s.async = true;
                    //         var p = 'https:' == document.location.protocol ? 'https' : 'http';
                    //         s.src = p + "://api.content-ad.net/Scripts/widget2.aspx?" + qs;
                    //         d.getElementById("contentad445840").appendChild(s);
                    //     })(document);
                     </script>

					<?php if (count($_GET) == 0)
						$limit = 7; elseif (isset($_GET["page"])) $limit = 7;
					else $limit = 0; ?>
                    <div class="most_search clearfix">
                        <div class="row">
							<?php $result = $blog->getByVisitor($limit);
							while ($r = $conn->fetchArray($result)) { ?>
                                <article class="sec clearfix">
                                    <div class="col-md-4">
                                        <a href="<?php echo $r['urltitle']; ?>.html"> <img
                                                    src="https://www.wikimarried.com/<?php echo is_file(CMS_BLOGS_DIR . $r["filename"]) ? CMS_BLOGS_DIR . $r['filename'] : 'images/logo-small.png'; ?>?resize=93,93"
                                                    class="img-responsive" alt="<?php echo $r['blog_title']; ?>"></a>
                                    </div>
                                    <div class="col-md-8"><h3><a
                                                    href="<?php echo $r['urltitle']; ?>.html"><?php echo $r['blog_title']; ?></a>
                                        </h3>
                                        <p>
                                            <time datetime="<?php echo $r['blog_published_Date']; ?>">
                                                — <?php $date = date_create($r['blog_published_Date']);
												echo date_format($date, 'F jS, Y '); ?></time>
                                        </p>
                                    </div>
                                </article>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>

<footer>
    <div class="container">
        <div id="footer">
            <p class="text-center">&copy; <?php echo date("Y"); ?>. All Right Reserved.
                <br>
				<?php
				$result = $groups->getVisibleByTypeParentId('Footer Links', 0);
				while ($row = $conn->fetchArray($result)) {

					$url = null;
					if ($row['linkType'] == 'Link') {
						$url = $row['contents'];
					} else {
						$url = $row['urlname'] . ".html";
					}
					?>
                    <a href="<?php echo $url; ?>" style="color:white;">
						<?php echo $row['name']; ?>
                    </a>
				<?php } ?>
                <br>
                www.wikimarried.com<br/>By using wikimarried.com you agree to our Terms of Use and Privacy Policy.
                Published contents by users are under Creative Commons License.</br>  Developed By: <a target="_blank"
            </p>

        </div>
    </div>
</footer>

<script src="js/jquery-2.1.0.min.js"></script>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=562051963899767&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script src="js/scrolltopcontrol.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/ecmascript">
    $(function () {
        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                $('a').each(function () {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 500);
                    return false;
                }
            }
        });
    });

    $('.wel_bdy_txt img').each(function () {
        if (this.src.length > 0) {
            if (this.src.indexOf("/ckfinder/userfiles/") > -1) {
                $(this).addClass("img-responsive");
                $(this).removeAttr("style");
                $(this).attr("alt", "<?php echo $keyword; ?>");
                $(this).attr("title", "<?php echo $keyword; ?>");
                $(this).css({"max-width": "100%", "margin-top": "5px", "margin-bottom": "5px", "display": "block"});

            }
        }
    });

    $('.second iframe').each(function () {
        if (this.src.length > 0) {
            if (this.src.indexOf("www.youtube.com") > -1) {
                $(this).addClass("givemargin");
                $(".mgid iframe").removeClass("givemargin");
                $(".mgid img").removeClass("img-responsive img-thumbnail");
                $(".mgid img").removeAttr("style");
            }
        }
    });

    if (window.top !== window.self) {
        alert("Website is redirecting.");
        window.top.location.replace(window.self.location.href);
    }
</script>
<script src="js/pagination.js"></script>
<script>
    $(document).ready(function () {
		<?php $res = $blog->getAllBlogListings();
		$count = $conn->numRows($res);
		$limit = 20;
		if ($count <= $limit) {
			$totalpages = 1;
		} else {
			if ($count % $limit == 0) {
				$totalpages = $count / $limit;
			} else {
				$totalpages = floor($count / $limit) + 1;
			}
		}
		?>

        $('#morearticle-pagination').twbsPagination({
            totalPages: "<?php echo $totalpages; ?>",
            visiblePages: "5",
            href: 'page/{{number}}/',
        })
    });
</script>

<?php echo file_get_contents("anlytics.txt"); ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-90557076-1', 'auto');
    ga('send', 'pageview');

</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7174312366876715",
        enable_page_level_ads: true
    });
</script>

<!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5S8QKHK');</script>
<!-- End Google Tag Manager -->

</body>

</html>

