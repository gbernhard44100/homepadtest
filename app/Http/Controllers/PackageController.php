<?php

namespace App\Http\Controllers;

use App\Package;
use App\Registration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


/**
 * Class that controls all requests regarding the packages
 */
class PackageController extends Controller
{
    /**
     * Display a listing of all the packages
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = [];

        foreach (Package::all() as $package) {
            $packageAvailable = false;

            if ($package->registrations_count < $package->limit) {
                $packageAvailable = true;
            }

            $packages[] = [
                'id' => $package->id,
                'name' => $package->name,
                'limit' => $package->limit,
                'Availability' => $packageAvailable
            ];
        }

        return response($packages, 200)->header('Content-Type', 'application/json');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
