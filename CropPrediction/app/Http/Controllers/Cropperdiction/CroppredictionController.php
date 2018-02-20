<?php

namespace App\Http\Controllers\Cropperdiction;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cropprediction;
use Illuminate\Http\Request;

class CroppredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cropprediction = Cropprediction::where('pH', 'LIKE', "%$keyword%")
                ->orWhere('Month', 'LIKE', "%$keyword%")
                ->orWhere('Temperature', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $cropprediction = Cropprediction::paginate($perPage);
        }

        return view('cropprediction.cropprediction.index', compact('cropprediction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cropprediction.cropprediction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'pH' => 'required',
			'Month' => 'required',
			'Temperature' => 'required'
		]);
        $requestData = $request->all();
        
        Cropprediction::create($requestData);

        return redirect('frontendCropprediction/cropprediction')->with('flash_message', 'Cropprediction added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cropprediction = Cropprediction::findOrFail($id);

        return view('cropprediction.cropprediction.show', compact('cropprediction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cropprediction = Cropprediction::findOrFail($id);

        return view('cropprediction.cropprediction.edit', compact('cropprediction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'pH' => 'required',
			'Month' => 'required',
			'Temperature' => 'required'
		]);
        $requestData = $request->all();
        
        $cropprediction = Cropprediction::findOrFail($id);
        $cropprediction->update($requestData);

        return redirect('frontendCropprediction/cropprediction')->with('flash_message', 'Cropprediction updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cropprediction::destroy($id);

        return redirect('frontendCropprediction/cropprediction')->with('flash_message', 'Cropprediction deleted!');
    }
}
