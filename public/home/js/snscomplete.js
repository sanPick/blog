//计算字符串长度
String.prototype.strLen = function() {
    var len = 0;
    for (var i = 0; i < this.length; i++) {
        if (this.charCodeAt(i) > 255 || this.charCodeAt(i) < 0) len += 2; else len ++;
    }
    return len;
}

//将字符串拆成字符，并存到数组中
String.prototype.strToChars = function(){
    var chars = new Array();
    for (var i = 0; i < this.length; i++){
        chars[i] = [this.substr(i, 1), this.isCHS(i)];
    }
    String.prototype.charsArray = chars;
    return chars;
}

//判断某个字符是否是汉字
String.prototype.isCHS = function(i){
    if (this.charCodeAt(i) > 255 || this.charCodeAt(i) < 0)
        return true;
    else
        return false;
}

//截取字符串（从start字节到end字节）
String.prototype.subCHString = function(start, end){
    var len = 0;
    var str = "";
    this.strToChars();
    for (var i = 0; i < this.length; i++) {
        if(this.charsArray[i][1])
            len += 2;
        else
            len++;
        if (end < len)
            return str;
        else if (start < len)
            str += this.charsArray[i][0];
    }
    return str;
}

//截取字符串（从start字节截取length个字节）
String.prototype.subCHStr = function(start, length){
    return this.subCHString(start, start + length);
}

"object" != typeof JSON && (JSON = {}),
	function() {
		"use strict";

		function f(a) {
			return 10 > a ? "0" + a : a
		}

		function quote(a) {
			return escapable.lastIndex = 0, escapable.test(a) ? '"' + a.replace(escapable, function(a) {
				var b = meta[a];
				return "string" == typeof b ? b : "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
			}) + '"' : '"' + a + '"'
		}

		function str(a, b) {
			var c, d, e, f, g, h = gap,
				i = b[a];
			switch (i && "object" == typeof i && "function" == typeof i.toJSON && (i = i.toJSON(a)), "function" == typeof rep && (i = rep.call(b, a, i)), typeof i) {
				case "string":
					return quote(i);
				case "number":
					return isFinite(i) ? String(i) : "null";
				case "boolean":
				case "null":
					return String(i);
				case "object":
					if (!i) return "null";
					if (gap += indent, g = [], "[object Array]" === Object.prototype.toString.apply(i)) {
						for (f = i.length, c = 0; f > c; c += 1) g[c] = str(c, i) || "null";
						return e = 0 === g.length ? "[]" : gap ? "[\n" + gap + g.join(",\n" + gap) + "\n" + h + "]" : "[" + g.join(",") + "]", gap = h, e
					}
					if (rep && "object" == typeof rep)
						for (f = rep.length, c = 0; f > c; c += 1) "string" == typeof rep[c] && (d = rep[c], e = str(d, i), e && g.push(quote(d) + (gap ? ": " : ":") + e));
					else
						for (d in i) Object.prototype.hasOwnProperty.call(i, d) && (e = str(d, i), e && g.push(quote(d) + (gap ? ": " : ":") + e));
					return e = 0 === g.length ? "{}" : gap ? "{\n" + gap + g.join(",\n" + gap) + "\n" + h + "}" : "{" + g.join(",") + "}", gap = h, e
			}
		}
		"function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function() {
			return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
		}, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
			return this.valueOf()
		});
		var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
			escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
			gap, indent, meta = {
				"\b": "\\b",
				"	": "\\t",
				"\n": "\\n",
				"\f": "\\f",
				"\r": "\\r",
				'"': '\\"',
				"\\": "\\\\"
			},
			rep;
		"function" != typeof JSON.stringify && (JSON.stringify = function(a, b, c) {
			var d;
			if (gap = "", indent = "", "number" == typeof c)
				for (d = 0; c > d; d += 1) indent += " ";
			else "string" == typeof c && (indent = c);
			if (rep = b, b && "function" != typeof b && ("object" != typeof b || "number" != typeof b.length)) throw new Error("JSON.stringify");
			return str("", {
				"": a
			})
		}), "function" != typeof JSON.parse && (JSON.parse = function(text, reviver) {
			function walk(a, b) {
				var c, d, e = a[b];
				if (e && "object" == typeof e)
					for (c in e) Object.prototype.hasOwnProperty.call(e, c) && (d = walk(e, c), void 0 !== d ? e[c] = d : delete e[c]);
				return reviver.call(a, b, e)
			}
			var j;
			if (text = String(text), cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function(a) {
					return "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
				})), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({
				"": j

			}, "") : j;
			throw new SyntaxError("JSON.parse")
		})
	}();
