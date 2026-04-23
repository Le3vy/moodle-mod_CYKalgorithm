<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Add a new CYK Algorithm activity instance.
 */
function cykalgorithm_add_instance($data, $mform)
{
    global $DB;

    $data->timecreated = time();

    return $DB->insert_record('cykalgorithm', $data);
}

/**
 * Update an existing CYK Algorithm activity instance.
 */
function cykalgorithm_update_instance($data, $mform)
{
    global $DB;

    $data->timemodified = time();
    $data->id = $data->instance;

    return $DB->update_record('cykalgorithm', $data);
}

/**
 * Delete a CYK Algorithm activity instance.
 */
function cykalgorithm_delete_instance($id)
{
    global $DB;

    if (!$record = $DB->get_record('cykalgorithm', ['id' => $id])) {
        return false;
    }

    return $DB->delete_records('cykalgorithm', ['id' => $id]);
}
