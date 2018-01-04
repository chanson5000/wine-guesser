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
    // For UPDATE statments, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}