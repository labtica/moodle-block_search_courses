<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 * This file contains render class for the block search_course
 *
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_search_courses\output;
defined('MOODLE_INTERNAL') || die();

use plugin_renderer_base;
use renderable;

/**
 * Block LP renderer class.
 *
 * @package    block_search_courses
 * @copyright  2016 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Defer to template.
     *
     * @param renderable $main
     * @return void
     */
    public function render_main(renderable $main) {
        return $this->render_from_template('block_search_courses/main', $main->export_for_template($this));
    }
}
