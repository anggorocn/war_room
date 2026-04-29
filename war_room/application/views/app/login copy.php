<?
$this->load->library("crfs_protect"); $csrf = new crfs_protect('_crfs_login');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

$sessappinfouser= $this->sessappinfouser;
$sessappinfopass= $this->sessappinfopass;
$sessinfopesan= $this->sessappinfopesan;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>PLN NP FIRST</title>
    <base href="<?=base_url();?>" />
    
    <script type="text/javascript" src="assets/vegas/jquery-1.11.1.min.js"></script>
    <link href="assets/bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="assets/bootstrap-3.3.7/docs/examples/signin/signin.css" rel="stylesheet">
    <script src="assets/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="css/gaya.css" type="text/css">
    <!-- <link rel="stylesheet" href="css/gaya-egateway.css" type="text/css"> -->
          
    <style>
    	body{
    		/*margin-bottom: 0px !important;*/
            /*background: #eef3f5 url(images/bg-body.jpg) top right no-repeat;
            background-size: 100% auto;*/
            border: 1px solid cyan;
            min-height: 100vh;
    	}
        #myModal.modal {
            position: fixed;
        }
        .modal-title {
            color: #333333;
            text-align: left;
        }
        .modal-body {
            color: #333333;
            text-align: left;
        }
        h4.modal-title strong {
            font-family: 'avenir-next-demibold';
            font-size: 18px;
        }
	</style>

    <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">


</head>

