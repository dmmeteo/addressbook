(function() {
	/*
	* get elemets input and div with img
	*/
	var inpElem = document.getElementById('upload'),
			divElem = document.getElementById('preview');
	/*
	* start to listene input
	*/
	inpElem.addEventListener("change", function(e) {
			preview(this.files[0]);
	});
	/*
	* if event change 
	* delete old image and
	* set image and put in div
	*/
	function preview(file) {
		if ( file.type.match(/image.*/) ) {
			var reader = new FileReader(), img;
			reader.addEventListener("load", function(event) {
				// old image
				imgOld = document.getElementById('old');
				// new image
				img = document.createElement('img');
				img.src = event.target.result;
				img.setAttribute('style', 'width: 150px; height: 150px;');
				img.setAttribute('id', 'old');
				//not delete - replace
				divElem.replaceChild(img, imgOld);
			});
			reader.readAsDataURL(file);
		}
	}
})();