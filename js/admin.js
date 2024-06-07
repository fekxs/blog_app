(function ($) {
    "use strict";
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    
})(jQuery);
function spinner(){
    $('#spinner').addClass('show');
}
function report_more(object){
    object_pre=object.parentNode.parentNode
    details=object_pre.querySelector('.Responded-More-details')
    old_object=document.querySelectorAll('.Responded-More-details')
    for(i=0;i<old_object.length;i++){
        if(details!=old_object[i]){
            if(old_object[i].classList.contains('active')){
                old_object[i].classList.remove('active')
            }
        }
    }
    if(details.classList.contains('active')){
        details.classList.remove('active')
    }else{
        details.classList.add('active')
    }
    
}
function option_select(value){
    objects=document.querySelectorAll('#nav-options');
    for(i=0;i<objects.length;i++){
        if(objects[i].classList.contains('active')){
            objects[i].classList.remove('active')
        }
        
    }
    objects[value].classList.add('active')
}
function post_search(object){
    object_pre=object.parentNode
    object_pre.querySelector('#search-engine').style.border="2px solid rgb(175, 175, 175)"
    input_value=object_pre.querySelector('#search-engine').value
    if(input_value==''){
        object_pre.querySelector('#search-engine').style.border="2px solid red";
        return
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Post-search.php?key='+input_value, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.getElementById('the-content').innerHTML=xhr.responseText
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}