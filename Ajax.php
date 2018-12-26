<?php
namespace app\wx\controller;
use think\Controller;

class Ajax extends Controller
{
   public function read(){
    if(!empty($_POST['name'])){
       $value = array("status"=>"1","msg"=>"保存成功");
       echo json_encode($value);
    }
   	elseif(!empty($_POST['latitude'])){
     $latitude=$_POST['latitude'];
     $longitude=$_POST['longitude'];
     $data = $this->location($latitude,$longitude);
     $city=$data->result->addressComponent->city;
     $district=$data->result->addressComponent->district;
     $street=$data->result->addressComponent->street;
     $city1=str_replace("市","",$city);
     $weather_info = $this->get_weather($city1);
     $update_time = $weather_info->cityInfo->updateTime;
     $shidu = $weather_info->data->shidu;
     $pm25 = $weather_info->data->pm25;
     $quality = $weather_info->data->quality;
     $week = $weather_info->data->forecast[0]->week;
     $fx = $weather_info->data->forecast[0]->fx;
     $type = $weather_info->data->forecast[0]->type;
     $high = $weather_info->data->forecast[0]->high;
     $high1 = str_replace("高温 ","",$high);
     $low = $weather_info->data->forecast[0]->low;
     $low1 = str_replace("低温 ","",$low);
     $week_next1 = $weather_info->data->forecast[1]->week;
     $high_next1 = $weather_info->data->forecast[1]->high;
     $high1_next1 = str_replace("高温 ","",$high_next1);
     $low_next1 = $weather_info->data->forecast[1]->low;
     $low1_next1 = str_replace("低温 ","",$low_next1);
     $fx_next1 = $weather_info->data->forecast[1]->fx;
     $type_next1 = $weather_info->data->forecast[1]->type;
     $week_next2 = $weather_info->data->forecast[2]->week;
     $high_next2 = $weather_info->data->forecast[2]->high;
     $high1_next2 = str_replace("高温 ","",$high_next2);
     $low_next2 = $weather_info->data->forecast[2]->low;
     $low1_next2 = str_replace("低温 ","",$low_next2);
     $fx_next2 = $weather_info->data->forecast[2]->fx;
     $type_next2 = $weather_info->data->forecast[2]->type;
     $week_next3 = $weather_info->data->forecast[3]->week;
     $high_next3 = $weather_info->data->forecast[3]->high;
     $high1_next3 = str_replace("高温 ","",$high_next3);
     $low_next3 = $weather_info->data->forecast[3]->low;
     $low1_next3 = str_replace("低温 ","",$low_next3);
     $fx_next3 = $weather_info->data->forecast[3]->fx;
     $type_next3 = $weather_info->data->forecast[3]->type;
     $value = array("status"=>"1","city"=>"$city","district"=>"$district","street"=>"$street","update_time"=>"$update_time","shidu"=>"$shidu",
                   "pm25"=>"$pm25","quality"=>"$quality","week"=>"$week","high1"=>"$high1","low1"=>"$low1","fx"=>"$fx","type"=>"$type",
                   "week_next1"=>"$week_next1","high1_next1"=>"$high1_next1","low1_next1"=>"$low1_next1","fx_next1"=>"$fx_next1","type_next1"=>"$type_next1",
                   "week_next2"=>"$week_next2","high1_next2"=>"$high1_next2","low1_next2"=>"$low1_next2","fx_next2"=>"$fx_next2","type_next2"=>"$type_next2",
                   "week_next3"=>"$week_next3","high1_next3"=>"$high1_next3","low1_next3"=>"$low1_next3","fx_next3"=>"$fx_next3","type_next3"=>"$type_next3");
     echo json_encode($value);  
    }  
    else {
     $value = array("status"=>"0","msg"=>"保存失败");
     echo json_encode($value);
   }
}
//获取城市信息
 private function location($latitude,$longitude){
   if(!empty($latitude)){
     $result_v1=json_decode(file_get_contents("https://api.map.baidu.com/geoconv/v1/?coords=".$longitude.",".$latitude."&output=json&pois=1&ak=ZeRX56IGsRvpvUKYxErWdlepMS1vwGmX"));
     $baidulat = $result_v1->result[0]->y;
     $baidulong = $result_v1->result[0]->x;
     $result_v2=json_decode(file_get_contents("http://api.map.baidu.com/geocoder/v2/?location=".$baidulat.",".$baidulong."&output=json&pois=1&ak=ZeRX56IGsRvpvUKYxErWdlepMS1vwGmX"));
     return $result_v2;
   } else {
   	 return null;
   }
  }
  //返回天气信息
  private function get_weather($city){
    if(!empty($city)){
      $url ='http://139.199.127.163/city/'.$city;
      $weather_info = json_decode(file_get_contents($url));
      if($weather_info->status==200){
         return $weather_info;
      }else{
         return null;
      }
    }else{
    	 return null;
    }
  }
}
