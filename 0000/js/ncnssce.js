var show = false;
function openOrCloseDialog(){
    var form = document.getElementById("part1");
    if(show ==  false){
        form.style.visibility = "hidden";
        show = true;
    }
    else{
        form.style.visibility = "visible";
        show = false;
    }
}

function participationRegistration(){
    location.href="ncnssce_reg.html";
}

function attendee_registration(){
    location.href="ncnssce_attendee_reg.html";
}