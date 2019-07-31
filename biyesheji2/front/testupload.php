<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FormData</title>
    <script type="text/JavaScript" src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
<form name="form1" id="form1">
    <p>name:<input type="text" name="name" ></p>
    <p>gender:<input type="radio" name="gender" value="1">male <input type="radio" name="gender" value="2">female</p>
    <p>photo:<input type="file" name="photo" id="photo"></p>
    <p><input type="button" name="b1" value="submit" onclick="fsubmit()"></p>
</form>
<div id="result"></div>
</script>
<script type="text/javascript">
    function fsubmit() {
        var form=document.getElementById("form1");
        var formData=new FormData(form);
        var oReq = new XMLHttpRequest();
        oReq.onreadystatechange=function(){
            if(oReq.readyState==4){
                if(oReq.status==200){
                    var json=JSON.parse(oReq.responseText);
                    var result = '';
                    result += 'name=' + json['name'] + '<br>';
                    result += 'gender=' + json['gender'] + '<br>';
                    result += '<img src="../back/userimg/' + json['photo'] + '" width="300">';
                    $('#result').html(result);
                }
            }
        }
        oReq.open("POST", "../back/upload/upload.php");
        oReq.send(formData);
        return false;
    }
</script>
</body>
</html>