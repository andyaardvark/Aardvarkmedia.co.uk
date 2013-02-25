<?php
	/**
	 * Module Name: Table of Contents HTML
	 *
	 * @package <theme name>
	 * @since 1.0
	 */


	/**
	 * cgy_generate_toc
	 * ----------------------------------------
	 * Generate Table of Contents based on <H/> structure
	 *
	 * @param string $content HTML content
	 *
	 * @return string Returns <nav> including nested lists or empty string.
	 */


	function cgy_generate_toc($content=false){

		if($content && is_string($content)){

			/* extract index */
			preg_match_all('%<h(\d)><a.*?id="(.*?)".*?>([a-zA-Z0-9 -:]*?)<%i', $content, $index);

			$indexHTML='<nav><ol>'.PHP_EOL;

			foreach($index[1] as $k=>$v){

				/* open an entry */
				$indexHTML.='<li><a href="#'.$index[2][$k].'" title="Find out more about '.$index[3][$k].' formatting.">'.$index[3][$k].'</a>';

				$indexHTML.='<!--'.$index[1][$k+1].', '.$v.' -->';

				/* for all but last element */
				if($k<count($index[1])-1){

					/* if the next H has higher index than the current, initiate a sublist */
					if($index[1][$k+1] > $v){
						$indexHTML.=PHP_EOL.'<ol>'.PHP_EOL;
					}

					/* if the next H has lower index than the current, close current element together with any sublists */
					elseif($index[1][$k+1] < $v){
						$indexHTML.='</li>'.PHP_EOL;

						for($i = 0; $i<($v-$index[1][$k+1]); $i++){
							$indexHTML.='</ol>'.PHP_EOL.'</li>'.PHP_EOL;
						}
					}

					/* if current and next H index are equal, close the element */
					else{
						$indexHTML.='</li>'.PHP_EOL;
					}

				}

				/* if it's the last element figure out the depth and close current element together with any sublists */
				else{
					$indexHTML.='</li>'.PHP_EOL;

					for($i = 0; $i<($v-2); $i++){
						$indexHTML.='</ol>'.PHP_EOL.'</li>'.PHP_EOL;
					}
				}
			}

			$indexHTML.='</ol></nav>';

			return $indexHTML;
		}

		return '';

	}

?>