!function($){
    var fn;
    function validate(options,form){
        this.fieldState={};
        this.rules={};
        this.$form=$(form);
        this.init(options);
    }
    
   
    //fn=validate.prototype;


    $.extend(validate.prototype,{
        options:{
            defaultBlur:function(e){
                $(this).validate(e);
            },
            defaultKeyup:function(e){
                $(this).validate(e);
            },
            defaultFocus:function(e){

            }
        }, 

        defaultRules:{
            user_name:function(cb,v){
                var r=/^[a-zA-Z0-9_]{3,16}$/;
                if(!v.length){
                    return "用户名不能为空！";
                }
                if(!r.test(v)){
                    return "用户名格式不正确！"
                }
            },
            password:function(cb,v){
                var r=/^[\w~`!@#$%&*.()_+<>?:"'+*\/\-\^\\\][{}]{6,16}$/;
                if(!v.length){
                    return "密码不能为空！";
                }
                if(!r.test(v)){
                    return "请输入6-16位密码，区分大小写，不能使用空格！";
                }
            },
            equalTo:{
                rule:function(v,target){
                    var tv=$(this.form).find("[name='"+target+"']").val();
                    tv=$.trim(tv);
                    if(v!==tv){
                        return "两次密码输入不一致！";

                    }
                },
                force:1
            }

        },
        init:function(options){
            var fields=options.fields,
                _this=this,
                events={error:1,valid:1,before:1,after:1},
                key,rules,i,len,rule,fieldEvents,force,field;

            for(key in events){
                if(options["on"+key]){
                    this.on("vd."+key,options["on"+key]);
                    delete options["on"+key];
                }
            }

            var vl = this.$form.find("[data-validate]").length;
            this.$form.find("[data-validate]").each(function(i,el){
                var $this=$(this),
                    n=$(this).attr("name");

                if(!n) return;
                _this.rules[n]=(_this.rules[n]||(_this.rules[n]=[])).concat($this.attr("data-validate").split("|"));
            });



            for(key in fields){
                if(rules=fields[key].rules){
                    this.rules[key]=(this.rules[key]||(this.rules[key]=[])).concat(rules);
                }
            }

            
            for(key in this.rules){
                rules=this.rules[key];
                force=0;
                for(i=0,len=rules.length;i<len;i++){
                    rule=rules[i];
                    if(typeof rule==="string"){
                        rules.splice(i,1,this.defaultRules[rule]);
                    }
                    force=rules[i].force;
                }
                
                force&&(rules.force=1);

                field=fields[key]||{};
                fieldEvents={
                    blur:field.blur||this.options.defaultBlur,
                    keyup:field.keyup||this.options.defaultKeyup,
                    focus:field.focus||this.options.defaultFocus
                }
                for(i in events){
                    if(field["on"+i]){
                        fieldEvents["vd."+i]=field["on"+i];
                    }
                    
                }
                
                
                this.$form.find("[name='"+key+"']").on(fieldEvents);

                this.fieldState[key]=0;

            }
            delete options.fields;
          
        },

    
        valid:function(el,force){
            var name=$(el).attr("name"),
                val=$(el).val();
            if(this.fieldState[name]===0&&!val){
                return ;
            }
            if(this.fieldState[name]===0&&force&&force.type=="keyup"){
                return ;
            }

            //this.trigger("vd.error.form");
            this._valid(el,force);
        },

        _valid:function(el,force){
            //this.trigger($.Event("vd.before",{_form:this.$form[0]}));
            if(el){
                this.check(el,force);
            }
            else{
                for(var key in this.rules){
                    this.check(key,0);
                }
            }
        },

        check:function(el,force){
            var name,$el,rules,rule,val,index,len,_this;
            if(typeof el==="string"){
                name=el;
                $el=this.$form.find("[name='"+el+"']");
            }
            else{
                $el=$(el);
                name=$el.attr("name");
            }

            if(!name) return;

            //val=$.trim($el.val());
            val=$el.val();
            rules=this.rules[name];
            //force validate may configed or trigger by field validate 
            //console.dir(rules)
            //console.log(rules._value,name,force,rules.force);
            if(rules._value===val&&!force&&!rules.force) return this.fieldState[name];
            //begin check rules;
            //this.trigger($.Event("vd.before",{_relateField:$el[0]}))

            $el.trigger($.Event("vd.before",{_relateField:$el[0]}))
            this.fieldState[name]="pending";
            rules._value=val;
            if(rules.xhr){
                rules.xhr.abort();
                delete rules.xhr;
            }
            
            index=0;
            len=rules.length;
            _this=this;

            next();
            function next(){
                var r,fn;
                rule=rules[index++];
                fn=rule.rule||rule;
                if(typeof fn=="function"){
                    r=fn.call($el[0],handleResult,val);
                    if(typeof r==="object"){
                        rules.xhr=r;
                    }
                    else if(r!=="pending"){
                        handleResult(r);
                    }
                }
            }

            function handleResult(result){
                //console.log("handleResult",result)
                if(result!==undefined&&result!==true){
                    _this.fieldState[name]=false;
                    $el.trigger($.Event("vd.error",{_relateField:$el[0],tip:result||rule.tip||""}));
                    $el.trigger($.Event("vd.after",{_relateField:$el[0]}));
                }
                else if(index===len){
                    //_this.trigger($.Event("vd.valid",{_relateField:$el[0],tip:result||rules.tip||""}));
                    _this.fieldState[name]=true;
                    $el.trigger($.Event("vd.valid",{_relateField:$el[0]}));
                    $el.trigger($.Event("vd.after",{_relateField:$el[0]}));
                }
                else{
                    next();
                }
            }
        },

        getFullState:function(){
            var finish=true,key;
            for(key in this.fieldState){
                if(this.fieldState[key]!==true){
                    finish=this.fieldState[key];
                    if(finish===false)
                        break;
                }
            }
            return finish;
        },
        validate:function(cb){
            var st;
            
            //console.log("getFullState:",st);
            this._valid();
            st=this.getFullState();

            if(st==="pending"){
                if(!this.binded){
                    this.binded=1;
                    this.onerror=[];
                    this.onsuccess=[];

                    var fn=$.proxy(function(e){
                        this.fire("error");
                    },this);
                    this.one("vd.error.form",fn);
                    this.one("vd.before.errror",fn);
                    
                    this.on("vd.valid.success",$.proxy(function(){
                        if(this.getFullState()===true){
                            this.fire("success");
                        }
                    },this));
                }

                //this.one("vd.form.error",cb.error);
                //this.one("vd.form.success",cb.success);
                this.onerror.push(cb.error);
                this.onsuccess.push(cb.success);
               // console.dir(this.onsuccess);
                delete cb.error;
                delete cb.success;
            }
            else if(st===true){
                cb.success.call(this.$form[0],this.getValues());
            }
            else{
                cb.error.call(this.$form[0],this.getValues());
            }
        },
        fire:function(f){
            var a=this["on"+f],
                i=0,
                len,
                fun,val;
     
           
            if(!a) return;
            len=a.length
            val=this.getValues();
            for(;i<len;i++){
                a[i].call(this.$form[0],val);
            }
            this.clean();
        },
        clean:function(){
            this.binded=0;
            this.onerror=this.onsuccess=null;
            //this.off("vd.form.error");
            this.off("vd.before.errror");
            this.off("vd.form.success");
            this.off("vd.error.form");
            //this.off("vd.valid.success");
        },
        getValues:function(){
            var o={},k;
            for(k in this.rules){
                o[k]=this.rules[k]._value;
            }
            return o;
        }
    })
    
    $.each("on,off,trigger,one".split(","),function(i,key){
        validate.prototype[key]=function(){
            this.$form[key].apply(this.$form,arguments);
        }
    });

    $.fn.validate=function(cb){
        var vd;
        var _this=this[0];
        var tag=_this.tagName.toLowerCase();
        if(tag!="form"){
            vd=$(_this.form).data("_validater")
            if(vd){
                vd.valid(_this,cb);
            }
        }
        else if(vd=$(this).eq(0).data("_validater")){
            vd.validate(cb);
        }
        
    }
    $.fn.validateSetup=function(options){
        $(this).each(function(){
            $(this).data("_validater")||$(this).data("_validater",new validate(options,this));
        });
        return this;
    }
}($)
!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);

!function ($) {

  "use strict"; // jshint ;_;


 /* MODAL CLASS DEFINITION
  * ====================== */

  var Modal = function (element, options) {
    this.options = options
    this.$element = $(element)
      .delegate('[data-dismiss="modal"]', 'click.dismiss.modal', $.proxy(this.hide, this))
    this.options.remote && this.$element.find('.modal-body').load(this.options.remote)
  }

  Modal.prototype = {

      constructor: Modal

    , toggle: function () {
        return this[!this.isShown ? 'show' : 'hide']()
      }

    , show: function () {
        var that = this
          , e = $.Event('show')

        this.$element.trigger(e)

        if (this.isShown || e.isDefaultPrevented()) return

        this.isShown = true

        this.escape()

        this.backdrop(function () {
          var transition = $.support.transition && that.$element.hasClass('fade')

          if (!that.$element.parent().length) {
            that.$element.appendTo(document.body) //don't move modals dom position
          }

          that.$element.show()

          if (transition) {
            that.$element[0].offsetWidth // force reflow
          }

          that.$element
            .addClass('in')
            .attr('aria-hidden', false)

          that.enforceFocus()

          transition ?
            that.$element.one($.support.transition.end, function () { that.$element.focus().trigger('shown') }) :
            that.$element.focus().trigger('shown')

        })
      }

    , hide: function (e) {
        e && e.preventDefault()

        var that = this

        e = $.Event('hide')

        this.$element.trigger(e)

        if (!this.isShown || e.isDefaultPrevented()) return

        this.isShown = false

        this.escape()

        $(document).off('focusin.modal')

        this.$element
          .removeClass('in')
          .attr('aria-hidden', true)

        $.support.transition && this.$element.hasClass('fade') ?
          this.hideWithTransition() :
          this.hideModal()
      }

    , enforceFocus: function () {
        var that = this
        $(document).on('focusin.modal', function (e) {
          if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
            that.$element.focus()
          }
        })
      }

    , escape: function () {
        var that = this
        if (this.isShown && this.options.keyboard) {
          this.$element.on('keyup.dismiss.modal', function ( e ) {
            //e.which == 27 && that.hide()
          })
        } else if (!this.isShown) {
          this.$element.off('keyup.dismiss.modal')
        }
      }

    , hideWithTransition: function () {
        var that = this
          , timeout = setTimeout(function () {
              that.$element.off($.support.transition.end)
              that.hideModal()
            }, 500)

        this.$element.one($.support.transition.end, function () {
          clearTimeout(timeout)
          that.hideModal()
        })
      }

    , hideModal: function () {
        var that = this
        this.$element.hide()
        this.backdrop(function () {
          that.removeBackdrop()
          that.$element.trigger('hidden')
        })
      }

    , removeBackdrop: function () {
        this.$backdrop && this.$backdrop.remove()
        this.$backdrop = null
      }

    , backdrop: function (callback) {
        var that = this
          , animate = this.$element.hasClass('fade') ? 'fade' : ''

        if (this.isShown && this.options.backdrop) {
          var doAnimate = $.support.transition && animate

          this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
            .appendTo(document.body)

          this.$backdrop.click(
            this.options.backdrop == 'static' ?
              $.proxy(this.$element[0].focus, this.$element[0])
            : $.proxy(this.hide, this)
          )

          if (doAnimate) this.$backdrop[0].offsetWidth // force reflow

          this.$backdrop.addClass('in')

          if (!callback) return

          doAnimate ?
            this.$backdrop.one($.support.transition.end, callback) :
            callback()

        } else if (!this.isShown && this.$backdrop) {
          this.$backdrop.removeClass('in')

          $.support.transition && this.$element.hasClass('fade')?
            this.$backdrop.one($.support.transition.end, callback) :
            callback()

        } else if (callback) {
          callback()
        }
      }
  }


 /* MODAL PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.modal

  $.fn.modal = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('modal')
        , options = $.extend({}, $.fn.modal.defaults, $this.data(), typeof option == 'object' && option)
      if (!data) $this.data('modal', (data = new Modal(this, options)))
      if (typeof option == 'string') data[option]()
      else if (options.show) data.show()
    })
  }

  $.fn.modal.defaults = {
      backdrop: true
    , keyboard: true
    , show: true
  }

  $.fn.modal.Constructor = Modal


 /* MODAL NO CONFLICT
  * ================= */

  $.fn.modal.noConflict = function () {
    $.fn.modal = old
    return this
  }


 /* MODAL DATA-API
  * ============== */

  $(document).on('click.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this = $(this)
      , href = $this.attr('href')
      , $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) //strip for ie7
      , option = $target.data('modal') ? 'toggle' : $.extend({ remote:!/#/.test(href) && href }, $target.data(), $this.data())

    e.preventDefault()

    $target
      .modal(option)
      .one('hide', function () {
        $this.focus()
      })
  })

}(window.jQuery);

!function () {

  "use strict"; // jshint ;_;


 /* ALERT CLASS DEFINITION
  * ====================== */

  var dismiss = '[data-dismiss="alert"]'
    , Alert = function (el) {
        $(el).on('click', dismiss, this.close)
      }

  Alert.prototype.close = function (e) {
    var $this = $(this)
      , selector = $this.attr('data-target')
      , $parent

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
    }

    $parent = $(selector)

    e && e.preventDefault()

    $parent.length || ($parent = $this.hasClass('alert') ? $this : $this.parent())

    $parent.trigger(e = $.Event('close'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      $parent
        .trigger('closed')
        .remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent.on($.support.transition.end, removeElement) :
      removeElement()
  }


 /* ALERT PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.alert

  $.fn.alert = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('alert')
      if (!data) $this.data('alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  $.fn.alert.Constructor = Alert


 /* ALERT NO CONFLICT
  * ================= */

  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }


 /* ALERT DATA-API
  * ============== */

  $(document).on('click.alert.data-api', dismiss, Alert.prototype.close)

}();

!function ($) {

  "use strict"; // jshint ;_;


 /* BUTTON PUBLIC CLASS DEFINITION
  * ============================== */

  var Button = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.button.defaults, options)
  }

  Button.prototype.setState = function (state) {
    var d = 'disabled'
      , $el = this.$element
      , data = $el.data()
      , val = $el.is('input') ? 'val' : 'html'

    state = state + 'Text'
    data.resetText || $el.data('resetText', $el[val]())

    $el[val](data[state] || this.options[state])

    // push to event loop to allow forms to submit
    setTimeout(function () {
      state == 'loadingText' ?
        $el.addClass(d).attr(d, d) :
        $el.removeClass(d).removeAttr(d)
    }, 0)
  }

  Button.prototype.reset=function(){
    var $el=this.$element,
        m=$el.is('input') ? 'val' : 'html',
        data= $el.data('resetText');
      $el[m](data);
      $el.removeClass("disabled").removeAttr("disabled");
  }
  Button.prototype.toggle = function () {
    var $parent = this.$element.closest('[data-toggle="buttons-radio"]')

    $parent && $parent
      .find('.active')
      .removeClass('active')

    this.$element.toggleClass('active')
  }


 /* BUTTON PLUGIN DEFINITION
  * ======================== */

  var old = $.fn.button

  $.fn.button = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('button')
        , options = typeof option == 'object' && option
      if (!data) $this.data('button', (data = new Button(this, options)))
      if(typeof option==="string"){
        if (option == 'toggle') data.toggle()
        else if(option=='reset') data.reset()
        else if (option) data.setState(option)
      }
      
    })
  }

  $.fn.button.defaults = {
    loadingText: 'loading...'
  }

  $.fn.button.Constructor = Button


 /* BUTTON NO CONFLICT
  * ================== */

  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }


 /* BUTTON DATA-API
  * =============== */

  $(document).on('click.button.data-api', '[data-toggle^=button]', function (e) {
    var $btn = $(e.target)
    if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
    $btn.button('toggle')
  })

}(window.jQuery)
;(function(window, document, $) {
	// Opera Mini v7 doesn’t support placeholder although its DOM seems to indicate so
	var isOperaMini = Object.prototype.toString.call(window.operamini) == '[object OperaMini]';
	var isInputSupported = 'placeholder' in document.createElement('input') && !isOperaMini;
	var isTextareaSupported = 'placeholder' in document.createElement('textarea') && !isOperaMini;
	var prototype = $.fn;
	var valHooks = $.valHooks;
	var propHooks = $.propHooks;
	var hooks;
	var placeholder;

	if (isInputSupported && isTextareaSupported) {

		placeholder = prototype.placeholder = function() {
			return this;
		};

		placeholder.input = placeholder.textarea = true;

	} else {

		placeholder = prototype.placeholder = function() {
			var $this = this;
			$this
				.filter((isInputSupported ? 'textarea' : ':input') + '[placeholder]')
				.not('.placeholder')
				.bind({
					'focus.placeholder': clearPlaceholder,
					'blur.placeholder': setPlaceholder
				})
				.data('placeholder-enabled', true)
				.trigger('blur.placeholder');
			return $this;
		};

		placeholder.input = isInputSupported;
		placeholder.textarea = isTextareaSupported;

		hooks = {
			'get': function(element) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value;
				}

				return $element.data('placeholder-enabled') && $element.hasClass('placeholder') ? '' : element.value;
			},
			'set': function(element, value) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value = value;
				}

				if (!$element.data('placeholder-enabled')) {
					return element.value = value;
				}
				if (value == '') {
					element.value = value;
					// Issue #56: Setting the placeholder causes problems if the element continues to have focus.
					if (element != safeActiveElement()) {
						// We can't use `triggerHandler` here because of dummy text/password inputs :(
						setPlaceholder.call(element);
					}
				} else if ($element.hasClass('placeholder')) {
					clearPlaceholder.call(element, true, value) || (element.value = value);
				} else {
					element.value = value;
				}
				// `set` can not return `undefined`; see http://jsapi.info/jquery/1.7.1/val#L2363
				return $element;
			}
		};

		if (!isInputSupported) {
			valHooks.input = hooks;
			propHooks.value = hooks;
		}
		if (!isTextareaSupported) {
			valHooks.textarea = hooks;
			propHooks.value = hooks;
		}

		$(function() {
			// Look for forms
			$(document).delegate('form', 'submit.placeholder', function() {
				// Clear the placeholder values so they don't get submitted
				var $inputs = $('.placeholder', this).each(clearPlaceholder);
				setTimeout(function() {
					$inputs.each(setPlaceholder);
				}, 10);
			});
		});

		// Clear placeholder values upon page reload
		$(window).bind('beforeunload.placeholder', function() {
			return ;
			$('.placeholder').each(function() {
				this.value = '';
			});
		});

	}

	function args(elem) {
		// Return an object of element attributes
		var newAttrs = {};
		var rinlinejQuery = /^jQuery\d+$/;
		$.each(elem.attributes, function(i, attr) {
			if (attr.specified && !rinlinejQuery.test(attr.name)) {
				newAttrs[attr.name] = attr.value;
			}
		});
		return newAttrs;
	}

	function clearPlaceholder(event, value) {
		var input = this;
		var $input = $(input);
		if ((input.value == $input.attr('placeholder')||$input.data('placeholder-password')) && $input.hasClass('placeholder')) {
			if ($input.data('placeholder-password')) {
				$input = $input.hide().next().show().attr('id', $input.removeAttr('id').data('placeholder-id')).focus();
				// If `clearPlaceholder` was called from `$.valHooks.input.set`
				if (event === true) {
					return $input[0].value = value;
				}
				$input.focus();
			} else {
				input.value = '';
				$input.removeClass('placeholder');
				input == safeActiveElement() && input.select();
			}
		}
	}

	function setPlaceholder() {
		var $replacement;
		var input = this;
		var $input = $(input);
		var id = this.id;
		if (input.value == ''||input.value == $input.attr('placeholder')) {
			if (input.type == 'password') {
				if (!$input.data('placeholder-textinput')) {
					try {
						$replacement = $input.clone().attr({ 'type': 'text' });
						//fix ie6.7
						$replacement[0].type="text";
					} catch(e) {
						$replacement = $('<input>').attr($.extend(args(this), { 'type': 'text' }));
					}
					$replacement
						.removeAttr('name')
						.data({
							'placeholder-password': $input,
							'placeholder-id': id
						})
						.bind('focus.placeholder', clearPlaceholder);
					$input
						.data({
							'placeholder-textinput': $replacement,
							'placeholder-id': id
						})
						.before($replacement);
				}
				$input = $input.removeAttr('id').hide().prev().attr('id', id).show();
				// Note: `$input[0] != input` now!
			}
			$input.addClass('placeholder');
			$input[0].value = $input.attr('placeholder');
		} else {
			$input.removeClass('placeholder');
		}
	}

	function safeActiveElement() {
		// Avoid IE9 `document.activeElement` of death
		// https://github.com/mathiasbynens/jquery-placeholder/pull/99
		try {
			return document.activeElement;
		} catch (err) {}
	}

}(this, document, jQuery));

var MessageBox = (function(){
	var tpl={
		info:'<div class="mmsg-box mmsg-box-info"><div class="mmsg-content"><i class="mmsg-icon"></i><p></p></div><div class="mmsg-background"></div></div>',
		error:'<div class="mmsg-box mmsg-box-error"><div class="mmsg-content"><i class="mmsg-icon"></i><p></p></div><div class="mmsg-background"></div></div>'
	}


	function show(s,m,t){
		var tl=tpl[s],$tpl;
		if(!tl) return ;
		$tpl=$(tl);
		$tpl.find(".mmsg-content p").text(m)
		$tpl.appendTo("body");
		$tpl.css({marginTop:$tpl.height()/-2,marginLeft:Math.min(600,$tpl.width())/-2}).fadeIn().delay(t||2000).fadeOut(function(){
			//$tpl.remove();
		});
	}
	return {
		info:function(m,t){
			show("info",m,t);
		},
		error:function(m,t){
			show("error",m,t);
		}
	}
})();
(function() {
	var mbox = MessageBox;
    var browser_key = ""
    new Fingerprint2().get(function(result){
      browser_key=result; 
    });

	window.resizeTo(700, 600);

	var vdFields = {
		password: {
			blur: function(e) {
				$(this).next(".tips").find("span").hide();
				$(this).validate(e);
			},
			focus: function() {
				$(this).next(".tips").find("span").show();
			}
		}
	}
	vdFields["username"] = {
		blur: function(e) {
			$(this).next(".tips").find("span").hide();
			$(this).validate(e);
		},
		focus: function() {
			$(this).next(".tips").find("span").show();
		}
	};
	vdFields["username"].rules = [{
		rule: function(cb, v) {
			return $.ajax({
				url: imoocSSO.checkUserName,
                method:"get",
                data:{username:v},
                dataType:"json",
				success:function(data){
					if(data.status==10001){
						cb();
					}
					else{
						cb(data.msg)
					}
				}
			})
		}
	}]


	function formOnerror(e) {
		var $t, $d;
		if (e._relateField && e.tip) {
			$t = $(e._relateField);
			$t.addClass("ipt-error").next(".tips").html(e.tip).addClass("tips-error");
			($d = $t.data("placeholder-textinput")) && $d.addClass("ipt-error");
		}
	}

	function formOnvalid(e) {
		var $t, $d;
		if (e._relateField) {
			$t = $(e._relateField);
			$t.removeClass("ipt-error").next(".tips").removeClass("tips-error").empty();
			($d = $t.data("placeholder-textinput")) && $d.removeClass("ipt-error");
		}
	}


	$("#cprofile").validateSetup({
		fields: vdFields,
		onerror: formOnerror,
		onvalid: formOnvalid,
		onbefore: function() {
			$("#cprofile-globle-error").removeClass("tips-error").html("");
		}
	});

	$("#cprofile input[placeholder]").placeholder();

	function resetButton() {
		setTimeout(function() {
			$("#cprofile-submit-btn").button("reset");
		}, 1)
	}


	$("#cprofile-submit-btn").button({
		loadingText: "正在提交..."
	}).click(function() {
		var $this = $(this),
			$form, $s;
		if ($this.hasClass("disabled")) {
			return;
		}
		$this.button("loading");
		$form = $this.closest("form");

		$form.validate({
			success: function(vals) {

				$.ajax({
					url: imoocSSO.tpRegister,
					data: $.extend({
                        browser_key:browser_key
                    },vals),
					type: "post",
					dataType: "json",
					success: function(data) {
						if (data.status == 10001) {
        					imoocSSO.setCrossDomainCookie(data.data.url);
        					imoocSSO.crossDomainAction(function(){
        						window.location="/perfect"
        					})							
						} else {
							//console.log(data.msg);
                            if(data.status == 60008||data.status == 60001||data.status == 60002||data.status == 60010){
                                window.location="/passport/user/tperror?status="+data.status
                            }else{
                                $("#cprofile-globle-error").addClass("tips-error").html(data.msg);
                                resetButton();                                
                            }

						}
						
					},
					error: function() {
						$("#cprofile-globle-error").addClass("tips-error").html("服务错误，稍后重试");
						resetButton();
					}
				});

			},
			error: function() {
				resetButton();
			}
		});


	});


	$('#js-bind-btn').click(function() {
		var $this = $(this),
			$form;
		if ($this.hasClass('loading')) return;

		$this.addClass('loading').val('绑定中...');
		$form = $this.closest('form');
		$form.validateSetup({
			fields: {
				pwd: {
					rules: [function(cb, v) {
						if (!v) {
							return "密码不能为空！";
						}
					}],
					keyup: function(e) {
						if (e.keyCode == "13") {
							$("#signin-btn").trigger("click");
						} else {
							$(this).validate();
						}

					}
				}
			},
			onerror: function(e) {
				var $t, $d;
				if (e._relateField && e.tip) {
					$t = $(e._relateField);
					$t.addClass("ipt-error").next(".tips").html(e.tip).addClass("tips-error");
					($d = $t.data("placeholder-textinput")) && $d.addClass("ipt-error");
				}
				$("#js-bind-global-msg").removeClass("tips-error").empty();
			},
			onvalid: function(e) {
				var $t, $d;
				if (e._relateField) {
					$t = $(e._relateField);
					$t.removeClass("ipt-error").next(".tips").removeClass("tips-error").empty();
					($d = $t.data("placeholder-textinput")) && $d.removeClass("ipt-error");
				}
				$("#js-bind-global-msg").removeClass("tips-error").empty();
			}
		});
		$form.validate({
			success: function(vals) {

				$.ajax({
					url: imoocSSO.tpBind,
					data: {
						username: vals.user_name,
						password: vals.pwd
					},
					type: "post",
					dataType: "json",
					success: function(data) {
                        if (data.status == 10001) {
                            imoocSSO.setCrossDomainCookie(data.data.url);
                            imoocSSO.crossDomainAction(function(){
                                window.location="/passport/user/tpbindsuccess"
                            })                          
                        } else {
                            if(data.status == 60008||data.status == 60001||data.status == 60002||data.status == 60010){
                                window.location="/passport/user/tperror?status="+data.status
                            }else{
                                $("#js-bind-global-msg").addClass("tips-error").html(data.msg);
                                $this.removeClass('loading').val('绑定');                           
                            }
                        }
					},
					error: function() {
						$("#js-bind-global-msg").addClass("tips-error").html("服务错误，稍后重试");
                        $this.removeClass('loading').val('绑定');
					}
				});

			},
			error: function() {
				$this.removeClass('loading').val('绑定');
			}
		});
	});


	$('#js-sns-tab').on('click', 'span', function() {
		var $this = $(this);
		if (!$this.hasClass('sns-tab-active')) {
			$this.addClass('sns-tab-active').siblings('.sns-tab-active').removeClass('sns-tab-active')
				.each(function() {
					$('#' + $(this).attr('data-target')).hide();
				});
			$('#' + $this.attr('data-target')).show();
		}
	});
})();