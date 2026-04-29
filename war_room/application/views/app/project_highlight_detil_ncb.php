<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>

<script type="text/javascript">
  jQuery(document).ready(function($){

    $('#vlsxloading').hide();
    var timelineComponents, timelineTotWidth, cbimg;

    $.ajax({
        url : 'json-api/KinerjaProyekAcn_json/highlightdetilnewcb?v=<?=$v?>',
        type : 'GET',
        dataType : 'text',
        success : function(text) {
            text= JSON.parse(text)
            xdata= text["xdata"];
            $('#location_name').html(text["location_name"]);
            $('#cod_ruptl').html(text["cod_ruptl"]);
            $('#KontraktorEpc').html(text["KontraktorEpc"]);
            $('#project_name').html(text["project_name"]);
            $('#power_capacity').html(text["power_capacity"]);
            $('#project_value').html(text["project_value"]);
            $('#temp_date').html(text["temp_date"]);
            $('#temp_content').html(text["temp_content"]);

            // cbimg= decodeURI(text["cbimg"]);
            // console.log(cbimg);

            $('#vlsxloading').hide();
            // $(".html5gallery").unitegallery();
            // $.getScript("lib/html5_gallery_free/html5gallery/html5gallery.js");

            var timelines = $('.cd-horizontal-timeline');
            // console.log(timelines.find('.events-wrapper'));
            (timelines.length > 0) && initTimeline(timelines, xdata,1);

            /*setTimeout(
            function() 
            {
                  setcoba();
            }, 1);*/

            // untuk triger ke last data
            // $(".clastdata").click();

        }
    });

    function setcoba()
    {      
      $(".next").click();
      x=$( ".next.inactive" );
      if(x['length']==0){
        setTimeout(
        function() 
        {
          setcoba();
          //do something special
        }, 1);
      }
    }

    eventsMinDistance = 60;

    function initTimeline(timelines, xdata, start) {
      timelines.each(function(){
        var timeline = $(this),
        timelineComponents = {};
        //cache timeline components 
        timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
        timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
        timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
        timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
        timelineComponents['timelineDates'] = parseDate(timelineComponents['timelineEvents']);
        timelineComponents['eventsMinLapse'] = minLapse(timelineComponents['timelineDates']);
        timelineComponents['timelineNavigation'] = timeline.find('.cd-timeline-navigation');
        timelineComponents['eventsContent'] = timeline.children('.events-content');

        //assign a left postion to the single events along the timeline
        setDatePosition(timelineComponents, eventsMinDistance);
        //assign a width to the timeline
        timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
        //the timeline has been initialize - show it
        timeline.addClass('loaded');

        //detect click on the next arrow
        timelineComponents['timelineNavigation'].on('click', '.next', function(event){
          // console.log('next');
          event.preventDefault();
          updateSlide(timelineComponents, timelineTotWidth, 'next');
        });
        //detect click on the prev arrow
        timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
          event.preventDefault();
          updateSlide(timelineComponents, timelineTotWidth, 'prev');
        });
        //detect click on the a single event - show new event content
        timelineComponents['eventsWrapper'].on('click', 'a', function(event){
          event.preventDefault();
          timelineComponents['timelineEvents'].removeClass('selected');

          // console.log(timelineComponents['timelineEvents']);
          // console.log($(this));

          $(this).addClass('selected');
          updateOlderEvents($(this));
          updateFilling($(this), timelineComponents['fillingLine'], timelineTotWidth);
          updateVisibleContent($(this), timelineComponents['eventsContent']);
        });
        
        //on swipe, show next/prev event content
        timelineComponents['eventsContent'].on('swipeleft', function(){
          var mq = checkMQ();
          ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'next');
        });
        timelineComponents['eventsContent'].on('swiperight', function(){
          var mq = checkMQ();
          ( mq == 'mobile' ) && showNewContent(timelineComponents, timelineTotWidth, 'prev');
        });

        //keyboard navigation
        $(document).keyup(function(event){
          if(event.which=='37' && elementInViewport(timeline.get(0)) ) {
            showNewContent(timelineComponents, timelineTotWidth, 'prev');
          } else if( event.which=='39' && elementInViewport(timeline.get(0))) {
            showNewContent(timelineComponents, timelineTotWidth, 'next');
          }
        });

      }).promise().done(function () { 
        // console.log('Did things to every .element, all done.');
        // updateSlide(timelineComponents, timelineTotWidth, 'next');
      });

      // updateContent(start);

    }

    function updateSlide(timelineComponents, timelineTotWidth, string) {
      //retrieve translateX value of timelineComponents['eventsWrapper']
      var translateValue = getTranslateValue(timelineComponents['eventsWrapper']),
        wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
      //translate the timeline to the left('next')/right('prev') 
      (string == 'next') 
        ? translateTimeline(timelineComponents, translateValue - wrapperWidth + eventsMinDistance, wrapperWidth - timelineTotWidth)
        : translateTimeline(timelineComponents, translateValue + wrapperWidth - eventsMinDistance);
    }

    function showNewContent(timelineComponents, timelineTotWidth, string) {
      //go from one event to the next/previous one
      var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
        newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

      if ( newContent.length > 0 ) { //if there's a next/prev event - show it
        var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
          newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');
        
        updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
        updateVisibleContent(newEvent, timelineComponents['eventsContent']);
        newEvent.addClass('selected');
        selectedDate.removeClass('selected');
        updateOlderEvents(newEvent);
        updateTimelinePosition(string, newEvent, timelineComponents, timelineTotWidth);
      }
    }

    function updateTimelinePosition(string, event, timelineComponents, timelineTotWidth) {
      //translate timeline to the left/right according to the position of the selected event
      // var eventStyle = window.getComputedStyle(event.get(0), null),
        eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
        timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
        timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
      var timelineTranslate = getTranslateValue(timelineComponents['eventsWrapper']);

          if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
            translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
          }
    }

    function translateTimeline(timelineComponents, value, totWidth) {
      var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
      value = (value > 0) ? 0 : value; //only negative translate value
      value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
      setTransformValue(eventsWrapper, 'translateX', value+'px');
      //update navigation arrows visibility
      (value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
      (value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
    }

    function updateFilling(selectedEvent, filling, totWidth) {
      //change .filling-line length according to the selected event
      var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
        eventLeft = eventStyle.getPropertyValue("left"),
        eventWidth = eventStyle.getPropertyValue("width");
      eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
      var scaleValue = eventLeft/totWidth;
      setTransformValue(filling.get(0), 'scaleX', scaleValue);
    }

    function setDatePosition(timelineComponents, min) {
      for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
          var distance = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
            distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 2;
          timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
      }
    }

    function setTimelineWidth(timelineComponents, width) {
      var timeSpan = daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
        timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
        timeSpanNorm = Math.round(timeSpanNorm) + 4,
        totalWidth = timeSpanNorm*width;
      timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
      updateFilling(timelineComponents['timelineEvents'].eq(0), timelineComponents['fillingLine'], totalWidth);
    
      return totalWidth;
    }

    function updateVisibleContent(event, eventsContent) {
      var eventDate = event.data('date'),
        visibleContent = eventsContent.find('.selected'),
        selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
        selectedContentHeight = selectedContent.height();

      if (selectedContent.index() > visibleContent.index()) {
        var classEnetering = 'selected enter-right',
          classLeaving = 'leave-left';
      } else {
        var classEnetering = 'selected enter-left',
          classLeaving = 'leave-right';
      }

      selectedContent.attr('class', classEnetering);
      visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
        visibleContent.removeClass('leave-right leave-left');
        selectedContent.removeClass('enter-left enter-right');
      });
      eventsContent.css('height', selectedContentHeight+'px');
    }

    function updateOlderEvents(event) {
      event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
    }

    function getTranslateValue(timeline) {
      var timelineStyle = window.getComputedStyle(timeline.get(0), null),
        timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
              timelineStyle.getPropertyValue("-moz-transform") ||
              timelineStyle.getPropertyValue("-ms-transform") ||
              timelineStyle.getPropertyValue("-o-transform") ||
              timelineStyle.getPropertyValue("transform");

          if( timelineTranslate.indexOf('(') >=0 ) {
            var timelineTranslate = timelineTranslate.split('(')[1];
          timelineTranslate = timelineTranslate.split(')')[0];
          timelineTranslate = timelineTranslate.split(',');
          var translateValue = timelineTranslate[4];
          } else {
            var translateValue = 0;
          }

          return Number(translateValue);
    }

    function setTransformValue(element, property, value) {
      element.style["-webkit-transform"] = property+"("+value+")";
      element.style["-moz-transform"] = property+"("+value+")";
      element.style["-ms-transform"] = property+"("+value+")";
      element.style["-o-transform"] = property+"("+value+")";
      element.style["transform"] = property+"("+value+")";
    }

    //based on http://stackoverflow.com/questions/542938/how-do-i-get-the-number-of-days-between-two-dates-in-javascript
    function parseDate(events) {
      var dateArrays = [];
      events.each(function(){
        var dateComp = $(this).data('date').split('/'),
          newDate = new Date(dateComp[2], dateComp[1]-1, dateComp[0]);
        dateArrays.push(newDate);
      });
        return dateArrays;
    }

    function parseDate2(events) {
      var dateArrays = [];
      events.each(function(){
        var singleDate = $(this),
          dateComp = singleDate.data('date').split('T');
        if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
          var dayComp = dateComp[0].split('/'),
            timeComp = dateComp[1].split(':');
        } else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
          var dayComp = ["2000", "0", "0"],
            timeComp = dateComp[0].split(':');
        } else { //only DD/MM/YEAR
          var dayComp = dateComp[0].split('/'),
            timeComp = ["0", "0"];
        }
        var newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
        dateArrays.push(newDate);
      });
        return dateArrays;
    }

    function daydiff(first, second) {
        return Math.round((second-first));
    }

    function minLapse(dates) {
      //determine the minimum distance among events
      var dateDistances = [];
      for (i = 1; i < dates.length; i++) { 
          var distance = daydiff(dates[i-1], dates[i]);
          dateDistances.push(distance);
      }
      return Math.min.apply(null, dateDistances);
    }

    function elementInViewport(el) {
      var top = el.offsetTop;
      var left = el.offsetLeft;
      var width = el.offsetWidth;
      var height = el.offsetHeight;

      while(el.offsetParent) {
          el = el.offsetParent;
          top += el.offsetTop;
          left += el.offsetLeft;
      }

      return (
          top < (window.pageYOffset + window.innerHeight) &&
          left < (window.pageXOffset + window.innerWidth) &&
          (top + height) > window.pageYOffset &&
          (left + width) > window.pageXOffset
      );
    }

    function checkMQ() {
      //check if mobile or desktop device
      return window.getComputedStyle(document.querySelector('.cd-horizontal-timeline'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
    }

  });

  function vhref(vinfoid)
  {
    // console.log(vinfoid);
    $('[id^="dthiddenmediaurl'+vinfoid+'"]').each(function(){
      infoid= $(this).attr('id');
      infoid= infoid.replace("dthiddenmediaurl"+vinfoid, "");

      vmediaurl= $(this).val();
      // console.log(vmediaurl);

      // console.log("#vhrefimg"+vinfoid+infoid);
      // $("#vhrefimg"+vinfoid+infoid).attr('src', vmediaurl);
      // $.getScript("lib/html5_gallery_free/html5gallery/html5gallery.js");

      var s_url= "json-api/KinerjaProyekAcn_json/file_content?reqUrl="+encodeURIComponent(vmediaurl);
      
      vtes= 0;
      // console.log(s_url);return false;
      $.ajax({'url': s_url, 'success': function(dataajax){
        // dataajax= String(dataajax);
        // infonewframe.attr('data', dataajax);

        dataajax= JSON.parse(dataajax);
        // dataajax= JSON.stringify(dataajax);
        if(vtes == 0)
        {
          // vhrefimg16_12_2021_1
          console.log("#vhrefimg"+vinfoid+infoid);
          // console.log(dataajax);
          // $('#tess img').attr('src', 'data:image/jpeg;base64,' + dataajax);
          // $("#tess").attr("src", "data:image/png;base64," + dataajax);
          $("#vhrefimg"+vinfoid+infoid).attr("src", "data:image/png;base64," + dataajax);
          $("#gallery16_12_2021").unitegallery();

          // var binary = "";
          // var responseText = dataajax;
          // var responseTextLen = responseText.length;

          // for ( i = 0; i < responseTextLen; i++ ) {
          //     binary += String.fromCharCode(responseText.charCodeAt(i) & 255)
          // }
          // $("#tess").attr("src", "data:image/png;base64,"+btoa(binary));
        }
        // $("#vhref"+vinfoid+infoid).attr("href", vmediaurl);
        // $("#vhrefimg"+vinfoid+infoid).attr('src', dataajax);
        // $("#vhrefimg"+vinfoid+infoid).attr('data-image', vmediaurl);

        vtes++;

        // var img = document.getElementById("vhrefimg"+vinfoid+infoid);
        // // img.src = dataajax;
        // // console.log(dataajax);
        // img.src = 'data:image/png;base64,' + dataajax;

        // $.getScript("lib/html5_gallery_free/html5gallery/html5gallery.js");
      }});

      /*$("#vhrefimg"+vinfoid+infoid).each(async function() {
        try {
          const res = await xrenderImage(s_url);
          $(this).attr("src", res);
          console.log("x");
          $.getScript("lib/html5_gallery_free/html5gallery/html5gallery.js");
        } catch(err) {
          console.log("error"+err);
        }
      });*/

    });

    // $("#gallery"+vinfoid).unitegallery();
  }

  function xrenderImage(s_url) {
    return $.ajax({
      url: s_url
    });
  };

  function cb(){
    alert("");
    jQuery("#gallery16_12_2021").unitegallery();
  }


