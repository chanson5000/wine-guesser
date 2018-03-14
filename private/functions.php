<?php

function url_for($script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

// TODO: Consider modifying this code to redirect any page to HTTPS, not just login.php.

function secure_login_redirect() {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . WWW_ROOT . "/login.php");
}

// TODO: Clean up these next two lines of code.

function https_redirect($location) {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . WWW_ROOT . $location);
    exit;
}

function redirect_to($location)
{
    header("Location: " . $location);
    exit;
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// TODO: Investigate the two following statement's return warnings and their implication.

function get_and_clear_session_message()
{
    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']);
        return $msg;
    }
}

function display_session_message()
{
    $msg = get_and_clear_session_message();
    if (!is_blank($msg)) {
        return '<div id="message">' . h($msg) . '</div>';
    }
}

function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . "404 Not Found");
    exit();
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

function display_errors($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div id=\"errors\">";
        $output .= "<p>Please fix the following errors:</p>";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function transform_wine_fields($wine, $type) {

    foreach (sync_trans_fields($type) as $field) {
        switch($field) {
            case 'color':
                foreach (sync_trans_colors($type) as $color) {
                    if ($wine[$field] == $color) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['color']);
                break;
            case 'climate':
                foreach (WINE_CLIMATES as $climate) {
                    if ($wine[$field] == $climate) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['climate']);
                break;
            case 'tannin':
                foreach (WINE_STRUCTURES as $structure) {
                    if ($wine[$field] == $structure) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['tannin']);
                break;
            case 'acid':
                foreach (WINE_STRUCTURES as $structure) {
                    if ($wine[$field] == $structure) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['acid']);
                break;
            case 'alcohol':
                foreach (WINE_STRUCTURES as $structure) {
                    if ($wine[$field] == $structure) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['alcohol']);
                break;
            case 'sweetness':
                foreach (WINE_SWEETNESS as $sweetness) {
                    if ($wine[$field] == $sweetness) {
                        $wine[$field] = 1;
                    } else {
                        $wine[$field] = 0;
                    }
                }
                unset($wine['sweetness']);
                break;
            default:
                break;
        }
    }
    return $wine;
}

function sanitize_wine_fields($wine, $type)
{
    if ($type == RED_WINE) {
        foreach (RED_WINE_FIELDS as $field) {
            if (!in_array($field, WINE_TEXT_FIELDS)) {
                $wine[$field] = $wine[$field] ?? '0';
            } else {
                $wine[$field] = $wine[$field] ?? '';
            }
        }
    } elseif ($type == WHITE_WINE) {
        foreach (WHITE_WINE_FIELDS as $field) {
            if (!in_array($field, WINE_TEXT_FIELDS)) {
                $wine[$field] = $wine[$field] ?? '0';
            } else {
                $wine[$field] = $wine[$field] ?? '';
            }
        }
    } else {
        // TODO: Add error handling.
    }
    return $wine;
}

function sync_trans_fields($wine_type)
{
    if ($wine_type == RED_WINE) {
        return RED_TRANSFORM_FIELDS;
    } elseif ($wine_type == WHITE_WINE) {
        return WHITE_TRANSFORM_FIELDS;
    } else {
        // TODO: Add some error handling.
        return RED_TRANSFORM_FIELDS;
    }
}

function sync_trans_colors($wine_type)
{
    if ($wine_type == RED_WINE) {
        return RED_WINE_COLORS;
    } elseif ($wine_type == WHITE_WINE) {
        return WHITE_WINE_COLORS;
    } else {
        // TODO: Add some error handling.
        return RED_WINE_COLORS;
    }
}

