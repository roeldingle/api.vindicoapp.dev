<?php // Code within app\Helpers\Helper.php

    namespace App\Helpers;

    class Helper
    {
        public static function checkDataExist($data)
        {
            return null !==$data ? true : false;
        }

        public function array_average_by_key( $arr )
		{
		    $sums = array();
		    $counts = array();
		    foreach( $arr as $k => &$v )
		    {

				foreach( $v as $sub_k => $sub_v )
		        {
		            if( !array_key_exists( $sub_k, $counts ) )
		            {
		                $counts[$sub_k] = 0;
		                $sums[$sub_k]   = 0;
		            }

		            $sub_value = $sub_v->value;

		            $counts[$sub_k]++;
		            $sums[$sub_k]  += (float) $sub_value;

		            
		        }
		        
		    }
		    $avg = array();

		    foreach( $sums as $k => $v )
		    {
		        $avg[$k] = $v / $counts[$k];
		    }
		    return $avg;
		}
    }