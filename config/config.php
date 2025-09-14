<?php 

    function base_url()
    {
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



    //Database Connection
    $con = mysqli_connect('localhost', 'root', '', 'indus');
    
    if(!$con) {
        echo "<script>alert('Some Went Wrong.. DB Connection..')</script>";
    }


    $user_id = $_SESSION['user_id'];

    $user = "SELECT * FROM user_detail WHERE user_id='$user_id'";
    $run = mysqli_query($con, $user);
    $row = mysqli_fetch_assoc($run);


?>