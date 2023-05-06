# College Predictor Website
The project is a college prediction system with a login page and predictor system. The project works on HTML, CSS, JavaScript, PHP, MySQL on Apache server using XAMPP. 
## Note
* Go to https://console.cloud.google.com/ and make a new project and generate a new OAuth 2.0 Client ID
* Place this CLIENT ID in `login.php` wherever required (look for login and signup div)

## How to run
1. Install XAMPP from https://www.apachefriends.org/download.html
2. Navigate to `{your-XAMPP-installation-path}\xampp\htdocs\`
3. Clone this repository into above path
4. Open XAMPP Control Panel and start Apache and MySQL servers
5. Install MySQL using Windows installer from https://dev.mysql.com/downloads/installer/
6. On Windows, go to `Start` >> `MYSQL 8.0 Command Line Client` and type in your password that you set during installation
7. Run `create database College_Predictor;` followed by `use College_Predictor` in Command Line Chat
8. Create `usertable` using commands given in `usertable.sql` file in this repository. Note that this will create two sample users, namely `testuser` and `Akshay` with passwords `testpassword` and `Akshay` respectively.
9. Navigate to `localhost/College-Predictor/` to view home page of web app
