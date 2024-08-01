<?php

function validateEvents($input_method, &$formdata, &$errors)
{
    $formdata['title'] = filter_input($input_method, "title", FILTER_SANITIZE_STRING);
    $formdata['description'] = filter_input($input_method, "description", FILTER_SANITIZE_STRING);
    $formdata['date'] = filter_input($input_method, "date", FILTER_SANITIZE_STRING);
    $formdata['field'] = filter_input($input_method, "field", FILTER_SANITIZE_STRING);
    $formdata['type'] = filter_input($input_method, "type", FILTER_SANITIZE_NUMBER_INT);
    $formdata['location'] = filter_input($input_method, "location", FILTER_SANITIZE_NUMBER_INT);
    $formdata['link'] = filter_input($input_method, "link", FILTER_SANITIZE_NUMBER_INT);
    $formdata['img'] = filter_input($input_method, "img", FILTER_SANITIZE_NUMBER_INT);

    if (
        $formdata['title'] === NULL ||
        $formdata['title'] === FALSE ||
        $formdata['title'] === ""
    ) {
        $errors['title'] = "Title required";
    }

    if (
        $formdata['description'] === NULL ||
        $formdata['description'] === FALSE ||
        $formdata['description'] === ""
    ) {
        $errors['description'] = "Description required";
    }

    if (
        $formdata['date'] === NULL ||
        $formdata['date'] === FALSE ||
        $formdata['date'] === ""
    ) {
        $errors['date'] = "Start Date  required";
    }

    if (
        $formdata['field'] === NULL ||
        $formdata['field'] === FALSE ||
        $formdata['field'] === ""
    ) {
        $errors['field'] = "End Date required";
    }

    if (
        $formdata['type'] === NULL ||
        $formdata['type'] === FALSE ||
        $formdata['type'] === ""
    ) {
        $errors['type'] = "End Date required";
    }

    if (
        $formdata['location'] === NULL ||
        $formdata['location'] === FALSE ||
        $formdata['location'] === ""
    ) {
        $errors['location'] = "End Date required";
    }

    if (
        $formdata['link'] === NULL ||
        $formdata['link'] === FALSE ||
        $formdata['link'] === ""
    ) {
        $errors['link'] = "End Date required";
    }

    if (
        $formdata['img'] === NULL ||
        $formdata['img'] === FALSE ||
        $formdata['img'] === ""
    ) {
        $errors['img'] = "End Date required";
    }
}


