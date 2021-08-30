<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php AJAX</title>
</head>
<body>

<h1 style="text-align:center; background:green;color:#FFFFFF;">PHP AJAX</h1>


<input type="text" id="fname" placeholder="First Name" value="f">
<input type="text" id="lname" placeholder="Last Name" value="l">
<input type="submit" id="send"  value="SUBMIT">


<div id="show">
 

 
</div>

<script src="jquery-3.6.0.min.js"></script>

<script>
// use this ajax code for fetch data to table
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
                    }else {
                        alert("SOMETHING WRONG");
                    }

                }
            });
        })

    })


</script>
    
</body>
</html>
