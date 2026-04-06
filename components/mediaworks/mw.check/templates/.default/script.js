/* 
 Comment Text 
*/
BX.ready(function(){

    var buttonUp  = document.getElementById('addCheck');
    var buttonDel = document.getElementById('deleteCheck');
    var buttonCancel = document.getElementById('cancelCheck');
    var commentBox = document.getElementById('comment-box')
    var submitForm = document.getElementById('modal-checklist-question_submit');
    var loader = document.getElementById('loader');

    buttonUp.addEventListener('click', function() {
        let id = this.getAttribute('data-answer');
        let order = this.getAttribute('data-order')
        let stage = this.getAttribute('data-stage')
        let group = this.getAttribute('data-group')
        let question = this.getAttribute('data-question')
        let nextStep = this.getAttribute('data-nextstep')
        let endStep = this.getAttribute('data-end')

        loader.style.display = 'flex';
        BX.ajax({
            url: '/local/ajax/check_prod.php?id='+id+'&action=up&order='+order+'&stage='+stage+'&group='+group+'&question='+question,  //адрес на который передаются данные с формы
            method: 'GET',         //метод передачи данных POST или GET
            dataType: 'json',       //тип передаваемых данных
            data: { test: 'test' },
            processData: false,     //
            preparePost: false,     //предобработка передаваемых данных
            onsuccess: function(data){  //в случаи успеха, выполняем действия
                 console.log(data); //выводим полученные данные в результате успеха.
                // если это последний пункт переносим в общий список
                if(endStep){
                    location.href = '/checklist/check/'+nextStep+'/'
                }else {
                    location.href = '/checklist/'+order+'/'
                }

              },
              onfailure: function(e){  //действия в случаи ошибки
               console.log(e);
                 console.log(e) //выводим в результате ошибки, сообщение об ошибки
              }
         });
    });

   if(buttonDel){
      buttonDel.onclick = (event) => {
         let id = buttonDel.getAttribute('data-answer');
         let order = buttonDel.getAttribute('data-order')
         let stage = buttonDel.getAttribute('data-stage')
         let group = buttonDel.getAttribute('data-group')
         let nextStep = buttonDel.getAttribute('data-nextstep')
         let vpos = buttonDel.getAttribute('data-vertical-pos');
         loader.style.display = 'flex';
         BX.ajax({
               url: '/local/ajax/check_prod.php?id='+id+'&action=delete&order='+order+'&stage='+stage+'&group='+group+'&vpos='+vpos,  //адрес на который передаются данные с формы
               method: 'GET',         //метод передачи данных POST или GET
               dataType: 'json',       //тип передаваемых данных
               processData: false,     //
               preparePost: false,     //предобработка передаваемых данных
               onsuccess: function(data){  //в случаи успеха, выполняем действия
                  console.log(data); //выводим полученные данные в результате успеха.
                  location.href = '/checklist/check/'+nextStep+'/'
               },
               onfailure: function(e,v,c){  //действия в случаи ошибки
                  console.log(e);
                  console.log(v);
                  console.log(c);
                  console.log('error') //выводим в результате ошибки, сообщение об ошибки
               }
            });
      }
   }

   if(buttonCancel){
    buttonCancel.onclick = (event) =>{
      commentBox.style = "display: block";
    }
   }

    submitForm.onclick = (event) => {
      let commentInput = document.getElementById('modal-checklist-question_input-comment')
      let id         = submitForm.getAttribute('data-answer');
      let order      = submitForm.getAttribute('data-order')
      let stage      = submitForm.getAttribute('data-stage')
      let group      = submitForm.getAttribute('data-group')
      let nextStep   = submitForm.getAttribute('data-nextstep')
      loader.style.display = 'flex';
      console.log('Отправка комментария ' + commentInput.value);
      BX.ajax({
         url: '/local/ajax/check_prod.php?id='+id+'&action=delete&order='+order+'&stage='+stage+'&group='+group+'&comment='+commentInput.value,  //адрес на который передаются данные с формы
         method: 'GET',         //метод передачи данных POST или GET
         dataType: 'json',       //тип передаваемых данных
         // data: { comment: commentInput.value },
         processData: false,     //
         preparePost: false,     //предобработка передаваемых данных
         onsuccess: function(data){  //в случаи успеха, выполняем действия
              console.log(data); //выводим полученные данные в результате успеха.
              location.href = '/checklist/check/'+nextStep+'/'
           },
           onfailure: function(){  //действия в случаи ошибки
              console.log('error') //выводим в результате ошибки, сообщение об ошибки
           }
      });
    }
 })

