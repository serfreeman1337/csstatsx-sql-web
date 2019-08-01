<?php

if(!function_exists('rank_for_top'))
{
	function rank_for_top($pos, $paginator)
	{
		return ($pos+1) + (($paginator->currentPage() - 1)* $paginator->perPage());
	}
}

if(!function_exists('calculate_ratio'))
{
	function calculate_ratio($num, $of, $rate = true)
	{
		if(!$of) {
			return $rate ? '0.00' : 0;
		}

		return number_format(($num / $of) * ($rate ? 100.0 : 1), 2);
	}
}

if(!function_exists('bootstrap_progress'))
{
	function bootstrap_progress($bars, $params = array()) {
		$progress_class = '';
		if(isset($params['center_val'])) $progress_class = ' progress-val';

		$r = '<div class="progress'.$progress_class.'">';

		foreach($bars as $bar) {
			$ratio = calculate_ratio($bar['num'], $bar['of']);
			$class = isset($bar['class']) ? ' '.$bar['class'] : '';

			$r .= '<div class="progress-bar'.$class.'" role="progressbar" style="width: '.$ratio.'%;" aria-valuenow="'.$ratio.'" aria-valuemin="0" aria-valuemax="100"';

			if(isset($bar['tip'])) {
				$tip = str_replace('%ratio', $ratio, $bar['tip_text']);
				$r .= ' data-toggle="tooltip" data-placement="'.$bar['tip'].'" title="'.$tip.'"';
			}

			$r .= '>';

			if(isset($bar['print_val'])) {
				$r .= $bar['num'];
			}
			$r .= '	</div>';

			if(isset($params['center_val'])) {
				$r .= '
				<div class="progress-bar-val">
					'.$ratio.'%
				</div>';
			}
		}

		$r .= '</div>';

		return $r;
	}
}
