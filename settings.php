<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

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
