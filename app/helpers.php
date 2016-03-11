<?php
namespace App\Helpers;

class Helper{


	 public static function array_average_by_key( $aGroupIdWithUniqueCondition, $arr )
	{
		
	    $sums = array();
	    $counts = array();
	    $aUniqueCondition = array();

	    
	    $aItemId = array();


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

	           
	            if(in_array($sub_v->subgroup_id,$aGroupIdWithUniqueCondition)){
	            	$sums[$sub_k]  .= trim($sub_value).",";
	            	$sums[$sub_k]  = ltrim($sums[$sub_k],"0");

	            }else{
	            	$sums[$sub_k]  += (float) $sub_value;
	            }
	            
	        }
	        
	    }
	    $avg = array();

	    foreach( $sums as $k => $v )
	    {

	    	if(is_string($v) || is_array($v)){
	    		$avg[$k] = self::mode($aGroupIdWithUniqueCondition,$v);
	    	}else{
	    		$avg[$k] = $v / $counts[$k];
	    	}
	        
	    }
	    return $avg;
	}
	
	 /*will return top instances of distinct values from array*/
	public static function mode($aGroupIdWithUniqueCondition,$array){
	
		$array = explode(",", $array);
		$array = array_diff($array, array('', 'N/A'));

		$v = array_count_values($array); 
        arsort($v); 
        $total = array();
        
        foreach($v as $k => $v){
        	$total = $k;
        	break;
        } 

        return $total; 
	}
}