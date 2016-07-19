<?php 

class CrtlLogin extends Controller
{
	public function index($name = '') 
	{
    if(Input::exists())
    {
      if(Token::check(Input::get('token')))
      {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
          'username'=> array('required' => 'true'), 
          'password'=> array('required' => 'true')
        ));

        if($validation->passed())
        {
          $user= new User();

          $remember = (Input::get('remember') === 'on') ? true : false;
          $login = $user->login(Input::get('username'), Input::get('password'), $remember);

          if($login) //runs the login function in the user class and returns true if login success or false if failed
          {
            Redirect::to('CrtlWorkspace/');
          }else
          {
            echo 'login failed';
          }
        }else
        {
          foreach($validation->errors() as $error)
          {
            echo $error . "<br>";
          }
        }
      }
    }
		//$user = $this->model('User');  //returns a instantiated class ..in this ex its class User
		// we need to check if logged in  ...if not return to login screen
		$this->view('loginViews/index');	
	}
	
	public function register() 
	{
		if(Input::exists())
    {
     
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
          'newUsername'=> array('required' => 'true'), 
          'newPassword'=> array('required' => 'true')
        ));

        if($validation->passed())
        {
					$user= new User();
					
					$salt = Hash::salt(32);
					try {
						$user->create(array(
							'username' => Input::get('newUsername'),
							'password' => Hash::make(Input::get('newPassword'), $salt),
							'salt' => $salt,
							'first' => Input::get('first'),
							'last' => Input::get('last'),
							'joined' => date('Y-m-d H:i:s'),
							'group' => 1
						));
						
						Session::flash('success', 'you succesfully registered, please login!!');
						Redirect::to('../CrtlLogin');
					}catch(Exception $e)
					{
						die($e->getMessage());
					}
					
				}else
        {
          foreach($validation->errors() as $error)
          {
            echo $error . "<br>";
          }
        }
			
		}
	}
}
?>