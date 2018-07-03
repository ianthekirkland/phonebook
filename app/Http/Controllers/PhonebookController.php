<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Get data.
     */
    public function getData()
    {
        // Get all database data; Not sure which of the below 2 is correct syntax.
        // return Phonebook::all();
        // return Phonebook::all()->get();
        
        // Order by database table's name' field in descending order.
        // return Phonebook::orderBy('name', 'DESC')->get();
        
        // Order by database table's name' field in ascending order.
        return Phonebook::orderBy('name', 'ASC')->get();
    }

    /**
     * sanitizePhoneNumbers
     *
     * @param    string|array  $phone_numbers  Phone number in any form provided
     * @return   string|array  $phone_numbers  Phone number in pure numeric format
     * @example  +1(210).622-9=127  =>  12106229127
     */
    public function sanitizePhoneNumbers($phone_numbers)
    {
        $country_dflt = '1';
        $area_code_dflt = '210';
        $fallback_number = '5555555555';
        $strict = false;
        
        // adapt to scalar/array input
        if (!is_array($phone_numbers)) {
            $is_scalar = true;
            $phone_numbers = array($phone_numbers);
        }

        foreach ($phone_numbers as &$phone_number) {
            try {
                // Get only digits from phone number
                $pattern      = "/\D/";
                $replacement  = "";
                $phone_number = preg_replace($pattern, $replacement, $phone_number);

                // 15126239127
                if (strlen($phone_number) >= 10) { 
                    $pattern      = "/.*(\d{10})$/i";
                    $replacement  = "$1";
                    $phone_number = preg_replace($pattern, $replacement, $phone_number);
                    $phone_number = $country_dflt . $phone_number;
                
                // 12106239127
                } elseif (strlen($phone_number) >= 7) { 
                    $pattern      = "/.*(\d{7})$/i";
                    $replacement  = "$1";
                    $phone_number = preg_replace($pattern, $replacement, $phone_number);
                    $phone_number = $country_dflt . $area_code_dflt . $phone_number;

                // 15555555555
                } else {
                    $phone_number = $country_dflt . $fallback_number;
                }

            // Error
            } catch (Exception $e) {
                $error = $e->getMessage();
                $error = "Caught exception: {$error}";
                if ($strict) {
                    $phone_number = $error;
                }
            }
        }

        // adapt output to appropriate format
        if ($is_scalar) {
            $phone_numbers = array_values($phone_numbers)[0];
        }

        return $phone_numbers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PhonebookRequest  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookRequest $request)
    {
        /* Return without storing */
        // return $request->all();
        
        /* Store */
        $pb = new Phonebook(); // Extends 'Model'.
        $pb->name = $request->name;
        // $pb->phone = $this->sanitizePhoneNumbers($request->phone);
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->save(); // A Method in 'Model', therefore, 'Phonebook'
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phonebook $phonebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        //
    }
}
