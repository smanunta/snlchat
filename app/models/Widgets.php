<?php
 class Widgets
 {
   private $_db,
           $_openWidgets,
           $_user;
   
   public function __construct($user = null)
   {
     if(Session::get('user'))
     {
        $this->_db = DB::getInstance();
       $this->_user = new User(Session::get('user'));
       $this->_openWidget = $this->findOpenWidgets($user);
     }
   } 
   public function index()
   {
     
   }
   public function findOpenWidgets()  //$user is the user object with all user data
   {
    if($this->_user)
    {
       $wgtNums = explode(" ", $this->_user->data()->opened_widgets);
        $TBR = array();
       foreach($wgtNums as $wgt)
       {
         $val = $this->_db->get("widgets_settings", array("widget_id","=",$wgt));
         if($val->count())
         {
            array_push($TBR , $val->first());
         }else{echo "fuck";}
        
       }
       return json_encode($TBR);
     }else
     {
       return false;
     }
   } 
   public function findSingleWgt($wgtName)
   {
     $data = $this->_db->get("widgets_settings",array("name","=",$wgtName));
     if($data->count())
     {
       return json_encode($data->first());
     }else
     {return json_encode("fuck this shit");}
     
   }
   public function closeWgt()  //this function will get rid of the wgt from the sql
   {
     
   }
  
 }
?> 