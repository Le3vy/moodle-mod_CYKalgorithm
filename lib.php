<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Add a new CYK Algorithm activity instance.
 */
function cykalgorithm_add_instance($data)
{
    global $DB;
    error_log("=== ADD INSTANCE DATA ===");
    error_log(print_r($data, true));
    error_log("LHS: " . print_r($data->lhs, true));
    error_log("RHS: " . print_r($data->rhs, true));



    $data->timecreated = time();

    $id = $DB->insert_record('cykalgorithm', $data);

    if (!empty($data->lhs) && is_array($data->lhs)) {
        foreach ($data->lhs as $i => $lhs) {
            $lhs = trim($lhs);
            $rhs = trim($data->rhs[$i] ?? '');

            if ($lhs === '' || $rhs === '') {
                continue;
            }

            $rule = new stdClass();
            $rule->cykalgorithmid = $id;
            $rule->lhs = $lhs;
            $rule->rhs = $rhs;

            $DB->insert_record('cykalgorithm_rules', $rule);
        }
    }

    return $id;
}

/**
 * Update an existing CYK Algorithm activity instance.
 */
function cykalgorithm_update_instance($data)
{
    global $DB;

    $data->timemodified = time();
    $data->id = $data->instance;

    $DB->update_record('cykalgorithm', $data);

    $DB->delete_records('cykalgorithm_rules', ['cykalgorithmid' => $data->id]);

    if (!empty($data->lhs) && is_array($data->lhs)) {
        foreach ($data->lhs as $i => $lhs) {
            $lhs = trim($lhs);
            $rhs = trim($data->rhs[$i] ?? '');

            if ($lhs === '' || $rhs === '') {
                continue;
            }

            $rule = new stdClass();
            $rule->cykalgorithmid = $data->id;
            $rule->lhs = $lhs;
            $rule->rhs = $rhs;

            $DB->insert_record('cykalgorithm_rules', $rule);
        }
    }

    return true;
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

    $DB->delete_records('cykalgorithm_rules', ['cykalgorithmid' => $id]);

    return $DB->delete_records('cykalgorithm', ['id' => $id]);
}
