<?php
/*
Section: Twitter All-in-One DMS
Author: MrFent
Author URI: http://www.MrFent.com/twitter-all-in-one
Demo: http://www.MrFent.com/twitter-all-in-one
External: http://www.MrFent.com/twitter-all-in-one
Version: 1.1.0
Description: Combines all four Twitter widgets: User timeline, Favorites, List, & Search
Class Name: TwitterAllInOneDMS
Workswith: templates, main, sidebar1, sidebar2, sidebar_wrap, header, footer, morefoot
Cloning: true
Filter: social
PageLines: true
v3: true
*/

class TwitterAllInOneDMS extends PageLinesSection {
	
	function section_opts(){

		$options = array();

		$Twitter_Mode_Setup_A = array(
			array(
				'key'			=> 'twmode',
				'type' 			=> 'select',
				'help'			=> __( 'Select a Twitter Mode, then refresh for more options', 'twitter-all-in-one-dms' ),							
				'label'			=> __( 'Twitter Mode', 'twitter-all-in-one-dms' ),
				'opts'	=> array(
								'timeline'	=> array('name' => __( 'User Timeline', 'twitter-all-in-one-dms' )),
								'favorites'	=> array('name' => __( 'Favorites', 'twitter-all-in-one-dms' )),
								'list'		=> array('name' => __( 'List', 'twitter-all-in-one-dms' )),
								'search'	=> array('name' => __( 'Search', 'twitter-all-in-one-dms' ))
				)));	
		$mode = ($this->opt('twmode')) ? $this->opt('twmode') : '';
			
				if (($mode == 'timeline') || ($mode == 'favorites')){
		$Twitter_Mode_Setup_B = array(
			array(
				'key'	=> 'twusername',			
				'type' 	=> 'text',
				'label'	=> __( 'Twitter Username', 'twitter-all-in-one-dms' )
			));
				} elseif ($mode == 'list') {
		$Twitter_Mode_Setup_B = array(
			array(
				'key'	=> 'twusername',			
				'type' 	=> 'text',
				'label'	=> __( 'Twitter Username', 'twitter-all-in-one-dms' )
			),
			array(
				'key'	=> 'twlist',	
				'type' 	=> 'text',
				'label'	=> __( 'List Name (<a href="https://twitter.com/lists" target="_blank">Click to create a List</a>)', 'twitter-all-in-one-dms' )
			));
				} elseif ($mode == 'search') {
		$Twitter_Mode_Setup_B = array(
			array(
				'key'	=> 'twsearch',			
				'type' 	=> 'text',
				'label'	=> __( 'Search Query', 'twitter-all-in-one-dms' )
			),
			array(
				'key'	=> 'twsearchid',	
				'type' 	=> 'text',
				'label'	=> __( 'data-widget-id (<a href="http://www.mrfent.com/twitter-all-in-one/search-mode/" target="_blank">Click for Instructions</a>)', 'twitter-all-in-one-dms' ),
			));
				} else { $Twitter_Mode_Setup_B = array(); }
		$Twitter_Mode_Setup_C = array_merge( $Twitter_Mode_Setup_A, $Twitter_Mode_Setup_B );
		$options[] = array(
				'title' => __( 'Twitter Mode Setup', 'twitter-all-in-one-dms' ),
				'type'	=> 'multi',
				'opts'	=> $Twitter_Mode_Setup_C
			);
				if($this->opt( 'twmode' )){	
		
				if ($mode == 'timeline') {
			$Preferences_A = array(
				array(
		   	   		'key'	=> 'twexcludereplies',
		   	    	'type'	=>  'check',
					'label'	=> __( 'Exclude your replies to other users', 'twitter-all-in-one-dms' )
		   	    ));
				} else { $Preferences_A = array(); }
				if ($mode == 'search') {
			$Preferences_B = array(
				array(
	    	   		'key'	=> 'twnumberoftweets',
	    	    	'type' 	=> 'count_select',
					'count_start'	=> 1,
					'count_number'	=> 20,
					'label' => __( 'Number of Tweets', 'twitter-all-in-one-dms' )
				));
				} else {
			$Preferences_B = array(
				array(
		   	   		'key'	=> 'twautoexpandphotos',
		   	    	'type'	=>  'check',
					'label'	=> __( 'Auto-expand photos', 'twitter-all-in-one-dms' )
		   	    ),
				array(
	    	   		'key'	=> 'twnumberoftweets',
	    	    	'type' 	=> 'count_select',
					'count_start'	=> 1,
					'count_number'	=> 20,
					'label' => __( 'Number of Tweets', 'twitter-all-in-one-dms' )
				));	
				}
				
		$Preferences_D = array(
				array(
					'key'	=> 'twlanguage',
					'type' 	=> 'select',
					'label'	=> __( 'Language', 'twitter-all-in-one-dms' ),
					'help'	=> __( 'The widget language is detected from the page, based on the HTML lang attribute of your content. However you can set a custom language here.', 'twitter-all-in-one-dms' ),
					'opts'	=> array(
								'ar' 	=> array('name' => __( 'Arabic', 'twitter-all-in-one-dms' )),
								'zh-cn' => array('name' => __( 'Simplified Chinese (China)', 'twitter-all-in-one-dms' )),
								'zh-tw' => array('name' => __( 'Traditional Chinese (Taiwan)', 'twitter-all-in-one-dms' )),
								'da' 	=> array('name' => __( 'Danish', 'twitter-all-in-one-dms' )),
								'nl' 	=> array('name' => __( 'Dutch', 'twitter-all-in-one-dms' )),
								'en' 	=> array('name' => __( 'English', 'twitter-all-in-one-dms' )),
								'fil' 	=> array('name' => __( 'Filipino', 'twitter-all-in-one-dms' )),
								'fi' 	=> array('name' => __( 'Finnish', 'twitter-all-in-one-dms' )),
								'fr' 	=> array('name' => __( 'French', 'twitter-all-in-one-dms' )),
								'de' 	=> array('name' => __( 'German', 'twitter-all-in-one-dms' )),
								'he' 	=> array('name' => __( 'Hebrew', 'twitter-all-in-one-dms' )),
								'hi' 	=> array('name' => __( 'Hindi', 'twitter-all-in-one-dms' )),
								'hu' 	=> array('name' => __( 'Hungarian', 'twitter-all-in-one-dms' )),
								'id' 	=> array('name' => __( 'Indonesian', 'twitter-all-in-one-dms' )),
								'it' 	=> array('name' => __( 'Italian', 'twitter-all-in-one-dms' )),
								'ja' 	=> array('name' => __( 'Japanese', 'twitter-all-in-one-dms' )),
								'ko' 	=> array('name' => __( 'Korean', 'twitter-all-in-one-dms' )),
								'msa' 	=> array('name' => __( 'Malay', 'twitter-all-in-one-dms' )),
								'no' 	=> array('name' => __( 'Norwegian', 'twitter-all-in-one-dms' )),
								'fa' 	=> array('name' => __( 'Persian (Farsi)', 'twitter-all-in-one-dms' )),
								'pl' 	=> array('name' => __( 'Polish', 'twitter-all-in-one-dms' )),
								'pt' 	=> array('name' => __( 'Portuguese', 'twitter-all-in-one-dms' )),
								'ru' 	=> array('name' => __( 'Russian', 'twitter-all-in-one-dms' )),
								'es' 	=> array('name' => __( 'Spanish', 'twitter-all-in-one-dms' )),
								'sv' 	=> array('name' => __( 'Swedish', 'twitter-all-in-one-dms' )),
								'th' 	=> array('name' => __( 'Thai', 'twitter-all-in-one-dms' )),
								'tr' 	=> array('name' => __( 'Turkish', 'twitter-all-in-one-dms' )),
								'ur' 	=> array('name' => __( 'Urdu', 'twitter-all-in-one-dms' )),
					)));	
		$Preferences_C = array_merge( $Preferences_A, $Preferences_B );
		$Preferences_E = array_merge( $Preferences_C, $Preferences_D );
		
		$options[] = array(
				'title' => __( 'Preferences', 'twitter-all-in-one-dms' ),
				'type'	=> 'multi',
				'opts'	=> $Preferences_E
			);
		$Appearance_A = array(
				array(
	    	   		'key'	=> 'twdarktheme',
	    	    	'type'	=>  'check',
					'label'	=> __( 'Switch to dark theme',	 'twitter-all-in-one-dms' )
	    	    ),
				array(
	    	   		'key'	=> 'twnoheader',
	    	    	'type'	=>  'check',
					'label'	=> __( 'Hide header', 'twitter-all-in-one-dms' )
	    	    ),
				array(
	    	   		'key'	=> 'twnofooter',
	    	    	'type'	=> 'check',
					'label'	=> __( 'Hide footer', 'twitter-all-in-one-dms' )
				),
				array(
	    	   		'key'	=> 'twtransparent',
	    	    	'type'	=> 'check',
					'label'	=> __( 'Remove background color', 'twitter-all-in-one-dms' )
				),
				array(
	    	   		'key'	=> 'twbordercolor',
	    	    	'default'	=> '#444444',
					'type'	=> 'color',
					'label'	=> __( 'Border color', 'twitter-all-in-one-dms' )
				),
				array(
	    	   		'key'	=> 'twlinks',
	    	    	'default'	=> '#0084b4',
					'type'	=> 'color',
					'label'	=> __( 'Link Color', 'twitter-all-in-one-dms' )
				),
				array(
	    	   		'key'	=> 'twnoborders',
	    	    	'type'	=> 'check',
					'label'	=> __( 'Remove all borders', 'twitter-all-in-one-dms' )
				));
						if(!$this->opt( 'twnumberoftweets' )){
				$Appearance_B = array(
				array(
				    	   		'key'	=> 'twheight',
								'default'	=> '600',
				    	    	'type'	=> 'text',
								'label'	=> __( 'Section Height (default is 600 px)', 'twitter-all-in-one-dms' )
				));
					} else { $Appearance_B = array(); }
				$Appearance_C = array_merge( $Appearance_A, $Appearance_B );
			$options[] = array(
					'title' => __( 'Appearance', 'twitter-all-in-one-dms' ),
					'type'	=> 'multi',
					'opts'	=> $Appearance_C
				);
			}
		return $options;
	}

