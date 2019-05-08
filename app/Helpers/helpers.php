<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 1/8/19
 * Time: 4:18 PM
 */

if (! function_exists('uploadImage')) {
    function uploadImage($image,$path) {
        $filename = time().'.'.$image->getClientOriginalExtension();
        $location = $path.$filename;

        \Intervention\Image\Facades\Image::make($image)->save($location);
        return $filename;
    }
}

if (! function_exists('nameToSlug')) {
    function nameToSlug($name) {
        $slug = strtolower($name);
        $slug = str_replace(' ','-',$slug);
        return $slug;
    }
}

if(! function_exists('hasResourcePermission'))
{
    function hasResourcePermission($permissions,$resource){

        $exists = false;

        foreach ($permissions as $permission) {
            if($permission['resource']==$resource){
                $exists = true;
            }
        }
        return $exists;
    }
}

if(! function_exists('hasActionResourcePermission'))
{
    function hasActionResourcePermission($permissions,$resource,$action){

        $exists = false;
        foreach ($permissions as $permission)
        {
            if($permission['action']==$action && $permission['resource']==$resource){
                $exists = true;
            }
        }
        return $exists;
    }
}

if(! function_exists('getDigitName')){
    function getDigitName($digit)
    {
        $levels = [
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine'
        ];

        return ($digit > 0 && $digit < 10) ? $levels[$digit] : NULL;
    }
}