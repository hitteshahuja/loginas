<?
global $PAGE;
$loginas_link = "/course/loginas.php?";
/*if (!$user->deleted and !$currentuser && !session_is_loggedinas() && has_capability('moodle/user:loginas', $coursecontext) && !is_siteadmin($user->id)) {
            $url = new moodle_url('/course/loginas.php', array('id'=>$course->id, 'user'=>$user->id, 'sesskey'=>sesskey()));
            $usersetting->add(get_string('loginas'), $url, self::TYPE_SETTING);
        }*/
        
//Only load the loginas module.js if the current logged in user has the capability
$course  = $PAGE->course;
$context = context_course::instance($course->id);
$loginasenabled = get_config('local_loginas','enableloginas');
if(!session_is_loggedinas() && has_capability('moodle/user:loginas',$context) && ($loginasenabled == 1) ){
	$module              = array(
            'name' => 'loginas',
            'fullpath' => '/local/loginas/module.js'
            
        );
        $params              = array($loginas_link);
        $PAGE->requires->js_init_call('M.LoginAs.init', array(
            $params
        ), false, $module);
		
		$viewprofile_link = "";
		echo html_writer::start_tag('div',array('id'=>'contextmenu_box','style'=>'display:none'));
		//echo "<div class=\"yui3-widget-hd\">Admin Menu <div id=\"closecontext\"><img src=\" $CFG->wwwroot/local/loginas/action_stop.gif\"/></div></div>";
		echo  html_writer::start_tag('ul',array('id'=>'contextmenu'));
		echo html_writer::start_tag('li');
		echo html_writer::start_tag('img',array('src'=>$CFG->wwwroot.'/local/loginas/key.png'));
		echo html_writer::link('#', 'Login As',array('id'=>'loginas'));
		echo html_writer::end_tag('li');
		echo html_writer::start_tag('li');
		echo html_writer::start_tag('img',array('src'=>$CFG->wwwroot.'/local/loginas/user-4.png'));
		echo html_writer::link('#', 'Profile',array('id'=>'profilelink'));
		echo html_writer::end_tag('li');
		echo html_writer::end_tag('ul');
		echo  "<div class=\"yui3-widget-ft\"></div>";
		echo html_writer::end_tag('div');
	
}
 
