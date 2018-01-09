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

function update_red_wine($wine)
{
    global $db;

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

function create_red_wine($wine) {
    global $db;

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

function delete_red_wine($id) {
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

//function validate_wine_admin($wine, $options =[]) {
//    if (is_blank($wine['varietal'])) {
//        $errors[] =
//    }
//}