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

    $last_record = count(RED_WINE_FIELDS) - 1;

    foreach (RED_WINE_FIELDS as $iterations => $field) {
        if ($iterations != $last_record) {
            $sql .= db_escape($db,$field) . "='" . db_escape($db, $wine[$field]) . "', ";
        } else {
            $sql .= db_escape($db,$field) . "='" . db_escape($db, $wine[$field]) . "' ";
        }
    }

    $sql .= "WHERE id='" . db_escape($db, $wine['id']) . "' ";
    $sql .= "LIMIT 1;";

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

    $last_record = count(WHITE_WINE_FIELDS) - 1;

    foreach (WHITE_WINE_FIELDS as $iterations => $field) {
        if ($iterations != $last_record) {
            $sql .= db_escape($db,$field) . "='" . db_escape($db, $wine[$field]) . "', ";
        } else {
            $sql .= db_escape($db,$field) . "='" . db_escape($db, $wine[$field]) . "' ";
        }
    }

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

    $last_record = count(RED_WINE_FIELDS) -1;

    $sql = "INSERT INTO red_wine (";

    foreach (RED_WINE_FIELDS as $iteration => $field) {
        if ($iteration != $last_record) {
            $sql .= db_escape($db, $field) . ", ";
        } else {
        $sql .= db_escape($db, $field) . ") VALUES (";
        }
    }

    foreach (RED_WINE_FIELDS as $iteration => $field) {
        if ($iteration != $last_record) {
            $sql .= "'" . db_escape($db, $wine[$field]) . "', ";
        } else {
            $sql .= "'" . db_escape($db, $wine[$field]) . "')";
        }

    }

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

    $last_record = count(WHITE_WINE_FIELDS) - 1;

    $sql = "INSERT INTO white_wine (";

    foreach (WHITE_WINE_FIELDS as $iteration => $field) {
        if ($iteration != $last_record) {
            $sql .= db_escape($db, $field) . ", ";
        } else {
            $sql .= db_escape($db, $field) . ") VALUES (";
        }
    }

    foreach (WHITE_WINE_FIELDS as $iteration => $field) {
        if ($iteration != $last_record) {
            $sql .= "'" . db_escape($db, $wine[$field]) . "', ";
        } else {
            $sql .= "'" . db_escape($db, $wine[$field]) . "')";
        }

    }

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

// TODO: Fine tune the red and white wine matching algorithms.

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
    $match_property = [];

    // Populate a variable with the properties we have selected for matching to a wine in the database.
    foreach ($guess_wine as $key => $value) {
        if ($value > 0) {
            $match_property[] = $key;
        }
    }

    $match_score = [];

    foreach ($wines as $wine) {
        $match_score[$wine['id']] = 0;
        foreach ($wine as $property => $status)
            if (in_array($property, $match_property) && ($status > '0')) {
                $match_score[$wine['id']]++;
                if ($status > '1') {
                   $match_score[$wine['id']]++;
                }
            } else {
                $match_score[$wine['id']]--;
            }
    }
    $most_matched_wine_id = array_search(max($match_score), $match_score);
    return find_red_wine_by_id($most_matched_wine_id);
}

// TODO: Reflect changes made in the red wine match pattern to this white wine pattern.
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
        $errors[] = "Username must be between 4 and 255 characters.";
    } elseif (!has_unique_username($user['username'], isset($user['id']) ? $user['id'] : 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    if ($password_required) {
        if (is_blank($user['password'])) {
            $errors[] = "Password cannot be blank.";
        } elseif (!has_length($user['password'], array('min' => 8))) {
            $errors[] = "Password must contain 8 or more characters.";
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