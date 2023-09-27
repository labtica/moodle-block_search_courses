<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 * Privacy
 * 
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_search_courses\privacy;

defined('MOODLE_INTERNAL') || die();

/**
 * Privacy Subsystem for block_mentees implementing null_provider.
 *
 * @copyright  2018 Zig Tan <zig@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\null_provider {

    /**
     * Get the language string identifier with the component's language
     * file to explain why this plugin stores no data.
     *
     * @return  string
     */
    public static function get_reason() : string {
        return 'privacy:metadata';
    }
}
