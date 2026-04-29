<?php
include_once("functions/string.func.php");
include_once("functions/date.func.php");
?>
<style type="text/css">
  .cd-horizontal-timeline {

    opacity: 0;
    /*margin: 2em auto;*/
    margin: 0px auto;
    -webkit-transition: opacity 0.2s;
    -moz-transition: opacity 0.2s;
    transition: opacity 0.2s;
  }
  .cd-horizontal-timeline::before {
    /* never visible - this is used in jQuery to check the current MQ */
    content: 'mobile';
    display: none;
  }
  .cd-horizontal-timeline.loaded {
    /* show the timeline after events position has been set (using JavaScript) */
    opacity: 1;
  }
  .cd-horizontal-timeline .timeline {
    position: relative;
    height: 100px;
    width: 90%;
    max-width: 800px;
    margin: 0 auto;
  }
  .cd-horizontal-timeline .events-wrapper {
    position: relative;
    height: 100%;
    margin: 0 40px;
    overflow: hidden;
  }
  .cd-horizontal-timeline .events-wrapper::after, 
  .cd-horizontal-timeline .events-wrapper::before {
    /* these are used to create a shadow effect at the sides of the timeline */
    content: '';
    position: absolute;
    z-index: 2;
    top: 0;
    height: 100%;
    width: 20px;
  }
  .cd-horizontal-timeline .events-wrapper::before {
    left: 0;
    background-image: -webkit-linear-gradient( left , #08bdf0, rgba(248, 248, 248, 0));
    background-image: linear-gradient(to right, #08bdf0, rgba(248, 248, 248, 0));
  }
  .cd-horizontal-timeline .events-wrapper::after {
    right: 0;
    background-image: -webkit-linear-gradient( right , #08bdf0, rgba(248, 248, 248, 0));
    background-image: linear-gradient(to left, #08bdf0, rgba(248, 248, 248, 0));
  }
  .cd-horizontal-timeline .events {
    /* this is the grey line/timeline */
    position: absolute;
    z-index: 1;
    left: 0;
    top: 49px;
    height: 2px;
    /* width will be set using JavaScript */
    background: #dfdfdf;
    -webkit-transition: -webkit-transform 0.4s;
    -moz-transition: -moz-transform 0.4s;
    transition: transform 0.4s;
  }
  .cd-horizontal-timeline .filling-line {
    /* this is used to create the green line filling the timeline */
    position: absolute;
    z-index: 1;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #043c4c;
    -webkit-transform: scaleX(0);
    -moz-transform: scaleX(0);
    -ms-transform: scaleX(0);
    -o-transform: scaleX(0);
    transform: scaleX(0);
    -webkit-transform-origin: left center;
    -moz-transform-origin: left center;
    -ms-transform-origin: left center;
    -o-transform-origin: left center;
    transform-origin: left center;
    -webkit-transition: -webkit-transform 0.3s;
    -moz-transition: -moz-transform 0.3s;
    transition: transform 0.3s;
  }
  .cd-horizontal-timeline .events a {
    position: absolute;
    bottom: 0;
    z-index: 2;
    text-align: center;
    font-size: 1.3rem;
    padding-bottom: 15px;
    color: #383838;
    /* fix bug on Safari - text flickering while timeline translates */
    -webkit-transform: translateZ(0);
    -moz-transform: translateZ(0);
    -ms-transform: translateZ(0);
    -o-transform: translateZ(0);
    transform: translateZ(0);
  }
  .cd-horizontal-timeline .events a::after {
    /* this is used to create the event spot */
    content: '';
    position: absolute;
    left: 50%;
    right: auto;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    bottom: -5px;
    height: 12px;
    width: 12px;
    border-radius: 50%;
    border: 2px solid #dfdfdf;
    background-color: #f8f8f8;
    -webkit-transition: background-color 0.3s, border-color 0.3s;
    -moz-transition: background-color 0.3s, border-color 0.3s;
    transition: background-color 0.3s, border-color 0.3s;
  }
  .no-touch .cd-horizontal-timeline .events a:hover::after {
    background-color: #043c4c;
    border-color: #043c4c;
  }
  .cd-horizontal-timeline .events a.selected {
    pointer-events: none;
  }
  .cd-horizontal-timeline .events a.selected::after {
    background-color: #043c4c;
    border-color: #043c4c;
  }
  .cd-horizontal-timeline .events a.older-event::after {
    border-color: #043c4c;
  }
  @media only screen and (min-width: 1100px) {
    .cd-horizontal-timeline {
      /*margin: 6em auto;*/
      margin: 2em auto;
      
    }
    .cd-horizontal-timeline::before {
      /* never visible - this is used in jQuery to check the current MQ */
      content: 'desktop';
    }
  }

  .cd-timeline-navigation a {
    /* these are the left/right arrows to navigate the timeline */
    position: absolute;
    z-index: 1;
    top: 50%;
    bottom: auto;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    height: 34px;
    width: 34px;
    border-radius: 50%;
    border: 2px solid #dfdfdf;
    /* replace text with an icon */
    overflow: hidden;
    color: transparent;
    text-indent: 100%;
    white-space: nowrap;
    -webkit-transition: border-color 0.3s;
    -moz-transition: border-color 0.3s;
    transition: border-color 0.3s;
  }
  .cd-timeline-navigation a::after {
    /* arrow icon */
    /*content: '';*/
    position: absolute;
    height: 16px;
    width: 16px;
    /*left: calc(50% - 13px);*/
    left: calc(50% - 10px);
    top: calc(50% - 2px);
    bottom: auto;
    right: auto;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    -o-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    /*background: url(../img/cd-arrow.svg) no-repeat 0 0;*/

    font-family: 'FontAwesome';
    content: "\f105";
    display: inline-block;
    color: #FFF;
  }
  .cd-timeline-navigation a.prev {
    left: 0;
    -webkit-transform: translateY(-50%) rotate(180deg);
    -moz-transform: translateY(-50%) rotate(180deg);
    -ms-transform: translateY(-50%) rotate(180deg);
    -o-transform: translateY(-50%) rotate(180deg);
    transform: translateY(-50%) rotate(180deg);
  }
  .cd-timeline-navigation a.next {
    right: 0;
  }
  .no-touch .cd-timeline-navigation a:hover {
    border-color: #043c4c;
  }
  .cd-timeline-navigation a.inactive {
    cursor: not-allowed;
  }
  .cd-timeline-navigation a.inactive::after {
    background-position: 0 -16px;
  }
  .no-touch .cd-timeline-navigation a.inactive:hover {
    border-color: #dfdfdf;
  }

  .cd-horizontal-timeline .events-content {
    position: relative;
    width: 100%;
    margin: 2em 0;
    overflow: hidden;
    -webkit-transition: height 0.4s;
    -moz-transition: height 0.4s;
    transition: height 0.4s;
  }
  .cd-horizontal-timeline .events-content li {
    position: absolute;
    z-index: 1;
    width: 100%;
    left: 0;
    top: 0;
    -webkit-transform: translateX(-100%);
    -moz-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    -o-transform: translateX(-100%);
    transform: translateX(-100%);
    padding: 0 5%;
    opacity: 0;
    -webkit-animation-duration: 0.4s;
    -moz-animation-duration: 0.4s;
    animation-duration: 0.4s;
    -webkit-animation-timing-function: ease-in-out;
    -moz-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }
  .cd-horizontal-timeline .events-content li.selected {
    /* visible event content */
    position: relative;
    z-index: 2;
    opacity: 1;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
  }
  .cd-horizontal-timeline .events-content li.enter-right, .cd-horizontal-timeline .events-content li.leave-right {
    -webkit-animation-name: cd-enter-right;
    -moz-animation-name: cd-enter-right;
    animation-name: cd-enter-right;
  }
  .cd-horizontal-timeline .events-content li.enter-left, .cd-horizontal-timeline .events-content li.leave-left {
    -webkit-animation-name: cd-enter-left;
    -moz-animation-name: cd-enter-left;
    animation-name: cd-enter-left;
  }
  .cd-horizontal-timeline .events-content li.leave-right, .cd-horizontal-timeline .events-content li.leave-left {
    -webkit-animation-direction: reverse;
    -moz-animation-direction: reverse;
    animation-direction: reverse;
  }
  .cd-horizontal-timeline .events-content li > * {
    /*max-width: 800px;*/
    margin: 0 auto;
  }
  .cd-horizontal-timeline .events-content h2 {
    font-weight: bold;
    /*font-size: 2.6rem;*/
    /*font-family: "Playfair Display", serif;*/
    font-weight: 700;
    line-height: 1.2;
  }
  .cd-horizontal-timeline .events-content em {
    display: block;
    font-style: italic;
    margin: 10px auto;
  }
  .cd-horizontal-timeline .events-content em::before {
    content: '- ';
  }
  .cd-horizontal-timeline .events-content p {
    font-size: 1.4rem;
    color: #959595;
  }
  .cd-horizontal-timeline .events-content em, .cd-horizontal-timeline .events-content p {
    line-height: 1.6;
  }
  @media only screen and (min-width: 768px) {
    .cd-horizontal-timeline .events-content h2 {
      font-size: 7rem;
    }
    .cd-horizontal-timeline .events-content em {
      font-size: 2rem;
    }
    .cd-horizontal-timeline .events-content p {
      font-size: 1.8rem;
    }
  }

  @-webkit-keyframes cd-enter-right {
    0% {
      opacity: 0;
      -webkit-transform: translateX(100%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
    }
  }
  @-moz-keyframes cd-enter-right {
    0% {
      opacity: 0;
      -moz-transform: translateX(100%);
    }
    100% {
      opacity: 1;
      -moz-transform: translateX(0%);
    }
  }
  @keyframes cd-enter-right {
    0% {
      opacity: 0;
      -webkit-transform: translateX(100%);
      -moz-transform: translateX(100%);
      -ms-transform: translateX(100%);
      -o-transform: translateX(100%);
      transform: translateX(100%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
      -moz-transform: translateX(0%);
      -ms-transform: translateX(0%);
      -o-transform: translateX(0%);
      transform: translateX(0%);
    }
  }
  @-webkit-keyframes cd-enter-left {
    0% {
      opacity: 0;
      -webkit-transform: translateX(-100%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
    }
  }
  @-moz-keyframes cd-enter-left {
    0% {
      opacity: 0;
      -moz-transform: translateX(-100%);
    }
    100% {
      opacity: 1;
      -moz-transform: translateX(0%);
    }
  }
  @keyframes cd-enter-left {
    0% {
      opacity: 0;
      -webkit-transform: translateX(-100%);
      -moz-transform: translateX(-100%);
      -ms-transform: translateX(-100%);
      -o-transform: translateX(-100%);
      transform: translateX(-100%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
      -moz-transform: translateX(0%);
      -ms-transform: translateX(0%);
      -o-transform: translateX(0%);
      transform: translateX(0%);
    }
  }

</style>

<script type="text/javascript">
  jQuery(document).ready(function($){
  $('#vlsxloading').hide();
    
    var timelines = $('.cd-horizontal-timeline'),
      eventsMinDistance = 60;

    (timelines.length > 0) && initTimeline(timelines);

    function initTimeline(timelines) {
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
        var timelineTotWidth = setTimelineWidth(timelineComponents, eventsMinDistance);
        //the timeline has been initialize - show it
        timeline.addClass('loaded');

        //detect click on the next arrow
        timelineComponents['timelineNavigation'].on('click', '.next', function(event){
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
      });
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
      var eventStyle = window.getComputedStyle(event.get(0), null),
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

    /*
      How to tell if a DOM element is visible in the current viewport?
      http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
    */
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
</script>

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="area-breadcrumb pull-left">
                    <ul class="breadcrumb">
                    <li><a href="app"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="app/index/project_highlight">Project Highlight</a></li>
                    <!-- <li><a href="#">Summer 15</a></li> -->
                    <li>Project Highlight Detil</li>
                    </ul> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="area-wrapper" style="height: calc(100vh - 55px);">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-detil">
                                <div class="logo-pln-np pull-left"><img src="images/logo.png"></div>    
                                <div class="judul">
                                    <span class="ikon"><img src="images/icon-kesiapan-pembangkit.png"></span> Project Highlight
                                    <!-- <a class="selengkapnya pull-right" href="app/index/penjualan"><span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a> -->
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
                                  <div class="capacity-nilai">510</div>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="title">Lokasi</div>
                              <div class="nilai">Desa Sipirok, 
                                Kabupaten Tapanuli Selatan, 
                                Provinsi Sumatera Utara
                              </div>

                              <div class="title">COD</div>
                              <div class="nilai">16 September 2023 </div>
                              
                              <div class="title">Kontraktor EPC</div>
                              <div class="nilai">
                              - Onshore EPC :
                                Powerchina Sinohydro - PT NEM
                              - Offshore EPC : 
                                Powerchina Huadong Design 
                                Engineering Abu Dhabi
                              </div>

                              <div class="nilai-proyek">
                                <div class="title">Nilai Proyek</div>
                                <div class="nilai">USD 143.000.000</div>  
                              </div>
                            </div>
                          </div>

                          <div class="item item-detil">
                            <div class="inner">
                              <div class="judul"><span>Timeline Progress Update</span></div>
                              
                              <section class="cd-horizontal-timeline">
                                <div class="timeline">
                                  <div class="events-wrapper">
                                    <div class="events">
                                      <ol>
                                        <li><a href="#0" data-date="16/01/2014" class="selected">16 Jan</a></li>
                                        <li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
                                        <li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
                                        <li><a href="#0" data-date="20/05/2014">20 May</a></li>
                                        <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
                                        <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
                                        <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
                                        <li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
                                        <li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
                                        <li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
                                        <li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
                                      </ol>

                                      <span class="filling-line" aria-hidden="true"></span>
                                    </div> <!-- .events -->
                                  </div> <!-- .events-wrapper -->
                                    
                                  <ul class="cd-timeline-navigation">
                                    <li><a href="#0" class="prev inactive">Prev</a></li>
                                    <li><a href="#0" class="next">Next</a></li>
                                  </ul> <!-- .cd-timeline-navigation -->
                                </div> <!-- .timeline -->

                                <div class="events-content">
                                  <ol>
                                    <li class="selected" data-date="16/01/2014">
                                      <div class="row">
                                        <div class="col-md-6">
                                          
                                          	<!-- GALLERY START -->
                                          	<div class="area-galeri-project">
	                                            <div class="videos-slider-2">
	                                            	<!-- CONTOH IMAGE -->
													<div>
		                                                <div class="bs-overlay foto">
		                                                	<a class="pop bs-position-cover video-modal" data-video="http://upload.wikimedia.org/wikipedia/commons/2/22/Turkish_Van_Cat.jpg" data-toggle="modal" data-target="#imageModal">
															    <img src="http://upload.wikimedia.org/wikipedia/commons/2/22/Turkish_Van_Cat.jpg">
															</a>
		                                                	<div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
		                                                		<h4>Mayor's reception for Investo Expo, FDI Summit and Ljubljana Forum</h4>
		                                                	</div>
		                                                	
		                                                </div>
		                                            </div>
	                                            	<!-- CONTOH VIDEO -->
	                                              	<div>
		                                                <div class="bs-overlay">
		                                                  <img src="https://img.youtube.com/vi/bjR8nZVkmfA/hqdefault.jpg" alt="" />
		                                                  <div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
		                                                    <h4>Investors' week - The view of business potentials at the Slovenian coast</h4>
		                                                  </div>
		                                                  <a href="#" class="bs-position-cover video-modal" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/bjR8nZVkmfA"></a>
		                                                </div>
	                                             	</div>
	                                             	<!-- END CONTOH IMAGE & VIDEO-->

													<div>
														<div class="bs-overlay">
															<img src="https://img.youtube.com/vi/GaA_JeWmlv4/hqdefault.jpg" alt="" />
															<div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
																<h4>Investo Expo, day 2: The Ljubljana declaration and VZMD corporate governance award to Gorenje</h4>
															</div>
															<a class="bs-position-cover video-modal" data-video="https://www.youtube.com/embed/GaA_JeWmlv4" data-toggle="modal" data-target="#videoModal"></a>
														</div>
													</div>
													<div>
														<div class="bs-overlay">
															<img src="https://img.youtube.com/vi/1wFfavnPOVw/hqdefault.jpg" alt="" />
															<div class="bs-overlay-panel bs-overlay-background bs-overlay-top text-center text-uppercase">
																<h4>Gala reception before Conference on financial education and investors' exposition "investo Expo"</h4>
															</div>
															<a class="bs-position-cover video-modal" data-video="https://www.youtube.com/embed/1wFfavnPOVw" data-toggle="modal" data-target="#videoModal"></a>
														</div>
													</div>
	                                            </div>
	                                            <div class="slider-nav-thumbnails">
													<div>
													<img src="http://upload.wikimedia.org/wikipedia/commons/2/22/Turkish_Van_Cat.jpg" alt="Two">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/bjR8nZVkmfA/default.jpg" alt="One">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/GaA_JeWmlv4/default.jpg" alt="Three">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/1wFfavnPOVw/default.jpg" alt="Four">
													</div>

													<!-- COBA BANYAK THUMBNAIL -->
													<div>
													<img src="https://img.youtube.com/vi/GaA_JeWmlv4/default.jpg" alt="Three">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/1wFfavnPOVw/default.jpg" alt="Four">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/GaA_JeWmlv4/default.jpg" alt="Three">
													</div>
													<div>
													<img src="https://img.youtube.com/vi/1wFfavnPOVw/default.jpg" alt="Four">
													</div>

	                                            </div>
											</div>
											<!-- GALLERY END -->

                                        </div>
                                        <div class="col-md-5">
                                          <div class="konten-deskripsi">
                                            <h2>Progress Update</h2>
                                            <em>January 16th, 2014</em>
                                            <p> 
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.

                                              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </li>

                                    <li data-date="28/02/2014">
                                      <div class="row">
                                        <div class="col-md-5">
                                          
                                          <!-- GALLERY START -->
                                          haii2
                                          <!-- GALLERY END -->

                                        </div>
                                        <div class="col-md-7">
                                          <div class="konten-deskripsi">
                                            <h2>Progress Update</h2>
                                            <em>February 28th, 2014</em>
                                            <p> 
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                    </li>

                                    <li data-date="20/04/2014">
                                      <h2>Event title here</h2>
                                      <em>March 20th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="20/05/2014">
                                      <h2>Event title here</h2>
                                      <em>May 20th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="09/07/2014">
                                      <h2>Event title here</h2>
                                      <em>July 9th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="30/08/2014">
                                      <h2>Event title here</h2>
                                      <em>August 30th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="15/09/2014">
                                      <h2>Event title here</h2>
                                      <em>September 15th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="01/11/2014">
                                      <h2>Event title here</h2>
                                      <em>November 1st, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="10/12/2014">
                                      <h2>Event title here</h2>
                                      <em>December 10th, 2014</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="19/01/2015">
                                      <h2>Event title here</h2>
                                      <em>January 19th, 2015</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>

                                    <li data-date="03/03/2015">
                                      <h2>Event title here</h2>
                                      <em>March 3rd, 2015</em>
                                      <p> 
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                      </p>
                                    </li>
                                  </ol>
                                </div> <!-- .events-content -->
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

<!-- SLICK -->
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick-1.8.1/slick/slick-theme.css">
<script type="text/javascript" src="lib/slick-1.8.1/slick/slick.min.js"></script>

<style type="text/css">
  /* VIDEO SLIDER */
  .videos-slider-1 h4,
  .videos-slider-2 h4 {
    font-size: 14px;
  }

  /* OVERLAY */
  .bs-position-cover {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
  }
  .bs-overlay {
    display: inline-block;
    position: relative;
    max-width: 100%;
    vertical-align: middle;
    overflow: hidden;
    -webkit-transform: translateZ(0);
    margin: 0;
  }
  .bs-overlay:hover .bs-overlay-panel.bs-overlay-top {
    bottom: 0;
    opacity: 1;
    -webkit-transform: translateX(0) translateY(0);
    transform: translateX(0) translateY(0);
  }
  .bs-overlay-panel.bs-overlay-top {
    top: auto;
  }
  .bs-overlay-background {
    background: rgba(0,0,0,.8);
    -webkit-transform: translateY(100%);
    transform: translateY(100%);
    opacity: 0;
    transition-duration: .3s;
    transition-timing-function: ease-out;
    transition-property: opacity,transform,filter;
  }
  .bs-overlay-panel {
    position: absolute;
    top: 0;
    bottom: auto;
    left: 0;
    right: 0;
    padding: 20px;
    color: #fff;
  }
  .bs-overlay>:first-child,
  .bs-overlay-panel>:last-child {
    margin-bottom: 0;
  }
  .bs-overlay:hover{
    cursor: pointer;
  }
  .bs-overlay:hover:after {
    background-image: url(images/img-youtube-play-red.png);
    
  }
  .bs-overlay:after {
    background-image: url(images/img-youtube-play-dark.png);
    display: block;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 54px;
    height: 38px;
    background-size: cover;
  }
  .bs-overlay.foto:hover:after {
    background-image: url(images/img-zoom-red.png);
  }
  .bs-overlay.foto:after {
    background-image: url(images/img-zoom-dark.png);
  }
  .slider-nav-thumbnails {
    margin-top: 10px;
  }
  .slider-nav-thumbnails .slick-slide {
    cursor: pointer;
    outline: none;
  }
  .slider-nav-thumbnails .slick-slide.slick-current.slick-active {
    opacity: 1;
  }
  .slider-nav-thumbnails .slick-slide img {
    padding: 5px;
    background: transparent;;
  }
  .slider-nav-thumbnails .slick-slide.slick-current.slick-active img {
    background: #000;
  }
  .slider-nav-thumbnails img {
    width: 40px;
    margin: 0 5px;
  }
  .slider-nav-thumbnails .slick-slide:first-child img {
    margin-left: 0;
  }
  .slider-nav-thumbnails .slick-slide:last-child img {
    margin-right: 0;
  }

  /****/
	.area-galeri-project .slick-slide {

	}
	.area-galeri-project .pop.bs-position-cover {
		display: contents;
	}
	.area-galeri-project .bs-overlay {
		width: 100%;

		border: 3px solid #FFF;

		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;

		overflow: hidden;
	}
	.area-galeri-project .bs-overlay img {
		width: 100%;
		height: calc(40vh - 20px);
	}
	.area-galeri-project .video-wrapper {
		width: 100%;
		background-color: rgba(0,0,0,0.5);
	}
	.area-galeri-project .video-wrapper iframe {
		/*border: 1px solid cyan;*/
		width: 100%;
		height: calc(40vh - 20px);
		display: block;
		border: none;
	}
	.area-galeri-project .slick-track {

	}
	.area-galeri-project .slider-nav-thumbnails .slick-track .slick-slide {
		border: 2px solid #FFFFFF;
		height: 40px;
		margin-right: 4px;

		display: flex;
		justify-content: center; /* align horizontal */
		align-items: center; /* align vertical */

		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		border-radius: 7px;

		overflow: hidden;
	}
	.area-galeri-project .slider-nav-thumbnails .slick-track .slick-slide img {
		padding: 0px;
		margin: 0 0;
		min-height: 100%;
		width: auto;
		height: 100%;
	}
	.modal-dialog .modal-content {
		-webkit-border-radius: 20px;
		-moz-border-radius: 20px;
		border-radius: 20px;

		overflow: hidden;
	}
	.modal-dialog .modal-content .modal-body {
  		max-height: calc(100vh - 60px);
  		height: calc(100vh - 60px);
  		/*border: 1px solid red;*/

  		position: relative;

  		
	}
	.modal-dialog .modal-content .modal-body button.close {
		position: absolute;
		right: 2px;
		top: 2px;
		text-shadow: none;
		color: #FFFFFF;
		background: red;
		width: 30px;
		height: 30px;
		border-radius: 50%;
		opacity: .7;
	}
	.modal-dialog .modal-content .modal-body button.close:hover {
		opacity: 1;
	}
	.modal-dialog .modal-content .modal-body > .inner {
		/*border: 1px solid cyan;*/
		height: calc(100% - 0px);

		display: flex;
		justify-content: center; /* align horizontal */
		align-items: center; /* align vertical */
	}
	#videoModal .modal-body  > .inner iframe {
		width: 100%;
		display: block;
		border: none;
		/*height: calc(100vh - 240px);*/
		/*height: 100%;*/
		height: calc(100% - 0px);
	}
	.modal-dialog .modal-content .modal-body > .inner img {
		height: calc(100% - 0px);
	}
</style>
<script type="text/javascript">

	$('.videos-slider-2').slick({
		autoplay: false,
		slidesToScroll: 1,
		slidesToShow: 1,
		arrows: false,
		dots: false,
		asNavFor: '.slider-nav-thumbnails',
	});

	$('.slider-nav-thumbnails').slick({
		autoplay: false,
		slidesToShow: 6,
		slidesToScroll: 1,
		asNavFor: '.videos-slider-2',
		dots: true,
		focusOnSelect: true,
		variableWidth: true
	});

	// Remove active class from all thumbnail slides
	$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

	// Set active class to first thumbnail slides
	$('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

	// On before slide change match active thumbnail to current slide
	$('.videos-slider-2').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		var mySlideNumber = nextSlide;
		$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
		$('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
	});
</script>

<!-- FUNCTION POPUP VIDEO -->
<script type="text/javascript">
	autoPlayYouTubeModal();
	function autoPlayYouTubeModal() {

		var trigger = $("body").find('[data-toggle="modal"]');
		trigger.click(function () {
			var theModal = $(this).data("target"),
			videoSRC = $(this).attr("data-theVideo"),
			videoSRCauto = videoSRC + "?autoplay=1";
			$(theModal + ' iframe').attr('src', videoSRCauto);
			$(theModal + ' button.close').click(function () {
				$(theModal + ' iframe').attr('src', videoSRC);
			});
		});
	}
</script>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
    		<div class="modal-body">
    			<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
    			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    			<div class="inner"> 
    				<iframe class="size" src=""></iframe>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<!-- FUNCTION POPUP IMAGE -->
<script type="text/javascript">
	$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
	});
</script>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" data-dismiss="modal">
		<div class="modal-content"  >              
		  	<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<div class="inner"> 
					<img src="" class="imagepreview">
				</div>
		  	</div> 
		</div>
	</div>
</div>