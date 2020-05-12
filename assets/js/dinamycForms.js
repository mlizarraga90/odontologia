function notify(title,message,type){
  $.notify({
        title: title,
        message: message
      },{
        type: type,
        animate: {
          enter: 'animated fadeInRight',
          exit: 'animated fadeOutRight'
        }
      });
}
function getCurrentDate(){
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      //today = mm + '/' + dd + '/' + yyyy;
      toda=yyyy+'-'+dd+'-'+mm;
      return(today);
    }
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if ( (key < 48 || key > 57)  && key!=8) {
      e.preventDefault();
  }
}
function isEmptyJSON(obj){
     for(var i in obj) { return false; }
     return true;
}
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}
(function(window,document){
  'use strict';
  var formulario='',
  divContainerForm="",
  classDivContainerForm="",
  classTextArea="",
  divRow="",
  init=function(){
    
    var frm={
      setId:function(idFrm){
        formulario=document.getElementById(idFrm);
        if(formulario.length>0)
          validIntegersInputs();
        return this;
      },/*
      setTitle:function(title){//NO
          title && createTitle(title);
          return this;
      },
      row:function(nodes){//NO
          createNode(nodes);
          return this;
      },*/
      getId:function(){
          return formulario;
      },
      validateFrm:function(exceptions){
        return validateFrm(exceptions);
      },
      clearFrm:function(){
        clearFrm();
      },
      send:function(url,type,onsucess,unsuccess){
        send(url,type,onsucess,unsuccess);
      },
      sendData:function(url,type,data,onsucess){
        sendData(url,type,data,onsucess);
      },
      fillFrm:function(data){
        fillFrm(data);
      },
      fillCdm:function(idSelect,emptyMessage,url,selectedOpc){
        fillCdm(idSelect,emptyMessage,url,selectedOpc);
      }/*,
      seend:function(url,type,data,onsucess,unsuccess){
        seend(url,type,data,onsucess,unsuccess);
      },
      sendData:function(url,type,data,onsucess,unsuccess){
        sendData(url,type,data,onsucess,unsuccess);
      },
      sendWithMultipleFiles:function(url,type,data,onsucess,unsuccess){
        sendWithMultipleFiles(url,type,data,onsucess,unsuccess);
      },
      
      fillCdm:function(idSelect,emptyMessage,url,selectedOpc){
        fillCdm(idSelect,emptyMessage,url,selectedOpc);
      },
      compare:function(textBox,textBox2){
      return compare(textBox,textBox2);
      },
      isEmptyJSON:function(obj){
        return isEmptyJSON(obj);
      }*/
    }
    return frm;
  };
  function validIntegersInputs(){
    var totalElements=formulario.length;
    for(var i=0;i<totalElements;i++){
      if(formulario[i].getAttribute('validate')=="integer" ) {
        formulario[i].addEventListener('keypress',function(e){
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
              e.preventDefault();
            }
        });
      }
    }
    
  }
  function validateFrm(exceptions){
    var totalElements=formulario.length,
    exito=true;
    if(exceptions.length>0){
        for(var i=0;i<totalElements;i++){
          console.log(formulario[i].getAttribute('id'),exceptions,exceptions.includes(formulario[i].getAttribute('id')));
            if(!exceptions.includes(formulario[i].getAttribute('id'))){
                exito=findAllFormsElements(formulario[i]);
                if(!exito)
                  break;
            }
        }
    }else{
         for(var i=0;i<totalElements;i++){
            exito=findAllFormsElements(formulario[i]);
            if(!exito)
              break;
        }
    }
    
    return exito;
  }
  function findAllFormsElements(formulario){
    var exito=true,
    emailRegex="";
    formulario.setAttribute('class', 'form-control');
      if( (formulario.type=="text" || formulario.type=="password" || formulario.type=="textarea"  || formulario.type=="file") && (formulario.value=="") ) {
        if(formulario.getAttribute('class')!="select-dropdown"){
          formulario.setAttribute('class', 'form-control is-invalid');
          exito=false;
        }
      }else if(formulario.type=="email"){
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
          if (emailRegex.test(formulario.value)==false){
          formulario.setAttribute('class', 'form-control is-invalid');
          exito=false;
        }
      }else if( (formulario.type=="select" || formulario.type=="select-one") && formulario.value==-1  ){
        exito=false;
        formulario.setAttribute('class', 'form-control is-invalid');
      }
      return exito
  }

  function clearFrm(){
    var totalElements=formulario.length;
    for(var i=0;i<totalElements;i++){
      if( formulario[i].type=="text" || formulario[i].type=="password" || formulario[i].type=="textarea" || formulario[i].type=="email" || formulario[i].type=="hidden") 
        formulario[i].value="";
      else if( formulario[i].type=="select" || formulario[i].type=="select-one" )
        formulario[i].selectedIndex =0;
    }
  }
  function fillFrm(data){
    var totalElements=formulario.length;
    for(var i=0;i<totalElements;i++){
      if( formulario[i].type=="number" || formulario[i].type=="text" || formulario[i].type=="password" || formulario[i].type=="textarea" || formulario[i].type=="email" || formulario[i].type=="hidden" ) {
          formulario[i].value=data[formulario[i].name];
      }else if(formulario[i].type=="select" || formulario[i].type=="select-one"){
          formulario[i].value=data[formulario[i].name];

      }
    }
  }
  function send(url,type,onsucess){
    $(".blockScreen").show();
    var xhttp = new XMLHttpRequest(),
    formData=new FormData(formulario);
    
    /*for (var pair of formData.entries()) {
      formData.set(pair[0], CryptoJSAesEncrypt('mLHYWH)(=%KSUX199293.',pair[1]));
        
    }*/
    xhttp.onreadystatechange=function(response) {
        if (this.readyState == 4 && this.status == 200){
        $(".blockScreen").hide();
            onsucess(response.currentTarget.response);
        }
    };
    xhttp.open(type, url);
    xhttp.send(formData);
  }
  
  /*
  data:{}(objeto llave valor)*/
  function sendData(url,type,data,onsucess){
    $(".blockScreen").show();
    var xhttp = new XMLHttpRequest(),
    info=JSON.stringify(data);
    xhttp.onreadystatechange=function(response) {
        if (this.readyState == 4 && this.status == 200){
        $(".blockScreen").hide();
            onsucess(response.currentTarget.response);
        }
    };
    xhttp.open(type, url);
    xhttp.send(info);
  }
  function fillCdm(selectt,emptyMessage,url,selectOpc){
    var xhttp = new XMLHttpRequest(),
    response="",totalRows=0,option="",
    select=document.getElementById(selectt);
    removeOptions(select);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          response=JSON.parse(this.responseText);
          if(isEmptyJSON(response)==false){/*Si tiene información*/
            totalRows=response.length;
            option = document.createElement("option");
            option.text ="Seleccione una opción";
            setAttributes([{name:'value',value:"-1"}],option);
            select.appendChild(option);
            for(var i=0,total=totalRows;i<total;i++){
              option = document.createElement("option");
              option.text = response[i].text;
              setAttributes([{name:'value',value:response[i].value}],option);
              select.appendChild(option);
            }   
          }else{

          }
          if(selectOpc!=undefined){
            
            document.getElementById(selectt).value = selectOpc;
          }
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
  }
  function removeOptions(selectbox){
      var i;
      for(i = selectbox.options.length - 1 ; i >= 0 ; i--){
          selectbox.remove(i);
      }
  }


  function isEmptyJSON(obj){
     for(var i in obj) { return false; }
     return true;
  }
  function setAttributes(attributes,node){
      for(var i=0,length=attributes.length;i<length;i++)
        node.setAttribute(attributes[i].name,attributes[i].value)    
  }

  if(typeof window.frm==='undefined')
    window.frm=window.$_frm=init();
  else
      console.log("El objeto ya esta definido");
})(window,document);
