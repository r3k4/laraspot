<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>
<style type="text/css">
.bar {
    height: 18px;
    background: green;
}	
 
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>

<script type="text/javascript">
$(document).ready(function() {
  $.fn.textlimit = function()
  { 
    return this.each(function()                       
    {

    var $elem = $(this);            // Adding this allows u to apply this anywhere
    var $limit = 22;                // The number of characters to show
    var $str = $elem.html();        // Getting the text
    var $strtemp = $str.substr(0,$limit);   // Get the visible part of the string
    $str = $strtemp + '<span class="hide">' + $str.substr($limit,$str.length) + '</span> ...';  
    $elem.html($str);
    })
  };

});  	
</script>


<h3>
	<i class="fa fa-user"></i> Import User Hotspot
</h3>
<hr>
<div class="row">
	<div class="col-md-12">
	<div id="pesan"></div>

 
		<div class="form-group">
			{!! Form::label('mst_profile', 'Profile : ') !!}
      		{!! Form::select('mst_profile', $mst_profile, '', ['id' => 'mst_profile', 'class' => 'form-control']) !!}
		</div>


		<div class="form-group">
		  <div class="alert alert-warning"> 
      <i class="fa fa-link"></i> Lampiran |  ukuran maksimal : {{ fungsi()->size($max_upload) }} 
      </div>
			
      <input id="fileupload" 
				   type="file" 
				   name="file_import" 
				   data-url="{!! route('backend.hotspot_users.do_import') !!}" 
				   data-form-data='{"_token": "{!! csrf_token() !!}" }'
				   class='btn btn-primary upload'
				  >
			<span style='width:100px;overflow:hidden;' id='selected_file'></span>
		</div>

		<div class="form-group">
			<button class="btn btn-info" id="tombol_upload">
				<i class="fa fa-cloud-upload"></i> Upload
			</button>			
      <a class="btn btn-warning" href="/template_import/users.xls">
        <i class="fa fa-file-excel-o"></i> template
      </a>
		</div>

		<div class="form-group">
			<hr>
			<div id="progress">
			    <div class="progress-bar progress-bar-success" style="width: 0%;"><br></div>
			</div>			
		</div>
	


	</div>
</div>

<script>



$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(xls|xlsx)$/i,
        maxFileSize: {{ $max_upload }},          
        add: function (e, data) {
            console.log(data.originalFiles[0]['type']);

            $.each(data.files, function (index, file) {
                $('#selected_file').html(file.name);
                $('#selected_file').textlimit();
                console.log('Added file: ' + file.name);
            });    
            $("#tombol_upload").off('click').on('click',function () { 
                  var uploadErrors = [];
                  var acceptFileTypes =  /(\.|\/)(jpg|jpeg|png)$/i;
                  // if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                  //     uploadErrors.push('file yang ada pilih bukan file excel');                           
                  // }
                  if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > {{ $max_upload }} ) {
                      uploadErrors.push('ukuran file terlalu besar');
                  }
                  if(uploadErrors.length > 0) {
                       swal('error', uploadErrors.join("\n"), 'error');
                  } else {
                      data.submit();
                  }
            });
 
        },
	    progressall: function (e, data) {
	    	$('#tombol_upload').attr('disabled', 'disabled');
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .progress-bar').css(
	            'width',
	            progress + '%'
	        ).html(progress + '%');
	    },        
        done: function (e, data) {

        	$('#file_import').val('');
        	$('#selected_file').html('');


        	$('#tombol_upload').removeAttr('disabled');
	        $('#progress .progress-bar').css('width','0%');
        	console.log(data._response);
        	swal({
        		title : 'saved',
        		text : 'data telah diproses',
        		type : 'success'
        	}, function(){
            window.location.reload();
          });
            // data.context.text('Upload finished.');
        },
    fail: function (e, data) {
    	$('#tombol_upload').removeAttr('disabled');
    	$('#progress .progress-bar').css('width','0%');
	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	    datajson = JSON.parse(data.jqXHR.responseText);
	    $.each(datajson, function( index, value ) {
   			$('#pesan').append(index + ": " + value+"<br>")
      });
    },
    stop: function (e) {
        console.log('Uploads finished');
	    },        
    });
}).bind('fileuploadsubmit', function (e, data) {
    data.formData = {
	    	mst_profile : $('#mst_profile').val(),
			  _token : "{!! csrf_token() !!}",
    	};
});
 

$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger animated shake');
	});
})


</script>


 