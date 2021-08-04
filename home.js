function isValid(){
           
            var converter=document.forms["home"]["converter"].value;
            var value=document.forms["home"]["value"].value;
            var valid = true;
            if(converter==="")
            {

                document.getElementById('converterErr').innerHTML=" Do not keep empty";
                valid = false;
            }

            if(value==="")
            {
                document.getElementById('valueErr').innerHTML=" Do not keep empty";
                valid = false;
            }
             return valid;
        }