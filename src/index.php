<?php
  include ('util.inc');
  define ('TRACKING', false); // whether or not redirect & log outbound links
  ob_start("ob_gzhandler");

  // disable link tracking for test runs
  if (getenv('DISABLETRACKING', true)) {
    $tracking = false;
  } else {
    $tracking = true;
  }

  /* If 'cat' parameter specified and matches, show just that category;
     otherwise show main index */
  $catmap = Array (
    'biz'    => 'Business',
    'ent'    => 'Entertainment',
    'info'   => 'Information',
    'news'   => 'News',
    'portal' => 'Portal',
    'search' => 'Search',
    'shop'   => 'Shopping',
    'sports' => 'Sports',
    'tech'   => 'Technology',
    'travel' => 'Travel',
    'weather' => 'Weather',
    );
  $idx = true;
  if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    $cat = preg_replace('|/|', '', $cat);
    if (array_key_exists($cat, $catmap) && file_exists($cat . ".inc")) {
      $catname = $catmap[$cat];
      $idx = false;
    } else {
      http_response_code(404);
      die;
    }
  }
  $desc = ($idx) ? "Top mobile sites for Android, iPhone, Windows or smart phones. Focus on simplicity and speed." : "Mobile $catname Sites";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Mobile <?php if (isset($catname)) { echo "$catname";} ?> Sites - Cantoni.mobi</title>
<meta name="description" content="<?php echo $desc; ?>">
<meta name="keywords" content="mobile,mobile web,websites,android,iphone,blackberry,windows,smartphone">
<meta name=viewport content="width=device-width, initial-scale=1">
<style type="text/css">
 body {color:#000000; background-color:#ffffff;}
 h1,h2,h3,h4,p,li {font-family:sans-serif;}
 h1,h2,h3,h4 {font-weight:bold;}
 h1 {font-size:20px;}
 h2 {font-size:18px;}
 p,li {font-size: 16px;}
 #nav ul {margin: 0;padding: 0;list-style-type: none;}
 #nav ul li {display: inline;}
 li {margin: 0.5em 0;}
</style>
</head>
<body>
<h1>Mobile <?php echo $catname; ?> Websites</h1>

<?php
  if ($idx) {
    print "<h2>Categories:</h2><ul>\n";
    foreach ($catmap as $k => $v) {
      print "<li><a href=\"/$k/\" title=\"Mobile $v Sites\">$v</a></li>\n";
    }
    print "</ul>\n";
  } else {
    print "<p><a href=\"/\">Home</a> &#187; $catname</p>\n";
    include ($cat . ".inc");
    print "<ul>\n";
    foreach ($links as $l) {
        $new = ($l['new']) ? ' << new' : '';
        $link = $l['url'];
        if (TRACKING) {
            $sig = calcHash ($link);
            $link = "/r/?u=" . urlencode($link) . "&s=$sig";
        }
        if ($tracking) {
          print "<li><a href=\"$link\" onclick=\"_gaq.push(['_trackPageview', '/tracking/$link'])\">" . $l['title'] . "</a>$new</li>\n";
        } else {
          print "<li><a href=\"$link\">" . $l['title'] . "</a>$new</li>\n";
        }
    }
    print "</ul>\n";
  }

  //include ('adsense.inc');
?>

<p>Try <a href="https://tweetfave.com" title="Tweetfave - Twitter favorites delivered to your inbox">Tweetfave</a> - your Twitter favorites automatically delivered to your inbox!</p>

<p>Follow <a href="https://twitter.com/bcantoni">@bcantoni</a> on Twitter - <a href="/about.php">About Cantoni.mobi</a> - <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/3.0/us/">CC Licensed</a></p>

<?php
  // google analytics
  include('google.inc');
?>

</body>
</html>
<!-- 2019 -->
