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

namespace local_sticky2navigation\local\hooks\output;

/**
 * Hook callbacks for local_sticky2navigation
 *
 * @package    local_sticky2navigation
 * @copyright  2025 Hugo Ribeiro <hugo@moodlar.pt>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class before_standard_head_html_generation
{

    /**
     * Callback allowing to add to <head> of the page
     *
     * @param \core\hook\output\before_standard_head_html_generation $hook
     */
    public static function callback(\core\hook\output\before_standard_head_html_generation $hook): void
    {

        if (during_initial_install() || isset($CFG->upgraderunning)) {
            // Do nothing during installation or upgrade.
            return;
        }

        $sticky = "
            .secondary-navigation {
                position: sticky;
                top: 60px;
                z-index: 1000;
            }";
        $style = "<style>$sticky</style>";
        $hook->add_html($style);
    }
}
