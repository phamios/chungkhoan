// Copyright (c) 2010-2010 Ly Ngoc Tung. (mobile: 0918596004 - email:lyngoctung114@yahoo.com)

var Utility = {
    ajaxLoad: function(url, params) {
        var _params = (this.isSet(params) && params != null)? params : {};
		
		this.ajaxSetParams(_params);

        _params.url = this.ajaxFixUrl(url, _params);
		
		if (!_params.fileDownload)
	        AjaxRequest.get(_params);
		else {
			var iframe = document.createElement('iframe');
			iframe.id = '_ifFileDownload';
			iframe.style.display = 'none';
			document.body.appendChild(iframe);
			this.getIframeDocument(iframe).write('<html><body></body></html');
			iframe.src = _params.url;
		}
    },
    ajaxSubmit: function(frm, params) {
		var _frm 	= (typeof(frm) == 'string')? $(frm) : frm,   
			_params = (this.isSet(params) && params != null)? params : {};

		this.ajaxSetParams(_params);

		if (_params.action)
			_frm.attributes.getNamedItem('action').value = this.ajaxFixUrl(_params.action, _params);

        AjaxRequest.submit(_frm, _params);
			
        return false;
    },
    ajaxCallback: function(request) {//alert(request.responseText);
		var clientContext = request.parameters,
			nodes = {code:0, msg:'', js:'', alertMsg:clientContext.alertMsg, view:null, blocks:null, blockId:null};			

        if (this.ajaxGetResponseType(request) == 'text') {
			nodes.view = request.responseText;
			if (this.isSet(clientContext.blockId))
    	        nodes.blockId = clientContext.blockId;			
		}
		else {
			var xmlDoc = request.responseXML;
                root = xmlDoc.getElementsByTagName('response')[0];
			
			if (root) {
				var node;
				
				for (var i in nodes) {
					node = root.getElementsByTagName(i)[0];
					if (node && node.childNodes[0]) {
						if (i != 'blocks')
							nodes[i] = node.childNodes[0].nodeValue;
						else {
							if (nodes.blocks == null)
								nodes.blocks = [];
							for (var j = 0; j < node.childNodes.length; j++)
								nodes.blocks.push({id:node.childNodes[j].getAttribute('id'), data:node.childNodes[j].childNodes[0].nodeValue});
						}
					}
				}
				
				if (isNaN(nodes.code))
					nodes.code = 0;
				
				var scripts = '';
				
				if (nodes.view != null) {
					scripts = this.extractScripts(nodes.view);
					if (scripts != '') {
						nodes.js += scripts;
						
						if (clientContext.stripScript === true)
							nodes.view = this.stripScripts(nodes.view);
					}
					if (nodes.blockId == null && this.isSet(clientContext.blockId))
						nodes.blockId = clientContext.blockId;
				}
				if (nodes.blocks != null) {
					for (var i = 0; i < nodes.blocks.length; i++) {
						scripts = this.extractScripts(nodes.blocks[i].data);
						if (scripts != '') {
							nodes.js += scripts;
						
							if (clientContext.stripScript === true)
								nodes.blocks[i].data = this.stripScripts(nodes.blocks[i].data);
						}
					}
				}
			}
		}
		
		if (clientContext.closeDialog || (nodes.code == 0 && clientContext.closeDialogOnSuccess) || (nodes.code != 0 && clientContext.closeDialogOnError)) {
			var closeHtml = '<div align="center" class="paddingT10"><input type="button" value="' + config.msg.close + '" class="buttonStyle" onclick="Utility.closeDialog(true)" /></div>';
			
			nodes.blockId  = clientContext.blockId;
			
			if (!clientContext.closeDialogWithView)
				nodes.view = closeHtml;
			else {
				if (nodes.view == null)
					nodes.view = '';				
				nodes.view += closeHtml;
			}
		}
		
		if (!clientContext.getCallbackString) {
			if (nodes.view != null && $(nodes.blockId)) 
				$(nodes.blockId).innerHTML = nodes.view;
			if (nodes.blocks != null) {
				for (var i = 0; i < nodes.blocks.length; i++) {
					if ($(nodes.blocks[i].id)) {
						$(nodes.blocks[i].id).innerHTML = nodes.blocks[i].data;
						$(nodes.blocks[i].id).style.display = (!this.isEmpty(nodes.blocks[i].data))? '' : 'none';
					}
				}
			}
			if (!this.isEmpty(nodes.js))
				eval(nodes.js);
		}
		
		if (clientContext.scrollTop)
			this.scrollTop();
		
		return nodes;
    },
    ajaxSetParams: function(params) {
        var _paramsDefault = {
					timeout:30000000,
					onSuccess:this.ajaxCallback.bind(this),
					onTimeout:this.ajaxTimeout.bind(this),
					onError:this.ajaxError.bind(this),
					blockId:null,
					basePath:''
				};
				
		for (var i in _paramsDefault) {
			if (!this.isSet(params[i]))
				params[i] = _paramsDefault[i];
		}
    },
	fixBasePath: function(basePath) {
		basePath = basePath.toString().replace(/^\/|\/$/g, '');
		return (basePath == '')? '/' : '/' + basePath + '/';
	},
	ajaxFixUrl: function(url, params) {		
		url = url.toString().replace(/\/{3}/g, '').replace(/^\//g, '');
		if (!this.isEmpty(url)) {
			if (url.indexOf('/') == -1 || url.split('/').length % 2 != 0)
				url += '/';
			url = params.basePath + url + '/';
		}
		else {
			url = window.location.href;
			if (url.match(/(^.*?:\/\/[^\/]*).*/))
				url = RegExp.$1;
				
			url += params.basePath;
		}
		
		url += '__ajaxId/' + new Date().getTime(); // do not change order code
		if (this.isSet(params.ajaxIdSuffix))
			url += params.ajaxIdSuffix;
		
		if (this.isSet(params.serverContext))
			url += '/' + params.serverContext;

		return url;
	},
    ajaxTimeout: function(request) {
        alert('ajax timeout...');
		try {
			this.closeDialog(true);
		}
		catch (e) {}
    },
	ajaxError: function(request) {
        alert('ajax error...');
		try {
			this.closeDialog(true);
		}
		catch (e) {}
    },
    ajaxGetResponseType: function(request) {
        if (request.responseXML == null || request.responseXML.childNodes.length == 0)
            return 'text';
        return 'xml';    
    },
	openDialog: function(containerId, width, height, url, options) {
		this.closeDialog(true);
		
		if (!this.isSet(options) || options == null)
				options = {};
				
		if (!options.msg)
			options.msg = config.msg.loading;
			
		var content = '<div id="_dMsgId" style="display:none"></div>'
					+ '<div id="'+containerId+'"><div id="_dLoadingId" align="center" style="padding-top:'+((height/2)-15)+'px;"><div style="display:inline;" class="loading clearfix">' + options.msg + '</div></div></div>';
        Dialog.alert(content, {hideOk:true, width:width, height:height, resizable:false, windowParameters:{showEffect:Element.show, hideEffect:Element.hide, destroyOnClose:true,zIndex:3456789}});
		
		if (url && url != '') {
			options.blockId   		   = containerId;
			options.msgId 	  		   = '_dMsgId';
			options.loadingId 		   = '_dLoadingId';
			options.showLoading		   = false;
			options.scrollTop 		   = false;
			options.closeDialogOnError = true;
			
			if (!options.engine)
				options.engine = this;
			url += '/msgId/_dMsgId';
			
			if (!options.frmName)	
				options.engine.ajaxLoad(url, options);
			else {
				options.action = url;
				options.engine.ajaxSubmit(options.frmName, options);
			}
		}
    },
	getDialogActive: function() {
        return Windows.getFocusedWindow();
    },
	showDialog:function(showOverlay) {
		var dialog = this.getDialogActive();
		if (dialog) {
			dialog.setOpacity(1);
			if (showOverlay)
				WindowUtilities.disableScreen('alert', 'overlay_modal', 0.6);
			dialog.showCenter(true);
		}
	},
	hideDialog:function(hideOverlay) {
		var dialog = this.getDialogActive();
		if (dialog) {
			dialog.setOpacity(0);
			if (hideOverlay)
				WindowUtilities.enableScreen();
		}
	},
	closeDialog: function(closeAll) {
        if (!closeAll) {
            var currDialog = this.getDialogActive();
            if (currDialog)
                currDialog.close();
        }
        else Windows.closeAll();
    },
	openPopUp: function(url, width, height, scrolls) {
        if (this.PopUpWin)
            this.PopUpWin.close();

        var size = (width == 0 && height == 0) ? 'fullscreen=yes' : 'width=' + width + ',height=' + height;
		
		scrolls = (scrolls)? 'yes' : 'no';
		
        this.PopUpWin = open(url, 'PopUpWin', 'toolbar=no,titlebar=no,location=no,directories=no,status=no,menubar=no,resizable=yes,copyhistory=yes,top=0,left=0,scrollbars=' + scrolls + ',' + size);
        this.PopUpWin.focus();
    },
    isIE: function() {
        var UserAgent = navigator.userAgent.toLowerCase();
        return UserAgent.indexOf('msie') > -1;
    },
    isSet: function(v) {
        return (v != undefined);
    },
	isEmpty: function(value) {
        return this.trim(value) == '';
    },
    isArray: function(object) {
        return (object.length != undefined && typeof(object) != 'string');
    },
    trim: function(value) {
        return (value != null)? value.toString().replace(/^\s+/, '').replace(/\s+$/, '').replace(/\s+/g, ' ') : '';
    },
	trimChar: function(value, trimChr) {
        return (value != null)? value.toString().replace(new RegExp(trimChr, 'g'), '') : '';
    },
    isEmail: function(value) {
        var GoodEmail = value.search(/^([-\w][-\.\w]*?)?[-\w]@([-!#\$%&*+\\\/=?\w^`{|}~]+\.)+[a-zA-Z]{2,6}$/gi);

        return GoodEmail != -1;
    },
	isDate: function(value, mark) {
		var regExp;
				
		if (mark == '/')
			regExp = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
		else regExp = /^\d{1,2}-\d{1,2}-\d{2,4}$/;
		
		if (value.search(regExp) != -1) {
			var d = value.split(mark);
			
			if (d[0] > 0 && d[0] <= 31 && d[1] > 0 && d[1] <= 12)
				return true;
		}
		return false;
	},
	isNumber: function(value) {
		if (value == null)
			return false;
			
		return (value.toString().search(/^[\-\+]?[0-9]{1,}[\.]?[0-9]*$/) != -1);
	},
	isInt: function(value) {
		var number = this.isNumber(value);
				
		if (number) {
			value = parseFloat(value);
			return (value.toString().search(/\./) == -1);
		}
		
		return false;
	},
	getCurrTime:function() {
		return new Date().getTime();
	},
	getQueryString:function(basePath) {
		var queryString = '';
		
		basePath = basePath.replace(/[\/]*\/$/g, '');
		
		if (window.location.href.match(/^.*?:\/\/[^\/]*(.*)/)) {
			queryString = RegExp.$1.replace(new RegExp('^' + basePath, 'i'), '');
			queryString = queryString.replace(/#/, '');
			queryString = queryString.replace(/^\/[\/]*|[\/]*\/$/g, '');	
		}
		
		return queryString;
	},
	getInputSelectionStart:function(obj) {
        var p = 0;
        
		if (obj.selectionStart) {
            if (isFinite(obj.selectionStart))
				p = obj.selectionStart;
        } 
		else if (document.selection) {
            var r = document.selection.createRange().duplicate();
			
            r.moveEnd('character', obj.value.length);
            p = obj.value.lastIndexOf(r.text);
			
            if (r.text == '')
				p = obj.value.length;
        }
		
        return p;
    },
	getInputSelectionEnd:function(obj) {
        var p = 0;
		
        if (obj.selectionEnd) {
            if (isFinite(obj.selectionEnd))
            	p = obj.selectionEnd;
        }
		else if (document.selection) {
            var r = document.selection.createRange().duplicate();
			
            r.moveStart('character', -obj.value.length);
            p = r.text.length;
        }
		
        return p;
    },	
	setInputSelection:function(obj, start, end) {
        if (obj.setSelectionRange) {
            obj.focus();
            obj.setSelectionRange(start, end);
        }
		else if (obj.createTextRange) {
            var r = obj.createTextRange();
            r.collapse();
            r.moveStart('character', start);
            r.moveEnd('character', (end - start));
            r.select();
        }
    },
	numberFormat:function(number, format, decimals) {
		number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
		
		var s 		     = '',			
			n 		     = !isFinite(+number)? 0 : +number,
			thousandsSep = (format.charAt(0) || ','),
			decPoint 	 = (format.charAt(2) || '.'),
			_decimals    = (decimals == 0)? decimals : decimals+1,
    		prec 	     = !isFinite(+_decimals)? 0 : Math.abs(_decimals),
		    toFixedFix   = function(n, prec) {
		    	var k = Math.pow(10, prec);
		      	return '' + Math.round(n * k) / k;
		    };
		
		// Fix for IE parseFloat(0.55).toFixed(0) = 0;
		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		if (s[0].length > 3)
			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, thousandsSep);
	
		if ((s[1] || '').length < prec) {
			s[1] = s[1] || '';
			s[1] += new Array(prec - s[1].length + 1).join('0');
		}
		
		if (_decimals != decimals)
			s[1] = s[1].substr(0, s[1].length-1);
		
	  	return s.join(decPoint);
	},
	typingSum:function(number1, number2, unit, containerId) {
		var sum = 0;
		
		number1 = number1.toString().replace(/,/g, '');
		number2 = number2.toString().replace(/,/g, '');
		
		if (unit == undefined)
			unit = 1;
			
		if (this.isNumber(number1) && this.isNumber(number2))
			sum = number1*number2*unit;
			
		if ($(containerId))
			$(containerId).innerHTML = this.numberFormat(sum, false, 2);
				
		return sum;
	},
	numberToText:function(number) {
		var len, groupLen, unitPrice,
			count = 0, group = '', result = '';
	
		number = Math.round(number).toString();
		len    = number.length;
	
		for (var i = len - 1; i >= 0; i--) {
			count++;
			group = number.substr(i, 1) + group;
			if (count%3 == 0 && i > 0)
				group = ',' + group;
		}
	
		group    = group.split(',');
		groupLen = group.length;
	
		for (var i = 0; i < groupLen; i++) {
			switch (len) {
				case 3: unitPrice = 'trăm'; break;
				case 4: case 5: case 6: unitPrice = 'nghìn'; break;
				case 7: case 8: case 9: unitPrice = 'triệu'; break;
				case 10: case 11: case 12: unitPrice = 'tỷ'; break;
				case 13: case 14: case 15:unitPrice = (parseInt(group[i+1]) != 0)? 'nghìn' : 'nghìn tỷ'; break;
				default:unitPrice = ''; break;
			}
		
			if (parseInt(group[i]) != 0)
				result += ' ' + ((len != 3)? parseInt(group[i]) : Math.floor(parseInt(group[i])/100)) + ' ' + unitPrice;
		
			len -= group[i].length;	
		}
		
		return result;
	},
	inputMask:function(input, mask) {
        var len 	 = input.value.length,
			caretPos = this.getInputSelectionStart(input);
		
		if (mask != '') {
            if (mask.search(/a-z/i) != -1) {
                mask = mask.replace(/a-z|[a-z]/gi, '');
                mask += 'abcdefghijklmnopqrstuvwxyz';
            }
            if (mask.search(/0-9/) != -1) {
                mask = mask.replace(/0-9|[0-9]/g, '');
                mask += '0123456789';
            }
        }
		
		input.value = input.value.toString().replace(new RegExp('[^' + mask + ']', 'gi'), '');		
		
		if (len != input.value.length) {
			caretPos -= (len - input.value.length);
			this.setInputSelection(input, caretPos, caretPos);
		}
    },
	typingNumberFormat:function(input, format, decimals, negative) {
		var buffer,
			mask 		 = '0-9',
			thousandsSep = (format.charAt(0) || ','),
			decPoint 	 = (format.charAt(2) || '.');
		
		if (!decimals)
			decimals = 0;
		
		if (decimals != 0)
			mask += decPoint;			
		
		if (negative)
			mask += '-';
			
		number = input.value.replace(new RegExp('[^' + mask + ']', 'g'), '');
		
		if (number == '' || number == thousandsSep || number == decPoint) {
			input.value = '';
			return;
		}
		
		if (negative && number.indexOf('-') != -1)
			number = number.replace(/^-{1,}/g, '-').replace(/(\d)(\-){1,}/g,'$1');
		
		if (decimals != 0) {
			number = number.replace(new RegExp('[' + decPoint + ']{1,}', 'g'), '.');
			if(number.indexOf('.') != -1) {
				buffer = number.split('.');
				number = buffer.pop();
				number = buffer.join('') + '.' + number;
			}
		}
		
		buffer = (number.charAt(number.length-1) == '.')? decPoint : '';
		number = this.numberFormat(number, format, decimals);
		
		if (decimals != 0) {
			number = number.toString().split(decPoint);
			number = number[0] + (((number[1] = number[1].replace(/0{1,}$/g, '')) != '')? (decPoint + number[1]) : '');
			if (buffer == decPoint)
				number += decPoint;
		}
		
		if (number != input.value) {
			var caretPos = this.getInputSelectionStart(input) - (input.value.length - number.toString().length);
			input.value = number;
			this.setInputSelection(input, caretPos, caretPos);
		}		
    },
	getFrmValueItemOtion:function(frm, optionName) {
		var result = '';
		
		if ($(frm) && $(frm).elements[optionName]) {
			var option = $(frm).elements[optionName];
			
			if(option.length) {
				for (var i = 0; i < option.length; i++) {
					if (option[i].checked) {
						result = option[i].value;
						break;
					}
				}
			}
			else result = (option.checked)? option.value : '';
		}

		return result;
	},
	setFrmValueItems:function(frm, params) {
		if (typeof(frm) == 'string')
			frm = $(frm);
				
		if (frm) {
			var value, element;
			
			for (var i in params) {
				if (frm.elements[i]) {
					element = frm.elements[i];
					if (element.type == 'select-one' || element.type == 'select-multiple') {
						value = (this.isArray(params[i]))? params[i] : [params[i]];
						
						for (var j = 0; j < element.options.length; j++)
							element.options[j].selected = false;
									
						for (var j = 0; j < value.length; j++) {
							for (var k = 0; k < element.options.length; k++) {
								if (element.options[k].value == value[j])
									element.options[k].selected = true;
							}
						}
					}
					else if ((element.length && element[0].type == 'radio') || element.type == 'radio') {
						if (element.length) {
							for (var j = 0; j < element.length; j++) {
								if (element[j].value == params[i])
									element[j].checked = true;
							}
						}
					}
					else element.value = params[i];
				}
			}
		}
	},
	createUrl:function(frm, params, urlDelimiter) {
		var result = '',		
			_frm = $(frm);
			
		if (_frm) {
			params = params.toString().split(',');
			
			var element, value, segment;
			for (var i = 0; i < params.length; i++) {
				value   = '';
				segment = params[i].split(':');
				
				if (!segment[1])
					segment[1] = segment[0];
					
				if (_frm.elements[segment[1]]) {
					element = _frm.elements[segment[1]];
					if ((element.length && element[0].type == 'radio') || element.type == 'radio')
				 		value = this.getFrmValueItemOtion(frm, (element.length)? element[0].name : element.name);
					else value = element.value;
				}
				result += (urlDelimiter + segment[0] + urlDelimiter + value);
			}
			if (result != '')
				result = result.substr(1);
		}
		
		return result;
	},	
	switchDisplay:function(status) {
		var list;
		if (status.hide) {		
			list = status.hide.split(',');
			for (var i = 0; i < list.length; i++) {
				if ($(list[i]))
					$(list[i]).style.display = 'none';
			}
		}
		if (status.show) {
			list = status.show.split(',');
			for (var i = 0; i < list.length; i++) {
				if ($(list[i]))
					$(list[i]).style.display = '';
			}
		}
	},
	hide:function(elements) {
		elements = elements.split(',');
		for (var i = 0; i < elements.length; i++) {
			if ($(elements[i]))
				$(elements[i]).style.display = 'none';
		}
	},
	show:function(elements) {
		elements = elements.split(',');
		for (var i = 0; i < elements.length; i++) {
			if ($(elements[i]))
				$(elements[i]).style.display = '';
		}
	},
	setHide:function(elements, status) {
		elements = elements.split(',');
		for (var i = 0; i < elements.length; i++) {
			if ($(elements[i]))
				$(elements[i]).style.display = (status)? 'none' : '';
		}
	},
	setButtonStatus:function(params) { // status: true = enable, false = disable
		var id, list = params.elements.split(',');
		
		for (var i = 0; i < list.length; i++) {
			id = $(list[i]);
			if (id) {				
				if (!this.isSet(params.tagInput) || params.tagInput == true)
					id.disabled = !params.status;
				else if (!params.status && id.getAttribute('onclick') != null) {
					if (id.getAttribute('oldOnclick') == null)
						id.setAttribute('oldOnclick', id.getAttribute('onclick'));

					id.setAttribute('onclick', '');
				}
				else if (params.status && id.getAttribute('oldOnclick') != null)
					id.setAttribute('onclick', id.getAttribute('oldOnclick'));
					
				if (!params.status && params.cls) {
						id.setAttribute('oldClass', (id.className)? id.className : '');
						id.className = params.cls;
				}
				else if (params.status && id.getAttribute('oldClass') != null)
					id.className = id.getAttribute('oldClass');
			}
		}
	},
	setClass:function(elements, cls) {
		var list = elements.split(',');
		
		for (var i = 0; i < list.length; i++) {
			if ($(list[i]))
				$(list[i]).className = cls;
		}
	},	
	stripScripts:function(text) {
		var scriptFragment = '<script[^>]*>([\\S\\s]*?)<\/script>';
	    return text.replace(new RegExp(scriptFragment, 'img'), '');
  	},
	extractScripts:function(text) {
		var result = '',
			scriptFragment= '<script[^>]*>([\\S\\s]*?)<\/script>',
			matchAll = new RegExp(scriptFragment, 'img'),
    	    matchOne = new RegExp(scriptFragment, 'im'),
			scripts = (text.match(matchAll) || []);
			
		for (var i = 0; i < scripts.length; i++)
			result += (scripts[i].match(matchOne) || ['', ''])[1];
			
		return result;
	},
	extractImportScripts:function(text) {
		var result = [],
			scriptFragment= '<script[^>]*src=["\'](.*?)["\'].*?>\\s*<\/script>',
			matchAll = new RegExp(scriptFragment, 'img'),
    	    matchOne = new RegExp(scriptFragment, 'im'),
			scripts = (text.match(matchAll) || []);
			
		for (var i = 0; i < scripts.length; i++)
			result.push((scripts[i].match(matchOne) || ['', ''])[1]);
			
		return result;
	},
	createAds:function(ads) {
		var title = document.title,
			itemWidth, itemHeight, fixSize, container, path, index, nAds, url, banner, adsContent, nItem, count, k;

		for (var i = 0; i < ads.length; i++) {
			banner 	  = ads[i].banner;
			nItem 	  = banner.length;
			container = ads[i].containerId.split(',');
			for (var j = 0; j < container.length; j++) {
				container[j] = $(container[j]);
				if (container[j]) {
					adsContent = '';
					index 	   = (container[j].getAttribute('index') == null)? 0 : container[j].getAttribute('index')*1;
					nAds       = (container[j].getAttribute('number') == null)? -1 : container[j].getAttribute('number')*1;
					itemWidth  = container[j].getAttribute('itemWidth');
					itemHeight = container[j].getAttribute('itemHeight');
					fixSize    = container[j].getAttribute('fixSize');
					
					if (index < nItem) {				
						if (nAds < 0)
							nAds = nItem;
						
						k = index;
						count = 0;
						while (count < nAds && k < nItem) {
							if (itemWidth != null && (fixSize == 'Y' || banner[k].width == 0 || banner[k].width > itemWidth*1))
								banner[k].width = itemWidth;
							if (itemHeight != null && (fixSize == 'Y' || banner[k].height == 0 || banner[k].height > itemHeight*1))
								banner[k].height = itemHeight;
							
							url = '';
							if (!this.isEmpty(banner[k].url) || !this.isEmpty(banner[k].cmd)) {
								if (!this.isEmpty(banner[k].url)) {
									url = 'href="' + banner[k].url + '"';								
									if (banner[k].target == 0)
										url += ' target="_blank"';
								}
								if (!this.isEmpty(banner[k].cmd)) {
									if (url == '')
										url = 'href="javascript:void(0);"';
									url += ' onclick="' + banner[k].cmd + '"';
								}
							}
							
							if (!this.isEmpty(banner[k].adsCode) || banner[k].mime == 'flash') {
								style = 'style="width:' + banner[k].width + 'px;height:' + banner[k].height + 'px;background-color:#000;filter:alpha(opacity=0);-moz-opacity:0;opacity:0;z-index:500;position:absolute;cursor:pointer;outline:0px;"';
								if (url != '')
									url = '<a ' + url + ' ' + style + '></a>';
								else url = '<span ' + style + '></span>';
								
							}
							else if (url != '')
								url = '<a ' + url + '>';
							
							path = config.baseUrl + '/' + banner[k].path;
							
							if (this.isEmpty(banner[k].adsCode)) {
								switch (banner[k].mime) {
									case 'image':
										adsContent += '<div align="center">' + url + '<img src="' + path + '" width="' + banner[k].width + '" height="' + banner[k].height + '" border="0" />' + ((url !='')? '</a>' : '') + '</div>';
										break;
									case 'flash':									
										adsContent += '<div>' + url + '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="' + banner[k].width + '" height="' + banner[k].height + '">'
										 	+ '<param name="movie" value="' + path + '" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="scale" value="exactfit" />'
	  									 	+ '<embed src="' + path + '" wmode="transparent" quality="high" scale="exactfit" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + banner[k].width + '" height="' + banner[k].height + '"></embed></object><div>';
										break;
										
									case 'video':
									case 'audio':
										path += '&stretching=fill&skin=' + config.cssDir + '/JWPlayer/glow.zip';
										adsContent += '<div>' + url + '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' + banner[k].width + '" height="' + banner[k].height + '">'
										 	+ '<param name="movie" value="' + config.jsDir + '/JWPlayer/player.swf" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="wmode" value="transparent" /><param name="flashvars" value="file=' + path + '" />'
	  									 	+ '<embed src="' + config.jsDir + '/JWPlayer/player.swf" wmode="transparent" allowfullscreen="true" allowscriptaccess="always" flashvars="file=' + path + '" width="' + banner[k].width + '" height="' + banner[k].height + '"></embed></object><div>';										
										break;
								}
							}
							else adsContent += '<div>' + url + banner[k].adsCode + '</div>';
							count++;
							k++;
						}
					}
					container[j].innerHTML = adsContent;
					container[j].style.display = (!this.isEmpty(adsContent))? '': 'none';
					document.title = title; // fix bux title on ie
				}
			}
		}
	},
	createMediaBuffer:function(containerId, itemWidth, itemHeight, mediaList) {
		containerId = $(containerId);
		if (containerId) {
			var path   = '',
				buffer = '',
				link = '',
				nItem  = mediaList.length;
				
			for (var i = 0; i < nItem; i++) {
				link = '';
				path = config.baseUrl + '/' + mediaList[i].path;
				if (mediaList[i].mime == 'image' || mediaList[i].mime == 'flash') {
					buffer += '<div itemId="' + mediaList[i].id + '">';
					if (this.isSet(mediaList[i].link))
						link = '<a href="' + mediaList[i].link + '"' + ((!this.isEmpty(mediaList[i].cmd))? (' onclick="' + mediaList[i].cmd + '"') : '') + '>';
						
					buffer += link + '<img src="' + path + '" width="' + itemWidth + '" height="' + itemHeight + '" border="0" />' + ((link != '')? '</a>' : '');
				}
				else buffer += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="' + itemWidth + '" height="' + itemHeight + '">'
	 						+  '<param name="movie" value="' + path + '" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="scale" value="exactfit" />'
	  						+  '<embed src="' + path + '" wmode="transparent" scale="exactfit" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + itemWidth + '" height="' + itemHeight + '"></embed></object>';

				buffer += '</div>';
			}

			containerId.style.display = 'none';
			containerId.innerHTML = buffer;					
		}
	},
	setupVideo: function(container, width, height, file, image, autoStart) {
		if (typeof(container) == 'string')
			container = $(container);

		if (jwplayer('__video'))
			jwplayer('__video').remove();
			
		container.setAttribute('video_url', file);
		container.setAttribute('is_video', 'Y');
		container.innerHTML = '<div id="__video" align="center"></div>';
		
		if (!width)
			width = 300;
		if (!height)
			height = 200;
			
		jwplayer('__video').setup({
			flashplayer: config.jsDir + '/JWPlayer/player.swf',
			width:	   width,
			height:	   height,
			autostart: autoStart,
			file:	   file,
			stretching:'fill',
			image:	   image,
			skin:	   config.cssDir + '/JWPlayer/glow.zip'
		});
	},
	createMedia:function(storageName, fileObj) {
		file = this.trim(fileObj.file);

		if ($(storageName))
			$(storageName).value = file;
		
		if (file != '' && fileObj.dir && this.trim(fileObj.dir) != '')
			file = fileObj.dir + '/' + file;
			
		if ($('dc_' + storageName)) // dc: delete container
			$('dc_' + storageName).style.display = (file != '')? '' : 'none';
			
		if ($('dv_' + storageName)) // dv: delete value
			$('dv_' + storageName).checked = false;
		
		if ($('opt_' + storageName)) // options container
			$('opt_' + storageName).style.display = (file != '')? '' : 'none';
			
		if ($('m_' + storageName)) { // m: media content container
			var mediaContent     = '',
				mediaSize		 = '',
				mediaContainer   = $('m_' + storageName),			
				itemWidth 		 = mediaContainer.getAttribute('itemWidth'),
				itemHeight		 = mediaContainer.getAttribute('itemHeight'),
				borderStyle		 = mediaContainer.getAttribute('borderStyle'),
				zoomId		     = mediaContainer.getAttribute('zoomId'),				
				fullPath 	     = config.baseUrl + '/' + file,
				deleteRowHandler = mediaContainer.getAttribute('deleteRowHandler'),
				hasVideo		 = false;
			
			if (deleteRowHandler !== null && $(deleteRowHandler)) // delete row value
				$(deleteRowHandler).checked = false;
			
			mediaSize += ' width="' + ((itemWidth != null)? itemWidth : '') + '"';
			mediaSize += ' height="' + ((itemHeight != null)? itemHeight : '') + '"';
			if (!borderStyle)
				borderStyle = 'border:2px solid #939393';
			
			mime = this.trim(fileObj.mime).toLowerCase();
			
			if (file == '' || mime.substr(0, 6) == 'image/') { // image
				if (file != '')					
					mediaContent = '<a class="highslide" ' + (!$(zoomId)? ('href="' + fullPath + '" onclick="return hs.expand(this)"') : '') + '><image id="_zoomImgTrigger" src="' + fullPath + '"' +  mediaSize + ($(zoomId)? ' onclick="return $(\'' + zoomId + '\').onclick()"' : '') + ' /></a>';
				else if (fileObj.embedCode && !this.isEmpty(fileObj.embedCode))
					mediaContent = this.base64Decode(fileObj.embedCode);
				else mediaContent = '<image src="' + mediaContainer.getAttribute('defaultFile') + '" style="' + borderStyle + '"' + mediaSize + ' />';
			}
			else if (mime == 'application/x-shockwave-flash') // flash
				mediaContent = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"' + mediaSize + '>'
							 + '<param name="movie" value="' + fullPath + '" /><param name="quality" value="high" /><param name="wmode" value="transparent" />'
	  						 + '<embed src="' + fullPath + '" wmode="transparent" scale="exactfit" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"' + mediaSize + '></embed></object>';
			else {
				var type = file.split('.');
				
				type = type[type.length - 1].toLowerCase();
				if (type == 'mp3' || type == 'mp4' || type == 'flv') {
					hasVideo = true;
					this.setupVideo(mediaContainer, itemWidth, itemHeight, fullPath, '', false);
				}
				else mediaContent = file;
			}
			if (!hasVideo) {
				mediaContainer.removeAttribute('is_video');
				mediaContainer.innerHTML = mediaContent;
				$('m_' + storageName).setAttribute('oldContent', mediaContent);
			}
		}
	},
	swapMedia:function(elements, status) {
		var element, itemWidth, itemHeight;
		
		elements = elements.split(',');
		
		for (var i = 0; i < elements.length; i++) {
			element = $('m_' + elements[i]);
			if (element) {
				itemWidth  = element.getAttribute('itemWidth');
				itemHeight = element.getAttribute('itemHeight');
				
				if (!status) {
					if (element.getAttribute('is_video') != 'Y') {
						if (element.getAttribute('oldContent') === null)
							element.setAttribute('oldContent', element.innerHTML);
						
						element.innerHTML = element.getAttribute('oldContent');
					}
					else this.setupVideo(element, itemWidth, itemHeight, element.getAttribute('video_url'), '', false);
					
					if ($('opt_' + elements[i])) // options container
						$('opt_' + elements[i]).style.display = '';
				}
				else {
					if ($('opt_' + elements[i])) // options container
						$('opt_' + elements[i]).style.display = 'none';
					
					itemWidth  = ' width="' + ((itemWidth != null)? itemWidth : '') + '"';
					itemHeight = ' height="' + ((itemHeight != null)? itemHeight : '') + '"';
					
					element.innerHTML = '<img src="' + element.getAttribute('defaultFile') + '" style="border:2px solid #939393"' + itemWidth + itemHeight + ' />';					
				}
			}
		}
	},
	initMedia:function(storages, dir) {
		for (var i = 0; i < storages.length; i++) {
			if ($(storages[i].id)) {
				if (dir && !storages[i].dir)
					storages[i].dir = dir;
			
				storages[i].file = $(storages[i].id).getAttribute('cache');
			
				this.createMedia(storages[i].id, storages[i]);
			}
		}
	},
	resetMedia:function(storages) {
		storages = storages.split(',');
		for (var i = 0; i < storages.length; i++) {			
			if ($(storages[i]) && $('dv_' + storages[i]) && $('dv_' + storages[i]).checked) {
				this.createMedia(storages[i], {dir:'', file:'', mime:''});
				$(storages[i]).setAttribute('cache', '');
			}
		}
	},
	autoReload:function() {
		var location = (arguments.length > 0 && arguments[0] != '')? arguments[0] : window.location.href;
		
		location = location.replace(/#/g, '');
		
		window.location.replace(location);
	},	
	frmValidate: function(frm, msg, skipPrefix) {
        var isSkip,
			fieldMsg  = null,
			result    = true,
            hasFocus  = false,
			oldClass  = false,
            frmObj 	  = (typeof (frm) == 'string')? $(frm) : frm,
            inputs 	  = parseInputElement(frmObj.getElementsByTagName('input'));

		inputs[inputs.length] = frmObj.getElementsByTagName('select');
    	inputs[inputs.length] = frmObj.getElementsByTagName('textarea');
		
		if (!msg)
			msg = 'Vui lòng nhập đầy đủ thông tin vào các mục bắt buộc (mục có dấu *)';
			
        for (var i = 0; i < inputs.length; i++) {
			for (var j = 0; j < inputs[i].length; j++) {				
            	if (i != 1) {
					isSkip = (skipPrefix && skipPrefix != '' && inputs[i][j].name.toString().indexOf(skipPrefix) == 0)? true : false;
					if (inputs[i][j].getAttribute('required') == 'Y') {						
                    	if (i != 2) {
                        	oldClass = inputs[i][j].getAttribute('oldClass');							
							if (oldClass === null) {
                            	oldClass = (inputs[i][j].className)? inputs[i][j].className : '';
								inputs[i][j].setAttribute('oldClass', oldClass);	
							}
	                        if (this.isEmpty(inputs[i][j].value) && !isSkip) {
	                        	inputs[i][j].className = oldClass + ' inputRequiredField';
								
								if (fieldMsg === null) {
									fieldMsg = inputs[i][j].getAttribute('msg');
									if (fieldMsg === null)
										fieldMsg = msg;
								}
									
	                            if (!hasFocus) {
    	                        	hasFocus = true;
									if (inputs[i][j].type != 'hidden')
	        	                        inputs[i][j].focus();
								}
                	            result = false;
							}
                        	else inputs[i][j].className = oldClass;
                        }
	                    else if (!isSkip) { // for radio
                        	var firstRadio,
								isChecked  = false,
								radioGroup = frmObj.elements[inputs[i][j].name];

	                        if (this.isArray(radioGroup)) {
								firstRadio = radioGroup[0];
	                        	for (var k = 0; k < radioGroup.length; k++) {
	                            	if (radioGroup[k].checked) {
                                    	isChecked = true;
                                        break;
                                    }
                                }
                            }
                            else {
								firstRadio = radioGroup;
								isChecked  = radioGroup.checked;
							}
								
                            if (!isChecked) {
								if (fieldMsg === null) {
									fieldMsg = firstRadio.getAttribute('msg');
									if (fieldMsg === null)
										fieldMsg = firstRadio.parentNode.getAttribute('msg');
									if (fieldMsg === null)
										fieldMsg = msg;
								}
									
                            	result = false;
							}
                        }
                    }
                }
	            else { // for checkbox
    	        	var firstCheck,
						isChecked   = false,
						hasRequired = false;
                    
					for (var k = 0; k < inputs[i][j].length; k++) {
						isSkip = (skipPrefix && skipPrefix != '' && inputs[i][j][k].name.toString().indexOf(skipPrefix) == 0)? true : false;
                    	if (inputs[i][j][k].getAttribute('required') == 'Y' && !isSkip) {
	                		hasRequired = true;
	                        if (inputs[i][j][k].checked) {
    	                    	isChecked = true;
        	                    break;
							}
                	     }
                    }
                    if (hasRequired && !isChecked) {
						if (fieldMsg === null) {
							fieldMsg = inputs[i][j][0].getAttribute('msg');
							if (fieldMsg === null)
								fieldMsg = inputs[i][j][0].parentNode.getAttribute('msg');
							if (fieldMsg === null)
								fieldMsg = msg;
						}
                    	result = false;
					}
				}
			}
        }
		
		if (!result)
			alert(fieldMsg);
			
		return result;

    	function parseInputElement(inputs) {
			var found  = false,
				result = [[], [], []];

			for (var i = 0; i < inputs.length; i++) {
				if (inputs[i].getAttribute('required') == null) // fix bug for aspx control
					inputs[i].setAttribute('required', inputs[i].parentNode.getAttribute('required'));

                if (inputs[i].getAttribute('required') == 'Y' && (inputs[i].type == 'text' || inputs[i].type == 'password' || inputs[i].type == 'hidden'))
                	result[0][result[0].length] = inputs[i];
				else if (inputs[i].type == 'checkbox') {
					if (inputs[i].getAttribute('requiredGroup') == null) // fix bug for aspx control
                    	inputs[i].setAttribute('requiredGroup', inputs[i].parentNode.getAttribute('requiredGroup'));

                    found = false;
                   	for (var j = 0; j < result[1].length; j++) {
                    	if (result[1][j][0].getAttribute('requiredGroup') == inputs[i].getAttribute('requiredGroup')) {
                        	result[1][j][result[1][j].length] = inputs[i];
                            found = true;
                            break;
                        }
                    }
                    if (!found)
                    	result[1][result[1].length] = [inputs[i]];
				}
                else if (inputs[i].type == 'radio') {
                	found = false;
                    for (var j = 0; j < result[2].length; j++) {
                    	if (result[2][j].name == inputs[i].name) {
                        	found = true;
                          	break;
                        }
                    }
                    if (!found)
                    	result[2][result[2].length] = inputs[i];
                }
            }
            
			return result;
        }
    },
	checkAll: function(controlId, colIndex, status) {
        var inputs,
			controlObj = (typeof(controlId) == 'string')? $(controlId) : controlId;

		if (controlObj.rows) {
	        if (controlObj.rows.length > 0) {
    	        inputs = controlObj.rows[0].cells[colIndex].getElementsByTagName('input');
        	    if (inputs.length > 0 && inputs[0].type == 'checkbox')
            	    inputs[0].checked = status;

	            for (var i = 1; i < controlObj.rows.length; i++) {
    	            inputs = controlObj.rows[i].cells[colIndex].getElementsByTagName('input');
        	        for (var j = 0; j < inputs.length; j++) {
            	        if (inputs[j].type == 'checkbox' && !inputs[j].disabled)
                	        inputs[j].checked = status;
                	}
            	}
        	}
		}
		else {
			inputs = controlObj.getElementsByTagName('input');
			for (var i = 0; i < inputs.length; i++) {
        		if (inputs[i].type == 'checkbox' && !inputs[i].disabled)
                	inputs[i].checked = status;
			}
		}
    },
	selectOneItem: function(controlId, colIndex, defauleValueCheck, selectItem) {
		if (!selectItem.checked)
			return;
			
        var inputs,
			controlObj = (typeof(controlId) == 'string')? $(controlId) : controlId;

		if (controlObj.rows) {
	        if (controlObj.rows.length > 0) {
	            for (var i = 0; i < controlObj.rows.length; i++) {
    	            inputs = controlObj.rows[i].cells[colIndex].getElementsByTagName('input');
        	        for (var j = 0; j < inputs.length; j++) {
            	        if (inputs[j].type == 'radio' && !inputs[j].disabled)
                	        inputs[j].checked = (inputs[j].value == defauleValueCheck)? true : false;
                	}
            	}
        	}
		}
		else {
			inputs = controlObj.getElementsByTagName('input');
			for (var i = 0; i < inputs.length; i++) {
        		if (inputs[i].type == 'radio' && !inputs[i].disabled)
                	inputs[i].checked = (inputs[i].value == defauleValueCheck)? true : false;
			}
		}
		
		selectItem.checked = true;
    },
	hasCheck: function(controlId, colIndex, rowIndex) {
		var inputs = [],
			controlObj = (typeof (controlId) == 'string') ? $(controlId) : controlId;

		if (controlObj.rows) {
			var tmp;
			if (!this.isSet(rowIndex))
				rowIndex = 1;
            for (var i = rowIndex; i < controlObj.rows.length; i++) {
   	            tmp = controlObj.rows[i].cells[colIndex].getElementsByTagName('input');
				for (var j = 0; j < tmp.length; j++)
					inputs.push(tmp[j]);				
			}
		}
		else inputs = controlObj.getElementsByTagName('input');

		for (var i = 0; i < inputs.length; i++) {
        	if (inputs[i].type == 'checkbox' && inputs[i].checked)
				return true;
		}		
		return false;
	},
	rowSelected:function(rowObj, cls) {
		var oldClass = rowObj.getAttribute('oldClass');

		if (oldClass == null) {
			oldClass = rowObj.className? rowObj.className : '';
	    	rowObj.setAttribute('oldClass', oldClass);
		}
		rowObj.className = (cls != '')? (cls  + ' ' + oldClass) : oldClass;
	},
	deleteRowTable:function(containerId, rowIndex, msg) {
		if (this.isSet(msg)) {
			if (!confirm(msg))
				return;
		}

		if ($(containerId))
			$(containerId).deleteRow(rowIndex);
	},
	deleteCheckedRowTable:function(containerId, deleteAll, emptyMsg, emptyClass) {
		containerId = $(containerId);
		
		if (containerId) {
			if (deleteAll) {
				while(containerId.rows.length > 0)
					containerId.deleteRow(-1);
			}
			else {
				do {
					var inputs,
						found = false;
						
					for (var i = 0; i < containerId.rows.length; i++) {
						inputs = containerId.rows[i].getElementsByTagName('input');
						for (var j = 0; j < inputs.length; j++) {
							if (inputs[j].type == 'checkbox' && inputs[j].checked) {
								found = true;
								containerId.deleteRow(containerId.rows[i].rowIndex);
								break;
							}
						}
						if (found)
							break;
					}
				}
				while(found);
				
				if (containerId.rows.length == 1) // delete header
					containerId.deleteRow(0);
			}
			
			if (containerId.rows.length == 0) {					
				var cell = containerId.insertRow(-1).insertCell(-1);
					
				cell.className = (emptyClass)? emptyClass : 'emptyData';
				cell.innerHTML = (emptyMsg)? emptyMsg : 'Không có tập tin nào!';
			}
		}
	},
	listSelectItem:function(selectId, itemValue) {
        var len;

		if (typeof(selectId) == 'string')
			selectId = $(selectId);
		
		len = selectId.options.length;
		for (var i = 0; i < len; i++)
			selectId.options[i].selected = (selectId.options[i].value != itemValue)? false : true;
    },
	removeSelectItem:function(selectId, itemValue) {
        var index 	  = 0,
            selectObj = (typeof(selectId) == 'string') ? $(selectId) : selectId;

        while (selectObj.options.length > 0 && index < selectObj.options.length) {
            if (selectObj.options[index].value == itemValue)
                selectObj.remove(index);
            else index++;
        }
    },
	base64Decode:function(data) {
  		var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
			o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, buffer = [];

		if (!data)
			return data;

	  	data += '';

		do { // unpack four hexets into three octets using index points in b64
			h1 = b64.indexOf(data.charAt(i++));
			h2 = b64.indexOf(data.charAt(i++));
			h3 = b64.indexOf(data.charAt(i++));
			h4 = b64.indexOf(data.charAt(i++));
		
			bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;
		
			o1 = bits >> 16 & 0xff;
			o2 = bits >> 8 & 0xff;
			o3 = bits & 0xff;
		
			if (h3 == 64)
				buffer[ac++] = String.fromCharCode(o1);
			else if (h4 == 64)
				buffer[ac++] = String.fromCharCode(o1, o2);
			else buffer[ac++] = String.fromCharCode(o1, o2, o3);
		}
		while (i < data.length);
		
		  return buffer.join('');
	},
	base64Encode:function(data) {
		var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
			o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, enc = '', buffer = [];

		if (!data)
			return data;

		do { // pack three octets into four hexets
			o1 = data.charCodeAt(i++);
			o2 = data.charCodeAt(i++);
			o3 = data.charCodeAt(i++);
		
			bits = o1 << 16 | o2 << 8 | o3;
		
			h1 = bits >> 18 & 0x3f;
			h2 = bits >> 12 & 0x3f;
			h3 = bits >> 6 & 0x3f;
			h4 = bits & 0x3f;
		
			// use hexets to index into b64, and append result to encoded string
			buffer[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
		}
		while (i < data.length);

		enc = buffer.join('');

		var r = data.length % 3;

		return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
	},
	setCookie:function(name, value, days, path, domain, secure) {
		var cookie = name + '=' + encodeURIComponent(value);
	
		if (days) {
			var currDate = new Date();
		
			currDate.setTime(Date.parse(currDate) + days*86400*1000);
			cookie += '; expires=' + currDate.toUTCString();
		}
	
		cookie += ((path)? '; path=' + path : '') +
				  ((domain)? '; domain=' + domain : '') + 
				  ((secure)? '; secure=' + secure : '');
				   
		document.cookie = cookie;
	},
	getCookie:function(name) {
		var reg = new RegExp(name + '=[^;]+', 'i');
			
		if (document.cookie.match(reg))
			return decodeURIComponent(document.cookie.match(reg)[0].split('=')[1]);
			
		return '';
	},
	removeCookie:function(name) {
		document.cookie = name + "=; expires=" + new Date(1000).toUTCString() + "; path=/";
	},
	getIframeDocument:function(iframe) {
		iframe = (typeof(iframe) == 'string')? $(iframe) : iframe;
		var iframeDoc = (iframe.contentWindow || iframe.contentDocument);
		
		if (iframeDoc.document)
			iframeDoc = iframeDoc.document;
			
		return iframeDoc;
	},
	scrollTop:function() {
		window.document.body.scrollTop = 0;
   	    window.document.documentElement.scrollTop = 0;
	},
	switchScrollTop:function(evt) {
		var footer, offset,
			scrollTop	 = $('scrollTop'),
			scrollOffset = document.viewport.getScrollOffsets().top,
			wHeight 	 = (window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight);
			
		if (scrollOffset > wHeight) {
			footer = $('footer').getLayout();
			offset = scrollOffset + wHeight + 45;
			
			if(offset >= footer.get('top'))
				scrollTop.style.bottom = (offset - footer.get('top')) + 'px';
			else scrollTop.style.bottom = '0px';
			
			scrollTop.style.display = 'block';
		}
		else scrollTop.style.display = 'none';
	}
};