//responseText:
//0 = file upload error
//1 = file upload success
//2 = database insert done
	
$(document).ready(function() {
	
	$('#formprofil').ajaxForm({
		beforeSend:function(){
			$("#uploadbar").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamically change the progress bar width
			$(".sr-only").html(percentComplete+'%');//show the percentage number
		},
		success:function(){
			$("#uploadbar").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText == 0){//Upload Gagal
				$("#image").show();
				$("#pesan").html("Upload Gagal"); //display error if response is 0
			}
			else if(response.responseText == 1)//User sudah ada
			{
				$("#pesan").html("User telah digunakan oleh dokter lain, silahkan pilih user lain");
			}
			else if(response.responseText == 2)//Simpan Sukses
			{
				alert("Simpan Sukses");
			}
			else{
				$("#image").show;
				$("#image").attr("src",response.responseText);
				$("#hidpath").val(response.responseText);
				//show the image after success
			}
		}
	});
	
	
	//set the progress bar to be hidden on loading
	$("#uploadbar").hide();
});