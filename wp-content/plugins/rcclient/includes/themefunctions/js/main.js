jQuery(document).ready(function($){

    var wnd_popup = $('.window_popup');


    $(".sections").fadeIn('slow');

	$(".freecall-btn").formSlide({
		formObj: $("#free-call")
	});

	$("#freecall-btn-contacts").formSlide({
		formObj: $("#free-call")
	});

	$(".online-message-btn").formSlide({
		formObj: $("#online-message")
	});






    $("#free-call input[name*=phone]").mask("38 (999) 999-99-99");
    $("#free-call form").validate({
        errorElement: '',
        submitHandler: function(form) {
            wnd_popup.hide();

            $(form).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form) {
                    var obj = jQuery.parseJSON(responseText);

                    if(obj.result.type !== undefined && obj.result.type == 'success') {
                        //$("#free-call form").prepend('<div class="success">' + obj.result.text + '</div>');
                        //$(form).find('input[type=text], textarea').val('');
                        if(obj.result.error !== true) {
                            $(form).find('input[type=text], textarea').val('');
                            window.location = obj.result.url + "/request-a-call/";
                        } else {
                            wnd_popup.show();
                            $("#online-message form").prepend('<div class="success">' + obj.result.text + '</div>');
                            $(form).find('input[type=text], textarea').val('');
                        }

                    } else {
                        alert(obj.result.text);
                    }
                       
                }
            });
        }
    });

    $("#faq-form form").validate({
        errorElement: '',
        submitHandler: function(form) {
            
            $(form).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form) {
                    var obj = jQuery.parseJSON(responseText);
                    console.log(obj);
                    if(obj.result.type !== undefined && obj.result.type == 'success') {
                        $("#faq-form form").prepend('<div class="success">Спасибо за проявленный интерес к нашей комапнии! Ваш вопрос успешно отправлен!</div>');
                        $(form).find('input[type=text], textarea').val('');
                    } else {
                        alert(obj.result.text);
                    }
                       
                }
            });
        }
    });

    $("#online-message input[name*=phone]").mask("38 (999) 999-99-99");
    $("#online-message form").validate({

        errorElement: '',
        submitHandler: function(form) {


            wnd_popup.hide();
            $(form).ajaxSubmit({
                success: function(responseText, statusText, xhr, $form) {
                    var obj = jQuery.parseJSON(responseText);
                    console.log(obj);
                    if(obj.result.type !== undefined && obj.result.type == 'success') {
                        if(obj.result.error !== true) {

                            $(form).find('input[type=text], textarea').val('');
                            window.location = obj.result.url + "/thankyou";
                        } else {
                            wnd_popup.show();
                            $("#online-message form").prepend('<div class="success">' + obj.result.text + '</div>');
                            $(form).find('input[type=text], textarea').val('');
                        }
                    } else {
                        wnd_popup.show();
                        alert(obj.result.text);
                    }
                       
                }
            });
        }
    });
    

});

(function($){
  $.fn.extend({ 
     formSlide: function(options)
     {

        var defaults = 
        {
          timeIteration : 50,          // за какой промежуток времени будет перемещена форма до центра
          formObj : $('<div></div>') 
        };

        var options = $.extend(defaults, options);
        

        return this.each(function() {
          	var o = options;
          	var self = o.formObj;

          	self.find('.x').click(function () {
                self.find('input[type=text], textarea').val('');
          		var documentWidth = parseInt($(document).width());
          		self.animate({
					left: (documentWidth + parseInt(self.width())) + 'px'
				}, o.timeIteration);
                            self.find('.success').remove();
				return false;
        	});

	        $(this).live('click', function () {

		        $('.popup').css({
		        	left: '-350px'
		        });
				var documentWidth = parseInt($(document).width());
				var centerPosition = (parseInt(documentWidth / 2)) - (parseInt(self.width()) / 2);
				self.animate({
					left: centerPosition + 'px'
				}, o.timeIteration);
				return false;
	        });

        });
     }
  });
})(jQuery);


