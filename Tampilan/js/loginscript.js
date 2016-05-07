//loginscript.js

$(document).ready(function() {
	$('#loginform').ajaxForm({
		complete:function(response){
			if(response.responseText == 6)//Username atau password salah
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Email atau Password Anda Salah!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 7)//Username atau password salah
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Email atau Password Anda Salah!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 8)//sukses 
			{ 
				window.location='mahasiswa.php';
			}
			else if(response.responseText == 9)//sukses
			{ 
				window.location='dosen.php';
			}
			else if(response.responseText == 99)//pertama
			{ 
				window.location='pertama.php';
			}
		}
	});
	$('#registerform').ajaxForm({
		complete:function(response){
			if(response.responseText == 2)//Captcha salah
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Kode captcha tidak valid</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 1)//Akun sudah ada
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Account Anda Sudah Terdaftar!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 3)//sukses
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Periksa E-mail Anda untuk Menyelesaikan Registrasi!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 8000);
			}
		}
	});
	
	$('#lupaform').ajaxForm({
		complete:function(response){
			if(response.responseText == 1)//email atau password salah
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Email / Tanggal Lahir Anda Salah!</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 2)//Captcha salah
			{
				jQuery("#submit input[type='checkbox'], input[type='password'], input[type='email'], input[type='text']").each(function() {
					this.value = '';
				});
				$("#pesan").hide();
				$("#pesan div").remove();
				$("#pesan").show();
				$("#pesan").append("<div class=\"alert alert-danger alert-dismissable fade in\"><button id=\"msgClose\" type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><p>Kode captcha tidak valid</p></div>");
				setTimeout(function(){ $("#msgClose").click(); }, 2000);
			}
			else if(response.responseText == 3)//sukses
			{
				alert('Password Berhasil Direset!'); 
				window.location='../index.php';
			}
		}
	});
	$("#pesan").hide();
});