<?php
class HelperClass
{
  public static function findObjInArrayByObjVal($array,$assocVal, $keyVal, $searchValue)
  {
    foreach($array[$assocVal] as $objInArray)
    {
      if($objInArray->$keyVal == $searchValue)
      {
        return $objInArray;
      } 
    }
  }
}
?>