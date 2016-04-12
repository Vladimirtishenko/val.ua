function returnSource(){
	var files = [
        './public/js/helper.js', 
        './public/js/model.js', 
        './public/js/controller.js', 
        './public/js/_block/_slider.js', 
        './public/js/_block/_iframe_load.js', 
        './public/js/_block/_stycky_accordeon.js', 
        './public/js/_block/_modal.js', 
        './public/js/_block/_market.js', 
        './public/js/_block/_menu_button.js', 
        './public/js/_block/_currency.js', 
        './public/js/_block/_weather.js',
        './public/js/_block/_mansory_generator.js',
        './public/js/_block/_ajax_loader_index_page_category.js',
        './public/js/_block/_ajax_loader_single_category.js',
        './public/js/_block/_ajax_loader_multimedia.js'
    ];
	return files;
}

module.exports.returnSource = returnSource;