<?php
printf("{%s}\n","my text my string");
printf("{%c}\n","65");
printf("[%'#7s]\n", "monkey"); // use the custom padding character '#'
// the number used in the brackets assigns how many # must be added until the length of that string is that number long !
 printf("[%'#15s]\n", "monkey"); // use the custom padding character '#'
printf("[%-'#15s]\n", "monkey"); // use the custom padding character '#'
printf("[%50s]\n",  "this string is 34 characters long."); // left-justification with spaces
printf("%s\n",  "            this string is 34 characters long.    "); // left-justification with spaces
printf("'%e'\n","454.89623");//scientific notation 
?>