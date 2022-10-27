<?php
echo (preg_match("/[0-9]/", "jkjio5")) ? "YES" : "NO";
echo "<br>";
echo (preg_match("/\d/", "5689")) ? "YES" : "NO"; //it should include numbers 
echo "<br>";
echo (preg_match("/[0-9]*/", "dfad")) ? "YES" : "NO"; // it can include numbers
echo "<br>";
echo (preg_match("/file_\d\d/", "file_25")) ? "YES" : "NO"; // it should start with "file_" and then accompanied by two decimals
echo "<br>";
echo (preg_match("/\w--\w/", "45--N")) ? "YES" : "NO"; // it should start with a word(a-z,A-Z,0-9,_), continues with two hipehns and ends with another word
echo (preg_match("/\w--\w/", "45--N ")) ? "YES" : "NO"; // it should start with a word(a-z,A-Z,0-9,_), continues with two hipehns and ends with another word  === it outputs Yes because the regular expression is observed in the first characters so it considers this as a correct expression

echo "<br>";
echo (preg_match("/\sa\sb\w/", " a b56")) ? "YES" : "NO"; // it should start with a space character and then an "a" followed by another space character and then there should be a word 

echo "<br>";
echo (preg_match("/\D/", " a b56")) ? "YES" : "NO"; // it should contain  a non numeric character
echo (preg_match("/\D/", "5689")) ? "YES" : "NO"; // it should contain  a non numeric character


echo "<br>";
echo (preg_match("/\W\W\W/", "dsf 65654")) ? "YES" : "NO"; // it should contian three Metacharacters (not words)
$matched= preg_match("/\W\W\W/", "*// sdsf",$matches); // it should contain  a non numeric character
echo $matched; // 1
print_r($matches);
echo "<hr>";
$matched= preg_match_all("/\W\W\W/", "*// sdfsdf&^& sdsf",$matches); // it should contain  a non numeric character
echo $matched; //2
print_r($matches);
echo (preg_match("/.*\S.*/", " sdsf")) ? "YES" : "NO"; //  zero or more of anything but newline \S = anything except a whitespace (newline, tab, space)

echo "<hr>";
$url="https://stackoverflow.com/questions/3512471/what-is-a-non-capturing-group-in-regular-expressions";
$matched_items = preg_match("/(?:https)(?::\/\/)(\w+.\w+)/", $url,$matchess); 
// first, it returns the whole regular expression match, then groups
print_r($matchess);
?>