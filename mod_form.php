<?php

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_cykalgorithm_mod_form extends moodleform_mod {

    public function definition() {
        global $PAGE;

        $mform = $this->_form;

        // Activity name (required by Moodle).
        $mform->addElement('text', 'name', get_string('name', 'cykalgorithm'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required');

        // Input string field.
        $mform->addElement('text', 'inputstring', get_string('inputstring', 'cykalgorithm'));
        $mform->setType('inputstring', PARAM_TEXT);
        $mform->addRule('inputstring', null, 'required');

        // Render the Mustache template that contains the dynamic rule container and template.
        $renderer = $PAGE->get_renderer('core');
        $mform->addElement('html', $renderer->render_from_template('mod_cykalgorithm/grammar', []));

        // REQUIRED: add standard course module elements (adds hidden add/update fields etc).
        $this->standard_coursemodule_elements();

        // Action buttons.
        $this->add_action_buttons();

        // Initialize the AMD module that wires up the dynamic UI.
        // The AMD module must expose an 'init' function.
        $PAGE->requires->js_call_amd('mod_cykalgorithm/grammar', 'init');
    }
}
