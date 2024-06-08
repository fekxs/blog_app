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
    input_value=object_pre.querySelector('#search-engine').value
    
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Post-search.php?key='+input_value, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.getElementById('Searched-posts').innerHTML=xhr.responseText
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}

function report_data(key_report){
    object=key_report-1;
    objects=document.querySelectorAll('#resp-select');
    for(i=0;i<objects.length;i++){
        if(objects[i].classList.contains('active')){
            objects[i].classList.remove('active')
        }
        
    }
    objects[object].classList.add('active')

    the_selector=document.getElementById('theselector-box');
    key_type=the_selector.value
    if(key_report==2){
        the_selector.style.display="none";
    }
    else{
        the_selector.style.display="block";
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Reports_show.php?Rkey='+key_report+"&Tkey="+key_type, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.getElementById('report-blogs').innerHTML=xhr.responseText
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}

function status_update(report_id,Mode,Key){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controls.php?Option=0&report_id='+report_id+"&Mode="+Mode, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            report_data(Key)
            
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}

function post_visibility(post_id,Mode){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controls.php?Option=1&post_id='+post_id+"&Mode="+Mode, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText)
            post_search(document.getElementById('Thesearch'))
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}
function user_visibility(user_id,Mode){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controls.php?Option=2&user_id='+user_id+"&Mode="+Mode, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            window.location.reload();
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Network Error');
    };
    xhr.send();
}