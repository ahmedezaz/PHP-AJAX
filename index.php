<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php AJAX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- AJAX is using in jquery witth $.ajax({}) -->
<h1 style="text-align:center; background:green;color:#FFFFFF;">PHP AJAX</h1>

<div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>


<form id="clear">
<input type="text" id="fname" placeholder="First Name" >
<input type="text" id="lname" placeholder="Age">
<input type="submit" id="send"  value="SUBMIT">
</form>


<div id="show">
 

 
</div>

<div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>
<script src="jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        
        function loadData(){
            $.ajax({
            url: "show.php",
            type: "POST",
            success: function(result){

                $("#show").html(result);
                
                }
            })      

        }
   

    loadData();

    $("#send").on("click", function(e){
            e.preventDefault();

            var fname = $("#fname").val();
            var lname = $("#lname").val();

            $.ajax({
                url: "ajax-insert.php",
                type: "POST",
                data: {first_name: fname, last_name: lname},
                success: function(data){

                    if(data == 1) {
                        loadData();
                        $("#clear").trigger("reset");

                    }else {
                        alert("SOMETHING WRONG");
                    }

                }
            });
        })


    $(document).on("click", ".delete-btn", function(){
        if(confirm("Do you want to delte this record ?")){
        var studentId = $(this).data("id");
   

        var element = this;

        $.ajax({
                url: "delete.php",
                type: "POST",
                data: {id: studentId},
                success: function(data){

                    if(data == 1) {
                        $(element).closest("tr").fadeOut();

                    }else {
                        alert("SOMETHING WRONG");
                    }

                }
            });

        }
    })


    //Show Modal Box
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("edid");

      $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

       //Save Update Form
       $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var age = $("#edit-age").val();

        $.ajax({
          url: "ajax-update-form.php",
          type : "POST",
          data : {id: stuId, first_name: fname, last_age: age},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadData();
            }
          }
        })
      });
// keyup is used for for when we write something in keyboard its started its function like live search query
      $("#search").on("keyup",function(){
      
      var filter = $(this).val();

      $.ajax({
        url: "search.php",
        type: "POST",
        data: {search_value: filter},
        success: function(data){
          $("#show").html(data);
        }
      })
    
    });



    })

</script>
    
</body>
</html>
