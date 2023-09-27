<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 * This file contains settings for the block search_course
 * 
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    
    $settings->add(new admin_setting_configcheckbox('block_search_courses/enrolled_only',
	                                                get_string('enrolled_only', 'block_search_courses'),
													get_string('enrolled_only:desc', 'block_search_courses'), 0));

    $settings->add(new admin_setting_configcheckbox('block_search_courses/can_enrol',
													get_string('can_enrol', 'block_search_courses'),
													get_string('can_enrol:desc', 'block_search_courses'), 0));
}
