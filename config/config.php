<?php 

    function base_url($path = '') {
        
        return 'http://localhost/indus/';

    }

    // Form Helpers

    // Label
    function form_label($label, $for = '', $attributes = array()) {
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= $key . '="' . htmlspecialchars($value) . '" ';
        }
        return '<label for="' . htmlspecialchars($for) . '" ' . trim($attrString) . '>' . htmlspecialchars($label) . '</label>';
    }

    // Input
    function form_input($data = array()) {
        $attributes = '';
        foreach ($data as $key => $value) {
            $attributes .= $key . '="' . htmlspecialchars($value) . '" ';
        }
        return '<input ' . trim($attributes) . '>';
    }

    // Textarea
    function form_textarea($data = array()) {
        $value = $data['value'] ?? '';
        unset($data['value']); // remove value to avoid duplication
        $attributes = '';
        foreach ($data as $key => $val) {
            $attributes .= $key . '="' . htmlspecialchars($val) . '" ';
        }
        return '<textarea ' . trim($attributes) . '>' . htmlspecialchars($value) . '</textarea>';
    }

    // Select
    function form_dropdown($name, $options = array(), $selected = null, $extra = array()) {
        $attributes = '';
        foreach ($extra as $key => $val) {
            $attributes .= $key . '="' . htmlspecialchars($val) . '" ';
        }

        $html = '<select name="' . htmlspecialchars($name) . '" ' . trim($attributes) . '>';
        foreach ($options as $key => $val) {
            $isSelected = ($selected !== null && $selected == $key) ? 'selected' : '';
            $html .= '<option value="' . htmlspecialchars($key) . '" ' . $isSelected . '>' . htmlspecialchars($val) . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // Checkbox
    function form_checkbox($data = array()) {
        $attributes = '';
        foreach ($data as $key => $value) {
            $attributes .= $key . '="' . htmlspecialchars($value) . '" ';
        }
        return '<input type="checkbox" ' . trim($attributes) . '>';
    }

    // Radio
    function form_radio($data = array()) {
        $attributes = '';
        foreach ($data as $key => $value) {
            $attributes .= $key . '="' . htmlspecialchars($value) . '" ';
        }
        return '<input type="radio" ' . trim($attributes) . '>';
    }



    
// Helper function to get appropriate icons for options
function get_icon_for_option($option) {
    $option_lower = strtolower($option);
    
    $icon_map = [
        'repair' => 'fas fa-tools',
        'install' => 'fas fa-wrench',
        'removal' => 'fas fa-trash-alt',
        'clean' => 'fas fa-broom',
        'maintenance' => 'fas fa-clipboard-check',
        'inspection' => 'fas fa-search',
        'delivery' => 'fas fa-truck',
        'setup' => 'fas fa-cogs',
        'assembly' => 'fas fa-puzzle-piece',
        'diagnostic' => 'fas fa-stethoscope',
        'emergency' => 'fas fa-ambulance',
        'scheduled' => 'fas fa-calendar-check'
    ];
    
    foreach ($icon_map as $keyword => $icon) {
        if (strpos($option_lower, $keyword) !== false) {
            return $icon;
        }
    }
    
    return 'fas fa-cog'; // default icon
}

// Helper function for radio button icons
function get_icon_for_radio($option, $is_yes_no) {
    if ($is_yes_no) {
        $option_lower = strtolower($option);
        if (strpos($option_lower, 'yes') !== false || strpos($option_lower, 'agree') !== false) {
            return 'fas fa-check-circle';
        }
        if (strpos($option_lower, 'no') !== false || strpos($option_lower, 'disagree') !== false) {
            return 'fas fa-times-circle';
        }
    }
    return 'fas fa-circle';
}

// Helper function to detect yes/no questions
function is_yes_no_question($attribute_name) {
    $question_lower = strtolower($attribute_name);
    $yes_no_indicators = ['do you', 'are you', 'have you', 'need', 'would you', 'can you', 'will you'];
    
    foreach ($yes_no_indicators as $indicator) {
        if (strpos($question_lower, $indicator) !== false) {
            return true;
        }
    }
    return false;
}

// Helper function to create safe IDs
function sanitize_id($text) {
    return preg_replace('/[^a-zA-Z0-9_-]/', '_', strtolower($text));
}




    //Database Connection
    $con = mysqli_connect('localhost', 'root', '', 'indus');
    
    if(!$con) {
        echo "<script>alert('Some Went Wrong.. DB Connection..')</script>";
    }


    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $user = "SELECT * FROM user_detail WHERE user_id='$user_id'";
    $run = mysqli_query($con, $user);
    $row = mysqli_fetch_assoc($run);


?>