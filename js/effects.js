/* http://davidwalsh.name/break-out-frames */

if (top.location != self.location) {
	top.location = self.location;
}

/* http://davidwalsh.name/mootools-pulsefade-plugin */

var PulseFade = new Class({
			
	//implements
	Implements: [Options,Events],

	//options
	options: {
		min: 0,
		max: 1,
		duration: 200,
		times: 5
	},
	
	//initialization
	initialize: function(el,options) {
		//set options
		this.setOptions(options);
		this.element = $(el);
		this.times = 0;
	},
	
	//starts the pulse fade
	start: function(times) {
		if(!times) times = this.options.times * 2;
		this.running = 1;
		this.fireEvent('start').run(times -1);
	},
	
	//stops the pulse fade
	stop: function() {
		this.running = 0;
		this.fireEvent('stop');
	},
	
	//runs the shizzle
	run: function(times) {
		//make it happen
		var self = this;
		var to = self.element.get('opacity') == self.options.min ? self.options.max : self.options.min;
		self.fx = new Fx.Tween(self.element,{
			duration: self.options.duration / 2,
			onComplete: function() {
				self.fireEvent('tick');
				if(self.running && times)
				{
					self.run(times-1);
				}
				else
				{
					self.fireEvent('complete');
				}
			}
		}).start('opacity',to);
	}
});

function hover_normalpage() {

	// side menu
	var list = $$(
			'.widget_pages ul li'
		+	', .widget_pages ul li li'
		+	', .widget_buddypages ul li'
		+	', .widget_buddypages ul li li');

	el = list[0];
	if (el!=null) {	var save = el.getStyle('color'); }
	
	list.each(function(element) {		 
		var fx = new Fx.Morph(element, {duration:700, link:'cancel',
			transition: Fx.Transitions.Quad.easeInOut});			
	 			 
		element.addEvent('mouseenter', function(){
			fx.start({ 	'padding-left': 25, 'color': '#444' });
		});
		 
		element.addEvent('mouseleave', function(){
			fx.start({ 	'padding-left': 10, 'color': save });
		}); 
	});
}

// http://davidwalsh.name/dw-content/mootools-skype.php
function mootools_skypebutton() {			
	// more-link
	var list = $$('a.more-link');
	list.each(function(element) {		
		element.setStyle('padding-left', '20px');

		var my_skype = new Element( 'div') ;
		my_skype.addClass('skypebutton');
		my_skype.inject(element, 'top');		

		running = false;
		var fx2 = new Fx.Morph(my_skype, 
			{duration: 100, link: 'chain', onChainComplete:function() { 
				running = false; } });
		var fx1 = new Fx.Morph(my_skype, 
			{duration: 200, link: 'chain', onComplete:function() {
				fx2.start({'top':'-7px'})
				.start({'top':'-4px'})
				.start({'top':'-6px'})
				.start({'top':'-4px'});
			}
		});
		element.addEvent('mouseenter',function() {
			if(!running) {
				fx1.start({'top':'-10px'}).start({'top':'-4px'});
				running = true;
			}
		});		
	});
}	

// http://davidwalsh.name/mootools-watermark
function mootools_watermark_scroll() {	
	/* smoothscroll - scroll smoothly to the top*/
	new SmoothScroll({duration:500});

	/* go to top after 300 pixels down */
	var gototop = document.id('gototop');
	gototop.set('opacity','0').setStyle('display','block');
	window.addEvent('scroll',function(e) {
		if(Browser.Engine.trident4) {
			gototop.setStyles({
				'position': 'absolute',
				'bottom': window.getPosition().y + 10,
				'width': 100
			});
		}
		gototop.fade((window.getScroll().y > 300) ? '0.7' : 'out')
	});
}

