<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>

<head>
  <title>Sreenath Koyyam</title>
	<style>
		* {font-family: sans-serif; color:#fff;} 
		a, h1, h2, h3, h4, h5 {text-align:center; color:#eee;}
		body {background:#111;}
	</style>

                                                                                                                 
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  -->
  <!-- #################################################################################################################### -->


  <!-- #################################################################################################################### -->
  <!--CSS files                                                                                                -->
  <!-- only include the css file corresponding to the selected theme                                                        -->
  <!-- include 'nanogallery.css' if no theme is specified                                                                   -->
  <!--                                                                                                                      -->
	<!-- GALLERY - default theme css file                                                                                 -->
	<link href="css/nanogallery.css" rel="stylesheet" type="text/css">
	<!-- GALLERY - css file for the theme 'clean'                                                                         -->
	<link href="css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">
	<!-- GALLERY - css file for the theme 'light'                                                                         -->
	<link href="css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">
  <!-- #################################################################################################################### -->

  <!-- #################################################################################################################### -->
	<!-- GALLERY javascript                                                                                               -->
  <!--                                                                                                                      -->
	<script type="text/javascript" src="js/jquery.nanogallery.js"></script>
  <!--                                                                                                                      -->
  <!-- #################################################################################################################### -->

  
	<script>
		$(document).ready(function () {
    
      // ##################################################################################################################
      // #####  API method #####
      // ##################################################################################################################
			var myColorScheme = {
				navigationbar : {
					background : '#000',
					border : '0px dotted #555',
					color : '#ccc',
					colorHover:'#fff'
				},
				thumbnail : {
					background:'#000',
					border:'1px solid #000',
					labelBackground:'transparent',
					labelOpacity:'0.8',
					titleColor:'#fff',
					descriptionColor:'#eee'
				}
			};
			var myColorSchemeViewer = {
				background:'rgba(1, 1, 1, 0.75)',
				imageBorder:'12px solid #f8f8f8',
				imageBoxShadow:'#888 0px 0px 20px',
				barBackground:'#222',
				barBorder:'2px solid #111',
				barColor:'#eee',
				barDescriptionColor:'#aaa'
			};

      // custom thumbnail hover effect
      function myThumbnailInit($elt, item) {
      }
      function myThumbnailHoverInit($elt, item, data) {
        //$elt.find('.labelDescription').css({'opacity':'0'});

        var $subCon=$elt.find('.subcontainer');
        var th=$elt.outerHeight(true);
        var $iC=$elt.find('.imgContainer');
        var w=$iC.outerWidth(true)/10;
        var h=$iC.outerHeight(true);
        for(var c=0; c<10; c++ ) {
          var s='rect(0px, '+w*(c+1)+'px, '+h+'px, '+w*c+'px)';
          //var $t=$lI.clone().appendTo($subCon).css({'bottom':-(h+c*4), 'clip':s});
          $iC.clone().appendTo($elt.find('.subcontainer')).css({'bottom':0, 'scale':1, 'clip':s, 'left':0, 'position':'absolute'});
          //$t.css({'top':c*2});
        }
        $iC.remove();
      }
      
      function myThumbnailHover($elt, item, data) {
        //$elt.find('.labelDescription').delay(150)[data.animationEngine]({'opacity':'1'},400);
        //$elt.find('.labelDescription').delay(150).animate({'opacity':'1'},400);
        var w=$elt.find('.imgContainer').outerWidth(true)/10;
        $elt.find('.imgContainer').each(function( index ) {
          $(this)[data.animationEngine]({ 'left':(-w*10)+w*index*3, 'scale':2},20000);
          console.log( index*w + ' ' + index+ '-'+w );
        });
      }
      function myThumbnailHoverOut($elt, item, data) {
        //$elt.find('.labelDescription').animate({'opacity':'0'},300);
        var h=$elt.find('.labelImage').outerHeight(true);
        var w=$elt.find('.labelImage').outerWidth(true)/10;
        $elt.find('.labelImage').each(function( index ) {
          $(this)[data.animationEngine]({'bottom':-(h+index*4)});
        });
      }
      
      // custom info button on viewer toolbar
      function myViewerInfo(item, data) {
        alert('Image URL: '+ item.thumbsrc);
      }

			var t=jQuery("#nanoGallery1").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
			items: [
				{
					src: 'demonstration/image_01.jpg',		// image url
					srct: 'demonstration/image_01t.jpg',	// thumbnail url
					title: 'image 1', 						        // thumbnail title
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					title_FR: 'image 1 (fr)',
					description_FR : 'description image 1 (fr)'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02t.jpg',
					title: 'image 2' ,
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					title_FR: 'image 2 (fr)',
					description_FR : 'description image 2 (fr)'
				},
				{
					src: 'demonstration/image_03.jpg',
					srct: 'demonstration/image_03t.jpg',
					title: 'image 3' ,
					//title: 'image 3 - The quick brown fox jumps over the lazy dog - The quick brown fox jumps over the lazy dog',
					title_FR: 'image 3 (fr)',
					description_FR : 'description image 3 (fr)'
				}
				],
				thumbnailHoverEffect:[{name:'imageScaleIn80'},{'name':'descriptionAppear','delay':300},{'name':'borderLighter'}],				
				thumbnailLabel:{display:true,position:'overImageOnBottom'},
        viewerDisplayLogo:true,
        //thumbnailInit:myThumbnailInit,
        //fnThumbnailHoverInit:myThumbnailHoverInit,
        //fnThumbnailHover:myThumbnailHover,
        //fnThumbnailHoverOut:myThumbnailHoverOut,
        theme:'light',
        fnViewerInfo:myViewerInfo,
        viewerToolbar: { standard:'minimizeButton , previousButton, pageCounter ,nextButton,playPauseButton,fullscreenButton,infoButton,linkOriginalButton,closeButton,label,custom1' },
        fnImgToolbarCustInit: function(elementName) { return('<div>build</div>'); },
        fnImgToolbarCustDisplay: function($elements, item, data) {
          $elements.eq(0).html('photo ID: '+item.GetID());
        },
        fnImgToolbarCustClick: function(elementName, $element, item, data) {
          alert(elementName);
        },
        viewer:'fancybox'
			});
      //t.nanoGallery.TEST();
      ///console.dir(t.nanoGallery);

      

      
      // ##################################################################################################################
			// ##### Picasa/Google+ Access #####
      // ##################################################################################################################
			jQuery("#nanoGallery3").nanoGallery({
        thumbnailWidth:200, thumbnailHeight:200,

//        thumbnailL1Width:'140C XS100 SM100', thumbnailL1Height:'140C XS100 SM100',
//        thumbnailWidth:'auto', thumbnailHeight:'200 XS80 SM150 LA250 XL290',

        //userID: '111186676244625461692',
        userID:'104572852616173702378', // --> Cyrilic
        //userID:109113939265643599260,
        kind: 'picasa',
				//maxItemsPerLine:3,
        //album: '5851968929721015169?authkey=CJSlhdKSgoiXtgE',
				//album: '5851968929721015169&authkey=Gv1sRgCJSlhdKSgoiXtgE',
        //album:'5856259539659194001',
        photoSorting: 'random',
        albumSorting: 'random',
        colorScheme: myColorScheme,
        galleryFullpageButton: true,
        thumbnailLabel:{title:'%filenameNoExt', itemsCount:'title'},
        viewerDisplayLogo: true,
        photoSorting: 'titleDesc',
  			thumbnailHoverEffect:[{'name':'labelOpacity50','duration':300, 'delay':500},{'name':'imageScaleIn80', 'duration':500}]
				//thumbnailHoverEffect: [{'name':'imageScaleIn80','duration':300},{'name':'borderLighter'}]
			});   
      

  
// ##################################################################################################################
			// ##### Gallery PANEL #####
// ##################################################################################################################
 			jQuery("#nanoGalleryAnimation1").nanoGalleryDemo({thumbnailWidth:120, thumbnailHeight:120, itemsBaseURL:'demonstration',
        viewerDisplayLogo:true
			});

	
		});
	</script>

</head>
<body>
	<br><br><h2>Travelers EyE</h2>
	<div>
		<div id="nanoGallery3"></div>
	</div>
  <br><br><br>
	<br><br><h5>by <a href="">©2014 Travelers EyE Privacy Policy </a></h5>
</body>
</html>