</script>

<!-- UNITE GALLERY -->  
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-common-libraries.js'></script> 
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-functions.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-thumbsgeneral.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-thumbsstrip.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-touchthumbs.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-panelsbase.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-strippanel.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-gridpanel.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-thumbsgrid.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-tiles.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-tiledesign.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-avia.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-slider.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-sliderassets.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-touchslider.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-zoomslider.js'></script> 
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-video.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-gallery.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-lightbox.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-carousel.js'></script>
<script type='text/javascript' src='lib/unitegallery/source/unitegallery/js/ug-api.js'></script>

<link rel='stylesheet' href='lib/unitegallery/source/unitegallery/css/unite-gallery.css' type='text/css' />

<script type='text/javascript' src='lib/unitegallery/source/unitegallery/themes/default/ug-theme-default.js'></script>
<link rel='stylesheet' href='lib/unitegallery/source/unitegallery/themes/default/ug-theme-default.css' type='text/css' />

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                      <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                      <li><a href="app/index/project_highlight">Highlight Project</a></li>
                      <!-- <li><a href="#">Summer 15</a></li> -->
                      <li>Highlight Project Detil</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 60px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Highlight Project 
                                    asdsad<img id="tess" />asdsad
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="area-monitoring-proyek-akuisisi highlight-detil">
                          <div class="item item-highlight">
                            <div class="caption">PLTA Batang Toru</div>
                            <div class="inner">
                              <div class="capacity">
                                <div class="ikon"><img src="images/icon-tower.png"></div>
                                <div class="data">
                                  <div class="title">Capacity (MW)</div>
                                  <div class="capacity-nilai" id='power_capacity'></div>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="title">Lokasi</div>
                              <div class="nilai" id='location_name'></div>

                              <div class="title">COD</div>
                              <div class="nilai" id='cod_ruptl'></div>
                              
                              <div class="title">Kontraktor EPC</div>
                              <div class="nilai" id='KontraktorEpc'></div>

                              <div class="nilai-proyek">
                                <div class="title">Nilai Proyek</div>
                                <div class="nilai" id='project_value'></div>
                              </div>
                            </div>
                          </div>

                          <div class="item item-detil">
                            <div class="inner">
                              <div class="judul" onclick="cb()"><span>Timeline Progress Update</span></div>
                              
                              <section class="cd-horizontal-timeline">
                                <div class="timeline">
                                  <div class="events-wrapper">
                                    <div class="events" id='temp_date'></div>
                                  </div>
                                    
                                  <ul class="cd-timeline-navigation">
                                    <li><a href="#0" class="prev inactive">Prev</a></li>
                                    <li><a href="#0" class="next">Next</a></li>
                                  </ul> <!-- .cd-timeline-navigation -->
                                </div> <!-- .timeline -->

                                <div class="events-content" id='temp_content'></div>
                              </section>

                            </div>
                          </div>
                          <div class="clearfix"></div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="area-sumber-data detil">
                      <label>Sumber data : <span>Prime</span></label>
                      <label>Last update : <span>4 Agustus 2023</span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<style type="text/css">
  #vlsxloading {
    display: none;
  }
</style>
