<?php 

use App\Models\TeamMember;
use Illuminate\Support\Facades\Route;


if ( ! function_exists('homeSliderFontStyle')) {
    function homeSliderFontStyle($str) {
        $allwords = explode(" ", $str);
        $str = '';
        for ( $i=0,$j=1; $i <count($allwords); $i++,$j++ ) {
            if ( substr($allwords[$i], 0, 1) == "#" )  { 
                $str .= "<span>". str_replace("#"," ", $allwords[$i]) ."</span> "; 
            } else {
                $str .= $allwords[$i]." ";
            }

            if ($j == 3) {
                $str .= "<br />";
                $j=1;
            }
        }
        return $str;
    }
}

if ( ! function_exists('getTeamMemberByTypeId')) {
    function getTeamMemberByTypeId($id){
        return TeamMember::where("team_type_id", $id)->get();
    }
}

if ( ! function_exists('getPageName')) {
    function getPageName() {
        $name = Route::current()->uri;
        if ( $name == 'About') {
            return "About Bitmap";
        } else if ( $name == 'Protfolio') {
            return "Protpolios";
        } else if ( $name == 'Service') {
            return "Service Page";
        } else if ( $name == 'ContactUs') {
            return "Contact Bitmap";
        }
     }
}

if ( ! function_exists('wordLimitForServicePage')) {
    function wordLimitForServicePage($str, $limit) {
        $words = explode(" ", $str);
        $shown_string = "";
        if (count($words) > $limit) {
            if ( count($words) != 0 && !empty($str)) {
                for ($i=0; $i <$limit; $i++) { 
                    $shown_string .= $words[$i]." ";
                }
            }
        } else {
            $shown_string .= $str;
        }
       
        $shown_string .= " <a href='#'>Readmore...</a>";
        echo $shown_string;
    }
}