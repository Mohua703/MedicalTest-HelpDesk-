function setheight() {
    document.getElementById('headersec').style.height = window.innerHeight + "px";
    
    
    document.getElementById('section1').style.height=window.innerHeight-80 +"px";
    
    document.getElementById('section2').style.height=window.innerHeight-80 +"px";
    
    document.getElementById('section3').style.height=window.innerHeight +"px";
    
    document.getElementById('section4').style.height=window.innerHeight-80 +"px";
    
};

function checkbackground(){
    var pos=window.scrollY;
    var offsetamount=3*innerHeight-160;
    if(pos>=offsetamount){
       console.log(pos+" "+offsetamount); document.getElementsByTagName('body')[0].style.backgroundImage="url('image5.jpg')";
    }
    else if(pos<offsetamount){
        console.log(pos+" "+offsetamount); document.getElementsByTagName('body')[0].style.backgroundImage="url('image7.jpg')";
    }
}