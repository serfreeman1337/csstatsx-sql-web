<?php

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
	function bootstrap_progress($bars, $is_center = false) {
		$progress_class = '';
		if($is_center) $progress_class = ' progress-val';

		$r = '<div class="progress'.$progress_class.'" style="width: 100px;">';

		foreach($bars as $bar) {
			$ratio = calculate_ratio($bar['num'], $bar['of']);
			$class = '';

			$r .= '<div class="progress-bar'.$class.'" role="progressbar" style="width: '.$ratio.'%;" aria-valuenow="'.$ratio.'" aria-valuemin="0" aria-valuemax="100"></div>';

			if($is_center) {
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
