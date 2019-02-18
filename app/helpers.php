<?php

/**
 * Get list of tools.
 */
function get_tools() {
  return <<<EOD
<p>Tools: 
<a href="http://validator.w3.org/check/referer">html5</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">css3</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css21">css21</a>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">unicorn</a>
<a href="http://validator.w3.org/checklink?uri={url->current()}">links</a>
<a href="http://qa-dev.w3.org/i18n-checker/index?async=false&amp;docAddr={url->current()}">i18n</a>
<!-- <a href="link?">http-header</a> -->
<a href="http://csslint.net/">css-lint</a>
<a href="http://jslint.com/">js-lint</a>
<a href="http://jsperf.com/">js-perf</a>
<a href="http://www.workwithcolor.com/hsl-color-schemer-01.htm">colors</a>
<a href="http://dbwebb.se/style">style</a>
</p>

<p>Docs:
<a href="http://www.w3.org/2009/cheatsheet">cheatsheet</a>
<a href="http://dev.w3.org/html5/spec/spec.html">html5</a>
<a href="http://www.w3.org/TR/CSS2">css2</a>
<a href="http://www.w3.org/Style/CSS/current-work#CSS3">css3</a>
<a href="http://php.net/manual/en/index.php">php</a>
<a href="http://www.sqlite.org/lang.html">sqlite</a>
<a href="http://www.blueprintcss.org/">blueprint</a>
</p>
EOD;
}

/**
 * Helper, interval formatting of times. Needs PHP5.3. 
 *
 * All times in database is UTC so this function assumes the starttime to be in UTC, if not otherwise
 * stated.
 *
 * Copied from http://php.net/manual/en/dateinterval.format.php#96768
 * A sweet interval formatting, will use the two biggest interval parts.
 * On small intervals, you get minutes and seconds.
 * On big intervals, you get months and days.
 * Only the two biggest parts are used.
 *
 * @param DateTime|string $start
 * @param DateTimeZone|string|null $startTimeZone
 * @param DateTime|string|null $end
 * @param DateTimeZone|string|null $endTimeZone
 * @return string
 */
function formatDateTimeDiff($start, $startTimeZone=null, $end=null, $endTimeZone=null) {
		if(!($start instanceof DateTime)) {
			if($startTimeZone instanceof DateTimeZone) {
				$start = new DateTime($start, $startTimeZone);
			} else if(is_null($startTimeZone)) {
				$start = new DateTime($start);
			} else {
				$start = new DateTime($start, new DateTimeZone($startTimeZone));
			}
		}
		
		if($end === null) {
			$end = new DateTime();
		}
		
		if(!($end instanceof DateTime)) {
			if($endTimeZone instanceof DateTimeZone) {
				$end = new DateTime($end, $endTimeZone);
			} else if(is_null($endTimeZone)) {
				$end = new DateTime($end);
			} else {
				$end = new DateTime($end, new DateTimeZone($endTimeZone));
			}
		}
		
		$interval = $end->diff($start);
		$doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals
		//$doPlural = create_function('$nb,$str', 'return $nb>1?$str."s":$str;'); // adds plurals
		
		$format = array();
		if($interval->y !== 0) {
			$format[] = "%y ".$doPlural($interval->y, "year");
		}
		if($interval->m !== 0) {
			$format[] = "%m ".$doPlural($interval->m, "month");
		}
		if($interval->d !== 0) {
			$format[] = "%d ".$doPlural($interval->d, "day");
		}
		if($interval->h !== 0) {
			$format[] = "%h ".$doPlural($interval->h, "hour");
		}
		if($interval->i !== 0) {
			$format[] = "%i ".$doPlural($interval->i, "minute");
		}
		if(!count($format)) {
				return "less than a minute";
		}
		if($interval->s !== 0) {
			$format[] = "%s ".$doPlural($interval->s, "second");
		}
		
		if($interval->s !== 0) {
				if(!count($format)) {
						return "less than a minute";
				} else {
						$format[] = "%s ".$doPlural($interval->s, "second");
				}
		}
		
		// We use the two biggest parts
		if(count($format) > 1) {
				$format = array_shift($format)." and ".array_shift($format);
		} else {
				$format = array_pop($format);
		}
		
		// Prepend 'since ' or whatever you like
		return $interval->format($format);
}
  
/**
 * Escape data to make it safe to write in the browser.
 */
function esc($str) {
	return htmlentities($str, ENT_COMPAT, 'UTF-8');
}
