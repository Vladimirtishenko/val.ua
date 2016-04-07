/*=============================================
=            Section MansoryGenerator      =
=============================================*/

function MansoryGenerator(element) {

   if(!element) {
        return;
   }

    var img = element.querySelectorAll('img'),
        count = img.length,
        j = 1;

    [].forEach.call(img, function(item, i){
        var img = new Image();
            img.src = item.src;

        img.onload = function(){
            StackMansory(this);
        }
    })

    function StackMansory(images){
        delete images;
        if(j < count){
            j++;
        } else {
            new Masonry( element, {
              itemSelector: '.val-block-multimedia',
              columnWidth: 1
            });
            element.style.opacity = "1";
        }
    }
}
/*=====  End of Section MansoryGenerator block  ======*/
