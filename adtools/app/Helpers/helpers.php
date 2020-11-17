<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use App\Entities\Udtm_Lov;
use App\Entities\Letter_In;
    class helpers
    {
        public static function TestQuery() 
        {
            //$udtms = Udtm_Lov::where('seq','1')->get();
            $udtms = DB::table("Udtm_Lov")->where('seq',1)->get();
            return $udtms;
        }

        public static function LetterCharKh() 
        {
            $lc = DB::table("Udtm_Lov")->where('lov_type', 'letter_char')->get();
            $datas = array();
            foreach($lc as $item){
                $datas[$item->lov_code] = $item->lov_desc_kh;
            }
            return $datas;
        }

        public static function LetterPriorityKh() 
        {
            $lc = DB::table("Udtm_Lov")->where('lov_type', 'letter_priority')->get();
            $datas = array();
            foreach($lc as $item){
                $datas[$item->lov_code] = $item->lov_desc_kh;
            }
            return $datas;
        }

        public static function LetterTypeKh() 
        {
            $lc = DB::table("Udtm_Lov")->where('lov_type', 'letter_type')->get();
            $datas = array();
            foreach($lc as $item){
                $datas[$item->lov_code] = $item->lov_desc_kh;
            }
            return $datas;
        }

        public static function GetFileReference($letter_code) 
        {
            $fr = DB::table("file_ref")->where('letter_code', $letter_code)->get();
            $datas = array();
            $ind = 0;
            foreach($fr as $item){
                $datas[$ind]['letter_code'] = $item->letter_code;
                $datas[$ind]['attachment_name'] = $item->attachment_name;
                $datas[$ind]['letter_attachment'] = $item->letter_attachment;
                $ind = $ind + 1;
            }
            return $datas;
        }

        public static function LetterRoute() 
        {
            $datas = array();
            $datas['i'] = "letterin_show";
            $datas['o'] = "letterout_show";
            return $datas;
        }

        public static function KhMonth() 
        {
            $datas = array();
            $datas['01'] = "មករា";
            $datas['02'] = "កុម្ភៈ";
            $datas['03'] = "មីនា";
            $datas['04'] = "មេសា";
            $datas['05'] = "ឧសភា";
            $datas['06'] = "មិថុនា";
            $datas['07'] = "កក្ដដា";
            $datas['08'] = "សីហា";
            $datas['09'] = "កញ្ញា";
            $datas['10'] = "តុលា";
            $datas['11'] = "វិច្ឆិកា";
            $datas['12'] = "ធ្នូ";
            return $datas;
        }

        public static function Yearreport() 
        {
            $datas = array();
            for($i = 0; $i < 5; $i++){
                $datas[date("Y")-$i] = date("Y")-$i;
            }
            return $datas;
        }

        public static function Gender() 
        {
            $datas = array();
            $datas['m'] = "ប្រុស";
            $datas['f'] = "ស្រី";
            return $datas;
        }

        public static function RecordStat() 
        {
            $rs = DB::table("Udtm_Lov")->where('lov_type', 'record_stat')->get();
            $datas = array();
            foreach($rs as $item){
                $datas[$item->lov_code] = $item->lov_desc_kh;
            }
            return $datas;
        }


        public static function GenertateCode($basedcode, $lettertype) 
        {
            return $lettertype.date("Y").$basedcode;
        }

        public static function Staff_GenertateCode() 
        {
            return 's'.strtotime(date('Y-m-d H:i:s'));
        }

    }