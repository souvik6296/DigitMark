
var x = 0;
var name = "images/avatars/avatar" + x + ".png";
document.getElementById("imgid").src = "images/avatars/avatar0.png";
function movetoright() {

    if (x < 21) {
        if (x == 20) {
            x++;
            var name = "images/avatars/avatar" + x + ".png";
            document.getElementById("imgid").src = name;
            document.getElementById("leftmove").src = "images/left-active-arrow.png";
            document.getElementById("rightmove").src = "images/inactive-right-arrow.png";
            document.getElementById("avatar").value= name;
        }
        else {
            x++;
            var name = "images/avatars/avatar" + x + ".png";
            document.getElementById("imgid").src = name;
            document.getElementById("leftmove").src = "images/left-active-arrow.png";
            document.getElementById("avatar").value= name;
            
        }
    }
    
}
function movetoleft() {
    if (x > 0) {
        if (x == 1) {
            x--;
            var name = "images/avatars/avatar" + x + ".png";
            document.getElementById("imgid").src = name;
            document.getElementById("leftmove").src = "images/left-inactive-arrow.png";
            document.getElementById("rightmove").src = "images/active-right-arrow.png";
            document.getElementById("avatar").value= name;
        }
        else {

            x--;
            var name = "images/avatars/avatar" + x + ".png";
            document.getElementById("imgid").src = name;
            document.getElementById("rightmove").src = "images/active-right-arrow.png";
            document.getElementById("avatar").value= name;
        }
    }


}
// document.getElementById("rightmove").onclick= movetoright();