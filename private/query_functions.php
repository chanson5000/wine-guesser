<?php

function find_all_red_wines()
{
    global $db;

    $sql = "SELECT * FROM red_wine ";
    $sql .= "ORDER BY varietal ASC;";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_white_wines()
{
    global $db;

    $sql = "SELECT * FROM white_wine ";
    $sql .= "ORDER BY varietal ASC;";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_red_wine_by_id($id)
{
    global $db;

    $sql = "SELECT * FROM red_wine ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $wine = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $wine;  // returned the assoc. array
}

function find_white_wine_by_id($id)
{
    global $db;

    $sql = "SELECT * FROM white_wine ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $wine = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $wine;  // returned the assoc. array
}

function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function update_red_wine($wine)
{
    global $db;

    $errors = validate_wine_admin($wine);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE red_wine SET ";
    $sql .= "varietal='" . db_escape($db, $wine['varietal']) . "', ";
    $sql .= "new_world='" . db_escape($db, $wine['new_world']) . "', ";
    $sql .= "garnet='" . db_escape($db, $wine['garnet']) . "', ";
    $sql .= "ruby='" . db_escape($db, $wine['ruby']) . "', ";
    $sql .= "purple='" . db_escape($db, $wine['purple']) . "', ";
    $sql .= "red_fruit='" . db_escape($db, $wine['red_fruit']) . "', ";
    $sql .= "black_fruit='" . db_escape($db, $wine['black_fruit']) . "', ";
    $sql .= "blue_fruit='" . db_escape($db, $wine['blue_fruit']) . "', ";
    $sql .= "nose_tart='" . db_escape($db, $wine['nose_tart']) . "', ";
    $sql .= "nose_ripe='" . db_escape($db, $wine['nose_ripe']) . "', ";
    $sql .= "nose_overripe='" . db_escape($db, $wine['nose_overripe']) . "', ";
    $sql .= "nose_baked='" . db_escape($db, $wine['nose_baked']) . "', ";
    $sql .= "palate_tart='" . db_escape($db, $wine['palate_tart']) . "', ";
    $sql .= "palate_ripe='" . db_escape($db, $wine['palate_ripe']) . "', ";
    $sql .= "palate_overripe='" . db_escape($db, $wine['palate_overripe']) . "', ";
    $sql .= "palate_baked='" . db_escape($db, $wine['palate_baked']) . "', ";
    $sql .= "floral='" . db_escape($db, $wine['floral']) . "', ";
    $sql .= "vegetal='" . db_escape($db, $wine['vegetal']) . "', ";
    $sql .= "herbs='" . db_escape($db, $wine['herbs']) . "', ";
    $sql .= "mint='" . db_escape($db, $wine['mint']) . "', ";
    $sql .= "peppercorn='" . db_escape($db, $wine['peppercorn']) . "', ";
    $sql .= "coffee='" . db_escape($db, $wine['coffee']) . "', ";
    $sql .= "game='" . db_escape($db, $wine['game']) . "', ";
    $sql .= "balsamic='" . db_escape($db, $wine['balsamic']) . "', ";
    $sql .= "organic='" . db_escape($db, $wine['organic']) . "', ";
    $sql .= "inorganic='" . db_escape($db, $wine['inorganic']) . "', ";
    $sql .= "oak='" . db_escape($db, $wine['oak']) . "', ";
    $sql .= "tannin_low='" . db_escape($db, $wine['tannin_low']) . "', ";
    $sql .= "tannin_mod='" . db_escape($db, $wine['tannin_mod']) . "', ";
    $sql .= "tannin_mod_plus='" . db_escape($db, $wine['tannin_mod_plus']) . "', ";
    $sql .= "tannin_high='" . db_escape($db, $wine['tannin_high']) . "', ";
    $sql .= "acid_low='" . db_escape($db, $wine['acid_low']) . "', ";
    $sql .= "acid_mod='" . db_escape($db, $wine['acid_mod']) . "', ";
    $sql .= "acid_mod_plus='" . db_escape($db, $wine['acid_mod_plus']) . "', ";
    $sql .= "acid_high='" . db_escape($db, $wine['acid_high']) . "', ";
    $sql .= "alcohol_low='" . db_escape($db, $wine['alcohol_low']) . "', ";
    $sql .= "alcohol_mod='" . db_escape($db, $wine['alcohol_mod']) . "', ";
    $sql .= "alcohol_mod_plus='" . db_escape($db, $wine['alcohol_mod_plus']) . "', ";
    $sql .= "alcohol_high='" . db_escape($db, $wine['alcohol_high']) . "', ";
    $sql .= "climate_cool='" . db_escape($db, $wine['climate_cool']) . "', ";
    $sql .= "climate_moderate='" . db_escape($db, $wine['climate_moderate']) . "', ";
    $sql .= "climate_warm='" . db_escape($db, $wine['climate_warm']) . "', ";
    $sql .= "description='" . db_escape($db, $wine['description']) . "', ";
    $sql .= "notes='" . db_escape($db, $wine['notes']) . "', ";
    $sql .= "confusion='" . db_escape($db, $wine['confusion']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $wine['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_white_wine($wine)
{
    global $db;

    $errors = validate_wine_admin($wine);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE white_wine SET ";
    $sql .= "varietal='" . db_escape($db, $wine['varietal']) . "', ";
    $sql .= "new_world='" . db_escape($db, $wine['new_world']) . "', ";
    $sql .= "straw='" . db_escape($db, $wine['straw']) . "', ";
    $sql .= "yellow='" . db_escape($db, $wine['yellow']) . "', ";
    $sql .= "gold='" . db_escape($db, $wine['gold']) . "', ";
    $sql .= "apple='" . db_escape($db, $wine['apple']) . "', ";
    $sql .= "citrus='" . db_escape($db, $wine['citrus']) . "', ";
    $sql .= "stone='" . db_escape($db, $wine['stone']) . "', ";
    $sql .= "tropical='" . db_escape($db, $wine['tropical']) . "', ";
    $sql .= "nose_tart='" . db_escape($db, $wine['nose_tart']) . "', ";
    $sql .= "nose_ripe='" . db_escape($db, $wine['nose_ripe']) . "', ";
    $sql .= "nose_overripe='" . db_escape($db, $wine['nose_overripe']) . "', ";
    $sql .= "nose_baked='" . db_escape($db, $wine['nose_baked']) . "', ";
    $sql .= "palate_tart='" . db_escape($db, $wine['palate_tart']) . "', ";
    $sql .= "palate_ripe='" . db_escape($db, $wine['palate_ripe']) . "', ";
    $sql .= "palate_overripe='" . db_escape($db, $wine['palate_overripe']) . "', ";
    $sql .= "palate_baked='" . db_escape($db, $wine['palate_baked']) . "', ";
    $sql .= "floral='" . db_escape($db, $wine['floral']) . "', ";
    $sql .= "vegetal='" . db_escape($db, $wine['vegetal']) . "', ";
    $sql .= "herbal='" . db_escape($db, $wine['herbal']) . "', ";
    $sql .= "botrytis='" . db_escape($db, $wine['botrytis']) . "', ";
    $sql .= "oxidative='" . db_escape($db, $wine['oxidative']) . "', ";
    $sql .= "lees='" . db_escape($db, $wine['lees']) . "', ";
    $sql .= "buttery='" . db_escape($db, $wine['buttery']) . "', ";
    $sql .= "organic='" . db_escape($db, $wine['organic']) . "', ";
    $sql .= "inorganic='" . db_escape($db, $wine['inorganic']) . "', ";
    $sql .= "oak='" . db_escape($db, $wine['oak']) . "', ";
    $sql .= "bitter='" . db_escape($db, $wine['bitter']) . "', ";
    $sql .= "dry='" . db_escape($db, $wine['dry']) . "', ";
    $sql .= "off_dry='" . db_escape($db, $wine['off_dry']) . "', ";
    $sql .= "sweet='" . db_escape($db, $wine['sweet']) . "', ";
    $sql .= "acid_low='" . db_escape($db, $wine['acid_low']) . "', ";
    $sql .= "acid_mod='" . db_escape($db, $wine['acid_mod']) . "', ";
    $sql .= "acid_mod_plus='" . db_escape($db, $wine['acid_mod_plus']) . "', ";
    $sql .= "acid_high='" . db_escape($db, $wine['acid_high']) . "', ";
    $sql .= "alcohol_low='" . db_escape($db, $wine['alcohol_low']) . "', ";
    $sql .= "alcohol_mod='" . db_escape($db, $wine['alcohol_mod']) . "', ";
    $sql .= "alcohol_mod_plus='" . db_escape($db, $wine['alcohol_mod_plus']) . "', ";
    $sql .= "alcohol_high='" . db_escape($db, $wine['alcohol_high']) . "', ";
    $sql .= "climate_cool='" . db_escape($db, $wine['climate_cool']) . "', ";
    $sql .= "climate_moderate='" . db_escape($db, $wine['climate_moderate']) . "', ";
    $sql .= "climate_warm='" . db_escape($db, $wine['climate_warm']) . "', ";
    $sql .= "description='" . db_escape($db, $wine['description']) . "', ";
    $sql .= "notes='" . db_escape($db, $wine['notes']) . "', ";
    $sql .= "confusion='" . db_escape($db, $wine['confusion']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $wine['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function create_red_wine($wine)
{
    global $db;

    $errors = validate_wine_admin($wine);
    if (!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO red_wine ";
    $sql .= "(varietal, new_world, garnet, ruby, purple, red_fruit, black_fruit, blue_fruit, ";
    $sql .= "nose_tart, nose_ripe, nose_overripe, nose_baked, palate_tart, palate_ripe, ";
    $sql .= "palate_overripe, palate_baked, floral, vegetal, herbs, mint, peppercorn, coffee, ";
    $sql .= "game, balsamic, organic, inorganic, oak, tannin_low, tannin_mod, tannin_mod_plus, ";
    $sql .= "tannin_high, acid_low, acid_mod, acid_mod_plus, acid_high, alcohol_low, alcohol_mod, ";
    $sql .= "alcohol_mod_plus, alcohol_high, climate_cool, climate_moderate, climate_warm, description, ";
    $sql .= "notes, confusion) VALUES (";
    $sql .= "'" . db_escape($db, $wine['varietal']) . "',";
    $sql .= "'" . db_escape($db, $wine['new_world']) . "',";
    $sql .= "'" . db_escape($db, $wine['garnet']) . "',";
    $sql .= "'" . db_escape($db, $wine['ruby']) . "',";
    $sql .= "'" . db_escape($db, $wine['purple']) . "',";
    $sql .= "'" . db_escape($db, $wine['red_fruit']) . "',";
    $sql .= "'" . db_escape($db, $wine['black_fruit']) . "',";
    $sql .= "'" . db_escape($db, $wine['blue_fruit']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_tart']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_ripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_overripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_baked']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_tart']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_ripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_overripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_baked']) . "',";
    $sql .= "'" . db_escape($db, $wine['floral']) . "',";
    $sql .= "'" . db_escape($db, $wine['vegetal']) . "',";
    $sql .= "'" . db_escape($db, $wine['herbs']) . "',";
    $sql .= "'" . db_escape($db, $wine['mint']) . "',";
    $sql .= "'" . db_escape($db, $wine['peppercorn']) . "',";
    $sql .= "'" . db_escape($db, $wine['coffee']) . "',";
    $sql .= "'" . db_escape($db, $wine['game']) . "',";
    $sql .= "'" . db_escape($db, $wine['balsamic']) . "',";
    $sql .= "'" . db_escape($db, $wine['organic']) . "',";
    $sql .= "'" . db_escape($db, $wine['inorganic']) . "',";
    $sql .= "'" . db_escape($db, $wine['oak']) . "',";
    $sql .= "'" . db_escape($db, $wine['tannin_low']) . "',";
    $sql .= "'" . db_escape($db, $wine['tannin_mod']) . "',";
    $sql .= "'" . db_escape($db, $wine['tannin_mod_plus']) . "',";
    $sql .= "'" . db_escape($db, $wine['tannin_high']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_low']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_mod']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_mod_plus']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_high']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_low']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_mod']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_mod_plus']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_high']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_cool']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_moderate']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_warm']) . "',";
    $sql .= "'" . db_escape($db, $wine['description']) . "',";
    $sql .= "'" . db_escape($db, $wine['notes']) . "',";
    $sql .= "'" . db_escape($db, $wine['confusion']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function create_white_wine($wine)
{
    global $db;

    $errors = validate_wine_admin($wine);
    if (!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO white_wine ";
    $sql .= "(varietal, new_world, straw, yellow, gold, apple, citrus, stone, ";
    $sql .= "tropical, nose_tart, nose_ripe, nose_overripe, nose_baked, palate_tart, palate_ripe, ";
    $sql .= "palate_overripe, palate_baked, floral, vegetal, herbal, botrytis, oxidative, lees, ";
    $sql .= "buttery, organic, inorganic, oak, bitter, dry, off_dry, sweet, ";
    $sql .= "acid_low, acid_mod, acid_mod_plus, acid_high, alcohol_low, alcohol_mod, ";
    $sql .= "alcohol_mod_plus, alcohol_high, climate_cool, climate_moderate, climate_warm, description, ";
    $sql .= "notes, confusion) VALUES (";
    $sql .= "'" . db_escape($db, $wine['varietal']) . "',";
    $sql .= "'" . db_escape($db, $wine['new_world']) . "',";
    $sql .= "'" . db_escape($db, $wine['straw']) . "',";
    $sql .= "'" . db_escape($db, $wine['yellow']) . "',";
    $sql .= "'" . db_escape($db, $wine['gold']) . "',";
    $sql .= "'" . db_escape($db, $wine['apple']) . "',";
    $sql .= "'" . db_escape($db, $wine['citrus']) . "',";
    $sql .= "'" . db_escape($db, $wine['stone']) . "',";
    $sql .= "'" . db_escape($db, $wine['tropical']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_tart']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_ripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_overripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['nose_baked']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_tart']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_ripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_overripe']) . "',";
    $sql .= "'" . db_escape($db, $wine['palate_baked']) . "',";
    $sql .= "'" . db_escape($db, $wine['floral']) . "',";
    $sql .= "'" . db_escape($db, $wine['vegetal']) . "',";
    $sql .= "'" . db_escape($db, $wine['herbal']) . "',";
    $sql .= "'" . db_escape($db, $wine['botrytis']) . "',";
    $sql .= "'" . db_escape($db, $wine['oxidative']) . "',";
    $sql .= "'" . db_escape($db, $wine['lees']) . "',";
    $sql .= "'" . db_escape($db, $wine['buttery']) . "',";
    $sql .= "'" . db_escape($db, $wine['organic']) . "',";
    $sql .= "'" . db_escape($db, $wine['inorganic']) . "',";
    $sql .= "'" . db_escape($db, $wine['oak']) . "',";
    $sql .= "'" . db_escape($db, $wine['bitter']) . "',";
    $sql .= "'" . db_escape($db, $wine['dry']) . "',";
    $sql .= "'" . db_escape($db, $wine['off_dry']) . "',";
    $sql .= "'" . db_escape($db, $wine['sweet']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_low']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_mod']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_mod_plus']) . "',";
    $sql .= "'" . db_escape($db, $wine['acid_high']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_low']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_mod']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_mod_plus']) . "',";
    $sql .= "'" . db_escape($db, $wine['alcohol_high']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_cool']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_moderate']) . "',";
    $sql .= "'" . db_escape($db, $wine['climate_warm']) . "',";
    $sql .= "'" . db_escape($db, $wine['description']) . "',";
    $sql .= "'" . db_escape($db, $wine['notes']) . "',";
    $sql .= "'" . db_escape($db, $wine['confusion']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_red_wine($id)
{
    global $db;

    $sql = "DELETE FROM red_wine ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_white_wine($id)
{
    global $db;

    $sql = "DELETE FROM white_wine ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_wine_admin($wine)
{

    $errors = [];

    if (is_blank($wine['varietal'])) {
        $errors[] = "Varietal field cannot be blank.";
    } elseif (!has_length($wine['varietal'], array('min' => 2, 'max' => 25))) {
        $errors[] = "Varietal must be between 2 and  25 characters.";
    }

    return $errors;
}

function find_total_red_wines()
{
    global $db;

    $sql = "SELECT COUNT(*) FROM red_wine;";

    $result = mysqli_query($db, $sql);
    $num = mysqli_fetch_row($result);
    return $num[0];
}

function find_total_white_wines()
{
    global $db;

    $sql = "SELECT COUNT(*) FROM white_wine;";

    $result = mysqli_query($db, $sql);
    $num = mysqli_fetch_row($result);
    return $num[0];
}

function testing_function()
{
    global $db;
    $wines = [];

    for ($num_records = (find_total_red_wines() - 1); $num_records >= 0; $num_records--) {

        $sql = "SELECT * FROM red_wine LIMIT " . $num_records . ",1;";
        $result = mysqli_query($db, $sql);
        $wine = mysqli_fetch_assoc($result);

        $wines[] = $wine;

    }
    return $wines;

}

function find_red_wine_match($guess_wine)
{
    global $db;
    $wines = [];

    for ($num_records = (find_total_red_wines() - 1); $num_records >= 0; $num_records--) {
        $sql = "SELECT * FROM red_wine LIMIT " . $num_records . ",1;";
        $result = mysqli_query($db, $sql);
        $wine = mysqli_fetch_assoc($result);
        $wines[] = $wine;
//        mysqli_free_result($result);
    }
    $match_values = [];

    foreach ($guess_wine as $key => $value) {
        if ($value == 1) {
            $match_values[] = $key;
        }
    }

    $match_frequency = [];

    foreach ($wines as $wine) {
        $match_frequency[$wine['id']] = 0;
        foreach ($wine as $property => $status)
            if (in_array($property, $match_values) && ($status === '1')) {
                $match_frequency[$wine['id']]++;
            }
    }
    $most_matched_wine_id = array_search(max($match_frequency), $match_frequency);
    return find_red_wine_by_id($most_matched_wine_id);
}

function find_white_wine_match($guess_wine)
{
    global $db;
    $wines = [];

    for ($num_records = (find_total_white_wines() - 1); $num_records >= 0; $num_records--) {

        $sql = "SELECT * FROM white_wine LIMIT " . $num_records . ",1;";
        $result = mysqli_query($db, $sql);
        $wine = mysqli_fetch_assoc($result);

        $wines[] = $wine;
//        mysqli_free_result($result);
    }
    $match_values = [];

    foreach ($guess_wine as $key => $value) {
        if ($value == 1) {
            $match_values[] = $key;
        }
    }

    $match_frequency = [];

    foreach ($wines as $wine) {
        $match_frequency[$wine['id']] = 0;
        foreach ($wine as $property => $status)
            if (in_array($property, $match_values) && ($status === '1')) {
                $match_frequency[$wine['id']]++;
            }
    }

    $most_matched_wine_id = array_search(max($match_frequency), $match_frequency);

    return find_white_wine_by_id($most_matched_wine_id);
}

function insert_user($user) {
    global $db;

    $errors = validate_user($user);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users ";
    $sql .= "(first_name, last_name, email, username, password, is_admin) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $user['first_name']) . "',";
    $sql .= "'" . db_escape($db, $user['last_name']) . "',";
    $sql .= "'" . db_escape($db, $user['email']) . "',";
    $sql .= "'" . db_escape($db, $user['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "',";
    $sql .= "'" . db_escape($db, $user['is_admin']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_user($user, $options = [])
{

    $password_required = isset($options['password_required']) ? $options['password_required'] : true;

    if (is_blank($user['first_name'])) {
        $errors[] = "First name cannot be blank.";
    } elseif (!has_length($user['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($user['last_name'])) {
        $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($user['last_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($user['email'])) {
        $errors[] = "Email cannot be blank.";
    } elseif (!has_length($user['email'], array('max' => 255))) {
        $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($user['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    if (is_blank($user['username'])) {
        $errors[] = "Username cannot be blank.";
    } elseif (!has_length($user['username'], array('min' => 4, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($user['username'], $user['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    if ($password_required) {
        if (is_blank($user['password'])) {
            $errors[] = "Password cannot be blank.";
        } elseif (!has_length($user['password'], array('min' => 8))) {
            $errors[] = "Password must contain 12 or more characters.";
        } elseif (!preg_match('/[A-Z]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 uppercase letter.";
        } elseif (!preg_match('/[a-z]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 lowercase letter.";
        } elseif (!preg_match('/[0-9]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 number.";
        } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 symbol";
        }

        if (is_blank($user['confirm_password'])) {
            $errors[] = "Confirm password cannot be blank.";
        } elseif ($user['password'] !== $user['confirm_password']) {
            $errors[] = "Password and confirm password must match.";
        }
    }
    return $errors;
}

// Find all admins, ordered last_name, first_name
function find_all_users() {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function update_user($user)
{
    global $db;

    $password_sent = !is_blank($user['password']);

    $errors = validate_user($user, ['password_required' => $password_sent]);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET ";
    $sql .= "first_name='" . db_escape($db, $user['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $user['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $user['email']) . "', ";
    $sql .= "is_admin='" . db_escape($db, $user['is_admin']) . "', ";
    if ($password_sent) {
        $sql .= "password='" . db_escape($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . db_escape($db, $user['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function delete_user($user)
{
    global $db;

    $sql = "DELETE FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_user_by_username($username) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}