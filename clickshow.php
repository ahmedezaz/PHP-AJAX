
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php AJAX</title>
</head>
<body>

<h1 style="text-align:center; background:green;color:#FFFFFF;">PHP AJAX</h1>

<button id="btn">CLICK HERE</button>


<div id="show">
 

 
</div>

<script src="jquery-3.6.0.min.js"></script>

<script>

    $(document).ready(function(){
        $("#btn").on("click", function(e){
            $.ajax({
            url: "show.php",
            type: "POST",
            success: function(result){

                $("#show").html(result);
                
            }
        })
        })
    })


</script>
    
</body>
</html>
