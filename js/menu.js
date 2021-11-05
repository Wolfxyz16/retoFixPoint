window.onload= function () {

document.getElementById('label').addEventListener("click", function () {
    var item =document.getElementsByClassName('item');
    if(item[0].style.opacity==0){
        for(var i=0;i<item.length;i++){
            item[i].style.opacity=1;
        } 
    }else if(item[0].style.opacity==1){
        for(var i=0;i<item.length;i++){
            item[i].style.opacity=0;
        }
    }
});
};