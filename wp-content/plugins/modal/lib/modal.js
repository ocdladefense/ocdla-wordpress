var renderElem = {
	mergeStyles: function(cssNew,cssOld){
		cssOld = cssOld || {};
		for(var prop in cssNew){
			cssOld[prop] = cssNew[prop];
		}
		return this.getAsInlineStyles(cssOld);
	},

	getAsInlineStyles: function(css){
		var styles = [];
		for(var prop in css){
			styles.push([prop,css[prop]].join(":"));
		}
		return styles.join(";")+";";
	},
	
	parseStyles: function(style){
		var css = {};
		var styles = style.split(";");
		for(var i = 0; i<styles.length; i++){
			var obj = styles[i].split(":");
			css[obj[0]] = obj[1];
		}
		
		return css;
	}
};

function mixin(target,source){
	for(var prop in source){
		target[prop] = source[prop];
	}
}

var modalPrototype = {
	root: document,
	
	backdrop: null,
	
	defaultBackdropStyles: {
		"overflow":"hidden",
		"position":"fixed",
		"top":"0px",
		"left":"0px",
		"z-index":"101",
		"background-color":"rgba(0,0,0,0.8)",
		"width":"100%",
		"height":"100%",
		"display":"none"
	},
	
	defaultContainerStyles: {
		"overflow":"hidden",
		"position":"absolute",
		"width":"600px",
		"height":"600px",
		"top":"50%",
		"left":"50%",
		"margin-left":"-300px",
		"margin-top":"-300px",
		"z-index":"101",
		"background-color":"#fff",
		"border":"1px solid #ccc",
		"box-shadow":"3px 3px 3px #ccc",
		"padding":"20px"
	},

	modalSetup:function()
	{
		this.backdrop = this.root.createElement("div");
		this.container = this.root.createElement("div");
		this.backdrop.appendChild(this.container);
		
		this.backdrop.setAttribute("style",this.getAsInlineStyles(this.defaultBackdropStyles));

		this.container.setAttribute("class", "modal fade");
		this.container.setAttribute("id", "myModal");
		this.container.setAttribute("tabindex", "-1");
		this.container.setAttribute("role", "dialog");
		this.container.setAttribute("aria-labelledby", "myModalLabel");
		this.container.setAttribute("aria-hidden", "false");
		this.container.setAttribute("style",this.getAsInlineStyles(this.defaultContainerStyles));
	},
	
	attachModal:function()
	{   
		var body = this.root.body;
		body.appendChild(this.backdrop);
	},

	css: function(target,css){
		var current = this.parseStyles(target.getAttribute("style"));
		console.log("Current css is: ",current);
		var merged = this.mergeStyles(css,current);
		target.setAttribute("style",merged);
	},
	
	showModal:function()
	{
		if($) {
			$("#myModal").modal({ show: false});
			$("#myModal").modal("show");
		} else { // jQuery not defined
			this.css(this.backdrop,{display:"block"});
		}
	},

	hideModal:function()
	{
		if($) {
			$('#myModal').modal('hide');
		} else {
			this.css({display:"none"},this.backdrop);
		}
	},
	
	content:function (html)
	{    
		this.container.innerHTML = html;
	},
	
	changeContent:function(html)
	{
		var modal_body = document.getElementsByClassName("modal-body")[0];
		modal_body.innerHTML = html;
	},

	fetchHtml:function(url)
	{
		return fetch(url)
		.then(function(response){
			return response.text();
		});
	}
};



function modal()
{
	this.container = null;
	this.modalSetup();
}

mixin(modalPrototype,renderElem);


modal.prototype = modalPrototype;