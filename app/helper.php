<?php

  if(!function_exists('r')):
    function r($data)
    {
       echo "<pre>";
       print_r($data->toArray());
       echo "<pre>";
    }
 endif;

 if(!function_exists('f')):
  function f($data)
  {
     echo "<pre>";
     print_r($data);
     echo "<pre>";
  }
 endif;

function uc($string)
{
  return ucwords($string);
}

function df($date)
{
  return date('j M Y',strtotime($date));
}

function cd()
{
   return date('Y-m-d H:i:s');
}

function a30d($date)
{
   return date("Y-m-d", strtotime($date ."+30 days"));
}
?>
