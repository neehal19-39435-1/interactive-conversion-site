function isValid(){
           
            var crate=document.forms["conversion"]["crate"].value;
            var val=document.forms["conversion"]["val"].value;
            var result=document.forms["conversion"]["result"].value;
            var valid = true;
            if(crate==="")
            {

                document.getElementById('crateErr').innerHTML=" Do not keep empty";
                valid = false;
            }

            if(val==="")
            {
                document.getElementById('valErr').innerHTML=" Do not keep empty";
                valid = false;
            }

            if(result==="")
            {
                document.getElementById('resultErr').innerHTML=" Do not keep empty";
                valid = false;
            } 
             return valid;
        }