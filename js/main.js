/*
var i = '';
var num = 12;
var double = 12.2;

var obj ={
    i: 4,
    str:'string', 
};


var arr1 = new Array();
arr1.p
var arr2 = ['test', 'test2'];

arr2[0];

obj.str;

for (var i ; i < 5 ; i++){
    
}
while(true){
    break;
}

if (true){
    
}else if (false){
    
}else {
    
}


switch(4){
    case 3: '';
}

/*
var obj2=function(){
    function
}

function func(){
    function func2(){
    
}
}

*/

/*

alert('Hello javascript!');
if (confirm('Ей Бастун')){
alert ('OK');
    
}else {
alert ('Cancel');
}



var loginFormTag = document.getElementById('loginForm');
//console
//alert (loginFormTag.innerHTML);

var div = document.createElement('div');
div.text='Test';
div.setAttribute('style','border: 1px solid red');
loginFormTag.appendChild(div);


if (confirm('Question')){
    loginFormTag;
}
*/

function test(element){
    //alert();
var form = document.getElementById('loginForm');
form.setAttribute('style', 'color: red');
}



jQuery(document).ready(function(){
    
    //jQuery = $()
    // ( # )- e ID
    // ( . )-  css class
    
    $('#sample').click(function(){
    $.get('/index.php?page=tasks&action=list', function(response)   {
        console.log(response);
      // $.ajax({
      //     url: '/index.php?page=tasks&action=list',
      //     method: 'GET',
      // }).done(function(response){
      //     console.log(response);
        
        //$('li').each(function(index, element){
        //console.log(element + ": " + element);
        //console.log($(this).html());
        //console.log($(this).text());
        //test git
        
        }).fail(function(response){
            console.log('fail');
         console.log(response);
      
   //   var changedText =  $('#changedText');
   //   changedText.show();
   //   $(this).html(changedText);
  });
      
        $(this).addClass('txt');
    //    $(this).html('<span>Changed text</span>');
        console.log('Test');
    });
    
 //function customFunction(func){
   //  alert();
     //var dfsbvsd;
 //    }  
  });


$('tasksForm').submit(function(e){
    e.preventDefault();
  var url = $(this).attr('action');  
  var data = $(this).serialize();
    $.post(url, data).done(function(){
    alert('OK');
        
    }).fail(function(){
       alert('fail');
       
});
});
