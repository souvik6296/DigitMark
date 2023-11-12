function showOptions(){
    let stat= window.getComputedStyle(document.getElementById("extra-options")).visibility;
    if(stat=="hidden"){
        document.getElementById("extra-options").style.visibility="visible";
    }
    if(stat=="visible"){
        document.getElementById("extra-options").style.visibility="hidden";
    }
}
function playvideo(){
    document.getElementById("about-img").style.visibility="hidden";
    document.getElementById("video-view").style.visibility="visible";
    document.getElementById("play-btn").style.visibility="hidden";
    document.getElementById("video-view").play();
}
function pausevideo(){
    document.getElementById("about-img").style.visibility="visible";
    document.getElementById("video-view").style.visibility="hidden";
    document.getElementById("play-btn").style.visibility="visible";
    document.getElementById("video-view").pause();
}

