describe('Template Of Iframe', function() {

	it('should return html string', function() {
        expect((new IframeGemerate()).template()).toEqual(jasmine.any(String));
	});

	it('should to be defined', function() {
        expect((new IframeGemerate()).template).toBeDefined();
	});

});