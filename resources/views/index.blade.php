
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
@include('sweetalert::alert')
{{-- Add user model --}}
<!-- Trigger the modal with a button -->


{{-- Search button --}}
<div class="row">
    <div class="col-md-6">
    <input type="text" name="full_text_search" id="search" class="form-control" placeholder="Search" value="">
    </div>
    <div class="col-md-2">
    @csrf
    <button type="button" name="search" id="searchBtn" class="btn btn-success">Search</button>
</div>
</div>

{{-- Search button close --}}


{{-- Add data --}}

<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  </div>

<div class="alert alert-danger alert-dismissible" id="failed" style="display:none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  </div>


{{-- Add form  start --}}

<button type="button" class="addData btn btn-primary">Add Data</button>
<!-- Modal -->
<div id="AddData" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Data</h4>
      </div>
          <form action="" method="POST" id="form_id">

          <div class="modal-body">
                <div class="form-group">
                  @csrf
                  <label for="formGroupExampleInput">Add Data</label>
                  <input type="text" class="form-control" id="data" name="data" placeholder="Write Something" required>
              </div>
              <br>
              <span style="color: red">@error('data'){{$message}}@enderror</span>
              <br>
              <input type="submit" value="Save to database" id="butsave"  class="btn btn-primary">

    </div>
</form>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>

  </div>
</div>


<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
</div>

{{-- Add form  close --}}

{{-- update form --}}


<!-- Modal -->
<div id="EdituserModel" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Update Data</h4>
      </div>
      <form action="" method="POST">

          <div class="modal-body">
            <meta name="csrf-token" content="{{ csrf_token() }}">
              <div class="form-group">
            <label for="formGroupExampleInput">Update Data</label>

            <input type="hidden" class="form-control" id="edtUserid" name="data" placeholder="Write Something" >
            <input type="text" class="form-control" id="edtData" name="data" placeholder="Write Something" required>
        </div>
        <br>
        <span style="color: red">@error('data'){{$message}}@enderror</span>
        <br>
        <input type="submit" value="Update" id="updateBtn"  class="btn btn-primary">


    </div>
</form>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>

  </div>
</div>


<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
</div>




{{-- update form close --}}




{{-- Data Table  --}}

<table class="table table-dark display" id="example"  style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody class="oldtable"></tbody>
    <tbody id="content" style="display: none;"></tbody>
</table>

</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


<script>

    // Datatable script for showing data
    $(document).ready(function data_table() {
        // fetchData();
        var dataTable =   $('#example').DataTable({
            ajax: 'table',
            processing: true,
            autoWidth: false,
            pageLength: 10,
            serverSide: true,
            recordsFiltered : 10,
            recordsTotal :10,
            columns: [
                    {data: 'id'},
                    {data: 'data'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
});




//Fetch data using json format

// function fetchData(){
//     $.ajax({
//         type : "GET",
//         url : "table",
//         dataType : "Json",
//         success: function(responce){
//             var resultData = responce.data;
//             $('tbody').html("");
//             $.each(resultData, function (key, item) {
//             // console.log(item.id)
//             $('tbody').append('<tr>\
//             <td>'+item.id+'</td>\
//             <td>'+item.data+'</td>\
//             <td><meta name="csrf-token" content="{{ csrf_token() }}"><button class="Edit_data show_confirm btn  btn-danger btn-flat" data-id='+item.id+' >Edit Record</button></td>\
//             <td><meta name="csrf-token" content="{{ csrf_token() }}"><button class="deleteRecord show_confirm btn  btn-danger btn-flat" data-id='+item.id+' >Delete Record</button></td>\
//         </tr>'
//         );
//             });
//         }
//         });
//     }

    // fetchData();



    //search function with ajax

$('#search').on('keyup', function (e) {
    var value = $(this).val();
    console.log(value);
    if(value){
        $('.oldtable').hide();
        $('#content').show();
    }
    else{
        $('.oldtable').show();
        $('#content').hide();
    }
    $.ajax({
        type: "get",
        url: "search",
        data: {'search':value},
        success: function (response) {
            console.log(response);
            $('#content').html(response);
        }
    });
});





// delete Record with ajax

$(document).on('click', '.deleteRecord' ,function (e) {
    e.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var id = $(this).data("id");
    // alert(id);
    var token = $("meta[name='csrf-token']").attr("content");
    var $ele = $(this).parent().parent();

    $.ajax(
    {
        url: "delete/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            _token: '{{csrf_token()}}',
        },
        success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
                $("#success").show();
                $ele.fadeOut().remove();
                //use to show sweet alert
                swal("Done!", "It was succesfully deleted!", "success");
				$('#success').html('Data deleted successfully !');
                $('#example').DataTable().ajax.reload();
            }else{
                swal("Oops!", "Something Went Wrong", "Failed");
                alert("Error occured !");
            }

        }

    });

            }
          });

});






// update data with ajax

$(document).on('click','#updateBtn', function (e) {
    console.log("clicked update");
    e.preventDefault();
    var stu_id = $('#edtUserid').val();
    var data = {
        data : $('#edtData').val(),
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
        type: "put",
        url: "/update_data/"+stu_id,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
            }else{
                $('#EdituserModel').modal('hide')
                $('#success').html('Data updated successfully !');
                $('#example').DataTable().ajax.reload();
            }
            data_table();
        }
    });

});



//edit data with ajax and modal

$(document).on('click', '.Edit_data',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // alert(id);
    $('#EdituserModel').modal('show');
    $.ajax({
        type: "get",
        url: "edit/"+id,
        success: function (response) {
            console.log(response);
            if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
            }else{
                $('#edtData').val(response.data.data);
                $('#edtUserid').val(id);
            }
        }
    });
});




//new add with ajax and modal

$(document).on('click', '.addData',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // alert(id);
    $('#AddData').modal('show');
    $.ajax({
        type: "get",
        url: "edit/"+id,
        success: function (response) {
            console.log(response);
            if(response.status == 404){
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-danger');
                $('#success_message').text(response.message);
            }else{
                $('#edtData').val(response.data.data);
                $('#edtUserid').val(id);
            }
        }
    });
});

//add data
$("#butsave").click(function(e){
    e.preventDefault();
    console.log("Button click");
    $("#butsave").attr("disabled", "disabled");
var data = $('#data').val();
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
if(data!=""){
	$.ajax({
		url: "add_data",
		method: "POST",
		data: {
			data: data
		},
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
                // $('#selector').delay(5000).fadeOut('slow');
                $("#failed").hide();
                $('#form_id').trigger("reset");
                $('#AddData').modal('hide');
                $("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$(".modal-backdrop").fadeOut();
				$('#success').html('Data added successfully !');
                $('#example').DataTable().ajax.reload();
			}
			else if(dataResult.statusCode==201){
                alert("Error occured !");
			}
		}
	});
}
else{
    $('#form_id').trigger("reset");
    $('#AddData').modal('hide');
    $("#butsave").removeAttr("disabled");
	$('#fupForm').find('input:text').val('');
	$("#failed").show();
	$(".modal-backdrop").fadeOut();
	$('#failed').html('Please fill the Details !');
    $('#example').DataTable().ajax.reload();
    alert('Please fill all the field !');
}
// fetchData();
data_table();
});


</script>
