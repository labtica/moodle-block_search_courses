<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 * This file contains functions for the block search_course
 * 
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Gets a list of courses available to the user.
 *
 * @return stdClass[]|null A list of stdClass objects representing 
 * courses or null if no courses are available.
 */
function search_course_list(){
    global $DB;

    $records = $DB->get_records('course', ['visible'=>1], null, 'id, category, fullname');
    return $records;
}

/**
 * Formats the course list for use in a template.
 *
 * @param stdClass[] $courses A list of courses obtained from search_course_list.
 * @return stdClass[] A list of stdClass objects representing courses organized by categories.
 */
function search_course_format_for_template($courses){
    $coursesForTemplate = [];
    $categories = array_values(search_course_courseCategories());

    foreach($categories as $category){
        $item = new stdClass;
        $item->category = $category->name;
        $item->courses = array_filter($courses, function($course) use ($category) {
        return $course->category == $category->id;
	});
    
	$item->courses = array_values($item->courses);
	array_push($coursesForTemplate, $item);
    }

    return $coursesForTemplate;
}

/**
 * Gets a list of visible course categories.
 *
 * @return stdClass[]|null A list of stdClass objects representing course categories or 
 * null if no categories are available.
 */
function search_course_courseCategories(){
    global $DB;

    $records = $DB->get_records('course_categories', ['visible'=>1], null, 'id, name');

    return $records;
}

/**
 * Gets a list of available course names.
 *
 * @return string[] A list of course names or an empty array if no courses are available.
 */
function search_course_formatList(){
    $courses = search_course_list();
    $courseFormat = array();

    if(!$courses || count($courses) <= 0){
	    return [];
    }

    foreach($courses as $index => $value){
	    $courseFormat[$index] = $value->fullname;
    }

    return $courseFormat;
}
