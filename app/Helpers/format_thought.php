<?php
namespace App\Helpers;
 
class FormatThought {
    /**
     * @param string $thought
     * 
     * @return string
     */
    public static function trim($thought) {
        $thoughtArray = explode(' ', $thought);
        $newThought = [];
        $totalChar = 0;
        foreach($thoughtArray as $t){
            $totalChar += strlen($t);
            if($totalChar < 150){
                array_push($newThought, $t);
            }
        }
        if($totalChar >= 150){
            array_push($newThought, '...');
        }

        return implode(' ', $newThought);
    }
}