(function($) {
    var pasteEventName = ($.browser.msie ? 'paste' : 'input') + ".mask";
    var iPhone = (window.orientation != undefined);

    $.mask = {
        //Predefined character definitions
        definitions: {
            '9': "[0-9]",
            'a': "[A-Za-z]",
            '*': "[A-Za-z0-9]"
        }
    };

    $.fn.extend({
        //Helper Function for Caret positioning
        caret: function(begin, end) {
            if (this.length == 0) return;
            if (typeof begin == 'number') {
                end = (typeof end == 'number') ? end : begin;
                return this.each(function() {
                    if (this.setSelectionRange) {
                        this.focus();
                        this.setSelectionRange(begin, end);
                    } else if (this.createTextRange) {
                        var range = this.createTextRange();
                        range.collapse(true);
                        range.moveEnd('character', end);
                        range.moveStart('character', begin);
                        range.select();
                    }
                });
            } else {
                if (this[0].setSelectionRange) {
                    begin = this[0].selectionStart;
                    end = this[0].selectionEnd;
                } else if (document.selection && document.selection.createRange) {
                    var range = document.selection.createRange();
                    begin = 0 - range.duplicate().moveStart('character', -100000);
                    end = begin + range.text.length;
                }
                return { begin: begin, end: end };
            }
        },
        unmask: function() { return this.trigger("unmask"); },
        mask: function(mask, settings) {
            if (!mask && this.length > 0) {
                var input = $(this[0]);
                var tests = input.data("tests");
                return $.map(input.data("buffer"), function(c, i) {
                    return tests[i] ? c : null;
                }).join('');
            }
            settings = $.extend({
                placeholder: "_",
                completed: null
            }, settings);

            var defs = $.mask.definitions;
            var tests = [];
            var partialPosition = mask.length;
            var firstNonMaskPos = null;
            var len = mask.length;

            $.each(mask.split(""), function(i, c) {
                if (c == '?') {
                    len--;
                    partialPosition = i;
                } else if (defs[c]) {
                    tests.push(new RegExp(defs[c]));
                    if(firstNonMaskPos==null)
                        firstNonMaskPos =  tests.length - 1;
                } else {
                    tests.push(null);
                }
            });

            return this.each(function() {
                var input = $(this);
                var buffer = $.map(mask.split(""), function(c, i) { if (c != '?') return defs[c] ? settings.placeholder : c });
                var ignore = false;  			//Variable for ignoring control keys
                var focusText = input.val();

                input.data("buffer", buffer).data("tests", tests);

                function seekNext(pos) {
                    while (++pos <= len && !tests[pos]);
                    return pos;
                };

                function shiftL(pos) {
                    while (!tests[pos] && --pos >= 0);
                    for (var i = pos; i < len; i++) {
                        if (tests[i]) {
                            buffer[i] = settings.placeholder;
                            var j = seekNext(i);
                            if (j < len && tests[i].test(buffer[j])) {
                                buffer[i] = buffer[j];
                            } else
                                break;
                        }
                    }
                    writeBuffer();
                    input.caret(Math.max(firstNonMaskPos, pos));
                };

                function shiftR(pos) {
                    for (var i = pos, c = settings.placeholder; i < len; i++) {
                        if (tests[i]) {
                            var j = seekNext(i);
                            var t = buffer[i];
                            buffer[i] = c;
                            if (j < len && tests[j].test(t))
                                c = t;
                            else
                                break;
                        }
                    }
                };

                function keydownEvent(e) {
                    var pos = $(this).caret();
                    var k = e.keyCode;
                    ignore = (k < 16 || (k > 16 && k < 32) || (k > 32 && k < 41));

                    //delete selection before proceeding
                    if ((pos.begin - pos.end) != 0 && (!ignore || k == 8 || k == 46))
                        clearBuffer(pos.begin, pos.end);

                    //backspace, delete, and escape get special treatment
                    if (k == 8 || k == 46 || (iPhone && k == 127)) {//backspace/delete
                        shiftL(pos.begin + (k == 46 ? 0 : -1));
                        return false;
                    } else if (k == 27) {//escape
                        input.val(focusText);
                        input.caret(0, checkVal());
                        return false;
                    }
                };

                function keypressEvent(e) {
                    if (ignore) {
                        ignore = false;
                        //Fixes Mac FF bug on backspace
                        return (e.keyCode == 8) ? false : null;
                    }
                    e = e || window.event;
                    var k = e.charCode || e.keyCode || e.which;
                    var pos = $(this).caret();

                    if (e.ctrlKey || e.altKey || e.metaKey) {//Ignore
                        return true;
                    } else if ((k >= 32 && k <= 125) || k > 186) {//typeable characters
                        var p = seekNext(pos.begin - 1);
                        if (p < len) {
                            var c = String.fromCharCode(k);
                            if (tests[p].test(c)) {
                                shiftR(p);
                                buffer[p] = c;
                                writeBuffer();
                                var next = seekNext(p);
                                $(this).caret(next);
                                if (settings.completed && next == len)
                                    settings.completed.call(input);
                            }
                        }
                    }
                    return false;
                };

                function clearBuffer(start, end) {
                    for (var i = start; i < end && i < len; i++) {
                        if (tests[i])
                            buffer[i] = settings.placeholder;
                    }
                };

                function writeBuffer() { return input.val(buffer.join('')).val(); };

                function checkVal(allow) {
                    //try to place characters where they belong
                    var test = input.val();
                    var lastMatch = -1;
                    for (var i = 0, pos = 0; i < len; i++) {
                        if (tests[i]) {
                            buffer[i] = settings.placeholder;
                            while (pos++ < test.length) {
                                var c = test.charAt(pos - 1);
                                if (tests[i].test(c)) {
                                    buffer[i] = c;
                                    lastMatch = i;
                                    break;
                                }
                            }
                            if (pos > test.length)
                                break;
                        } else if (buffer[i] == test[pos] && i!=partialPosition) {
                            pos++;
                            lastMatch = i;
                        }
                    }
                    if (!allow && lastMatch + 1 < partialPosition) {
                        input.val("");
                        clearBuffer(0, len);
                    } else if (allow || lastMatch + 1 >= partialPosition) {
                        writeBuffer();
                        if (!allow) input.val(input.val().substring(0, lastMatch + 1));
                    }
                    return (partialPosition ? i : firstNonMaskPos);
                };

                if (!input.attr("readonly"))
                    input
                        .one("unmask", function() {
                            input
                                .unbind(".mask")
                                .removeData("buffer")
                                .removeData("tests");
                        })
                        .bind("focus.mask", function() {
                            focusText = input.val();
                            var pos = checkVal();
                            writeBuffer();
                            setTimeout(function() {
                                if (pos == mask.length)
                                    input.caret(0, pos);
                                else
                                    input.caret(pos);
                            }, 0);
                        })
                        .bind("blur.mask", function() {
                            checkVal();
                            if (input.val() != focusText)
                                input.change();
                        })
                        .bind("keydown.mask", keydownEvent)
                        .bind("keypress.mask", keypressEvent)
                        .bind(pasteEventName, function() {
                            setTimeout(function() { input.caret(checkVal(true)); }, 0);
                        });

                checkVal(); //Perform initial check for existing values
            });
        }
    });
})(jQuery);


