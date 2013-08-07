<?php
defined('MOODLE_INTERNAL') || die();
require_once(dirname(__FILE__) . '/lib.php');
if ($hassiteconfig) {
	
	$page = new admin_settingpage('loginas', get_string('pluginname', 'local_loginas'));
	$page->add(new admin_setting_heading('local_loginas/settingheading', 'Login As Settings', ''));
	$page->add(new admin_setting_configcheckbox('local_loginas/enableloginas', get_string('enableloginas', 'local_loginas'),
        get_string('enableloginasdesc', 'local_loginas'), array(), 1,0));
	$choices = array('participants'=>'Participants page','enrolledusers'=>'Enrolled Users page');	
	$page->add(new admin_setting_configmulticheckbox('local_loginas/loginaslocations',get_string('loginaslocations','local_loginas'),get_string('loginaslocationsdesc','local_loginas'),array(),$choices));
	$ADMIN->add('localplugins', $page);
	
}