/**
 * Created by ORUME on 12/21/2016.
 */
$(document).ready(function () {

   $('#sendMsg').click(function () {
        var varask = $("#ask").val();

       $.ajax({
           method: "post",
           url: "data.php",
           data: {ask:varask}
       })
   });
});