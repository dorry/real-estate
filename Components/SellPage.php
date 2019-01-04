<!DOCTYPE <!DOCTYPE html>
<html>
<head>

</head>
<?php
$username = $passwordErr = $emailErr = $nameErr = $email = $password = $mobileno = "";
class property{
  public $price;
  public $size;
  public $address;
  public $img;
  public $houseName;
  public function __construct($price,$size,$address,$img,$houseName){
      $this->price = $price;
      $this->size = $size;
      $this->address = $address;
      $this->img = $img;
      $this->houseName = $houseName;
  }

}
$conn = mysqli_connect('localhost','root','','real_estate');
$selectQuery="select * from property";
$result = mysqli_query($conn,$selectQuery);
$allProperties = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($allProperties,new property($row['price'],$row['size'],$row['description'],'../assets/pic2.jpg','villa'));
    }}
    else{
        echo "0 results";
    }
$payload = json_encode($allProperties);

if (isset($_POST["submit"])) {
  if (!preg_match("/^[a-zA-Z\d ]*$/",$_POST["username"])) {
    $nameErr = "Only letters,numbers and white space allowed"; 
    
  }

  else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format"; 
  }
  else if ($_POST["password"]!= $_POST["confirmPassword"]) {
    $passwordErr = "passwords not matching"; 
  }
  else{
    
    $username = $_POST["username"];
    $username = mysqli_real_escape_string($conn,$username);
    $email = $_POST["email"];
    $email = mysqli_real_escape_string($conn,$email);      
    $password = $_POST["password"];
    $password = mysqli_real_escape_string($conn,$password);
    if(!$conn){
      die("connection failed:".mysqli_connect_error());
    }
    $insertQuery = "Insert into user (username,email,password,userTypeid)
    values ('$username','$email','$password',1)";
    mysqli_query($conn, $insertQuery);
    mysqli_close($conn);
   
  }
}
?>
<body>
    

    <ul class = "NavigationBar">

        <li class="first-element-nav"><a class="nav-element" href="#Buy" onclick = "location.href = '../Components/BuyPage.php'">Buy</a></li>
        <div class="line-between"></div>
    
    
        <li  ><a class="nav-element" href="#Rent" onclick = "location.href = '../Components/SellPage.php'">Rent</a></li>
        <div class="line-between"></div>
        <li  ><a class="nav-element" href="#MortGages">MortGages</a></li>
        <div class="line-between"></div>
        <li  ><a class="nav-element" href="#AgentFinder">AgentFinder</a></li> 
        <div class="line-between"></div>
        <li> <a href = "#Add property" id="add-property">AddProperty</a> </li>
        <div class="login-signup">
        <li><a href = "#Login" id='login'>Login /</a>  </li>
        <li><a href = "#Signup" id='Signup'> Signup</a></li>
        </div>
        
        </ul>

<div class = "container2">
    <div class = "form">
    <form >
         <input type ="text" placeholder="New York, NY" class="search-input">
         <input type="submit" value = "." class= "search-button" >
         <select name="filter" style="width:10vw;height:40px">
                <option value="opt1">FILTER BY</option>
                <option value="opt2">Hi2</option>
                <option value="opt2">Hi3</option>
                <option value="opt2">Hi4</option>
              </select>
        </form>
    </div>
