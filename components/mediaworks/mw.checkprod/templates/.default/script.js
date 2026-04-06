/* 
 Comment Text 
*/

BX.ready(function(){
    let buttonHide = document.querySelectorAll('.checklist-steps__hide')
    console.log('hide', buttonHide)
    buttonHide.forEach((num, index)=>{
        console.log('-', index);
        buttonHide[index].addEventListener('click', function() {
            let idBlock = this.getAttribute('data-hideblock')
            let childrenBloc = document.querySelector('.parent'+idBlock)
            let displayProp =  childrenBloc.style.display
            console.log('css', displayProp)
            if( displayProp == 'none'){
                childrenBloc.style.display = 'inline-grid'
                this.innerHTML  = '&#9660;'
            }else{
                childrenBloc.style.display = 'none'
                this.innerHTML  = '&#9650;'
            }

        })
    })


    // buttonHide[0].addEventListener('click', function() {
    //     let idBlock = this.getAttribute('data-hideblock')
    //     let childrenBloc = document.querySelector('.parent'+idBlock)
    //     childrenBloc.style.display = 'none'
    // })
})