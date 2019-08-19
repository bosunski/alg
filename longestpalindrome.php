<?php

// This solution is O(n^2)
class Solution
{
  public static function longestPalindrome(string $text)
  {
    echo "Text is: $text", PHP_EOL;

    $longest = "";
    
    for($i = 0; $i < strlen($text); $i++) {
      for($len = 1; $len <= strlen($text) - $i; $len++) {
        $substring = substr($text, $i, $len); // 0 -> 1
        if ($substring === strrev($substring) && strlen($longest) < strlen($substring))  $longest = $substring;
      }
    }

    return $longest;
  }
}

$t = "tracecars";
$longestPalindrome = Solution::longestPalindrome($t);
echo "Longest Palindrome is: $longestPalindrome", PHP_EOL;
