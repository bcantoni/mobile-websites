<?php
  /* AdMob Start */
  $mob_mode = 'live'; // change mode from "test" to "live" when you are done testing

  //used for ad targeting
  $mob_contents = '';
  $mob_ua = urlencode(getenv("HTTP_USER_AGENT"));
  $mob_ip = urlencode($_SERVER['REMOTE_ADDR']);

  $mob_m = '';
  if ($mob_mode=='test')
      $mob_m = "&m";

  $mob_url = 'http://ads.admob.com/ad_source.php?s=a1469abca51d04b&u='.$mob_ua.'&i='.$mob_ip.$mob_m;

  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $mob_url);
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
  @$mob_contents = curl_exec ($ch);

  curl_close ($ch);

  $mob_link = explode("><",$mob_contents);

  $mob_ad_text = $mob_link[0];
  $mob_ad_link = $mob_link[1];

  if (isset($mob_ad_link) && ($mob_ad_link !='')) {
      //display AdMob Ad
      echo '<p>Ad: <a href="'. $mob_ad_link .'">'. $mob_ad_text . "</a></p>\n";
  }
  /* AdMob End */