// http://davidwalsh.name/external-favicon
function mootools_external_favicon() {
	var content = document.id('lay_content');
	/* grab all complete linked anchors */
	content.getElements('.post a[href^="http://"]').each(function(a) {
		/* if it's not on this domain */
		if(!a.get('href').contains(window.location.host)
		&& !a.hasClass('nofavicon')) {
			/* get the favicon */
			var favicon = a.get('href').replace(/^(http:\/\/[^\/]+).*$/, '$1') + '/favicon.ico';
			/* place it in the anchor */
			a.setStyle('background-image','url(' + favicon + ')').addClass('favicon');
		}
	});
}

// http://davidwalsh.name/screenshots-mootools-tooltips
function mootools_snapcasa() {
	var content = document.id('lay_content');	
	/* tooltips */
	var tips = new Tips();
	var tipURLs = [];
	/* grab all complete linked anchors */
	content.getElements('.post a[href^="http://"]').each(function(a) {
		/* if it's not on the davidwalsh.name domain */
		var href = a.get('href');
		if(!href.contains(window.location.host) && !tipURLs.contains(href)) {
			/* vars */
			tipURLs.push(href);
			var url = href.replace(window.location.protocol + '//','');
			/* set tooltip info */
			a.store('tip:title','');
			a.store('tip:text','<img src="http://snapcasa.com/get.aspx?code=7572&size=l&wait=0&url=' + url + '" />');
			a.addClass('screenshot');
			/* attach tooltip */
			tips.attach(a);
			/* warning: will result error when no internet available */
		}
	});
}

// http://davidwalsh.name/flip-text
function mootools_fliptext() {
	/* implement flipText for Strings */
	String.implement({
		flipText: function() {
			/* define the characters */
			var charset = {
				a:"\u0250",b:"q",c:"\u0254",d:"p",e:"\u01DD",f:"\u025F",
				g:"\u0183",h:"\u0265",i:"\u0131",j:"\u027E",k:"\u029E",
				l:"l",m:"\u026F",n:"u",o:"o",p:"d",q:"b",r:"\u0279",
				s:"s",t:"\u0287",u:"n",v:"\u028C",w:"\u028D",y:"\u028E",
				z:"z",1:"\u21C2",2:"\u1105",3:"\u1110",4:"\u3123",
				5:"\u078E"   /* or u03DB */ ,6:"9",7:"\u3125",
				8:"8",9:"6",0:"0",".":"\u02D9",",":"'","'":",",
				'"':",,","Ã‚Â´":",","`":",",";":"\u061B","!":"\u00A1",
				"\u00A1":"!","?":"\u00BF","\u00BF":"?",
				"[":"]","]":"[","(":")",")":"(","{":"}","}":"{",
				"<":">",">":"<",_:"\u203E","\r":"\n"};
			var result = '', text = this.toLowerCase(), len = text.length - 1;
			for(var x = len; x >= 0; --x) {
				var c = text.charAt(x);
				var r = charset[c];
				result += r != undefined ? r : c;
			}
			return result;
		}
	});
	
	/* implement flipText for Elements */
	Element.implement({
		flipText: function(recurse) {
			/* get all of the children for this */
			var elements = [this,this.getChildren()].flatten();
			/* make it happen! */
			elements.each(function(el) {
				var children = el.getChildren();
				if(!children.length) {
					/* set the text of the element to this */
					el.set('text',el.get('text').flipText());
				} else if(recurse) {
					children.flipText();
				}
			});
		}
	});
	
	/* usage */
	var content = document.id('lay_content');	
	content.getElements('.entry').each(function(el){el.flipText(true)});
}

// http://davidwalsh.name/mootools-shake
function mootools_shake() {
	var shaker = document.id('system-message');
	
	/* shake baby! */	
  if (shaker!=null && !Browser.Engine.trident)	
  {
	shaker.setStyles({
		opacity: 0,
		display: 'block'
	});
	/* event */
	window.addEvent('load',function() {
		/* fade in */
		var x = function() { shaker.fade('in');};
		x.delay(1000);
		/* shake */
		var y = function() { shaker.shake('margin',5,3); };
		y.periodical(3000);
	});
  }	
}
