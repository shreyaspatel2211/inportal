<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Form;

class CustomFormController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $formName    = $request->input('form_name');
        $fieldTypes  = $request->input('field_type', []);
        $fieldNames  = $request->input('field_name', []);
        $requireds   = $request->input('required', []);
        $fieldOptions = $request->input('field_options', []); // ✅ HIGHLIGHTED
        // dd($fieldTypes);
        if (!is_array($fieldTypes) || !is_array($fieldNames) || !is_array($requireds)) {
            return back()->withErrors(['Invalid form field data.']);
        }

        $customField = [];
        $count = count($fieldTypes);

        for ($i = 0; $i < $count; $i++) {
            $customField["field_" . $fieldNames[$i]] = [
                'field_type' => $fieldTypes[$i],
                'field_name' => $fieldNames[$i],
                'required'   => $requireds[$i],
            ];

            // ✅ ADD options if checkbox or radio
            if (in_array($fieldTypes[$i], ['check_box', 'radio_button']) && !empty($fieldOptions[$i])) {
                $customField["field_" . ($i + 1)]['options'] = explode(',', $fieldOptions[$i]);
            }
        }
            // dd($customField);

        $request->merge([
            'form_name'     => $formName,
            'custom_field'  => json_encode($customField),
        ]);

        // ✅ REMOVE new field
        $request->request->remove('field_type');
        $request->request->remove('field_name');
        $request->request->remove('required');
        $request->request->remove('field_options'); // ✅

        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        $formName = $request->input('form_name');
        $fieldTypes = $request->input('field_type', []);
        $fieldNames = $request->input('field_name', []);
        $requireds  = $request->input('required', []);
        $fieldOptions = $request->input('field_options', []); // ✅

        if (!is_array($fieldTypes) || !is_array($fieldNames) || !is_array($requireds)) {
            return back()->withErrors(['Invalid form field data.']);
        }

        $customField = [];
        $count = count($fieldTypes);

        for ($i = 0; $i < $count; $i++) {
            $customField["field_" . ($i + 1)] = [
                'field_type' => $fieldTypes[$i],
                'field_name' => $fieldNames[$i],
                'required'   => $requireds[$i],
            ];

            // ✅ ADD options if checkbox or radio
            if (in_array($fieldTypes[$i], ['checkbox', 'radio']) && !empty($fieldOptions[$i])) {
                $customField["field_" . ($i + 1)]['options'] = explode(',', $fieldOptions[$i]);
            }
        }

        $request->merge([
            'custom_field'  => json_encode($customField),
        ]);
        return parent::update($request, $id);
    }
}
