var humanBuilder = {} || humanBuilder;
$("body").append(' <div class="builder-tooltip"></div>')
humanBuilder = {
    init: function(json) {
        // object default variables 
        var Vars = {

        }
        this.process(json);
        this.buildHover(json);
        this.toolTip();
    },

    process: function(obj) {
        var _that = this;
        // $('#builder .btn-primary').attr('disabled','disabled');
        $('select.data-sync').on('change', function() {
            var _thatElem = $(this);
            _that.resetActive();
            if ($(this).val() == "default") {
                _that.addDisabled($(this));
                return false;
            }
            _that.addDisabled(_thatElem);
            var dataTarget = $(this).data('target'),
                dataTargetKey = $(this).data('key'),
                _thisVal = $(this).find('option:selected').val();
                dataKey = $(this).find('option:selected').attr('data-key'),
                dataOption= $(this).data('nextoption');
            if ($(this).hasClass('data-parts')) {
                _that.focusArea(dataKey,_thisVal);
            }
            _that.addOptions({
                json: obj,
                data: dataKey,
                target: dataTarget,
                targetKey: dataTargetKey,
                defaultOption:dataOption
            });
        });
        $('select.data-parts').on('change',function(){
          if ($(this).val() == "default") {
            _that.addDisabled($(this));
            return false;
        }else{
            // $('#builder .btn-primary').removeAttr('disabled');
        }
        })
        
        $('.humanbuilder .part').on('touchstart click', function() {
            var targetType = $(this).closest('.body').data('type');
            var targetIndex = $(this).index() + 1;
            $('.data-build option[value="' + targetType + '"]').attr("selected", "selected");
            $('.data-build').trigger('change');
            $('select.data-parts option[value="' + targetIndex + '"]').attr("selected", "selected");
            $('select.data-parts').trigger('change');
        });

        // window.onload = function () {
        //     $('.scrollMe .dropdown-menu').scrollyou();
        //         //- $("ul.dropdown-menu").niceScroll();
        // }
        // $('body').find('.selectpicker.dropdown-menu').jScrollPane();


    },
    bindEvent: function(element){
        $('button.selectpicker').removeAttr('disabled');
        $('select').bind('change');
    },
    resetActive: function(){
        $('.humanbuilder .body .active').removeClass('active');
    },
    addDisabled: function(obj){
        $(obj).closest('fieldset').nextAll('fieldset').find('.selectpicker option[value="default"]').attr("selected", "selected");
        $(obj).closest('fieldset').nextAll('fieldset').find('.selectpicker').selectpicker('refresh');
        $(obj).closest('fieldset').nextAll('fieldset').find('.selectpicker').attr('disabled','disabled');
        // $('#builder .btn-primary').attr('disabled','disabled');
    },
    buildHover: function(jsondata) {
        var jsonData = jsondata;
        $('.humanbuilder .body').each(function() {
            var thisType = $(this).data('type');
            // console.log(genderJson);
            $(this).find('.part').each(function() {
                var _this = $(this);
                var thisIndex = _this.index()+1;
                var bodyPart;
                $.each(jsonData[thisType]['bodypart'],function(index,key){
                    if(key.id==thisIndex){
                        bodyPart = key;
                    }
                });
                var getLength = 0;
                $.each(bodyPart['disease'],function(index){
                    getLength++;
                })
                var markup = '<div class="counter">';
                markup += '<p><span>Geschlecht: </span><strong>'+genderJson[thisType]+'</strong></p>';
                markup += '<p><span>Bereich: </span><strong>'+bodyPart.title+'</strong></p>';
                markup += '<p><span>Krankheitsbilder: </span><strong>'+getLength+'</strong></p>';
                _this.append(markup);
            });
        })
    },
    toolTip: function() {
        
        $('.humanbuilder .part').hover(function(){
            $('.builder-tooltip').html($(this).find('.counter').html());
            $('.builder-tooltip').show();
        },function(){
            $('.builder-tooltip').hide();
            $('.builder-tooltip').html('');
        });
        $('.humanbuilder .female .part').on('mousemove click',function(e){
            //console.log(e);
            $('.builder-tooltip').css({'left':e.pageX+20,'top':e.pageY});
        });
        $('.humanbuilder .male .part').on('mousemove click',function(e){
            var xOffset = 10;
            //console.log(e);
            //$('.builder-tooltip').css({'left':e.pageX+20,'top':e.pageY});
            //
            $('.builder-tooltip').css("top",(e.pageY - xOffset) + "px");
            $('.builder-tooltip').css("left",(e.pageX - $('.builder-tooltip').width() - xOffset - 20) + "px");
            //$('.builder-tooltip').css("background-color","red");
        });
    },
    focusArea: function(dataKey,val) {
        var targetKey = dataKey.split('|'),
            targetBody = targetKey[0],
            targetPart = targetKey[2];
        $('.humanbuilder .part').removeClass('active');
        $('.humanbuilder .' + targetBody + '-body .part-' + val).addClass('active');
    },
    addOptions: function(obj) {
        var newData = obj.data.split('|');
        var optionHtml = '<option value="default">'+obj.defaultOption+'</option>';
        var jsonData = obj.json;

        if (newData) {
            $.each(newData, function(key, val) {
                jsonData = jsonData[val];
            })
        };
        $.each(jsonData, function(key, value) {
            optionHtml += '<option value="' + value.id + '" data-key="' + obj.data + '|' + key + '|' + obj.targetKey + '">' + value.title + '</option>';
        });
        $(obj.target).html(optionHtml);
        $(obj.target).find('select').trigger('change');
        $(obj.target).removeAttr('disabled');
        $('.selectpicker').selectpicker('refresh');
        this.bindEvent();
    }
}

// document ready
$(function() {
    humanBuilder.init(diseaseJson);
})