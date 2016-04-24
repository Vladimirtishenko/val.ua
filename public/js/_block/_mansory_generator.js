/*=============================================
=            Section MansoryGenerator      =
=============================================*/

function MansoryGenerator(element) {

   if(!element) {
        return;
   }

   [].forEach.call(element, this.generateMansory);
 
}


MansoryGenerator.prototype.generateMansory = function(item){

    var img = item.querySelectorAll('img'),
        count = img.length,
        j = 1,
        classie = item.querySelector('.val-block-multimedia-gallery') ? '.val-block-multimedia-gallery' : '.val-block-multimedia';

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
            new Masonry( item, {
              itemSelector: classie,
              columnWidth: 1
            });

            item.style.opacity = "1";
            if(item.querySelector('.val-block-multimedia-gallery')){
                $(function(){$(classie).imageLightbox()})
            }
            
        }
    }




}

/*=====  End of Section MansoryGenerator block  ======*/
