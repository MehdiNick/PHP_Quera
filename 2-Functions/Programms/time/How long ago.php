<?php
function timeToAgo($time){
$now = time();
$difference = abs($now-$time);
$message="";
	if ($difference<60)
		$message="just now";
	else if ($difference>=60 && $difference<120)
		$message="one minute ago";
	else if ($difference>=120 && $difference<3600)
		$message=floor($difference/60)." minutes ago";
	else if ($difference>=3600 && $difference<7200)
		$message="an hour ago";
	else if ($difference>=7200 && $difference<86400)
		$message=floor($difference/3600)." hours ago";
	else if ($difference>=86400 && $difference<172800)
		$message="yesterday";
	else if ($difference>=172800 && $difference<604800)
		$message=floor($difference/86400)." days ago";
	else if ($difference>=604800 && $difference<1209600)
		$message="a week ago";
	else if ($difference>=1209600 && $difference<2592000)
		$message=floor($difference/604800)." weeks ago";
	else if ($difference>=2592000 && $difference<5184000)
		$message="a month ago";
	else if ($difference>=5184000 && $difference<31536000)
		$message=floor($difference/2592000)." months ago";
	else if ($difference>=31536000 && $difference<63072000)
		$message="one year ago";
	else
		$message=floor($difference/31536000)." years ago";
				


return $message;
}


echo timeToAgo(time())."<br>";
echo timeToAgo(time() + 10)."<br>";
echo timeToAgo(time() - 59)."<br>";
echo timeToAgo(time() - 60)."<br>";
echo timeToAgo(time() - 119)."<br>";
echo timeToAgo(time() - (2 * 60))."<br>";
echo timeToAgo(time() - (59 * 60))."<br>";
echo timeToAgo(time() - (60 * 60) + 1)."<br>";
echo timeToAgo(time() - (60 * 60))."<br>";
echo timeToAgo(time() - (119 * 60))."<br>";
echo timeToAgo(time() - (2 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (2 * 60 * 60))."<br>";
echo timeToAgo(time() - (23 * 60 * 60))."<br>";
echo timeToAgo(time() - (24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (24 * 60 * 60))."<br>";
echo timeToAgo(time() - (2 * 24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (2 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (6 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (7 * 24 * 60 * 60) + 1)."<br>";
echo timeToAgo(time() - (7 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (24 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (29 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (6 * 30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (12 * 30 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (365 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (500 * 24 * 60 * 60))."<br>";
echo timeToAgo(time() - (4 * 365 * 24 * 60 * 60))."<br>";


?>
<pre>
just now
just now
just now
one minute ago
one minute ago
2 minutes ago
59 minutes ago
59 minutes ago
an hour ago
an hour ago
an hour ago
2 hours ago
23 hours ago
23 hours ago
yesterday
yesterday
2 days ago
6 days ago
6 days ago
a week ago
3 weeks ago
4 weeks ago
a month ago
6 months ago
12 months ago
one year ago
one year ago
4 years ago
</pre>