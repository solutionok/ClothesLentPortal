<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Session;
use Image;
use File;
use DateTime;
use Imagine\Filter\Basic\Autorotate;

class Helper extends Model{

    public static function creditCardother_label($number)
    {
        if (preg_match('/^3[47][0-9]{13}$/',$number)) {
            return 'amex';
        } elseif(preg_match('/^5[1-5][0-9]{14}$/',$number)) {
            return 'mastercard';
        } elseif(preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/',$number)) {
            return 'visa';
        } elseif(preg_match("/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/", $number)) {
            return "diners_club";            
        } elseif(preg_match("/^6(?:011|5[0-9]{2})[0-9]{12}$/", $number)) {
            return "discover";            
        } elseif(preg_match("/^(?:2131|1800|35\d{3})\d{11}$/", $number)) {
            return "jcb";            
        } else{ return '0'; }
    }

    public static function timeDuration($date)
    {
        $full     = false;
        $now      = new DateTime;
        $ago      = new DateTime($date);
        $diff     = $now->diff($ago);
        $diff->w  = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $date = array(
                        'y' => 'year',
                        'm' => 'month',
                        'w' => 'week',
                        'd' => 'day',
                        'h' => 'hour',
                        'i' => 'minute',
                        's' => 'second',
                    );
        foreach ($date as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($date[$k]);
            }
        }
        if (!$full) $date = array_slice($date, 0, 1);
        $date = ($date ? implode(', ', $date) . ' ago' : 'just now');
        return $date;
    }

    public static function seoUrl($string)
    {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    public static function flashMessage($header,$content,$boolean)
    {
        Session::flash('session_header',$header);
        Session::flash('session_content',$content);
        Session::flash('session_boolean',$boolean);
    }

    public static function destroySession()
    {
        Session::forget('session_header');
    }
   public static function uploadBase64($image,$custom_old_file, $custom_file_size, $old_file, $field_name, $request, $first_folder, $second_folder='', $third_folder='', $fourth_folder='')
    {
        $data = [];
        // ----------- Path holder ----------- //
        if ($fourth_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/'.$fourth_folder.'/';
        } elseif ($third_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/';
        } elseif ($second_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/';
        } else {
            $path = 'uploads/'.$first_folder.'/';
        }
        $old_file_name = self::pathChecker($old_file);
        // ----------- Upload the file ----------- //
        //$file               = $request->file($field_name);
        // Generate new name
$encodedImgString = explode(',', $image, 2);
if(count($encodedImgString)>1)
{
  $encodedImgString=$encodedImgString[1];  
}else 
   $encodedImgString =$encodedImgString[0]; 
$decodedImgString = base64_decode($encodedImgString);
$info = getimagesizefromstring($decodedImgString);

$type= $info['mime'];
 
        $type=explode('/',$type)[1];
        $generated_filename = time()."__".time().'.'.$type;
        // Move the file
        //$file_copy          = $file->move(public_path().'/'.$path, $generated_filename);
        $imagePath=public_path().'/'.$path;
            if (!File::exists($imagePath)) {
                // Create a directory path
                File::makeDirectory($imagePath);
            }
            
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        
       \File::put($imagePath. $generated_filename,$decodedImgString); 
        $file_copy=$imagePath. $generated_filename;  
       
       
        file_exists($old_file_name) ? File::delete(public_path().'/'.$old_file_name) : '';
        $data['new_path']   = $path.$generated_filename;
        // ----------- Convert the file ----------- //
        if ($custom_old_file != 'none') {
            $old_file_name = self::pathChecker($custom_old_file);
            file_exists($old_file_name) ? File::delete(public_path().'/'.$old_file_name) : '';
            $custom_path = public_path().'/uploads/custom_size/';
            if (!File::exists($custom_path)) {
                // Create a directory path
                File::makeDirectory($custom_path);
            }
            
            
            
             
        
            // Convert the photo
            $path             = '/uploads/custom_size/'.$generated_filename;
            $custom_size_path = public_path().$path;

            $img = Image::make($file_copy,array( // Convert the width and height
                'width'  => $custom_file_size,
                'height' => $custom_file_size
            ));

            $autorotate = new Autorotate();
            $autorotate->apply($img)->save($custom_size_path);
//            $img->save($custom_size_path);

            $data['custom_size_path'] = $path;
        } else {
            $data['custom_size_path'] = 'none';
        }   
        return $data;
       
        
    }
    public static function uploadFile($custom_old_file, $custom_file_size, $old_file, $field_name, $request, $first_folder, $second_folder='', $third_folder='', $fourth_folder='')
    {
        $data = [];
        // ----------- Path holder ----------- //
        if ($fourth_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/'.$fourth_folder.'/';
        } elseif ($third_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/';
        } elseif ($second_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/';
        } else {
            $path = 'uploads/'.$first_folder.'/';
        }
        $old_file_name = self::pathChecker($old_file);
        // ----------- Upload the file ----------- //
        $file               = $request->file($field_name);
        // Generate new name
        $generated_filename = time()."__".$file->getClientOriginalName();
        // Move the file
        $file_copy          = $file->move(public_path().'/'.$path, $generated_filename);
        file_exists($old_file_name) ? File::delete(public_path().'/'.$old_file_name) : '';
        $data['new_path']   = $path.$generated_filename;
        // ----------- Convert the file ----------- //
        if ($custom_old_file != 'none') {
            $old_file_name = self::pathChecker($custom_old_file);
            file_exists($old_file_name) ? File::delete(public_path().'/'.$old_file_name) : '';
            $custom_path = public_path().'/uploads/custom_size/';
            if (!File::exists($custom_path)) {
                // Create a directory path
                File::makeDirectory($custom_path);
            }
            // Convert the photo
            $path             = '/uploads/custom_size/'.$generated_filename;
            $custom_size_path = public_path().$path;

            $exif = exif_read_data($file_copy, 'IFD0');
            $rotation   = 0;
            if(!empty($exif['Orientation'])) {
                switch($exif['Orientation']) {
                    case 8:
                        $rotation = 90;
                        break;
                    case 3:
                        $rotation = 180;
                        break;
                    case 6:
                        $rotation = -90;
                        break;
                }
            }

            // Crop image and watermark it
            $img = Image::make($file_copy, ['width' => $custom_file_size, 'height' => $custom_file_size, 'rotate' => -$rotation]);

           /* $img = Image::make($file_copy,array( // Convert the width and height
                'width'  => $custom_file_size,
                'height' => $custom_file_size
            ));*/

            $img->save($custom_size_path);

            $data['custom_size_path'] = $path;
            $data['rotate'] = -$rotation;
        } else {
            $data['custom_size_path'] = 'none';
        }   
        return $data;
    }  

    public static function pathChecker($path)
    {
        if ($path != 'uploads/others/no_image.jpg' && $path != 'uploads/others/no_avatar.jpg' && $path != 'uploads/others/no_video.jpg'){
            return $path;
        } else {
            return NULL;
        }
    }

    public static function deleteFile($old_file,$first_folder,$second_folder='',$third_folder='',$fourth_folder='')
    {
        if ($fourth_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/'.$fourth_folder.'/';
        } elseif ($third_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/'.$third_folder.'/';
        } elseif ($second_folder != '') {
            $path = 'uploads/'.$first_folder.'/'.$second_folder.'/';
        } else {
            $path = 'uploads/'.$first_folder.'/';
        }
        if ($old_file != 'uploads/others/no_image.jpg' && $old_file != 'uploads/others/no_avatar.jpg' && $old_file != 'uploads/others/no_video.jpg'){
            File::delete(public_path().'/'.$old_file);
            // Check the directory if empty
            if (count(scandir(public_path().'/'.$path)) == 2) {
                // Remove the path
                rmdir(public_path().'/'.$path);
            }
        }
    }

    public static function getYears($number_of_years=0,$include_pass=false)
    {
        $pass = ($include_pass) ? (0 - $number_of_years): 0;
        $arr  = [];
        for($i = $pass; $i < $number_of_years; $i++){ 
            $year    = date("Y", strtotime('+'.$i.' years'));
            $numeric = date("y", strtotime('+'.$i.' years'));
            $data    = (object) array(
                                        'name'    => $year, 
                                        'numeric' => $numeric, 
                                    );
            array_push($arr,$data);
        }
        return $arr;
    }

    public static function getYearsDesc($number_of_years=0,$include_pass=false)
    {
        $pass = ($include_pass) ? ( 0 - $number_of_years ): 0;
        $arr  = [];
        for ($i = $pass; $i < $number_of_years; $i++) { 
            $year    = date("Y", strtotime('-'.$i.' years'));
            $numeric = date("y", strtotime('-'.$i.' years'));
            $data    = (object) array(
                                        'name'    => $year, 
                                        'numeric' => $numeric, 
                                    );
            array_push($arr,$data);
        }
        return $arr;
    }

    public static function getMonths()
    {
        $arr = [];
        for ($i=1; $i < 13; $i++) { 
            $month     = date('F', mktime(0,0,0,$i, 1, date('Y')));
            $shortname = date('M', mktime(0,0,0,$i, 1, date('Y')));
            $data      = (object) array(
                                        'name'      => $month, 
                                        'numeric'   => ($i < 10) ? "0".$i : $i, 
                                        'shortname' => $shortname
                                    );
            array_push($arr,$data);
        }
        return $arr;
    }
    
    public static function convertObjectsToArray($obj) // To clean the index
    {
        $array = [];
        foreach ($obj as $value) {
            $array[] = $value;
        }
        return $array;
    }
    
}