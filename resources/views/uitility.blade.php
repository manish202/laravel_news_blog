<?php
    if(!function_exists('convertDateFormat')){
        function convertDateFormat($input,$output){
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $input);
            if($dateTime === false){
                return "-";
            }
            return $dateTime->format($output);
        }
    }
?>