<?php
 class Modals
 {
   private $_db,
           $_openModals,
           $_user;
   
   public function __construct($user = null)
   {
     if(Session::get('user'))
     {
        $this->_db = DB::getInstance();
       $this->_user = new User(Session::get('user'));
     }
   } 
   public function index()
   {
     
   }
   public function findSingleMod($modName)
   {
     $data = $this->_db->get("modal_settings",array("name","=",$modName));
     if($data->count())
     {
       return json_encode($data->first());
     }else
     {echo "not loading properly: error on modals.php line27";}
     
   }
   public function closeWgt()  //this function will get rid of the wgt from the sql
   {
     
   }
  
 }
?> 