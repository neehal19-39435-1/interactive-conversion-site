 function result(pForm)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function()
        {
            document.getElementById("history").innerHTML = this.responseText;
        }
        xhttp.open("GET", pForm.action + "?rate=" + pForm.rate.value,true);
        xhttp.send();
    }