<!-- <body class="body-login" onload="startTime()"> -->
<body  class="body-login" onload="display_ct()">
    

    

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <div class="logo-login">
                        <img src="images/logo.png">
                    </div>
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li> -->
                    <li>
                        <div class="area-ganti-mode">
                            <input type="checkbox" class="checkbox" id="checkbox">
                            <label for="checkbox" class="checkbox-label">
                                <i class="fa fa-moon-o" aria-hidden="true"></i>
                                <i class="fa fa-sun-o" aria-hidden="true"></i>
                                <span class="ball"></span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container-fluid" style="border: 1px solid red;">
    	<div class="row">
            <div class="col-md-12">
                <div class="area-login">
                    <form class="form-signin row" action="login/action" method="post">                    
                        <div class="area-gambar col-md-6">
                            <div class="logo-login-app">
                                <img src="images/logo-login.png">
                            </div>
                        </div>
                        <div class="area-form col-md-6">
                            <!-- <h2 class="form-signin-heading">Selamat datang,</h2>
                            <p>Silahkan login ke akun anda. </p> -->

                            <script type="text/javascript" charset="utf-8">
                                // let a;
                                // let time;
                                // setInterval(() => {
                                //   a = new Date();
                                //   time = a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds();
                                //   document.getElementById('time').innerHTML = time;
                                // }, 1000);

                                ////////////

                                // var span = document.getElementById('span');

                                // function time() {
                                //   var d = new Date();
                                //   var s = d.getSeconds();
                                //   var m = d.getMinutes();
                                //   var h = d.getHours();
                                //   span.textContent = 
                                //     ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
                                // }

                                // setInterval(time, 1000);

                              </script>
                              <!-- <span id="time"></span> -->
                              <!-- <span id="span"></span> -->

                              <!-- <script>
                                function startTime() {
                                    var today = new Date();
                                    var h = today.getHours();
                                    var m = today.getMinutes();
                                    var s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('txt').innerHTML =
                                    h + ":" + m + ":" + s;
                                    var t = setTimeout(startTime, 500);
                                }
                                function checkTime(i) {
                                    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                                    return i;
                                }
                                </script>

                                <div id="txt"></div> -->

                                
                                <span id='ct' ></span>

                                <script type="text/javascript">
                                    const monthNames = ["January", "February", "March", "April", "May", "June",
                                      "July", "August", "September", "October", "November", "December"
                                    ];

                                    const d = new Date();
                                    // document.write("The current month is " + monthNames[d.getMonth()]);

                                    function display_c(){
                                        var refresh=1000; // Refresh rate in milli seconds
                                        mytime=setTimeout('display_ct()',refresh)
                                    }
                                    function display_ct() {
                                        var x = new Date()
                                        // var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
                                        var x1= " <div class='area-live-date'><div class='hari'> " + x.getDate() + " " + monthNames[d.getMonth()] + " " + x.getFullYear() + "</div>"; 
                                        x1 = x1 + " <div class='jam'>" +  x.getHours( )+ ":" +  (x.getMinutes()<10?'0':'') + x.getMinutes() + ":" +  x.getSeconds() + "</div>";
                                        document.getElementById('ct').innerHTML = x1;
                                        display_c();
                                    }
                                    // function display_ct() {
                                    //     var x = new Date()
                                    //     var x1=x.toUTCString();// changing the display to UTC string
                                    //     document.getElementById('ct').innerHTML = x1;
                                    //     tt=display_c();
                                    // }
                                </script>
                              
                            
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Username</label>
                                <input type="text" name="reqUser" id="inputEmail" class="form-control" placeholder="Username" required value="<?=$sessappinfouser?>" />    
                                <div class="ikon-input"><img src="images/icon-username.png"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputPassword" class="sr-only">Password</label>
                                <input type="password" name="reqPasswd" id="inputPassword" class="form-control" placeholder="Password" required value="<?=$sessappinfopass?>" />
                                <div class="ikon-input"><img src="images/icon-password.png"></div>
                            </div>

                            <div class="form-group row captcha">
                                <div class="ikon col-md-6">
                                    <img src="login/captcha" id='image_captcha' onclick="refreshing_Captcha();" style="height:30px">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="reqCapcha" autocomplete="off" id="reqCapcha" class="form-control" placeholder="Kode Captcha" maxlength="5" required>
                                </div>
                            </div>
                            
                            <br>
                            <button class="btn btn-lg btn-block" type="submit">Login</button>
                            <?=$csrf->echoInputField();?>

                            <div class="lupa-password">
                                Lupa Password? Klik <a data-toggle="modal" data-target="#myModal">disini</a>.
                            </div>
                            
                            <div class="checkbox">
                                <label style="color:#000; font-size:15px">
                                    <?=$sessinfopesan?>
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- <div class="col-md-5 area-login-kanan">
				<div class="inner">
                    <div class="logo"><img src="images/logo-first.png"></div>
                    <h3>FIRST</h3>
                    <p></p>
                </div>
            </div> -->
        </div>
    </div>

    <div class="copyright">© 2023 PT PLN Nusantara Power. All rights reserved.</div>
    
    <div id="myModal" class="modal fade modal-lupa-password" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Lupa Password</strong></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nid">NID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nid" placeholder="Masukkan NID Anda yang terdaftar pada aplikasi ICARLA">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 tombol" >&nbsp;</label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary" type="button" onclick="lupaPassword()"><span id="spanLogin">Submit</span><div id="spanLoading" class="loader" style="display:none">Loading...</div></button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <div class="alert alert-danger">
                        <strong>Lupa password hanya bagi pengguna eksternal silahkan kontak administrator (helpdesk.ptpjb.com) !</strong>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="assets/easyui/themes/icon.css">
    <script type="text/javascript" src="assets/easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="assets/easyui/globalfunction.js"></script>

    <script language='JavaScript' type='text/javascript'>
        $('#reqCapcha').on('change', function() {
            var val = this.value;
            var capcha = $("#capcha").val();
            if (capcha !== val) {
            }
        });
        $(document).ready(function() {
            $('#reqCapcha').keyup(function() {
                this.value = this.value.toUpperCase();
            });

            refreshing_Captcha();
        });

        function refreshing_Captcha() {
            $.get("login/getcapcha?", function(data) {
                var img = document.images['image_captcha'];
                img.src = "capcha/capcha.php?reqId="+data;
                $("#capcha").val(data);
            });
        }

        function buttonHandle()
        {                         
        }

        function lupaPassword()
        {
            var nid = $("#nid").val();

            if(nid.trim() == "")
            {
                $.messager.alert('Info', 'Masukkan NID anda terlebih dahulu.', 'warning');   
                return;
            }

            var win = $.messager.progress({
                title:'ICARLA | PT Pembangkitan Jawa-Bali',
                msg:'proses...'
            });             
            
            $.post( "login/lupa_password", { reqId: nid })
            .done(function( data ) {
                $.messager.progress('close');
                $("#nid").val("");
                data = JSON.parse(data);
                if(data.status == 'success')
                    $.messager.alertLink('Info', data.message, 'info', 'login');
                else
                    $.messager.alert('Info', data.message, 'warning');
            });
        }
    </script>
    <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.js"></script>

    <!-- GANTI MODE -->
    <script type="text/javascript">
        const checkbox = document.getElementById("checkbox")
        checkbox.addEventListener("change", () => {
            // alert("hai");
            document.body.classList.toggle("dark")
        })
    </script>
    

  </body>
</html>