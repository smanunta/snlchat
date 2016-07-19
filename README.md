#Starting with the “SNLCreator” app 

Create Database
Use the start.sql file in the root of the download folder to create your database, name it whatever you want
NOTE: before running the SQL change the field appName in the “options” table to whatever you named your root folder
Set important dependencies
Open the file named init.php located: /app/init.php
Set the following fields:
'host' => 'LINK TO YOUR SQL DB'
'username' => 'USERNAME YOU SET FOR THE DB',
'password' => PASSWORD YOU SET FOR THE DB',
'db' => 'NAME OF THE DB YOU CREATED'
Open .htaccess  file located in : /public/ and add your root dir name


Once the steps above are complete the app will be running with the default themes and your DB.

Login included is username: root , password: password