	function section_head(){
		$clone_id = $this->oset['clone_id'];
		echo sprintf( '<style>section#twitter-all-in-one-dms%s iframe.twitter-timeline {width: 100%s;}</style>', $clone_id, '%' );	
	}

	function section_template(){
	$twittermode = ($this->opt('twmode')) ? $this->opt('twmode') : '';
	$twitterusername = str_replace(array('@', ' '), array(''), ($this->opt('twusername')) ? $this->opt('twusername') : '');
	$twittersearchid = ($this->opt('twsearchid')) ? $this->opt('twsearchid') : '';
	$twittersearch = ($this->opt('twsearch')) ? $this->opt('twsearch') : '';
	$twittersearchhref = str_replace(array(' '), array('+'), ($this->opt('twsearch')) ? $this->opt('twsearch', $this->oset) : '');
	$twitterlist = ($this->opt('twlist')) ? $this->opt('twlist') : '';
	$twitternumberoftweets = ($this->opt('twnumberoftweets')) ? $this->opt('twnumberoftweets') : '';
	if ( $this->opt( 'twnumberoftweets' )) { $twitterdatatweetlimit = sprintf( 'data-tweet-limit="%s" ', $twitternumberoftweets );} else { $twitterdatatweetlimit = ''; }
	$twitterexcludereplies = ( $this->opt( 'twexcludereplies', $this->oset) ) ? 'false' : 'true';
	$twitterautoexpandphotos = ( $this->opt('twautoexpandphotos', $this->oset) ) ? 'true' : 'false';
	$twitternoheader = ( $this->opt('twnoheader', $this->oset) ) ? 'noheader ' : '';
	$twitternofooter = ( $this->opt('twnofooter', $this->oset) ) ? 'nofooter ' : '';
	$twitternoborders = ( $this->opt('twnoborders', $this->oset) ) ? 'noborders ' : '';
	$twittertransparent = ( $this->opt('twtransparent', $this->oset) ) ? 'transparent ' : '';
	if( $this->opt( 'twnofooter' ) || $this->opt( 'twnoheader' ) || $this->opt( 'twnoborders' ) || $this->opt( 'twtransparent' )){$twitterdatachrome = sprintf( 'data-chrome="%s%s%s%s"', $twitternoheader, $twitternofooter, $twitternoborders, $twittertransparent );}else{$twitterdatachrome ='';}
	$twitterdarktheme = ( $this->opt( 'twdarktheme' ) ) ? 'dark' : 'light';
	$twitterheight = str_replace(array('px', '%', ' '), array(''), ($this->opt('twheight')) ? $this->opt('twheight') : '600');
	$twitterlinks = ( $this->opt('twlinks' ) ) ? '#'.$this->opt('twlinks' ) : '#0084b4';
	$twitterbordercolor	= ( $this->opt('twbordercolor' ) ) ? '#'.$this->opt('twbordercolor') : '#444444';
	if( $this->opt( 'twlanguage' )){$twitterlanguage = sprintf( 'lang="%s"', $this->opt( 'twlanguage' ));}else{$twitterlanguage ='';}
	
	
	if ($twittermode == 'timeline' && $twitterautoexpandphotos == 'false' ) {$twitterwidgetid = '345561955005767680';}
	if ($twittermode == 'timeline' && $twitterautoexpandphotos == 'true' ) {$twitterwidgetid = '345559937998524416';}
	if ($twittermode == 'favorites' && $twitterautoexpandphotos == 'false' ) {$twitterwidgetid = '345687068514598912';}
	if ($twittermode == 'favorites' && $twitterautoexpandphotos == 'true' ) {$twitterwidgetid = '345687302846152705';}
	if ($twittermode == 'list' && $twitterautoexpandphotos == 'false' ) {$twitterwidgetid = '345713316699717633';}
	if ($twittermode == 'list' && $twitterautoexpandphotos == 'true' ) {$twitterwidgetid = '345721255909019649';}

	if(!$this->opt( 'twmode' )){
			echo setup_section_notify( $this, __('Please select a Twitter Mode, then refresh for more options.', 'twitter-all-in-one-dms'));
	  		return;}
	if($twittermode == 'timeline' && (!$this->opt( 'twusername' ))){
			echo setup_section_notify($this, __('You set this section to "User Timeline" mode but you still need to enter a Twitter Username.', 'twitter-all-in-one-dms'));
	  		return;}
	if($twittermode == 'favorites' && (!$this->opt( 'twusername' ))){
			echo setup_section_notify($this, __('You set this section to "Favorites" mode but you still need to enter a Twitter Username.', 'twitter-all-in-one-dms'));
	  		return;}
	if($twittermode == 'list' && (!$this->opt('twusername') || !$this->opt('twlist'))){
			echo setup_section_notify($this, __('You set this section to "List" mode but you still need to enter a Twitter Username and a <a href="https://twitter.com/lists" target="_blank">"List Name"</a>', 'twitter-all-in-one-dms'));
	  		return;}
	if($twittermode == 'search' && (!$this->opt('twsearch') || !$this->opt('twsearchid'))){
			echo setup_section_notify($this, __('You set this section to "Search" mode but you still need to enter your "Search Query" and your <a href="http://www.mrfent.com/twitter-all-in-one/search-mode/" target="_blank">"Data Widget ID."</a>', 'twitter-all-in-one-dms'));
	  		return;}

	if ($twittermode == 'timeline'){?>
<a class="twitter-timeline" 
data-dnt="true" 
href="https://twitter.com/<?php echo $twitterusername ?>/" 
data-widget-id="<?php echo $twitterwidgetid ?>" 
data-screen-name="<?php echo $twitterusername ?>" 
data-show-replies="<?php echo $twitterexcludereplies ?>" 
data-theme="<?php echo $twitterdarktheme ?>" 
data-link-color="<?php echo $twitterlinks ?>" 
data-show-replies="false" 
data-border-color="<?php echo $twitterbordercolor ?>" 
height="<?php echo $twitterheight ?>" 
<?php echo $twitterdatatweetlimit ?>
<?php echo $twitterdatachrome ?>
<?php echo $twitterlanguage ?> 
>Tweets by @<?php echo $twitterusername ?></a>
<?php }
	if ($twittermode == 'favorites'){?>
<a class="twitter-timeline"
data-dnt="true" 
href="https://twitter.com/<?php echo $twitterusername ?>/favorites" 
data-widget-id="<?php echo $twitterwidgetid ?>" 
data-favorites-screen-name="<?php echo $twitterusername ?>" 
data-theme="<?php echo $twitterdarktheme ?>" 
data-link-color="<?php echo $twitterlinks ?>"
data-border-color="<?php echo $twitterbordercolor ?>" 
height="<?php echo $twitterheight ?>"
<?php echo $twitterdatatweetlimit ?>
<?php echo $twitterdatachrome ?>
<?php echo $twitterlanguage ?> 
>Favorite Tweets by @<?php echo $twitterusername ?></a>
<?php }
	if ($twittermode == 'list'){?>
<a class="twitter-timeline" 
data-dnt="true" 
href="https://twitter.com/<?php echo $twitterusername ?>/<?php echo $twitterlist ?>" 
data-widget-id="<?php echo $twitterwidgetid ?>" 
data-list-owner-screen-name="<?php echo $twitterusername ?>" 
data-list-slug="<?php echo $twitterlist ?>" 
data-theme="<?php echo $twitterdarktheme ?>" 
data-link-color="<?php echo $twitterlinks ?>" 
data-border-color="<?php echo $twitterbordercolor ?>"
height="<?php echo $twitterheight ?>" 
<?php echo $twitterdatatweetlimit ?>
<?php echo $twitterdatachrome ?>
<?php echo $twitterlanguage ?> 
>Tweets from @<?php echo $twitterusername ?>/<?php echo $twitterlist ?></a>
<?php }
	if ($twittermode == 'search'){?>
<a class="twitter-timeline" 
data-dnt="true" 
href="https://twitter.com/search?q=<?php echo $twittersearchhref ?>" 
data-widget-id="<?php echo $twittersearchid ?>" 
data-theme="<?php echo $twitterdarktheme ?>" 
data-link-color="<?php echo $twitterlinks ?>" 
data-border-color="<?php echo $twitterbordercolor ?>" 
height="<?php echo $twitterheight ?>" 
<?php echo $twitterdatatweetlimit ?>
<?php echo $twitterdatachrome ?>
<?php echo $twitterlanguage ?> 
>Tweets about "<?php echo $twittersearch ?>"</a>
<?php }?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<?php }
}