</div>
<div id="addProperty" class="add-property">
               
                <div class="modal-property">
                  
                  <div class="propertyFill">
                <div class="propertyAdd">
                <span class="closeProperty">&times;</span>
                  <h2>Add Your Property</h2>
                  <form method="post">
                      
                   <h5>Country <span>* </span></h5>
                   <p></p>

                   <select name="country">
                          <option value="">Country...</option>
                          
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="Angola">Angola</option>               
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>  
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Botswana">Botswana</option>
                          <option value="Brazil">Brazil</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Chad">Chad</option>
                          <option value="Channel Islands">Channel Islands</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cote DIvoire">Cote D'Ivoire</option>
                          <option value="Croatia">Croatia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Curaco">Curacao</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Iran">Iran</option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Korea North">Korea North</option>
                          <option value="Korea Sout">Korea South</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libya">Libya</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macedonia">Macedonia</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">Marshall Islands</option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Nambia">Nambia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherland Antilles">Netherland Antilles</option>
                          <option value="Netherlands">Netherlands (Holland, Europe)</option>
                          <option value="Nevis">Nevis</option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau Island">Palau Island</option>
                          <option value="Palestine">Palestine</option>
                          <option value="Panama">Panama</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Republic of Montenegro">Republic of Montenegro</option>
                          <option value="Republic of Serbia">Republic of Serbia</option>
                          <option value="Romania">Romania</option>
                          <option value="Russia">Russia</option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Serbia">Serbia</option>
                          <option value="Slovakia">Slovakia</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Spain">Spain</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syria">Syria</option>
                          <option value="Taiwan">Taiwan</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Togo">Togo</option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Erimates">United Arab Emirates</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States of America">United States of America</option>
                          <option value="Uraguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vietnam">Vietnam</option>
                          <option value="Yemen">Yemen</option>
                         
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                          </select>
  
                   
                <p></p>
                    <h5>City <span>* </span></h5>
                    
                    <input type="text" name="City"
                      required=""
                      
                    />
                    <h5>Region <span>* </span></h5>

                    <input type="text" name="Region"
                    required=""
                    
                  />
                    <h5>Address<span>* </span></h5>
                    <input  type="text" placeholder="Apartment, suite, unit, building, floor, etc.."
                    required=""
                      
                    />
                    <h5>Size<span>* </span></h5>

                    <input
                      type="text"
                      name="Size"
                      required=""
                      
                    />
                    <h5>Price<span>* </span></h5>

                    <input
                    type="text"
                    name="Price"
                    required=""
                    
                  />
                  <input required ="" name="submitProperty"type="submit" value="Add Property" />

              </form>
          </div>
        </div>
       </div>
       </div>
  </div>
<div id = "container3"> 
<div id="myModal" class="modal">
        <!-- Modal content -->
          <div class="modal-content">
            
            <div class="content">
          <div class="main">
          <span class="close">&times;</span>
            <h2>Register your acccount</h2>
            <form method="post">
              <h5>Username <span>* <?php echo $nameErr; ?></span></h5>
              
              <input
                type="text"
                name="username"
                required=""
                
              />
              <h5>Email <span>* <?php echo $emailErr; ?></span></h5>
              <input
                type="text"
                name="email"
                required=""
              />
              <h5>Mobile Number <span>*</span></h5>
              <input
                type="text"
                name="mobileno"
                required=""
              />
              <h5>Date of Birth <span>*</span></h5>
              <p></p>
              <input
               type="date"
               name="bday"
               />
               <p></p>
              <h5>Password <span>* <?php echo $passwordErr; ?></span></h5>
              <input
                type="password"
                name="password"
                required=""
              />
              <h5>Confirm password <span>* <?php echo $passwordErr; ?></span></h5>
              <input
                type="password"
                name="confirmPassword"
                required=""
              />
              <input name="submit"type="submit" value="Create Account" />
            </form>
          </div>
        </div>
       </div>
    </div>
    <div id="myModallogin" class="modallogin">
        <!-- Modal content -->
          <div class="modal-contentlogin"> 
          <div class="contentlogin">
          <div class="mainlogin">
          <span class="closelogin">&times;</span>
            <h2>Login with your acccount</h2>
            <form method="post">
              <h5>Username <span>* <?php echo $nameErr; ?></span></h5>
              <input
                type="text"
                name="username"
                required=""
              />
              <h5>Password <span>* <?php echo $passwordErr; ?></span></h5>
              <input
                type="password"
                name="password"
                required=""
              />
              <input name="submit"type="submit" value="Login" />
            </form>
          </div>
        </div>
       </div>
    </div>           
</div>
</body>
<style>
   body{
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background-color: white;
}
.NavigationBar
{
background-color: #101010;
border: #707070 1px;
display: flex;
font-size: 18px;
font-family: Arial;
text-align:left; 
padding: 10px;
padding-right: 0px;
padding-left: 0px;
list-style-type: none;
width: 100%;
margin-block-end: 0px;

}
a
{
color: white;
text-decoration: none;
}

