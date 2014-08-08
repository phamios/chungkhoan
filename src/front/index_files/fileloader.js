// Copyright (c) 2010-2010 Ly Ngoc Tung. (mobile: 0918596004 - email:lyngoctung114@yahoo.com)

var FileLoader = {
	load:function(path, files) {
		var l = files.length;
		
		for (var i = 0; i < l; i++)
			document.write('<script type="text/javascript" src="' + path + '/' + files[i] + '.js"></script>');
	}
};