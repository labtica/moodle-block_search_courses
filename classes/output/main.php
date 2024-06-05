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
 *This file contains main class for the block search_course
 *
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_search_courses\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

require_once($CFG->dirroot . "/blocks/search_courses/lib.php"); //Libreria de funciones usadas en export_for_template
/**
 * Class containing data for my overview block.
 *
 * @copyright  2017 Simey Lameze <simey@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class main implements renderable, templatable {

    /**
     * @var string The tab to display.
     */
    public $instanceid;

    /**
     * Constructor class main
     *
     * @param mixed $instanceid The instance ID of the block.
     */
    public function __construct($instanceid) {
        $this->instanceid = $instanceid;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param \renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $CFG, $DB;

        $courses = block_search_course_list();

        if (!is_siteadmin()) {
            if (get_config('block_search_courses', 'enrolled_only')) {
            $courses = array_filter($courses, function ($course) {
                $context = \context_course::instance($course->id);
                return is_enrolled($context);
            });
            }
            if (get_config('block_search_courses', 'can_enrol')) {
            $courses = array_filter($courses, function ($course) use ($DB) {
                $enrol = $DB->record_exists(
                "enrol",
                [
                    "courseid" => $course->id,
                    "enrol" => "self",
                    "status" => 0,
                ]
                );
                return $enrol;
            });
            }
        }
        
        $courses = block_search_course_format_for_template($courses);
        $data = [
            'courses_maplist' => $courses,
            'wwwroot' => $CFG->wwwroot,
            'btn_search' => get_string("btn_search", "block_search_courses"),
            'wwwblock' => $CFG->wwwroot . '/blocks/search_courses'
        ];
        return $data;

    }
}