/* p
{
display: inline;
color: white;

} */

#login
{
color: #6B9FE2;
font-weight: bold;

}
#signup
{
color: #6B9FE2;
font-weight: bold;    
}
.container2
{
    border-width: 1px;
    width: 100%;
    height: 80px;
    background-color: rgb(255, 255, 255);
    display: flex;
    padding-top: 30px;
    
   
}
.search-input{
    width:25vw;
    height:35px;

    }
.search-button{
    width:50px;
    height:40px;
    background-image:url(../assets/pic4.jpg);
}


.form{
    margin:auto;
    position: absolute;
    text-align: center;
    top: 85px;
    left:3%;
}
.add-property {
  display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-property {
  margin: auto;
    width: 50%;
}
.closeProperty {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.closeProperty:hover,
.closeProperty:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Amaranth", sans-serif;
    margin: 0;
  }

  ul {
    margin: 0;
    padding: 0;
  }
  label {
    margin: 0;
  }
  
  .propertyFill {
    padding: 60px 0;
  }

  .propertyAdd {
    width: 50%;
    margin: 0 auto 0 auto;
    background: #fff;
    padding: 30px 64px;
  }

  .propertyAdd h2 {
    color: #4caf50;
    font-size: 26px;
    text-align: center;
    margin-bottom: 30px;
    font-weight: 500;
  }

  .propertyAdd form input[type="text"],
  .propertyAdd form input[type="password"] {
    width: 94%;
    padding: 10px;
    font-size: 14px;
    border: none;
    border-bottom: 2px solid #e6e6e6;
    outline: none;
    color: #d8d5d5;
    margin-bottom: 20px;
  }
  .propertyAdd h5 {
    font-family: "Lato", sans-serif !important;
    color: #4caf50;
    margin-bottom: 8px;
    font-size: 15px;
  }
  .propertyAdd form input[type="text"]:hover,
  .propertyAdd form input[type="password"]:hover {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }
  .propertyAdd form input[type="text"]:focus,
  .propertyAdd form input[type="password"]:focus {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }

  .propertyAdd form input[type="submit"] {
    background: #4caf50;
    color: #ffffff;
    text-align: center;
    padding: 14px 0;
    border: none;
    border-bottom: 5px solid rgb(61, 151, 64);
    font-size: 17px;
    outline: none;
    width: 100%;
    cursor: pointer;
    margin-bottom: 0px;
  }
  .propertyAdd form input[type="submit"]:hover {
    background: rgb(206, 206, 206);
    color: #000;
    border-bottom: 5px solid rgb(168, 168, 168);
    transition: 0.5s all;
  }
#container3
{
   
    display: flex;
   justify-content: space-around;
   flex-wrap: wrap;
}
.pic
{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    width: 300px;
    height: 500px;
    border: 1px gray;
   
    padding-top: 15px;
}
#home
{
    width: 100%;
    height: 40%;
}
.square {
    border-style: solid ;
    border-color: grey;
    border-width: 1px;
    display: inline-block;
    height: 150px;
    width: 300px;
    background-color: whitesmoke ;
  }

.nav-element{
    color :white;
}
.first-element-nav{
    padding-left:8vw;
}     
.login-signup{
    position: absolute;
    right:6vw;
  
    display: flex;
}
.line-between{
border-right:1px solid white;
margin-left:10px;
margin-right:10px;
}
a:hover
{
    color: purple;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {
   
    margin: auto;
    width: 50%;
}
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Amaranth", sans-serif;
    margin: 0;
  }

  ul {
    margin: 0;
    padding: 0;
  }
  label {
    margin: 0;
  }
  /*-- main --*/
  .content {
    padding: 60px 0;
  }

  .main {
    width: 50%;
    margin: 0 auto 0 auto;
    background: #fff;
    padding: 30px 64px;
   
  }

  .main h2 {
    color: #4caf50;
    font-size: 26px;
    text-align: center;
    margin-bottom: 30px;
    font-weight: 500;
  }

  .main form input[type="text"],
  .main form input[type="password"] {
    width: 94%;
    padding: 10px;
    font-size: 14px;
    border: none;
    border-bottom: 2px solid #e6e6e6;
    outline: none;
    color: #d8d5d5;
    margin-bottom: 20px;
  }
  .main h5 {
    font-family: "Lato", sans-serif !important;
    color: #4caf50;
    margin-bottom: 8px;
    font-size: 15px;
  }
  .main form input[type="text"]:hover,
  .main form input[type="password"]:hover {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }
  .main form input[type="text"]:focus,
  .main form input[type="password"]:focus {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }

  .main form input[type="submit"] {
    background: #4caf50;
    color: #ffffff;
    text-align: center;
    padding: 14px 0;
    border: none;
    border-bottom: 5px solid rgb(61, 151, 64);
    font-size: 17px;
    outline: none;
    width: 100%;
    cursor: pointer;
    margin-bottom: 0px;
  }
  .main form input[type="submit"]:hover {
    background: rgb(206, 206, 206);
    color: #000;
    border-bottom: 5px solid rgb(168, 168, 168);
    transition: 0.5s all;
  }
  .modallogin {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 10px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-contentlogin {
   
    margin: auto;
    width: 50%;
}
.closelogin {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.closelogin:hover,
.closelogin:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
  .contentlogin{
    padding: 60px 0;
  }

  .mainlogin {
    width: 50%;
    margin: 0 auto 0 auto;
    background: #fff;
    padding: 30px 64px;
   
  }

  .mainlogin h2 {
    color: #4caf50;
    font-size: 26px;
    text-align: center;
    margin-bottom: 30px;
    font-weight: 500;
  }

  .mainlogin form input[type="text"],
  .mainlogin form input[type="password"] {
    width: 94%;
    padding: 10px;
    font-size: 14px;
    border: none;
    border-bottom: 2px solid #e6e6e6;
    outline: none;
    color: #d8d5d5;
    margin-bottom: 20px;
  }
  .mainlogin h5 {
    font-family: "Lato", sans-serif !important;
    color: #4caf50;
    margin-bottom: 8px;
    font-size: 15px;
  }
  .mainlogin form input[type="text"]:hover,
  .mainlogin form input[type="password"]:hover {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }
  .mainlogin form input[type="text"]:focus,
  .mainlogin form input[type="password"]:focus {
    border-bottom: 2px solid #b384fb;
    color: #000;
    transition: 0.5s all;
  }

  .mainlogin form input[type="submit"] {
    background: #4caf50;
    color: #ffffff;
    text-align: center;
    padding: 14px 0;
    border: none;
    border-bottom: 5px solid rgb(61, 151, 64);
    font-size: 17px;
    outline: none;
    width: 100%;
    cursor: pointer;
    margin-bottom: 0px;
  }
  .mainlogin form input[type="submit"]:hover {
    background: rgb(206, 206, 206);
    color: #000;
    border-bottom: 5px solid rgb(168, 168, 168);
    transition: 0.5s all;
  }
</style>
<script>
      var houses = <?php echo $payload ?>
      // var houses = [{houseName:"Villa 1", 
      //               price:200000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic2.jpg"
      //               },
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 3", 
      //               price:400000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic1.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               {houseName:"Villa 2", 
      //               price:300000, 
      //               address:"20 Omar Ibn Elkhatab Street, Sheraton Helioplis",
      //               img: "../assets/pic3.jpg"},
      //               ];
                
                function render(houseobj){
                    
                    Object.keys(houseobj).forEach((x)=>{
                                               
                        var containerAll = document.getElementById("container3");
                        var price = document.createTextNode(houseobj[x].price+"$");
                        var priceContainer = document.createElement("p");
                        var img =document.createElement("img");
                        var adContainer = document.createElement("div");
                        var address = document.createTextNode(houseobj[x].address);
                        var addressContainer = document.createElement("p");
                        var button1 =  document.createElement("button");
                        button1.innerHTML = "Show more";
                        button1.onclick = function()
                        {
                          Popup(x, houseobj); 
                        }

                        priceContainer.appendChild(price);
                        addressContainer.appendChild(address);


                        adContainer.appendChild(img);                         
                        adContainer.appendChild(priceContainer);
                        adContainer.appendChild(addressContainer);
                        adContainer.appendChild(button1);
                        containerAll.appendChild(adContainer);

                        button1.style.marginLeft = "210px";
                        button1.style.backgroundColor =  "#4CAF50";
                        button1.style.border = "0";
                        button1.style.borderRadius = "2px";
                        button1.style.color = "white";
                        button1.style.transitionDuration = "0.4s";
                        button1.style.padding = "5px 5px";


                        
                        img.style.borderTopLeftRadius = "5%";
                        img.style.borderTopRightRadius = "5%";
                        img.src=houseobj[x].img;
                        img.style.width= "300px";
                        img.style.height= "200px";
                        priceContainer.style.fontWeight= "bold";
                        priceContainer.style.paddingLeft= "10px";
                        addressContainer.style.paddingLeft="10px";
                        adContainer.style.margin="20px";
                        adContainer.style.marginBottom="70px";
                        adContainer.style.width="300px";
                        adContainer.style.height="300px";
                        adContainer.style.backgroundColor="white";
                        adContainer.style.border="1px solid lightgrey";
                        adContainer.style.borderRadius="5%";

                    });
                }
                function Popup(x, houseobj)
                  {
                    var myDialog = document.createElement("dialog");
                    var button = document.createElement("button");
                    button.innerHTML = "Close";
                    var price = document.createTextNode(houseobj[x].price+"$");
                    var priceContainer = document.createElement("p");
                    var img =document.createElement("img");
                    var adContainer = document.createElement("div");
                    var address = document.createTextNode(houseobj[x].address);
                    var addressContainer = document.createElement("p");
                    var pricetext = document.createTextNode("Price: ");
                    var addresstext = document.createTextNode("Address: ");
                    button.onclick = function()
                    {
                        myDialog.style.display = "none";
                    }
                    window.onclick = function(event)
                    {
                        if (event.target == myDialog)
                        {
                            myDialog.style.display = "none";
                        }
                    }

                    img.src = houseobj[x].img;
                    img.style.marginLeft = "7vw";
                    myDialog.style.borderWidth = "1px";
                    myDialog.style.borderColor = "green";
                    myDialog.style.height = "27vw";
                    myDialog.style.width = "36vw";
                    button.style.marginLeft = "32vw";
                    button.style.marginBottom = "1vw";
                    


                    document.body.appendChild(myDialog);
                    priceContainer.appendChild(pricetext);
                    priceContainer.appendChild(price);
                    addressContainer.appendChild(addresstext); 
                    addressContainer.appendChild(address);   
                    adContainer.appendChild(img);                         
                    adContainer.appendChild(priceContainer);
                    adContainer.appendChild(addressContainer);

                   
                    myDialog.appendChild(button);
                    myDialog.appendChild(adContainer);
                    myDialog.showModal();
                  }
                render(houses);
                var modal = document.getElementById('myModal');
                var btn = document.getElementById("Signup");
                var span = document.getElementsByClassName("close")[0];
                btn.onclick = function() {
                    modal.style.display = "block";
                }
                span.onclick = function() {
                    modal.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                var modallog = document.getElementById('myModallogin');
                var btnlog = document.getElementById("login");
                var spanlog = document.getElementsByClassName("closelogin")[0];
                btnlog.onclick = function() {
                    modallog.style.display = "block";
                }
                spanlog.onclick = function() {
                    modallog.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modallog) {
                        modallog.style.display = "none";
                    }
                }
                var AddProperty = document.getElementById('addProperty');
                    var btn1 = document.getElementById("add-property");
                    var span1 = document.getElementsByClassName("closeProperty")[0];
                    btn1.onclick = function() {
                        AddProperty.style.display = "block";
                    }
                    span1.onclick = function() {
                        AddProperty.style.display = "none";
                    }
                    window.onclick = function(event) {
                        if (event.target == AddProperty) {
                            AddProperty.style.display = "none";
                        }
                    }
</script>
</html>