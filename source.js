function returnSource(){
	var files = [
        './public/js/helper.js',
        './public/js/model.js',
        './public/js/controller.js',
        './public/js/_block/*.js'
    ];
	return files;
}

module.exports.returnSource = returnSource;